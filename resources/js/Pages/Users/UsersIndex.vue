<script setup>
    import { onMounted, reactive, watch } from 'vue';
    import DefaultButton from '@/Components/buttons/DefaultButton.vue';
    import GreenLink from '@/Components/linkbuttons/GreenLink.vue';
    import AppLayout from '@/Layouts/AppLayout.vue';
import axios from 'axios';

    const local_storage_column_key = 'ln_users_grid_columns';

    const errors = ref('');

    const props = defineProps({
        can: {
            type: Object, default: () => ({}),
        }
    });

    const defaultFormObject = {
        name: null,
        email: null,
        language: null,
        password: null,
    };

    const state = reactive({
        //
        Users: [],
        //
        deletingUser: {},
        //
        showSettingsModal: false,
        // Kiválasztott rekordok azonosítója
        selected: [],
        // Összes elem ki van választva
        selectAll: false,
        //
        columns: {
            name:       { label: 'name', is_visible: true, is_sortable: true, is_filterable: true, },
            email:      { label: 'email', is_visible: true, is_sortable: true, is_filterable: true, },
            language:   { label: 'language', is_visible: true, is_sortable: true, is_filterable: true, },
            password:   { label: 'lassword', is_visible: false, is_sortable: false, is_filterable: false, },
            created_at: { label: 'created_at', is_visible: false, is_sortable: false, is_filterable: false, },
            updated_at: { label: 'updated_at', is_visible: false, is_sortable: false, is_filterable: false, },
            deleted_at: { label: 'deleted_at', is_visible: false, is_sortable: false, is_filterable: false, },
            action:     { label: 'actions', is_visible: true, is_sortable: true, is_filterable: true, },
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
        localStorage.setItem(local_storage_column_key, JSON.stringify(new_value));
    });

    onMounted(async () => {
        //
        getUsers();

        let columns = localStorage.getItem(local_storage_column_key);

        if (columns) {
            columns = JSON.parse(columns); 
            for (const column_name in columns) { 
                state.columns[column_name] = columns[column_name]; 
            }
        }
    });

    // Rendezés
    function sordedUser() {
        return state.Users.sort((a, b) => {
            return a.user.localeCompare(b.user);
        });
    };

    // Szűrés
    function filteredUsers() {
        return state.Users.filter((user) => {
            return user.user.toLowerCase().includes(state.filters.search.toLowerCase());
        });
    };

    // Kiválasztás
    function select() {
        state.selected = [];
        if (!state.selectAll) {
            state.Users.forEach(user => { state.selected.push(user.id); });
        }
    };

    function getUsers(){
        axios.post(route('getUsers', {
            filters: state.filters, config: { per_page: state.pagination.per_page, }, page
        }))
        .then(response => {})
        .catch(errors => {});
    };

    // Beállítások előkészítése
    function settings_init() { openSettingsModal(); }
    // SETTINGS MODAL megnyitása
    function openSettingsModal() { state.showSettingsModal = true; }

</script>

<template>
    <AppLayout title="$t('users')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $t('users') }}</h2>
        </template>

        <!-- Új elem felvitelle -->
        <div class="py-6" style="padding-bottom: 0px;">
            
            <!-- Új elem -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between items=center">
                        
                        <!-- FELIRAT -->
                        <div class="flex space-x-2 items-center">{{ $t('users_description') }}</div>
                        
                        <!-- GOMBOK -->
                        <div class="flex space-x-2 items-center">
                            <DefaultButton type="button" size="text-base" @click="settings_init">{{ $t('setup') }}</DefaultButton>
                            <GreenLink type="button" :href="route('subdomains_create')">+ {{ $t('subdomains_new') }}</GreenLink>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </AppLayout>
</template>