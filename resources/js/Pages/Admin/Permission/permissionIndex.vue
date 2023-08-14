<script setup>
    import {reactive, onMounted, watch, computed, ref} from 'vue';
    import axios from 'axios';

    import AppLayout from '@/Layouts/AppLayout.vue';
    import DialogModal from '@/Components/DialogModal.vue';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';

    import DefaultButton from '@/Components/buttons/DefaultButton.vue';
    import LightButton from '@/Components/buttons/LightButton.vue';
    import GreenButton from '@/Components/buttons/GreenButton.vue';
    import RedButton from '@/Components/buttons/RedButton.vue';

    const local_storage_column_key = 'ln_permissions_grid_columns';

    const errors = ref('');

    const props = defineProps({
        can: {
            type: Object,
            default: () => ({}),
        }
    });

    const defaultFormObject = {
        title: null,
        author: null,
        image: null,
    };

    const state = reactive({
        Permissions: [],
        Permission: newPermission(),
        editingPermission: null,
        deletingPermission: null,
        // Van nyitott ablak
        isFormOpen: false,
        // A folyamatban levő művelet szerkesztés
        isEdit: false,

        // "settings" modal megnyitása / bezárása
        showSettingsModal: false,
        // "edit" modal megnyitása / bezárása
        showEditModal: false,
        // "delete" modal megnyitása / bezárása
        showDeleteModal: false,

        // Kiválasztott rekordok azonosítója
        selected: [],
        // Összes elem ki van választva
        selectAll: false,
        // Táblázat oszlopai
        columns: {
            id: {
                label: '#',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            name: {
                label: 'name',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            action: {
                label: 'actions',
                is_visible: true,
                is_sortable: false,
                is_filterable: false,
            },
        },
        // Oldaltörés
        pagination: {
            current_page: 1,
            total_number_of_pages: 0,
            per_page: 10,
            range: 5,
        },
        // Szűrés és keresés
        filters: {
            tags: [],
            search: null
        },
    });

    // Figyeli az oszlopok változását
    watch(state.columns, (new_value, old_value) => {
        //console.log(new_value);
        localStorage.setItem(local_storage_column_key, JSON.stringify(new_value));
    });

    onMounted(async () => {
        getPermissions();
    });

    // Új könyv előkészítése
    function newPermission_init(){
        state.Permission = newPermission();
        state.editingPermission = null;
        state.isEdit = false;

        openEditModal();
    }

    // Új könyv adatai
    function newPermission(){
        return {
            id: null,
            name: null,
        };
    }

    // Szerepkörök lekérése
    function getPermissions(page = state.pagination.current_page) {
        axios.post(route('getPermissions', {
            filters: state.filters,
            config: {
                per_page: state.pagination.per_page,
            }, page
        })).then(response => {
            //console.log(response);
            state.Permissions = response.data.permissions.data;
            
            state.pagination.total_number_of_pages = response.data.permissions.last_page;
            state.pagination.current_page = response.data.permissions.current_page;
        });
    };

    // Kiválasztás
    function select(){
        state.selected = [];
        if( !state.selectAll ){
            state.Permissions.forEach(permission => {
                state.selected.push(permission.id);
            });
        }
    };

    function editPermission(permission){
        state.editingPermission = JSON.parse(JSON.stringify(permission));
        state.Permission = state.editingPermission;
        state.isEdit = true;

        openEditModal();
    }

    function storePermission(){
        errors.value = '';

        axios.post(route('permissions_store'), state.Permission)
            .then(res => {
                console.log('res', res);
                state.Books.push(res.data.permission);

                closeEditModal();
            })
            .catch(e => {
                if( e.response.status == 422 ){
                    console.log(e.response.data.errors);
                    errors.value = e.response.data.errors;
                }
            });
    }

    // Szerkesztett adatok mentése
    function updatePermission(){
        //
        errors.value = '';
        axios.put('permissions_update', {permission: state.editingPermission.id})
        .then(res => {
            // 
            for(let i = 0; i < state.Permissions.length; i++){
                if(state.Permissions[i].id == res.data.id){
                    state.Permissions[i] = res.data;
                }
            }

            closeEditModal();
        })
        .catch(e => {
            if( e.response.status == 422 ){
                console.log('e', e.response.data.errors);
                errors.value = e.response.data.errors;
            }
        });
    }

    // Törlés előkészítése
    function deletePermission_init(permission){
        state.editingPermission = null;
        state.deletingPermission = permission;

        openDeleteModal();
    }

    function deletePermission(){
        axios.delete(route('permissions_delete', {permission: state.deletingPermission.id})).then(res => {}).catch(e => {});
    }

    // Szerkesztés megszakítása
    function cancelEdit(){
        state.editingPermission = null;
        state.Permission = newPermission();
    }

    // Beállítások előkészítése
    function settings_init(){ openSettingsModal(); }
    
    // SETTINGS MODAL megnyitása
    function openSettingsModal() { state.showSettingsModal = true; }
    // SETTINGS MODAL bezárása
    function closeSettingsModal() { state.showSettingsModal = false; }
    // EDIT MODAL megnyitása
    function openEditModal() { state.showEditModal = true; }
    // EDIT MODAL bezárása
    function closeEditModal() {
        cancelEdit();
        state.showEditModal = false;
    }
    // DELETE MODAL megnyitása
    function openDeleteModal() { state.showDeleteModal = true; }
    // DELETE MODAL bezárása
    function closeDeleteModal() { state.showDeleteModal = false; }
</script>

<template>
    <app-layout :title="$t('permissions')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('permissions') }}
            </h2>
        </template>

        <!-- Új elem felvitelle -->
        <div class="py-6" style="padding-bottom: 0px;">
            
            <!-- Új elem -->
            <div class="mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items=center p-5">

                        <!-- FELIRAT -->
                        <div class="flex space-x-2 items-center">
                            {{ $t('permissions_description') }}
                        </div>

                        <!-- new item -->
                        <div class="flex space-x-2 items-center" 
                             v-if="can.create">
                            <default-button size="text-base" @click="settings_init">{{ $t('setup') }}</default-button>
                            <green-button @click="newPermission_init">+ {{ $t('permissions_new') }}</green-button>
                            <!--<a href="#" 
                               class="px-4 py-2 bg-green-500 uppercase 
                                    text-white rounded focus:outline-none flex items-center">
                                <span class="iconify mr-1" 
                                      data-icon="gridicons:create" 
                                      data-inline="false"></span>
                                + Szerepkör
                            </a>-->
                        </div>

                    </div>
                </div>
            </div>

            <!-- Táblázat -->
            <div class="mx-auto sm:px-6 lg:px-8 mb-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3" >
                                    <div>
                                        <input id="checkbox-all" 
                                            type="checkbox"
                                            v-model="state.selectAll"
                                            @click="select"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                                                dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 
                                                focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                        <label for="checkbox-all" 
                                            class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="py-3 px-6">#</th>
                                <th scope="col" class="py-3 px-6">{{ $t(state.columns.name.label) }}</th>
                                <th scope="col" class="py-3 px-6">{{ $t(state.columns.action.label) }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="permission in state.Permissions" 
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-3 border">
                                    <div>
                                        <input :id="permission.id" type="checkbox" :value="permission.id" :key="permission.id" v-model="state.selected" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                                            dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 
                                            focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                        <label class="sr-only" :for="permission.id">checkbox</label>
                                    </div>
                                </td>

                                <!-- ID -->
                                <td class="px-4 py-2 border" 
                                    v-show="state.columns.id.is_visible">{{ permission.id }}</td>

                                <!-- NAME -->
                                <td class="px-4 py-2 border"
                                v-show="state.columns.name.is_visible">{{ permission.name }}</td>

                                <!-- ACTIONS -->
                                <td class="px-6 py-3 border"
                                    v-show="state.columns.action.is_visible">
                                    <div type="justify-start lg:justify-end" no-wrap>
                                        <green-button class="mt-1" size="text-xs" @click="editPermission(permission)">{{ $t('edit') }}</green-button>
                                        <red-button class="mt-1" size="text-xs" @click="deletePermission_init(permission)">{{ $t('delete') }}</red-button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>

    <!-- EDIT MODAL -->
    <dialog-modal :show="state.showEditModal" id="edit_modal">
        <template #title></template>

        <template #content>
            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <!-- hibák -->
                <div v-if="errors">
                    <div v-for="(v, k) in errors" :key="k" 
                        class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
                        <p v-for="error in v" :key="error" class="text-sm">
                            {{ error }}
                        </p>
                    </div>
                </div>

                <!-- NÉV -->
                <div>
                    <label for="title" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('name') }}</label>
                    <input type="text" id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('name')" 
                            v-model="state.Permission.name" required>
                            <span></span>
                </div>

            </div>
        </template>

        <template #footer>
            <light-button size="text-xs" type="button" @click="closeEditModal()">{{ $t('cancel') }}</light-button>
            <green-button size="text-xs" type="button" @click="storePermission()">{{ state.isEdit ? $t('permissions_update') : $t('permissions_create') }}</green-button>
        </template>
    </dialog-modal>

    <!-- SETTINGS MODAL -->
    <dialog-modal :show="state.showSettingsModal" id="settings_modal">
        <template #title>{{ $t('setup') }}</template>

        <template #content>
            <div v-for="(config, column) in state.columns" 
                :key="column" class="d-flex align-items-center">
                <input v-model="config.is_visible" 
                    :id="column" class="me-3" type="checkbox" />
                <label :for="column">{{ $t(config.label) }}</label>
            </div>
        </template>

        <template #footer>
            <light-button size="text-xs" type="button" 
                          @click="closeSettingsModal()">{{ $t('cancel') }}</light-button>
        </template>
    </dialog-modal>

    <!-- CONFIRM DELETE MODAL -->
    <dialog-modal :show="state.showDeleteModal" id="delete_modal">
        <template #title>
            {{ $t('permissions_delete') }}
        </template>

        <template #content>
            {{ $t('permissions_delete_confirmation') }}
        </template>

        <template #footer>
            <light-button size="text-xs" type="button" @click="closeDeleteModal()">{{ $t('cancel') }}</light-button>
            <red-button size="text-xs" type="button" @click="deletePermission()">{{ $t('delete') }}</red-button>
        </template>
    </dialog-modal>

</template>