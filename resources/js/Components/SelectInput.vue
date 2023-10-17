<script setup>
    import { onMounted, ref } from 'vue';

    defineProps({
        modelValue: {
            type: String,
            default: true,
        },
        options: {
            type: Array,
            required: true,
        }
    });

    defineEmits(['update.modelValue']);

    const input = ref(null);

    onMounted(() => {
        if(input.value.hasAttribute('autofocus')){
            input.value.focus();
        }
    });

    defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <select>
        <option 
            v-for="option in options" 
            :key="option.id" 
            :value="option.id"
        >{{ option.name }}</option>
    </select>
</template>