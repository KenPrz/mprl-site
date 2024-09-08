<script setup>
import { defineEmits, ref, watch } from 'vue';

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
        <div class="flex flex-col md:justify-between md:flex-row md:space-x-4 space-y-3 md:space-y-0 md:pb-2 lg:pb-0 px-5">
            <select v-model="selectedCategory" class="border-2 w-full md:w-2/3 border-gray-300 rounded-full text-sm p-2">
                <option default value="all">Category</option>
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
        <div class="relative text-gray-600 border-2 border-gray-300 rounded-full mx-5">
            <input v-model="searchQuery" type="search" name="serch" placeholder="Search blog..." class="w-full bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
              <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
              </svg>
            </button>
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