<script setup>
    // Új aldomain előkészítése
    //function newSubdomain_init(){
    //    state.Subdomain = newSubdomain();
    //    state.editingSubdomain = null;
    //    state.isEdit = false;

    //    openEditModal();
    //}

    // Új aldomain adatai
    //function newSubdomain(){
    //    return {
    //        subdomain:             null,
    //        url:                   null,
    //        name:                  null,
    //        db_host:               null,
    //        db_port:               null,
    //        db_name:               null,
    //        db_user:               null,
    //        db_password:           null,
    //        notification:          null,
    //        state_id:              null,
    //        is_mirror:             null,
    //        sso:                   null,
    //        access_control_system: null,
    //        last_export:           null
    //    };
    //}

    // Szerkesztés
    //function editSubdomain(subdomain){
        
    //    state.editingSubdomain = JSON.parse(JSON.stringify(subdomain));
    //    state.Subdomain = state.editingSubdomain;
    //    state.isEdit = true;

    //    openEditModal();
    //}

    // Új rekord mentése
    //function storeSubdomain(){
    //    errors.value = '';
    //    axios.post(route('subdomains_store'), state.Subdomain)
    //    .then(res => {
    //        console.log('res', res);
    //        state.Subdomains.push(res.data.subdomain);

    //        closeEditModal();
    //    })
    //    .catch(e => {
    //        if( e.response.status == 422 ){
    //            console.log(e.response.data.errors);
    //            errors.value = e.response.data.errors;
    //        }
    //    });
    //}

    // Szerkesztett adatok mentése
    //function updateSubdomain(){
        //
    //    errors.value = '';
    //    axios.put('subdomains_update', {subdomain: state.editingSubdomain.id})
    //    .then(res => {
            //console.log('res', res);
            // 
    //        for(let i = 0; i < state.Subdomains.length; i++){
    //            if(state.Subdomains[i].id == res.data.id){
    //                state.Subdomains[i] = res.data;
    //            }
    //        }

    //        closeEditModal();
    //    })
    //    .catch(e => {
    //        if( e.response.status == 422 ){
    //            console.log('e', e.response.data.errors);
    //            errors.value = e.response.data.errors;
    //        }
    //    });
    //}

    // Régi mentés rutin
    //function saveSubdomain(){
    //    
    //    if(state.editingSubdomain && state.editingSubdomain.id){
            // Rekord frissítése
    //        axios.put(route('subdomains_update', {subdomain: state.editingSubdomain.id}), 
    //            getData()
    //        ).then((res) => {
                //
    //            for(let i = 0; i < state.Subdomains.length; i++){
    //                if(state.Subdomains[i].id === res.data.id){
    //                    state.Subdomains[i] = res.data;
    //                }
    //            }

    //            closeEditModal();
    //        })
    //        .catch((error) => {
    //            console.log('updateSubdomain', error);
    //        });
    //    }else{
            // Rekord mentése
    //        axios.post(route('subdomains_store'), 
    //            getData()
    //        ).then((response) => {
                //state.Subdomain = newSubdomain();
    //            state.Subdomains.push(response.data.subdomain);

    //            closeEditModal();
    //        })
    //        .catch((error) => {
    //            console.log('storeSubdomain', error);
    //        });
    //    }

    //    cancelEdit();
    //    return;
    //}
</script>

<template>
    <dialog-modal :show="state.showEditModal" id="edit_modal">
        <template #subdomain>
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
</template>