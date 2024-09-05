<script setup>
import { ref, reactive } from 'vue';
import { Link } from '@inertiajs/vue3';
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
                <td>{{ service.category_name }}</td> <!-- Use category_name instead of category_id -->
                <td>{{ service.description }}</td>
                <td>
                        <span class="flex items-center space-x-2">
                            <Link :href="route('admin.services.edit',service.id)" class="text-green-500">
                                <i class="fa-solid fa-pen"></i>
                            </Link>
                            <button @click="" class="text-red-500">
                                <i class="pi pi-trash"></i>
                            </button>
                            
                        </span>
                </td>
            </tr>
        </tbody>
    </table>
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
