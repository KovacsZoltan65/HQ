<script setup>
    import { onMounted } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/AppLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import InputError from '@/Components/InputError.vue';
    import TextInput from '@/Components/TextInput.vue';
    import SelectInput from '@/Components/SelectInput.vue';

    import DefaultButton from '@/Components/buttons/DefaultButton.vue';
    import GreenButton from '@/Components/buttons/GreenButton.vue';
    import GreenLink from '@/Components/linkbuttons/GreenLink.vue';
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

    const props = defineProps({
        can: {
            type: Object,
            required: true,
        },
        subdomain: {
            type: Object,
            required: true,
        }
    });

    // state_id: 1, Aktív; 2, Felfüggesztve; 3, Leállítva (HQ); 4, Leállítva (példány);
    const states = [
        {id: 1, name: 'Aktív',},
        {id: 2, name: 'Felfüggesztve',},
        {id: 3, name: 'Leállítva (HQ)',},
        {id: 4, name: 'Leállítva (példány)',},
    ];

    const acs = [
        {id: 0, name: 'Nincs'}, 
        {id: 1, name: 'WinAccess'}, 
        {id: 2, name: 'Enviromux'}, 
        {id: 3, name: 'Siport'}, 
        {id: 4, name: 'WinAccess WC'},
        {id: 5, name: 'GenerallyACS'}
    ];
    
    const form = useForm({
        subdomain: props.subdomain.subdomain,
        url: props.subdomain.url,
        name: props.subdomain.name,
        db_host: props.subdomain.db_host,
        db_port: props.subdomain.db_port,
        db_name: props.subdomain.db_name,
        db_user: props.subdomain.db_user,
        db_password: props.subdomain.db_password,
        notification: props.subdomain.notification,
        state_id: props.subdomain.state_id,
        is_mirror: props.subdomain.is_mirror,
        sso: props.subdomain.sso,
        access_control_system: props.subdomain.access_control_system,
        last_export: props.subdomain.last_export
    });
    
    onMounted(async () => {
        //console.log(props.subdomain);

        //console.log('props.subdomain.is_mirror: ' + props.subdomain.is_mirror);
        //console.log('form.is_mirror: ' + form.is_mirror);

        //console.log('props.subdomain.sso: ' + props.subdomain.sso);
        //console.log('form.sso: ' + form.sso);

        //console.log('props.subdomain.access_control_system: ' + props.subdomain.access_control_system);
        //console.log('access_control_system: ' + form.access_control_system);
    });

    const submit = () => {
        //axios.post(route('subdomains.store'), form.id);
        //console.log(props.subdomain);

        //console.log(props.subdomain.subdomain);
        //console.log(form.subdomain);
        //console.log(form.url);
        ////console.log(form.name);
        //console.log(form.db_host);
        //console.log(form.db_port);
        //console.log(form.db_name);
        //console.log(form.db_user);
        //console.log(form.db_password);
        //console.log(form.notification);
        //console.log(form.state_id);
        //console.log(form.is_mirror);
        //console.log(form.sso);
        //console.log(form.access_control_system);
        //console.log(form.last_export);
        
        //props.subdomain.id = form.id;
        //props.subdomain.subdomain = form.subdomain;
        //props.subdomain.url = form.url;
        //props.subdomain.name = form.name;
        //props.subdomain.db_host = form.db_host;
        //props.subdomain.db_port = form.db_port;
        //props.subdomain.db_name = form.db_name;
        //props.subdomain.db_user = form.db_user;
        //props.subdomain.db_password = form.db_password;
        //props.subdomain.state_id = form.state_id;
        //props.subdomain.access_control_system = form.access_control_system;
        //props.subdomain.notification = form.notification;
        //props.subdomain.is_mirror = form.is_mirror;
        //props.subdomain.sso = form.sso;
        //props.subdomain.last_export = form.last_export;
        
        //axios.put(route('subdomains_update', {subdomain: props.subdomain.id}));
        
        form.put(route('subdomains_update', {subdomain: props.subdomain}), {
            onSuccess: (response) => {
                console.log(response);
                console.log(response.props.flash.message);
            },
            onFinish: () => {
                form.reset();
            },
            onError: (errors) => {
                console.log(errors);
            },
        });
        
    };
</script>

