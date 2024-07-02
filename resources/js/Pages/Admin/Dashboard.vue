<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, computed, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import VisitorChart from '@/Pages/Admin/Charts/VisitorChart.vue';

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
})

function submitForm() {
    if (form.selectedYear && form.selectedMonth) {
        form.get(route('dashboard'),{
            preserveScroll: true,
            onSuccess: () => {
                console.log('success');
            }

        });
    }
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