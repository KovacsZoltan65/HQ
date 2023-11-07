<script setup>
    import { reactive,onMounted, watch } from 'vue';
    import axios from 'axios';
    import AppLayout from '@/Layouts/AppLayout.vue';

    import { trans } from 'laravel-vue-i18n';
    import Swal from 'sweetalert2';
    import 'sweetalert2/dist/sweetalert2.min.css';

    import VPagination from '@hennge/vue3-pagination';
    import '@hennge/vue3-pagination/dist/vue3-pagination.css';

    import DefaultButton from '@/Components/buttons/DefaultButton.vue';
    import RedButton from '@/Components/buttons/RedButton.vue';
    import GreenLink from '@/Components/linkbuttons/GreenLink.vue';

    const local_storage_column_key = 'ln_permissions_grid_columns';

    const props = defineProps({
        can: {
            type: Object, default: () => ({}),
        }
    });

    const defaultFormObject = {
        name: null,
        guard_name: null
    };

    const state = reactive({
        Permissions: [],
        deletingPermissions: null,
        showSettingsModal: false,
        selected: [],
        selectAll: false,
        columns: {
            id: { label: '#', is_visible: true, is_sortable: true, is_filterable: true, },
            name: { label: 'name', is_visible: true, is_sortable: true, is_filterable: true, },
            guard_name: { label: 'guard_name', is_visible: true, is_sortable: true, is_filterable: true, },
            action: { label: 'actions', is_visible: true, is_sortable: false, is_filterable: false, },
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
        
        getPermissions();

        let columns = localStorage.getItem(local_storage_column_key);

        if (columns) {
            columns = JSON.parse(columns); 
            for (const column_name in columns) { 
                state.columns[column_name] = columns[column_name]; 
            }
        }
    });

    function getPermissions(page = state.pagination.current_page) {
        axios.post(route('getPermissions', {
            filters: state.filters, config: { per_page: state.pagination.per_page, }, page
        }))
        .then(response => {
            state.Permissions = response.data.permissions.data; 
            state.pagination.total_number_of_pages = response.data.roles.last_page; 
            state.pagination.current_page = response.data.roles.current_page;
        });
    };

    // Általános alert
    const alerta = Swal.mixin({
        buttonsStyling: true
    });

    // Delete alert
    const delete_alert = Swal.mixin({
        buttonsStyling: true,
        title: trans('delete_confirmation'),
        icon: 'question',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    });

    function deleteRole_init(permission){
        
        // Figyelmeztető ablak megjelenítése
        delete_alert.fire({
            // Ablak felirata
            text: trans('permissions_delete_confirmation', {name: permission.name}),
            // "Megerősítés" gomb felirata
            confirmButtonText: trans('yes'),
            // "Elutasítás" gomb megjelenítése
            showDenyButton: false,
            // "Elutasítás" gomb felirata
            denyButtonText: trans('deny'),
            // "Mégsem" gomb megjelenítése
            showCancelButton: true,
            // "Mégsem" gomb felirata
            cancelButtonText: trans('cancel')
        }).then((result) => {
            // Választás kiértékelése
            // Feladat végrehajtható
            if( result.isConfirmed ){
                // Törlendő elem eltárolása
                state.deletingRole = permission;
                // Törlés végrehajtása
                deletePermission(permission);
            }
            // A feladat megtagadva
            else if( result.isDenied ){
                //
                alerta.fire(trans('denied'), '', 'info');
            }
            // A feladat megszakítva
            else if( result.isDismissed ){
                alerta.fire(trans('dismissed'), '', 'info');
            }
        });
    };

    // Rekord törlése
    function deletePermission(permission) {
        axios.delete(route('permissions_delete'), {permission: permission})
        .then((response) => {})
        .catch((error) => {});
    };

</script>

<template>
    <AppLayout :title="$t('permissions')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"
            >{{ $t('permissions') }}</h2>
        </template>

    </AppLayout>
</template>