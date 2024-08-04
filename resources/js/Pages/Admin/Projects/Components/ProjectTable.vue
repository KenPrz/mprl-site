<script setup>
import { ref, reactive } from 'vue';
const props = defineProps({
    projects: {
        type: Array,
        required: true
    }
});
const sortOrder = reactive({
    id: 'asc',
    title: 'asc',
    name: 'asc',
    description: 'asc',
});
function sortByName() {
    toggleSort('title');
    props.projects.sort((a, b) => sortOrder.title === 'asc' ? a.title.localeCompare(b.title) : b.title.localeCompare(a.title));
}
function sortByID() {
    toggleSort('id');
    props.services.sort((a, b) => sortOrder.id === 'asc' ? a.id - b.id : b.id - a.id);
}
function sortByCatergory() {
    toggleSort('name');
    props.projects.sort((a, b) => sortOrder.name === 'asc' ? a.category_name.localeCompare(b.name) : b.name.localeCompare(a.name));
}
function sortByDescription() {
    toggleSort('description');
    props.projects.sort((a, b) => sortOrder.description === 'asc' ? a.description.localeCompare(b.description) : b.description.localeCompare(a.description));
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
            <tr v-for="project in props.projects" :key="project.id">
                <td>{{ project.id }}</td>
                <td>{{ project.title }}</td>
                <td>{{ project.name }}</td> <!-- Use category_name instead of category_id -->
                <td>{{ project.content }}</td>
                <td>
                        <span class="flex items-center space-x-2">
                            <Link :href="route('admin.services.edit',project.id)" class="text-green-500">
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
