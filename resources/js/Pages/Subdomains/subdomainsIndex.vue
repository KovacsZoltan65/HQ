<template>
    <app-layout :subdomain="$t('subdomains')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('subdomains') }}
            </h2>
        </template>

        <!-- Új elem felvitelle -->
        <div class="py-6" style="padding-bottom: 0px;">

            <!-- Új elem -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between items=center">

                        <!-- FELIRAT -->
                        <div class="flex space-x-2 items-center">
                            {{ $t('subdomains_description') }}
                        </div>

                        <!-- GOMBOK -->
                        <div class="flex space-x-2 items-center">
                            <default-button size="text-base" 
                                            @click="settings_init"
                            >{{ $t('setup') }}</default-button>
                            <green-button @click="newSubdomain_init">+ {{ $t('subdomains_new') }}</green-button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Aldomainek listája -->
        <div class="py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <!-- selected ids -->
                    <div class="text-uppercase text-bold mb-4 mt-4">
                        <div class="relative">
                            id selected: {{state.selected}}
                        </div>
                    </div>

                    <!-- TABLE AND SEARCH -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                        <!-- SEARCH -->
                        <div class="pb-4 bg-white dark:bg-gray-900">
                            
                            <div class="relative mt-1 ml-10 mr-10">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" 
                                        aria-hidden="true" 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 20 20">
                                        <path stroke="currentColor" 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            stroke-width="2" 
                                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>

                                <!-- search field -->
                                <input type="search" id="default-search" 
                                    class="block w-full p-4 pl-10 
                                        text-sm text-gray-900 border 
                                        border-gray-300 rounded-lg bg-gray-50 
                                        focus:ring-blue-500 focus:border-blue-500 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    :placeholder="$t('subdomains_search_placeholder')" 
                                    v-model="state.filters.search" 
                                    required>
                                <!-- search button -->
                                <button type="submit" 
                                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 
                                        hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 
                                        font-medium rounded-lg text-sm px-4 py-2 
                                        dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    @click="getSubdomains()"
                                >{{ $t('search') }}</button>
                            </div>
                        </div>

                        <!-- TABLE -->
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="bg-gray-100">
                                    
                                    <!-- header checkbox -->
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
                                    <!-- ID -->
                                    <th scope="col" class="px-6 py-3" 
                                        v-show="state.columns.id.is_visible">
                                        <div class="flex items-center">
                                            {{ state.columns.id.label }}
                                            <a href="#" v-show="state.columns.id.is_sortable">
                                                <SorterIcon/>
                                            </a>
                                        </div>
                                    </th>
                                    <!-- TITLE -->
                                    <th scope="col" class="px-6 py-3" v-show="state.columns.subdomain.is_visible">
                                        <div class="flex items-center">
                                            {{ $t(state.columns.subdomain.label) }}
                                            <a href="#" v-show="state.columns.subdomain.is_sortable">
                                                <SorterIcon/>
                                            </a>
                                        </div>
                                    </th>
                                    <!-- AUTHOR -->
                                    <th scope="col" class="px-6 py-3" v-show="state.columns.url.is_visible">
                                        <div class="flex items-center">
                                            {{ $t(state.columns.url.label) }}
                                            <a href="#" v-show="state.columns.url.is_sortable">
                                                <SorterIcon/>
                                            </a>
                                        </div>
                                    </th>
                                    <!-- IMAGE -->
                                    <th scope="col" class="px-6 py-3" v-show="state.columns.name.is_visible">
                                        <div class="flex items-center">
                                            {{ $t(state.columns.name.label) }}
                                            <a href="#" v-show="state.columns.name.is_sortable">
                                                <SorterIcon/>
                                            </a>
                                        </div>
                                    </th>
                                    <!-- ACTION -->
                                    <th scope="col" class="px-6 py-3" width="250px" v-show="state.columns.action.is_visible">
                                        <div class="flex items-center">
                                            {{ $t(state.columns.action.label) }}
                                            <a href="#" v-show="state.columns.action.is_sortable">
                                                <SorterIcon/>
                                            </a>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr v-for="subdomain in state.Subdomains">
                                    <td class="px-6 py-3 border">
                                        <div>
                                            <input :id="subdomain.id" type="checkbox" :value="subdomain.id" :key="subdomain.id" v-model="state.selected" 
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 
                                                dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 
                                                focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                                            <label class="sr-only" :for="subdomain.id">checkbox</label>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border" v-show="state.columns.id.is_visible">{{ subdomain.id }}</td>
                                    <td class="px-4 py-2 border" v-show="state.columns.subdomain.is_visible">{{ subdomain.subdomain }}</td>
                                    <td class="px-4 py-2 border" v-show="state.columns.url.is_visible">{{ subdomain.url }}</td>
                                    <td class="px-4 py-2 border" v-show="state.columns.name.is_visible">{{ subdomain.name }}</td>
                                    <td class="px-4 py-2 w-45 border" width="250px" 
                                        v-show="state.columns.action.is_visible">
                                        <div type="justify-start lg:justify-end" no-wrap>
                                            <green-button class="mt-1" size="text-xs" @click="editSubdomain(subdomain)">{{ $t('edit') }}</green-button>
                                            <red-button class="mt-1" size="text-xs" @click="deleteSubdomain_init(subdomain)">{{ $t('delete') }}</red-button>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                    <!-- pagination -->
                    <div class="mb-3 bg-white shadow bg-body rounded w-75 ln-max-width mx-auto p-3 d-flex align-items-center justify-content-center">
                        <v-pagination v-model="state.pagination.current_page" 
                            :pages="state.pagination.total_number_of_pages"  
                            :range-size="state.pagination.range"
                            active-color="#DCEDFF"
                            @update:modelValue="getSubdomains"/>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>

    <!-- EDIT MODAL -->
    <dialog-modal :show="state.showEditModal" id="edit_modal">
        <template #subdomain>
            <!--<span v-if="state.editingSubdomain && state.editingSubdomain.id">Edit Subdomain</span>
            <span v-else>Create Subdomain</span>-->
            {{ state.isEdit ? $t('subdomains_edit') : $t('subdomains_new') }}
        </template>

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

                <!-- SUBDOMAIN -->
                <div>
                    <label for="subdomain" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('subdomain') }}</label>
                    <input type="text" id="subdomain" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('subdomain')" 
                            v-model="state.Subdomain.subdomain" required>
                            <span></span>
                </div>

                <!-- URL -->
                <div>
                    <label for="url" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('url') }}</label>
                    <input type="text" id="url" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('url')" 
                            v-model="state.Subdomain.url" required>
                </div>

                <!-- NAME -->
                <div>
                    <label for="name" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('name') }}</label>
                    <input type="text" id="name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('name')" 
                            v-model="state.Subdomain.name" required>
                </div>

                <!-- DB_HOST -->
                <div>
                    <label for="db_host" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('db_host') }}</label>
                    <input type="text" id="db_host" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('db_host')" 
                            v-model="state.Subdomain.db_host" required>
                </div>

                <!-- DB_PORT -->
                <div>
                    <label for="db_port" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('db_port') }}</label>
                    <input type="text" id="db_port" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('db_port')" 
                            v-model="state.Subdomain.db_port" required>
                </div>

                <!-- DB_NAME -->
                <div>
                    <label for="db_name" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('db_name') }}</label>
                    <input type="text" id="db_name" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('db_name')" 
                            v-model="state.Subdomain.db_name" required>
                </div>

                <!-- DB_USER -->
                <div>
                    <label for="db_user" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('db_user') }}</label>
                    <input type="text" id="db_user" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('db_user')" 
                            v-model="state.Subdomain.db_user" required>
                </div>

                <!-- DB_PASSWORD -->
                <div>
                    <label for="db_password" 
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >{{ $t('db_password') }}</label>
                    <input type="text" id="db_password" 
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            :placeholder="$t('db_password')" 
                            v-model="state.Subdomain.db_password" required>
                </div>
            </div>
        </template>

        <template #footer>
            <light-button size="text-xs" type="button" @click="closeEditModal()"
            >{{ $t('cancel') }}</light-button>
            <green-button size="text-xs" type="button" 
                          @click="storeSubdomain()"
            >{{ state.isEdit ? $t('subdomains_update') : $t('subdomains_create') }}</green-button>
        </template>

    </dialog-modal>

    <!-- CONFIRM DELETE MODAL -->
    <dialog-modal :show="state.showDeleteModal" id="delete_modal">
        <template #subdomain>
            {{ $t('subdomains_delete') }}
        </template>
        <template #content>
            {{ $t('subdomains_delete_confirmation') }}
        </template>
        <template #footer>
        <!--
            <secondary-button @click="closeDeleteModal()">Cancel</secondary-button>
            <primary-button type="button" class="ml-3" @click="deleteSubdomain()">Delete</primary-button>
        -->
            <light-button size="text-xs" type="button" @click="closeDeleteModal()">{{ $t('cancel') }}</light-button>
            <red-button size="text-xs" type="button" @click="deleteSubdomain()">{{ $t('delete') }}</red-button>
        </template>
    </dialog-modal>

    <!-- SETTINGS MODAL -->
    <dialog-modal :show="state.showSettingsModal" id="settings_modal">
        <template #subdomain>{{ $t('setup') }}</template>
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
                          @click="closeSettingsModal()">{{ $t('back') }}</light-button>
        </template>
    </dialog-modal>

