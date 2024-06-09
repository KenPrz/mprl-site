<script setup>
import { defineProps, defineEmits, ref, watch } from 'vue';
import axios from 'axios';

const emit = defineEmits(['fetch-blogs']);

const props = defineProps({
    categories: {
        type: Object,
        required: true,
        default: () => ['all']
    },
    years: {
        type: Array,
        required: true,
        default: () => ['all']
    },
    selectedCategory: {
        type: String,
        default: 'all'
    },
    selectedYear: {
        type: String,
        default: 'all'
    },
    selectedMonth: {
        type: String,
        default: 'all'
    },
    searchQuery: {
        type: String,
        default: ''
    }
});

const selectedCategory = ref(props.selectedCategory);
const selectedYear = ref(props.selectedYear);
const selectedMonth = ref(props.selectedMonth);
const searchQuery = ref(props.searchQuery);

const months = ref([
    { id: 1, name: 'January' },
    { id: 2, name: 'February' },
    { id: 3, name: 'March' },
    { id: 4, name: 'April' },
    { id: 5, name: 'May' },
    { id: 6, name: 'June' },
    { id: 7, name: 'July' },
    { id: 8, name: 'August' },
    { id: 9, name: 'September' },
    { id: 10, name: 'October' },
    { id: 11, name: 'November' },
    { id: 12, name: 'December' },
]);

function debounce(fn, delay) {
    let timeoutID;
    return function(...args) {
        clearTimeout(timeoutID);
        timeoutID = setTimeout(() => {
            fn.apply(this, args);
        }, delay);
    };
}

const fetchFilteredBlogs = async (category, year, month, query) => {
    try {
        emit('fetch-blogs', { category, year, month, query });
    } catch (error) {
        console.error('Error fetching blogs:', error);
    }
};

watch([selectedCategory, selectedYear, selectedMonth], ([newCategory, newYear, newMonth]) => {
    fetchFilteredBlogs(newCategory, newYear, newMonth, searchQuery.value);
});

const debouncedFetch = debounce((query) => {
    fetchFilteredBlogs(selectedCategory.value, selectedYear.value, selectedMonth.value, query);
}, 500);

watch(searchQuery, (newQuery) => {
    debouncedFetch(newQuery);
});
</script>

<template>
    <div class="flex justify-between px-5 py-2 shadow-md rounded-3xl bg-white">
        <div class="flex space-x-4">
            <select v-model="selectedCategory" class="border-2 w-auto border-gray-300 rounded-full text-sm p-2">
                <option disabled default value="all">Category</option>
                <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
            </select>

            <select v-model="selectedYear" class="border-2 w-32 border-gray-300 rounded-full text-sm p-2">
                <option default value="all">Year</option>
                <option v-for="year in years" :key="year.year" :value="year.year">{{ year.year }}</option>
            </select>

            <select v-model="selectedMonth" class="border-2 w-32 border-gray-300 rounded-full text-sm p-2">
                <option default value="all">Month</option>
                <option v-for="month in months" :key="month.id" :value="month.id">{{ month.name }}</option>
            </select>
        </div>
        <div class="flex space-x-4">
            <input v-model="searchQuery" type="text" placeholder="Search for a blog" class="border-2 border-gray-300 rounded-lg p-2">
            <button class="bg-blue-500 text-white py-2 px-4 rounded-xl hover:bg-blue-600">Search</button>
        </div>
    </div>
</template>

<style scoped>
</style>
