<script setup>
import { defineProps, ref, defineEmits } from 'vue';
const props = defineProps({
  servicesCategory: {
    type: Array,
    default: () => ['all'],
    required: true,
  },
});
</script>
<template>
    <div class="mt-2 ml-3">
        <ul class="list-none p-0 hidden sm:block">
            <li v-for="service in servicesCategory" :key="service.id">
                <button 
                @click="selectCategory(service.id)" 
                class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 bg-gray-200 hover:bg-blue-600 hover:text-white"
                :class="{'bg-blue-600 text-white': selectedCategory === service.id}">
                {{ service.service_category }}
                </button>
            </li>
        </ul>
    </div>
</template>
<style scoped>
button {
  transition: background-color 0.3s, color 0.3s;
}
</style>