</template>

<script setup>
    import {reactive, onMounted, watch, computed, ref} from 'vue';
    import axios from 'axios';
    
    //import { initFlowbite } from 'flowbite';

    import AppLayout from '../../Layouts/AppLayout.vue';
    //import SubdomainForm from '../../Components/Subdomain/form.vue';
    import DialogModal from '@/Components/DialogModal.vue';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';

    //import SecondaryButton from '@/Components/SecondaryButton.vue';
    //import PrimaryButton from '@/Components/PrimaryButton.vue';
    import DefaultButton from '../../Components/buttons/DefaultButton.vue';
    import GreenButton from '../../Components/buttons/GreenButton.vue';
    import RedButton from '../../Components/buttons/RedButton.vue';
    import LightButton from '../../Components/buttons/LightButton.vue';

    import SorterIcon from '../../Components/icons/SorterIcon.vue';

    const local_storage_column_key = 'ln_subdomains_grid_columns';

    const errors = ref('');

    const props = defineProps({
        can: {
            type: Object,
            default: () => ({}),
        }
    });

    const defaultFormObject = {
        subdomain: null,
		url: null,
		name: null,
		db_host: null,
		db_port: null,
		db_name: null,
		db_user: null,
		db_password: null,
		notification: null,
		state_id: null,
		is_mirror: null,
		sso: null,
		access_control_system: null,
		last_export: null
    };

    const state = reactive({
        // Összes rekord
        Subdomains: [],
        // Kiválasztott rekord
        Subdomain: newSubdomain(),
        // Szerkeszteni kívánt rekord
        editingSubdomain: null,
        // Törölni kívánt rekord
        deletingSubdomain: null,

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
            subdomain: {
                label: 'subdomain',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            url: {
                label: 'url',
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
            db_host: {
                label: 'db_host',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            db_port: {
                label: 'db_port',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            db_name: {
                label: 'db_name',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            db_user: {
                label: 'db_user',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            db_password: {
                label: 'db_password',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            notification: {
                label: 'notification',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            state_id: {
                label: 'state_id',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            is_mirror: {
                label: 'is_mirror',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            sso: {
                label: 'sso',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            access_controll_system: {
                label: 'access_controll_system',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            last_export: {
                label: 'last_export',
                is_visible: true,
                is_sortable: true,
                is_filterable: true,
            },
            created_at: {
                label: 'created_at',
                is_visible: false,
                is_sortable: false,
                is_filterable: false,
            },
            updated_at: {
                label: 'updated_at',
                is_visible: false,
                is_sortable: false,
                is_filterable: false,
            },
            deleted_at: {
                label: 'deleted_at',
                is_visible: false,
                is_sortable: false,
                is_filterable: false,
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
            search: null,
            column: null,
            direction: null,
        },
    });

    // Figyeli az oszlopok változását
    watch(state.columns, (new_value, old_value) => {
        //console.log(new_value);
        localStorage.setItem(local_storage_column_key, JSON.stringify(new_value));
    });

    onMounted(async () => {
        //initFlowbite();

        getSubdomains();

        let columns = localStorage.getItem(local_storage_column_key);
        
        //console.log('columns', columns);

        if (columns) {
            columns = JSON.parse(columns);
            for(const column_name in columns){
                state.columns[column_name] = columns[column_name];
            }
        }
    });
    
    function sordedSubdomain (){
        return state.Subdomains.sort((a, b) => {
            return a.subdomain.localeCompare(b.subdomain);
        });
    };

    function filteredSubdomains (){
        return state.Subdomains.filter((subdomain) => {
            return subdomain.subdomain.toLowerCase().includes(state.filters.search.toLowerCase());
        });
    };

    // Kiválasztás
    function select(){
        state.selected = [];
        if( !state.selectAll ){
            state.Subdomains.forEach(subdomain => {
                state.selected.push(subdomain.id);
            });
        }
    };

    // Táblázat adatainak lekérése
    function getSubdomains(page = state.pagination.current_page) {
        axios.post(route('getSubdomains', {
            filters: state.filters,
            config: {
                per_page: state.pagination.per_page,
            },
            page
        }))
        .then(response => {
            state.Subdomains = response.data.subdomains.data;
            
            state.pagination.total_number_of_pages = response.data.subdomains.last_page;
            state.pagination.current_page = response.data.subdomains.current_page;
        });
    }

    // Új aldomain előkészítése
    function newSubdomain_init(){
        state.Subdomain = newSubdomain();
        state.editingSubdomain = null;
        state.isEdit = false;

        openEditModal();
    }

    // Új aldomain adatai
    function newSubdomain(){
        return {
            subdomain:             null,
            url:                   null,
            name:                  null,
            db_host:               null,
            db_port:               null,
            db_name:               null,
            db_user:               null,
            db_password:           null,
            notification:          null,
            state_id:              null,
            is_mirror:             null,
            sso:                   null,
            access_control_system: null,
            last_export:           null
        };
    }

    // Szerkesztés
    function editSubdomain(subdomain){
        
        state.editingSubdomain = JSON.parse(JSON.stringify(subdomain));
        state.Subdomain = state.editingSubdomain;
        state.isEdit = true;

        openEditModal();
    }

    // Új rekord mentése
    function storeSubdomain(){
        errors.value = '';
        axios.post(route('subdomains_store'), state.Subdomain)
        .then(res => {
            console.log('res', res);
            state.Subdomains.push(res.data.subdomain);

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
    function updateSubdomain(){
        //
        errors.value = '';
        axios.put('subdomains_update', {subdomain: state.editingSubdomain.id})
        .then(res => {
            //console.log('res', res);
            // 
            for(let i = 0; i < state.Subdomains.length; i++){
                if(state.Subdomains[i].id == res.data.id){
                    state.Subdomains[i] = res.data;
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

    // Régi mentés rutin
    function saveSubdomain(){
        
        if(state.editingSubdomain && state.editingSubdomain.id){
            // Rekord frissítése
            axios.put(route('subdomains_update', {subdomain: state.editingSubdomain.id}), 
                getData()
            ).then((res) => {
                //
                for(let i = 0; i < state.Subdomains.length; i++){
                    if(state.Subdomains[i].id === res.data.id){
                        state.Subdomains[i] = res.data;
                    }
                }

                closeEditModal();
            })
            .catch((error) => {
                console.log('updateSubdomain', error);
            });
        }else{
            // Rekord mentése
            axios.post(route('subdomains_store'), 
                getData()
            ).then((response) => {
                //state.Subdomain = newSubdomain();
                state.Subdomains.push(response.data.subdomain);

                closeEditModal();
            })
            .catch((error) => {
                console.log('storeSubdomain', error);
            });
        }

        cancelEdit();
        return;
    }

    function getData(){
        return {
            subdomain:             state.editingSubdomain.subdomain,
            url:                   state.editingSubdomain.url,
            name:                  state.editingSubdomain.name,
            db_host:               state.editingSubdomain.db_host,
            db_port:               state.editingSubdomain.db_port,
            db_name:               state.editingSubdomain.db_name,
            db_user:               state.editingSubdomain.db_user,
            db_password:           state.editingSubdomain.db_password,
            notification:          state.editingSubdomain.notification,
            state_id:              state.editingSubdomain.state_id,
            is_mirror:             state.editingSubdomain.is_mirror,
            sso:                   state.editingSubdomain.sso,
            access_control_system: state.editingSubdomain.access_control_system,
            last_export:           state.editingSubdomain.last_export

        }
    }

    // Törlés előkészítése
    function deleteSubdomain_init(subdomain){
        state.editingSubdomain = null;
        state.deletingSubdomain = subdomain;

        openDeleteModal();
    }

    // Rekord törlése
    function deleteSubdomain(subdomain){

        axios.delete(route('subdomains_delete', {subdomain: state.deletingSubdomain.id}))
        .then((response) => {
            state.Subdomains = state.Subdomains.filter(subdomain => subdomain.id !== state.deletingSubdomain.id);
            state.deletingSubdomain = null;

            openDeleteModal();
        })
        .catch((error) => {
            console.log('deleteSubdomain', error);
        });
    }

    // Szerkesztés megszakítása
    function cancelEdit(){
        state.editingSubdomain = null;
        state.Subdomain = newSubdomain();
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