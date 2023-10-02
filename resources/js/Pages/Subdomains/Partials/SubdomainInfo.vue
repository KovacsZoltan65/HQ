<script setup>
    import { ref } from 'vue';
    import { Link, router, useForm } from '@inertiajs/vue3';

    import FormSection from '../../../Components/FormSection.vue';
    import InputLabel from '../../../Components/InputLabel.vue';
    import TextInput from '../../../Components/TextInput.vue';
    import ActionMessage from '../../../Components/ActionMessage.vue';
    import InputErrorVue from '../../../Components/InputError.vue';
    import SecondaryButton from '../../../Components/SecondaryButton.vue';
    import PrimaryButton from '../../../Components/PrimaryButton.vue';

    const props = defineProps({
        sd: Object,
    });
    /*
    const form = useForm({
        _method: 'PUT',
        subdomain: props.sd.subdomain,
        name: props.sd.name,
        url: props.sd.url,
    });
    */

    const verificationLinkSent = ref(null);

    const update = () => {
        console.log('update');
    };
    const preUpdate = () => {
        console.log('preUpdate');
    };

</script>

<template>
    <form-section @submitted="update">
        <template #title>
            {{ $t('subdomain_info') }}
        </template>

        <template #description>
            {{ $t('subdomain_info_description') }}
        </template>

        <template #form>

            <!-- Sibdomain field -->
            <div class="col-span-6 sm:col-span-4">
                <input-label for="subdomain" value="Subdomai" />
                <text-input
                    id="subdomain"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="subdomain"
                />
                <!--<input-error :message="form.errors.subdomain" class="mt-2" />-->
            </div>

            <!-- Name field -->
            <div class="col-span-6 sm:col-span-4">
                <input-label for="name" value="Name" />
                <text-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <!--<input-error :message="form.errors.name" class="mt-2" />-->
            </div>

            <!-- URL field -->
            <div class="col-span-6 sm:col-span-4">
                <input-label for="url" value="URL" />
                <text-input
                    id="url"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="url"
                />
                <!--<input-error :message="form.errors.url" class="mt-2" />-->
            </div>

        </template>

        <template #actions>
            <ActionMessage class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton>
                Save
            </PrimaryButton>
        </template>
        
    </form-section>
</template>