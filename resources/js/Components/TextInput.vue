<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    placeHolder: {
        type: String,
    },
});

const model = defineModel({
    type: String,
    required: true,
});

const inputRef = ref(null);

onMounted(() => {
    if (inputRef.value.hasAttribute('autofocus')) {
        inputRef.value.focus();
    }
});

defineExpose({ focus: () => inputRef.value.focus() });
</script>

<template>
    <input
        :placeholder="placeHolder"
        class="custom-input"
        v-model="model"
        ref="inputRef"
    />
</template>

<style scoped>
.custom-input {
    width: 100%;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    transition: border-color 0.2s ease-in-out;
}

.custom-input:focus {
    border-color: #6366f1;
    outline: none;
}

.custom-input::placeholder {
    color: #999;
    padding-left: 10px;
}
</style>
