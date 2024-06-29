<script setup>
import { ref, reactive } from 'vue';
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
function sortByCatergory() {
    toggleSort('category_name');
    props.products.sort((a, b) => sortOrder.category_name === 'asc' ? a.category_name.localeCompare(b.category_name) : b.category_name.localeCompare(a.category_name));
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
                <td>{{ product.category_name }}</td> <!-- Use category_name instead of category_id -->
                <td>{{ product.price }}</td>
                <td>{{ product.is_displayed ? 'Yes' : 'No' }}</td> <!-- Correctly display is_displayed -->
                <td>
                    <button class="ps-3">
                        <i class="pi pi-ellipsis-v"></i>
                    </button>
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
