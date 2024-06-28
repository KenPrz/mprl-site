<template>
    <div @click="toggle" :class="{ 'bg-blue-500': isActive, 'bg-gray-200': !isActive }"
        class="relative inline-flex h-6 w-11 items-center rounded-full cursor-pointer transition-colors duration-200">
        <span :class="{ 'translate-x-6': isActive, 'translate-x-1': !isActive }"
            class="inline-block w-4 h-4 transform bg-white rounded-full transition-transform duration-200"></span>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    modelValue: {
        type: Boolean,
        default: false
    }
});

const emit = defineEmits(['update:modelValue']);

const isActive = ref(props.modelValue);

function toggle() {
    isActive.value = !isActive.value;
    emit('update:modelValue', isActive.value);
}
</script>