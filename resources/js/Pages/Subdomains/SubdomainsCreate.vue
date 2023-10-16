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
        subdomain: '',
        url: '',
        name: '',
        db_host: '',
        db_port: '',
        db_name: '',
        db_username: '',
        db_password: '',
        notification: '',
        state_id: '',
        is_mirror: '',
        sso: '',
        access_control_system: '',
        last_export: ''
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
                        
                    <!-- híbák -->
                    <div v-if="errors">
                        <div v-for="(v, k) in errors" :key="k" 
                            class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
                            <p v-for="error in v" :key="error" class="text-sm">
                                {{ error }}
                            </p>
                        </div>
                    </div>

                    <form @submit.prevent="$event => form.post(route('subdomains_store'))">
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <!-- SUBDOMAIN -->
                            <div>
                                <!--
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required>
                                -->
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
                            </div>

                            <!-- URL -->
                            <div>
                                <!--<label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name</label>
                                <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doe" required>-->
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
                            </div>

                            <!-- NAME -->
                            <div>
                                <!--<label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
                                <input type="text" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Flowbite" required>-->
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
                            </div>

                            <!-- DB_HOST -->
                            <div>
                                <!--<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone number</label>
                                <input type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>-->
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
                            </div>

                            <!-- DB_PORT -->
                            <div>
                                <!--<label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
                                <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required>-->
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
                            </div>
                            
                            <!-- DB_NAME -->
                            <div>
                                <!--<label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique visitors (per month)</label>
                                <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>-->
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
                            </div>

                            <!-- DB_USER -->
                            <div>
                                <!--<label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website URL</label>
                                <input type="url" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="flowbite.com" required>-->
                                <InputLabel for="db_user" 
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                >db_user</InputLabel>
                                <TextInput type="number" v-model="form.db_user" 
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
                                <!--<label for="visitors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unique visitors (per month)</label>
                                <input type="number" id="visitors" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required>-->
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
                            </div>

                        </div>

                        <div class="grid gap-6 mb-6 md:grid-cols-2">

                            <!-- IS_MIRROR -->
                            <div class="flex mb-4">
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
                            </div>

                            <!-- SSO -->
                            <div class="flex mb-4">
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
                            </div>

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