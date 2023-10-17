<script setup>
    import { useForm } from '@inertiajs/vue3';
    import AppLayout from '../../Layouts/AppLayout.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import DefaultButton from '@/Components/buttons/DefaultButton.vue';
    import GreenButton from '@/Components/buttons/GreenButton.vue';
    import GreenLink from '@/Components/linkbuttons/GreenLink.vue';
    import DefaultLink from '@/Components/linkbuttons/DefaultLink.vue';

    const form = useForm({
        subdomain: 'sub_01',
        url: 'http://127.0.0.1:8000',
        name: 'sub_01',
        db_host: 'localhost',
        db_port: '3306',
        db_name: 'db_sub_01',
        db_user: 'db_sub_01',
        db_password: 'db_sub_01',
        notification: '1',
        state_id: '1',
        is_mirror: '1',
        sso: '1',
        access_control_system: '1',
        last_export: '1'
    });
</script>

<template>
    <AppLayout :title="$t('subdomains_create')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('subdomains_create') }}
            </h2>
        </template>

        <!-- FORM -->
        <div class="py-6">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

                    <form @submit.prevent="$event => form.post(route('subdomains_store'))">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- SUBDOMAIN -->
                            <div>
                                
                                <label for="first_name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subdomain</label>
                                <input type="text" id="subdomain" v-model="form.subdomain"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Subdomain">
                                <!--
                                <InputLabel 
                                        for="subdomain" 
                                        class="block mb-2 text-sm font-medium 
                                            text-gray-900 dark:text-white"
                                >Subdomain</InputLabel>
                                <TextInput 
                                    v-model="form.subdomain" type="text" 
                                    id="subdomain" name="subdomain" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                                            dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 
                                            dark:focus:border-blue-500" 
                                    placeholder="subdomain" 
                                    required
                                ></TextInput>
                                -->
                            </div>

                            <!-- URL -->
                            <div>
                                <label for="url"  
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL</label>
                                <input type="url" v-model="form.url" id="url" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="URL">
                                <!--
                                <InputLabel 
                                    for="url" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >Url</InputLabel>
                                <TextInput v-model="form.url"
                                    type="url" id="url" name="url" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 
                                            block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Url" required
                                ></TextInput>
                                -->
                            </div>

                            <!-- NAME -->
                            <div>
                                <label for="name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" id="name" v-model="form.name" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Name">
                                <!--
                                <InputLabel for="name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</InputLabel>
                                <TextInput v-model="form.name" type="text" 
                                    id="name" name="name" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="Name" required
                                ></TextInput>
                                -->
                            </div>

                            <!-- DB_HOST -->
                            <div>
                                <label for="db_host" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_host</label>
                                <input type="text" 
                                    id="db_host" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_host">
                                <!--
                                <InputLabel for="db_host" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_host</InputLabel>
                                <TextInput v-model="form.db_host"
                                    type="text" id="db_host" name="db_host" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_host" required
                                ></TextInput>
                                -->
                            </div>

                            <!-- DB_PORT -->
                            <div>
                                <label for="db_port" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">db_port</label>
                                <input type="number" id="db_port" v-model="form.db_port"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_port">
                                <!--
                                <InputLabel for="db_port" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_port</InputLabel>
                                <TextInput type="number" v-model="form.db_port" 
                                    id="db_port" name="db_port" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_port" required
                                ></TextInput>
                                -->
                            </div>
                            
                            <!-- DB_NAME -->
                            <div>
                                <label for="db_name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">db_name</label>
                                <input type="text" id="db_name" v-model="form.db_name"  
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_name">
                                <!--
                                <InputLabel for="db_name" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_name</InputLabel>
                                <TextInput type="text" v-model="form.db_name" 
                                    id="db_name" name="db_name" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_name" required
                                ></TextInput>
                                -->
                            </div>

                            <!-- DB_USER -->
                            <div>
                                <label for="db_user" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">db_user</label>
                                <input type="text" id="db_user" v-model="form.db_user"   
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_user">
                                <!--
                                <InputLabel for="db_user" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_user</InputLabel>
                                <TextInput type="text" v-model="form.db_user" 
                                    id="db_user" name="db_user" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                            dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_user" required
                                ></TextInput>
                                -->
                            </div>
                            
                            <!-- DB_PASSWORD -->
                            <div>
                                <label for="db_password" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">db_password</label>
                                <input type="text" id="db_password" v-model="form.db_password"   
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_password">
                                <!--
                                <InputLabel for="db_password" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_password</InputLabel>
                                <TextInput type="password" v-model="form.db_password" 
                                    id="db_password" name="db_password" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                                        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                                    placeholder="db_password" required
                                ></TextInput>
                                -->
                            </div>

                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">

                            <!-- IS_MIRROR -->
                            <!--<div class="flex mb-4">
                                <div class="flex items-center h-5">
                                    <input 
                                        id="is_mirror" name="is_mirror"  
                                        aria-describedby="is_mirror" type="checkbox" value="" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="is_mirror" class="font-medium text-gray-900 dark:text-gray-300">is mirror</label>
                                    <p id="helper-is_mirror-text" class="text-xs font-normal text-gray-500 dark:text-gray-400">Legyen tükörpéldány</p>
                                </div>
                            </div>-->

                            <!-- SSO -->
                            <!--<div class="flex mb-4">
                                <div class="flex items-center h-5">
                                    <input 
                                        id="sso" name="sso"  
                                        aria-describedby="sso" type="checkbox" value="" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                </div>
                                <div class="ml-2 text-sm">
                                    <label for="sso" class="font-medium text-gray-900 dark:text-gray-300">SSO hitelesítés</label>
                                    <p id="helper-sso-text" class="text-xs font-normal text-gray-500 dark:text-gray-400">SSO hitelesítés</p>
                                </div>
                            </div>-->

                        </div>

                        <GreenButton type="submit" size="text-base">MENTÉS</GreenButton>
                        <DefaultLink type="button" 
                            class="float-right"  
                            :href="route('subdomains')">VISSZA</DefaultLink>
                    </form>

                </div>
            </div>
        </div>

    </AppLayout>
</template>