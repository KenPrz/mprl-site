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
    return function (...args) {
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
    <div class="flex flex-col lg:flex-row md:justify-between w-full p-3 shadow-md rounded-3xl bg-white space-y-3 md:space-y-0">
        <div class="flex flex-col md:justify-between md:flex-row md:space-x-4 space-y-3 md:space-y-0 md:pb-2 lg:pb-0">
            <select v-model="selectedCategory" class="border-2  md:w-1/3 lg:w-48 border-gray-300 rounded-full text-sm p-2">
                <option disabled default value="all">Category</option>
                <option v-for="category in categories" :key="category" :value="category.id">{{ category.name }}</option>
            </select>

            <select v-model="selectedYear" class="border-2 w-full md:w-1/3 lg:w-48 border-gray-300 rounded-full text-sm p-2">
                <option default value="all">Year</option>
                <option v-for="year in years" :key="year.year" :value="year.year">{{ year.year }}</option>
            </select>

            <select v-model="selectedMonth" class="border-2 w-full md:w-1/3 lg:w-48 border-gray-300 rounded-full text-sm p-2">
                <option default value="all">Month</option>
                <option v-for="month in months" :key="month.id" :value="month.id">{{ month.name }}</option>
            </select>
        </div>
        <div class="relative lg:w-1/2 flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 w-full md:w-auto justify-end">
            <div class="flex rounded-full border border-gray-300 overflow-hidden lg:w-7/12 ps-3">
                <input id="input-field" v-model="searchQuery" type="text" placeholder="Search blog..."
                    class="border-none focus:ring-0 p-2 w-full md:w-full rounded-full">
                <button class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white w-1/4 md:w-2/5">
                    <i class="pi pi-search"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<style scoped>
@media screen and (min-width: 768px){
    #input-feild::placeholder {
        font-size: small;
    }
}

</style>