<template>
    <AppLayout :title="$t('subdomains_edit')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('subdomains_edit') }}
            </h2>
        </template>

        <!-- FORM -->
        <div class="py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <form @submit.prevent="submit">

                        <input type="hidden" id="id" name="id" v-model="props.subdomain.id" />
                        <input type="hidden" id="last_export" name="last_export" v-model="props.subdomain.last_export" />

                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- SUBDOMAIN -->
                            <div>
                                <InputLabel 
                                        for="subdomain" 
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('subdomain') }}</InputLabel>
                                <TextInput 
                                    v-model="props.subdomain.subdomain" type="text" 
                                    id="subdomain" name="subdomain" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                                            dark:focus:border-blue-500" 
                                    placeholder="subdomain" 
                                    required
                                ></TextInput>
                                
                            </div>

                            <!-- URL -->
                            <div>
                                <InputLabel 
                                    for="url" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('subd_url') }}</InputLabel>
                                <TextInput v-model="props.subdomain.url"
                                    type="url" id="url" name="url" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 
                                            block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Url" required
                                ></TextInput>
                            </div>

                            <!-- NAME -->
                            <div>
                                <InputLabel for="name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('name') }}</InputLabel>
                                <TextInput v-model="props.subdomain.name" type="text" 
                                    id="name" name="name" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Name" required
                                ></TextInput>
                                
                            </div>

                            <!-- DB_HOST -->
                            <div>
                                <InputLabel for="db_host" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('db_host') }}</InputLabel>
                                <TextInput v-model="props.subdomain.db_host"
                                    type="text" id="db_host" name="db_host" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_host" required
                                ></TextInput>
                                
                            </div>

                            <!-- DB_PORT -->
                            <div>
                                <InputLabel for="db_port" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('db_port') }}</InputLabel>
                                <TextInput type="number" v-model="props.subdomain.db_port" 
                                    id="db_port" name="db_port" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_port" required
                                ></TextInput>
                                
                            </div>
                            
                            <!-- DB_NAME -->
                            <div>
                                <InputLabel for="db_name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('db_name') }}</InputLabel>
                                <TextInput type="text" v-model="props.subdomain.db_name" 
                                    id="db_name" name="db_name" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_name" required
                                ></TextInput>
                                
                            </div>

                            <!-- DB_USER -->
                            <div>
                                <InputLabel for="db_user" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('db_user') }}</InputLabel>
                                <TextInput type="text" v-model="props.subdomain.db_user" 
                                    id="db_user" name="db_user" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_user" required
                                ></TextInput>
                                
                            </div>
                            
                            <!-- DB_PASSWORD -->
                            <div>
                                <InputLabel for="db_password" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('db_password') }}</InputLabel>
                                <TextInput type="text" v-model="props.subdomain.db_password" 
                                    id="db_password" name="db_password" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_password" required
                                ></TextInput>
                                
                            </div>

                            <!-- state_id (állapot) -->
                            <div>
                                <InputLabel for="state_id" 
                                    class="block mb-2 text-sm font-medium text-gray-900 
                                        dark:text-white"
                                >{{ $t('state_id') }}</InputLabel>
                                <SelectInput v-model="props.subdomain.state_id" 
                                    :options="states"
                                    :selected="props.subdomain.state_id" 
                                    id="state_id" name="state_id" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                ></SelectInput>
                                
                            </div>

                            <!-- access_control_system (beléptető rendszer) -->
                            <div>
                                <InputLabel for="access_control_system" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >{{ $t('access_controll_system') }}</InputLabel>
                                <SelectInput v-model="props.subdomain.access_control_system" 
                                    :options="acs"
                                    :selected="props.subdomain.access_control_system" 
                                    id="access_control_system" name="access_control_system" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                ></SelectInput>
                                
                            </div>

                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-3">

                            <!-- notification(Értesítés küldése) -->
                            <div class="flex mb-4">
                                <div class="flex items-center h-5">
                                    <input 
                                        id="notification" name="notification" type="checkbox"
                                        v-model="props.subdomain.notification" 
                                        :value="props.subdomain.notification"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="is_mirror" 
                                        class="font-medium text-gray-900 dark:text-gray-300"
                                    >{{ $t('notification_title') }}</label>
                                    <p id="helper-notification-text" 
                                        class="text-xs font-normal text-gray-500 dark:text-gray-400"
                                    >{{ $t('notification_desc') }}</p>
                                </div>
                            </div>
                            
                            <!-- is_mirror -->
                            <div class="flex mb-4">
                                <div class="flex items-center h-5">
                                    <input 
                                        id="is_mirror" name="is_mirror" type="checkbox"
                                        v-model="props.subdomain.is_mirror" 
                                        :value="props.subdomain.is_mirror"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="is_mirror" 
                                        class="font-medium text-gray-900 dark:text-gray-300"
                                    >{{ $t('is_mirror_title') }}</label>
                                    <p id="helper-is_mirror-text" 
                                        class="text-xs font-normal text-gray-500 dark:text-gray-400"
                                    >{{ $t('is_mirror_desc') }}</p>
                                </div>
                            </div>

                            <!-- SSO hitelesítés -->
                            <div class="flex mb-4">
                                <div class="flex items-center h-5">
                                    <input 
                                        id="sso" name="sso" type="checkbox"
                                        v-model="props.subdomain.sso" 
                                        :value="props.subdomain.sso"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="sso" 
                                        class="font-medium text-gray-900 dark:text-gray-300"
                                    >{{ $t('sso_title') }}</label>
                                    <p id="helper-sso-text" 
                                        class="text-xs font-normal text-gray-500 dark:text-gray-400"
                                    >{{ $t('sso_desc') }}</p>
                                </div>
                            </div>

                        </div>

                        <!-- "Submit" button -->
                        <GreenButton type="submit" 
                            size="text-base"
                        >{{ $t('save') }}</GreenButton>

                        <!-- "Cancel" button -->
                        <DefaultLink type="button" class="float-right" 
                            :href="route('subdomains')"
                        >{{ $t('back') }}</DefaultLink>
                    </form>

                </div>
            </div>
        </div>

    </AppLayout>
</template>