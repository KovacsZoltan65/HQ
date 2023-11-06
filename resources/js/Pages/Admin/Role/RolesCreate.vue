<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import InputError from '@/Components/InputError.vue';
    import TextInput from '@/Components/TextInput.vue';
    import SelectInput from '@/Components/SelectInput.vue';
    import GreenButton from '@/Components/buttons/GreenButton.vue';
    import DefaultLink from '@/Components/linkbuttons/DefaultLink.vue';
    import { trans } from 'laravel-vue-i18n';
    import Swal from 'sweetalert2';
    import 'sweetalert2/dist/sweetalert2.min.css';

    // Általános alert
    const alerta = Swal.mixin({
        buttonsStyling: true
    });

    // Mentés alert
    const save_alert = Swal.mixin({
        buttonsStyling: true
    });

    // Tulajdonságok
    const props = defineProps({
        can: {
            type: Object,
            required: true,
        },
        role: {
            type: Object,
            required: true,
        }
    });

    // Form adatai
    const form = useForm({
        name: props.role.name,
        guard_name: props.role.guard_name
    });

    // Mentés
    const submit = () => {

        form.post(route('roles_store'), {
            onSuccess: (response) => {
                // Üzenet
                save_alert.fire({
                    // Ablak felirata
                    text: trans('save_success'),
                    // "Megerősítés" gomb felirata
                    confirmButtonText: trans('back_to_list'),
                    // "Elutasítás" gomb megjelenítése
                    showDenyButton: true,
                    // "Elutasítás" gomb felirata
                    denyButtonText: trans('roles_new')
                })
                .then((result) => {
                    // Vissza a listához
                    if( result.isConfirmed ) {
                        //console.log('Listához');
                        window.location.href = route('roles');
                    }
                    // Adatrögzítés folytatása
                    else if( result.isDenied ) {
                        //console.log('Create new');
                    } else if( result.isDismissed ) {
                        //
                    }
                });
            },
            onFinish: (values) => { form.reset(); },
            onError: (errors) => { console.log('onError'); },
            preserveScroll: true
        });
    };

</script>
<template>Role Create</template>