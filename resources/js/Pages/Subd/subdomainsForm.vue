<template>
    <app-layout :title="$t('subdomain')">

        <!-- header -->
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $t('subdomain') }}
            </h2>
        </template>
        <!-- /header -->

        <!-- body -->
        <div class="py-6" style="padding-bottom: 0px;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between items=center">
                        
                        <!-- felirat -->
                        <div class="flex space-x-2 items-center">
                            {{ $t('subdomain_description') }}
                        </div>

                        <!-- gombok -->
                        <div class="flex space-x-2 items-center">
                            <yellow-link :href="route('subdomains')"
                            >
                            <back-icon />
                        </yellow-link>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!---->
        <div class="py-6" style="padding-bottom: 0px;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-between items=center">

                        <!-- híbák -->
                        <div v-if="errors">
                            <div v-for="(v, k) in errors" :key="k" 
                                class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
                                <p v-for="error in v" :key="error" class="text-sm">
                                    {{ error }}
                                </p>
                            </div>
                        </div>

                        <div>
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                <subdomain-info />
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import YellowLink from '../../Components/linkbuttons/YellowLink.vue';
    import BackIcon from '../../Components/icons/BackIcon.vue';
    import SubdomainInfo from './Partials/SubdomainInfo.vue';
</script>