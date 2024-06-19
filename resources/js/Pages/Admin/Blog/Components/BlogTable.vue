<script setup>
import { ref, reactive } from 'vue';

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
    props.blogs.sort((a, b) => sortOrder.name === 'asc' ? a.name.localeCompare(b.name) : b.name.localeCompare(a.name));
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
                    <button @click="sortByTitle">
                        Title
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByAuthor">
                        Author
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByStatus">
                        Status
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button @click="sortByFeatured">
                        Featured
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
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
                <td>{{ blog.title }}</td>
                <td>{{ blog.name }}</td>
                <td>{{ blog.is_published ? 'Published' : 'Not Published' }}</td>
                <td>{{ blog.is_featured ? 'Yes' : 'No' }}</td>
                <td>{{ blog.clicks }}</td>
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
td{
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
