<script setup>
import { ref, watch, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import BlogTable from './Components/BlogTable.vue';

const props = defineProps({
    blogs: {
        type: Object,
        required: true
    },
    searchQuery: {
        type: String,
        default: ''
    }
});

const form = useForm({
    searchQuery: props.searchQuery
});

const searchBarRef = ref(null);

function debounce(func, wait) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}

const debouncedCallback = debounce((value) => {
    form.searchQuery = value;
    form.get(route('admin.blog.index')).then(() => {
        if (searchBarRef.value) {
            searchBarRef.value.focus();
        }
    });
}, 600);

watch(() => form.searchQuery, debouncedCallback);
onMounted(() => {
    if (searchBarRef.value) {
        searchBarRef.value.focus();
    }
});
</script>

<template>
    <Head title="Admin: Blog" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blogs</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                    <section class="p-2 flex justify-between px-5 items-center py-5">
                        <input v-model="form.searchQuery" ref="searchBarRef" type="text" placeholder="search..." id="searchbar" class="w-3/4 sm:w-1/4 p-2">
                        <Link class="flex p-3  sm:space-x-1  items-center bg-main-400 sm:px-3 sm:py-2 rounded-md text-white hover:bg-main-500" :href="route('admin.blog.create')">
                            <span class="hidden sm:block">Create</span>
                            <i class="pi pi-plus-circle"></i>
                        </Link>
                    </section>
                    <section class="overflow-x-auto">
                        <BlogTable
                            :blogs="blogs.data" 
                        />
                    </section>
                    <section class="py-3">
                        <Pagination
                            :first_page_url="props.blogs.first_page_url"
                            :from="props.blogs.from"
                            :last_page="props.blogs.last_page"
                            :last_page_url="props.blogs.last_page_url"
                            :links="props.blogs.links"
                        />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style scoped>
    #searchbar {
        border: 2px solid #ccc;
        border-radius: 20px;
    }
</style>
