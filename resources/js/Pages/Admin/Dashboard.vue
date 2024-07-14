<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';
import { ref, computed, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import VisitorChart from '@/Pages/Admin/Charts/VisitorChart.vue';
const toast = useToast();
const props = defineProps({
    blog_posts: {
        type: Number,
        default: 0,
    },
    products: {
        type: Number,
        default: 0,
    },
    users: {
        type: Number,
        default: 0,
    },
    visitors: {
        type: Object,
        default: () => ({
            visitor_data: [],
            visitor_dates: {},
            selected_month: '',
            selected_year: '',
        }),
    },
});

const selectedYear = ref(props.visitors.selected_year);
const selectedMonth = ref(props.visitors.selected_month);

const currentMonth = ref(new Date().toLocaleString('default', { month: 'long' }));
const totalBlogPosts = ref(props.blog_posts);
const totalProducts = ref(props.products);
const totalUsers = ref(props.users);
const totalVisitors = ref(props.visitors.visitor_data.length);
const visitorData = ref(props.visitors.visitor_data);
const visitorDates = ref(props.visitors.visitor_dates);

const years = computed(() => Object.keys(visitorDates.value));
const months = computed(() => (form.selectedYear ? visitorDates.value[form.selectedYear] : []));

const form = useForm({
    'selectedYear': selectedYear.value,
    'selectedMonth': selectedMonth.value,
});

const brochureForm = useForm({
    file: null,
});

function submitForm() {
    if (form.selectedYear && form.selectedMonth) {
        form.get(route('dashboard'),{
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Data fetched successfully!');
                console.log('success');
            }
        });
    }
}

function submitBrochure() {
    brochureForm.post(route('admin.brochure.store'), {
        preserveScroll: true,
        forceFormData: true,
        onSuccess: (response) => {
            console.log('success', response);
            toast.success('Brochure uploaded successfully!');
            removeBrochure();
        },
        onError: (errors) => {
            console.error('error', errors);
        },
    });
}

function removeBrochure() {
    brochureForm.file = null;
    document.querySelector('input[type="file"]').value = '';
}

function convertToMonthString(dateString) {
    const [year, month] = dateString.split('-');
    const date = new Date(year, month - 1);
    return date.toLocaleString('default', { month: 'long' });
}

watch(() => form.selectedYear, () => {
    currentMonth.value = new Date().toLocaleString('default', { month: 'long' });
    form.selectedMonth = '';
});

watch([() => form.selectedYear, () => form.selectedMonth], () => {
    submitForm();
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5 py-6">
                    <h1>
                        Welcome <span class="font-semibold">{{ $page.props.auth.user.first_name }}!</span>
                    </h1>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <!-- Blog Posts Card -->
                    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Blog Posts</h3>
                        <p class="mt-4 text-2xl">{{ totalBlogPosts }}</p>
                        <a class="text-right text-xs text-blue-400 hover:underline"
                            :href="route('admin.blog.index')">Visit Blogs</a>
                    </div>
                    <!-- Products Card -->
                    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Products</h3>
                        <p class="mt-4 text-2xl">{{ totalProducts }}</p>
                        <a class="text-right text-xs text-blue-400 hover:underline" href="#">Visit Products</a>
                    </div>
                    <!-- Users Card -->
                    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold">Users</h3>
                        <p class="mt-4 text-2xl">{{ totalUsers }}</p>
                        <a class="text-right text-xs text-blue-400 hover:underline" href="#">Visit Users</a>
                    </div>
                </div>
                <div class="my-5 bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Brochure</h3>
                    <a 
                        target="_blank" 
                        :href="route('brochure.download')"
                        class="text-blue-600 hover:text-blue-800 underline mb-4 inline-block"
                    >
                        Preview Brochure
                    </a>
                    <form @submit.prevent="submitBrochure" class="mt-4">
                        <div class="flex items-center justify-center w-full">
                            <label 
                                for="dropzone-file" 
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
                                v-if="!brochureForm.file"
                            >
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span></p>
                                    <p class="text-xs text-gray-500">PDF (MAX. 100MB)</p>
                                </div>
                                <input 
                                    id="dropzone-file" 
                                    type="file" 
                                    class="hidden" 
                                    @input="brochureForm.file = $event.target.files[0]"
                                    accept=".pdf"
                                />
                            </label>
                            <div v-else class="w-full">
                                <div class="flex items-center justify-between p-4 border border-gray-300 rounded-lg">
                                    <div class="flex items-center">
                                        <svg class="w-8 h-8 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-500">{{ brochureForm.file.name }}</span>
                                    </div>
                                    <button 
                                        :disabled="brochureForm.processing"
                                        type="button" 
                                        @click="removeBrochure" 
                                        class="text-red-600 hover:text-red-800"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-right">
                            <button 
                                type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                :disabled="!brochureForm.file"
                            >
                                Upload Brochure
                            </button>
                        </div>
                    </form>
                </div>          
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-5 py-6 mt-6">
                    <div class="flex justify-between">
                        <div class="flex flex-col">
                            <h1 class="font-semibold text-lg">
                                Visitors Overview
                            </h1>
                            <p class="mt-4 text-sm">Total visitors this month of 
                                <span v-if="form.selectedMonth==''">
                                    {{ currentMonth }}
                                </span>
                                <span v-else>
                                    {{convertToMonthString(form.selectedMonth)}}
                                </span>: 
                                <span class="font-semibold">{{ totalVisitors }}</span></p>
                        </div>
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                            <select id="year" v-model="form.selectedYear" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="" disabled>Select Year</option>
                                <option v-for="year in years" :key="year" :value="year">{{ year }}</option>
                            </select>
                            <label for="month" class="block text-sm font-medium text-gray-700 mt-4">Month</label>
                            <select id="month" v-model="form.selectedMonth" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" :disabled="!form.selectedYear">
                                <option value="" disabled>Select Month</option>
                                <option v-for="month in months" :key="month" :value="month">{{ convertToMonthString(month) }}</option>
                            </select>
                        </div>
                    </div>
                    <section>
                        <div class="mt-6">
                            <VisitorChart :visitorData="visitorData" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>