<script setup>
import { reactive } from 'vue';
import Modal from '@/Components/Modal.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    blogs: {
        type: Array,
        required: true
    }
});

const sortOrder = reactive({
    id: 'asc',
    title: 'asc',
    name: 'asc',
    is_published: 'asc',
    is_featured: 'asc',
    clicks: 'asc'
});

function sortByTitle() {
    toggleSort('title');
    props.blogs.sort((a, b) => sortOrder.title === 'asc' ? a.title.localeCompare(b.title) : b.title.localeCompare(a.title));
}

function sortByAuthor() {
    toggleSort('name');
    props.blogs.sort((a, b) => sortOrder.name === 'asc' ? a.first_name.localeCompare(b.first_name) : b.first_name.localeCompare(a.first_name));
}

function sortByStatus() {
    toggleSort('is_published');
    props.blogs.sort((a, b) => sortOrder.is_published === 'asc' ? a.is_published - b.is_published : b.is_published - a.is_published);
}

function sortByFeatured() {
    toggleSort('is_featured');
    props.blogs.sort((a, b) => sortOrder.is_featured === 'asc' ? a.is_featured - b.is_featured : b.is_featured - a.is_featured);
}

function sortByClicks() {
    toggleSort('clicks');
    props.blogs.sort((a, b) => sortOrder.clicks === 'asc' ? a.clicks - b.clicks : b.clicks - a.clicks);
}
function toggleSort(column) {
    sortOrder[column] = sortOrder[column] === 'asc' ? 'desc' : 'asc';
}
</script>

<template>
    <div class="overflow-x-auto">
        <table class="styled-table w-full">
            <thead>
                <tr>
                    <th class="table-cell">
                        <button @click="sortByTitle">
                            Title
                            <i class="pi pi-sort"></i>
                        </button>
                    </th>
                    <th class="hidden sm:table-cell">
                        <button @click="sortByAuthor">
                            Author
                            <i class="pi pi-sort"></i>
                        </button>
                    </th>
                    <th class="hidden lg:table-cell">
                        <button @click="sortByStatus">
                            Status
                            <i class="pi pi-sort"></i>
                        </button>
                    </th>
                    <th class="hidden xl:table-cell">
                        <button @click="sortByFeatured">
                            Featured
                            <i class="pi pi-sort"></i>
                        </button>
                    </th>
                    <th class="hidden lg:table-cell">
                        <button @click="sortByClicks">
                            Clicks
                            <i class="pi pi-sort"></i>
                        </button>
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr :class="blog.is_published ? '':'not-published'" v-for="blog in props.blogs" :key="blog.id">
                    <td class="table-cell">
                        <Link class="text-ellipsis hover:underline hover:text-blue-400" :href="route('blog.show',blog.id)">{{ blog.title }}</Link>
                    </td>
                    <td class="hidden sm:table-cell">{{ blog.first_name }}</td>
                    <td class="hidden lg:table-cell">{{ blog.is_published ? 'Published' : 'Not Published' }}</td>
                    <td class="hidden xl:table-cell">{{ blog.is_featured ? 'Yes' : 'No' }}</td>
                    <td class="hidden lg:table-cell">{{ blog.clicks }}</td>
                    <td>
                        <span class="flex items-center space-x-2">
                            <Link :href="route('admin.blog.edit',blog.id)" class="text-green-500">
                                <i class="pi pi-pencil"></i>
                            </Link>
                            <button @click="openDeleteModal(blog.title,blog.id)" class="text-red-500">
                                <i class="pi pi-trash"></i>
                            </button>
                            <Link class="md:hidden text-blue-500 hover:underline" :href="route('blog.show',blog.id)">View</Link>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <Modal maxWidth="md" v-model:show="showDeleteModal" @close="showDeleteModal=false">
        <div class="flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center text-red-400">Delete Blog</h1>
            <p class="text-center">Are you sure you want to delete <span class="font-semibold">"{{selected.title}}"</span>?</p>
            <div class="flex space-x-4">
                <button @click="showDeleteModal=false" class="bg-gray-400 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button @click="deleteBlog(selected.id)" class="bg-red-400 text-white px-4 py-2 rounded-lg">Delete</button>
            </div>
        </div>        
    </Modal>
</template>
<script>
import { useToast } from 'vue-toastification';
const toast = useToast();
    export default {
        data() {
            return {
                showDeleteModal: false,
                selected: {
                    title: null,
                    id: null
                }
            }
        },
        methods: {
            openDeleteModal(title,id) {
                this.selected.title = title;
                this.selected.id = id;
                this.showDeleteModal = true;
            },
            deleteBlog(id) {
                this.$inertia.delete(route('admin.blog.destroy',id),{
                    onSuccess: () => {
                        toast.success('Blog deleted successfully!');
                        this.selected.title = null;
                        this.selected.id = null;
                        this.showDeleteModal = false;
                    },
                    onError: () => {
                        toast.error('Failed to delete blog!');
                        this.selected.title = null;
                        this.selected.id = null;
                        this.showDeleteModal = false;
                    },
                });
            }
        }
    }
</script>
<style scoped>
.styled-table {
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: 'Arial', sans-serif;
    width: 100%;
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 8px 12px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}
.not-published { 
    background-color: #f3f3f3;
}

@media (max-width: 640px) {
    .styled-table th,
    .styled-table td {
        padding: 6px 8px;
    }
}
</style>
