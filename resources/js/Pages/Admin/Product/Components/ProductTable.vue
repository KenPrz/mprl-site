<script setup>
import { ref, reactive } from 'vue';
import { useToast } from 'vue-toastification';
import Modal from '@/Components/Modal.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    products: {
        type: Array,
        required: true
    }
});

const sortOrder = reactive({
    id: 'asc',
    name: 'asc',
    category_name: 'asc',
    price: 'asc',
    supplier: 'asc',
    is_displayed: 'asc'
});

function sortByName() {
    toggleSort('name');
    props.products.sort((a, b) => sortOrder.name === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name));
}

function sortByStatus() {
    toggleSort('is_displayed');
    props.products.sort((a, b) => sortOrder.is_displayed === 'asc' ? a.is_displayed - b.is_displayed : b.is_displayed - a.is_displayed);
}

function sortByCategory() {
    toggleSort('category_name');
    props.products.sort((a, b) => sortOrder.category_name === 'asc' ? a.category_name.localeCompare(b.category_name) : b.category_name.localeCompare(a.category_name));
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
        deleteProduct(id) {
            this.$inertia.delete(route('admin.products.destroy', id), {
                onSuccess: () => {
                    toast.success('Product deleted successfully!');
                    this.selected.name = null;
                    this.selected.id = null;
                    this.showDeleteModal = false;
                },
                onError: () => {
                    toast.error('Failed to delete product!');
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
                    <button @click="sortByName">
                        Name
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByCategory">
                        Category
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    Price
                </th>
                <th>
                    <button @click="sortByStatus">
                        Displayed
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in props.products" :key="product.id">
                <td>{{ product.name }}</td>
                <td>{{ product.category_name }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.is_displayed ? 'Yes' : 'No' }}</td>
                <td>
                    <span class="flex items-center space-x-2">
                        <Link :href="route('admin.products.edit', product.id)" class="text-green-500">
                            <i class="fa-solid fa-pen"></i>
                        </Link>
                        <button @click="openDeleteModal(product.name, product.id)" class="text-red-500">
                            <i class="pi pi-trash"></i>
                        </button>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>

    <Modal maxWidth="md" v-model:show="showDeleteModal" @close="showDeleteModal = false">
        <div class="flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold text-center text-red-400">Delete Product</h1>
            <p class="text-center">Are you sure you want to delete <span class="font-semibold">"{{ selected.name }}"</span>?</p>
            <div class="flex space-x-4">
                <button @click="showDeleteModal = false" class="bg-gray-400 text-white px-4 py-2 rounded-lg">Cancel</button>
                <button @click="deleteProduct(selected.id)" class="bg-red-400 text-white px-4 py-2 rounded-lg">Delete</button>
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
