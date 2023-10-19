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
        },
        selected: {
            type: Number,
            default: 0,
        }
    });

    defineEmits(['update.modelValue']);

    const input = ref(null);

    onMounted(() => {
        //if(input.value.hasAttribute('autofocus')){
        //    input.value.focus();
        //}
    });

    defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <select>
        <option 
            v-for="option in options" 
            :key="option.id" 
            :value="option.id"
            :selected="option.id === selected"
        >{{ option.name }}</option>
    </select>
</template>