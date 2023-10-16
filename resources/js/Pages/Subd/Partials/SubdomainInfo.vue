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
    
    const form = useForm({
        _method: 'PUT',
        subdomain: props.sd.subdomain,
        name: props.sd.name,
        url: props.sd.url,
    });

    const verificationLinkSent = ref(null);

    const updateSubdomainInfo = () => {
        form.post('', {
            errorbag: 'updateSubdomainInfo',
            preverseScroll: true,
            onSuccess: () => {}
        });
    };

    const update = () => {
        console.log('update');
    };
    const preUpdate = () => {
        console.log('preUpdate');
    };

</script>

<template>
    <FormSection @submitted="updateSubdomainInfo">
        <template #title>
            {{ $t('subdomain_info') }}
        </template>

        <template #description>
            {{ $t('subdomain_info_description') }}
        </template>

        <template #form>

            <!-- subdomain -->
            

            <!-- name -->
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autocomplete="name"
                />
                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <!-- url -->

        </template>

        <template #actions>
            <ActionMessage class="mr-3">
                Saved.
            </ActionMessage>

            <PrimaryButton>
                Save
            </PrimaryButton>
        </template>
        
    </FormSection>
</template>