<script setup>
import { ref, reactive } from 'vue';
import {Link} from '@inertiajs/vue3'
import { useToast } from 'vue-toastification';
import Modal from '@/Components/Modal.vue';

const props = defineProps({
    services: {
        type: Array,
        required: true
    }
});
const sortOrder = reactive({
    id: 'asc',
    name: 'asc',
    category_name: 'asc',
    description: 'asc',
});
function sortByName() {
    toggleSort('name');
    props.services.sort((a, b) => sortOrder.name === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name));
}
function sortByID() {
    toggleSort('id');
    props.services.sort((a, b) => sortOrder.id === 'asc' ? a.id - b.id : b.id - a.id);
}
function sortByCatergory() {
    toggleSort('category_name');
    props.services.sort((a, b) => sortOrder.category_name === 'asc' ? a.category_name.localeCompare(b.category_name) : b.category_name.localeCompare(a.category_name));
}
function sortByDescription() {
    toggleSort('description');
    props.services.sort((a, b) => sortOrder.description === 'asc' ? a.description.localeCompare(b.description) : b.description.localeCompare(a.description));
}
// Toggle sort order function
function toggleSort(column) {
    sortOrder[column] = sortOrder[column] === 'asc' ? 'desc' : 'asc';
}
</script>
<script>
const toast = useToast();

export default {
    data() {
        return {
            showDeleteModal: false,
            selected: {
                name: null,
                id: null
            }
        }
    },
    methods: {
        openDeleteModal(name, id) {
            this.selected.name = name;
            this.selected.id = id;
            this.showDeleteModal = true;
        },
        deleteProject(id) {
            this.$inertia.delete(route('admin.services.destroy', id), {
                onSuccess: () => {
                    toast.success('Service deleted successfully!');
                    this.selected.name = null;
                    this.selected.id = null;
                    this.showDeleteModal = false;
                },
                onError: () => {
                    toast.error('Failed to delete project!');
                    this.selected.name = null;
                    this.selected.id = null;
                    this.showDeleteModal = false;
                },
            });
        }
    }
}
</script>

<template>
    <table class="styled-table">
        <thead>
            <tr>
                <th>
                    <button @click="sortByID">
                        ID
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByName">
                        Name
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByCatergory">
                        Category
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByDescription">
                        Description
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="service in props.services" :key="service.id">
                <td>{{ service.id }}</td>
                <td>{{ service.name }}</td>
                <td>{{ service.category_id }}</td> <!-- Use category_name instead of category_id -->
                <td>{{ service.description }}</td>
                <td>
                        <span class="flex items-center space-x-2">
                            <Link :href="route('admin.services.edit',service.id)" class="text-green-500">
                                <i class="fa-solid fa-pen"></i>
                            </Link>
                            <button @click="openDeleteModal(service.name, service.id)" class="text-red-500">
                                <i class="pi pi-trash"></i>
                            </button>
                            
                        </span>
                </td>
            </tr>
        </tbody>
    </table>

    <Modal maxWidth="md" v-model:show="showDeleteModal" @close="showDeleteModal = false">
        <div class="flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center text-red-400">Delete Project</h1>
            <p class="text-center">Are you sure you want to delete <span class="font-semibold">"{{ selected.name }}"</span>?</p>
            <div class="flex space-x-4">
                <button @click="showDeleteModal = false" class="bg-gray-400 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button @click="deleteProject(selected.id)" class="bg-red-400 text-white px-4 py-2 rounded-lg">Delete</button>
            </div>
        </div>        
    </Modal>
</template>

<style scoped>
td {
    text-overflow: ellipsis;
}
.styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 1em;
    font-family: 'Arial', sans-serif;
    min-width: 400px;
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.not-published {
    background-color: #f3f3f3;
}
</style>
