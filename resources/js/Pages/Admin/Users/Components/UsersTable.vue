<script setup>
import { reactive, ref, watch } from 'vue';
import Modal from '@/Components/Modal.vue';
import { Link, router } from '@inertiajs/vue3';
import UserEditModal from './UserEdit.vue';
import UserDeleteModal from './UserDelete.vue';
import debounce from 'lodash/debounce';

const props = defineProps({
    users: {
        type: Object,
        required: true
    },
    filters: {
        type: Object,
        default: () => ({})
    }
});

const sortOrder = reactive({
    id: 'asc',
    name: 'asc',
    email: 'asc',
    role: 'asc',
    is_google_user: 'asc',
    created_at: 'asc'
});

const showEditModal = ref(false);
const showDeleteModal = ref(false);
const selectedUser = ref(null);
const search = ref(props.filters.search);

const debouncedSearch = debounce(() => {
    router.get(route('admin.users.index'), { search: search.value }, {
        preserveState: true,
        replace: true,
    });
}, 300);

watch(search, debouncedSearch);

function sortById() {
    toggleSort('id');
    props.users.data.sort((a, b) => sortOrder.id === 'asc' ? a.id - b.id : b.id - a.id);
}

function sortByName() {
    toggleSort('name');
    props.users.data.sort((a, b) => sortOrder.name === 'asc' 
        ? `${a.first_name} ${a.last_name}`.localeCompare(`${b.first_name} ${b.last_name}`) 
        : `${b.first_name} ${b.last_name}`.localeCompare(`${a.first_name} ${a.last_name}`));
}

function sortByEmail() {
    toggleSort('email');
    props.users.data.sort((a, b) => sortOrder.email === 'asc' ? a.email.localeCompare(b.email) : b.email.localeCompare(a.email));
}

function sortByRole() {
    toggleSort('role');
    props.users.data.sort((a, b) => sortOrder.role === 'asc' ? a.role_id - b.role_id : b.role_id - a.role_id);
}

function sortByGoogleUser() {
    toggleSort('is_google_user');
    props.users.data.sort((a, b) => sortOrder.is_google_user === 'asc' ? a.is_google_user - b.is_google_user : b.is_google_user - a.is_google_user);
}

function sortByCreatedAt() {
    toggleSort('created_at');
    props.users.data.sort((a, b) => sortOrder.created_at === 'asc' 
        ? new Date(a.created_at) - new Date(b.created_at) 
        : new Date(b.created_at) - new Date(a.created_at));
}

function toggleSort(column) {
    sortOrder[column] = sortOrder[column] === 'asc' ? 'desc' : 'asc';
}

function openEditModal(user) {
    selectedUser.value = user;
    showEditModal.value = true;
}

function openDeleteModal(user) {
    selectedUser.value = user;
    showDeleteModal.value = true;
}

function handleUserUpdated() {
    showEditModal.value = false;
    // You might want to refresh the users list here
}

function handleUserDeleted() {
    showDeleteModal.value = false;
    // You might want to refresh the users list here
}

function changePage(url) {
    router.get(url, {
        preserveScroll: true,
    });
}
</script>

<template>
    <div class="users-container">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800">Users</h2>
            <div class="search-container">
                <input 
                    type="text" 
                    v-model="search" 
                    placeholder="Search users..." 
                    class="search-input"
                >
                <i class="pi pi-search search-icon"></i>
            </div>
        </div>

        <div class="table-container">
            <table class="styled-table w-full">
                <thead>
                    <tr>
                        <th class="table-cell">
                            <button @click="sortById" class="sort-button">
                                ID
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th class="table-cell">
                            <button @click="sortByName" class="sort-button">
                                Name
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th class="hidden sm:table-cell">
                            <button @click="sortByEmail" class="sort-button">
                                Email
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th class="hidden lg:table-cell">
                            <button @click="sortByRole" class="sort-button">
                                Role
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th class="hidden xl:table-cell">
                            <button @click="sortByGoogleUser" class="sort-button">
                                Google User
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th class="hidden lg:table-cell">
                            <button @click="sortByCreatedAt" class="sort-button">
                                Created At
                                <i class="pi pi-sort"></i>
                            </button>
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <td class="table-cell">{{ user.id }}</td>
                        <td class="table-cell">
                            {{ user.first_name }} {{ user.last_name }}
                        </td>
                        <td class="hidden sm:table-cell">{{ user.email }}</td>
                        <td class="hidden lg:table-cell">{{ user.role_id }}</td>
                        <td class="hidden xl:table-cell">{{ user.is_google_user ? 'Yes' : 'No' }}</td>
                        <td class="hidden lg:table-cell">{{ new Date(user.created_at).toLocaleDateString() }}</td>
                        <td>
                            <span class="flex items-center space-x-2">
                                <button @click="openEditModal(user)" class="action-button text-green-500">
                                    <i class="pi pi-pencil"></i>
                                </button>
                                <button @click="openDeleteModal(user)" class="action-button text-red-500">
                                    <i class="pi pi-trash"></i>
                                </button>
                                <Link class="md:hidden text-blue-500 hover:underline" :href="route('admin.users.show', user.id)">View</Link>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Custom Pagination -->
        <div class="mt-4 flex justify-between items-center text-sm">
            <div class="text-gray-600">
                Showing {{ users.from }} to {{ users.to }} of {{ users.total }} results
            </div>
            <div class="flex space-x-1">
                <template v-for="(link, index) in users.links" :key="index">
                    <button 
                        v-if="link.url" 
                        @click="changePage(link.url)"
                        :class="['px-3 py-1 rounded', link.active ? 'bg-green-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300']"
                        v-html="link.label"
                    ></button>
                    <span v-else v-html="link.label" class="px-3 py-1 text-gray-500"></span>
                </template>
            </div>
        </div>
    </div>

    <Modal maxWidth="md" v-model:show="showEditModal" @close="showEditModal = false">
        <UserEditModal :user="selectedUser" @close="showEditModal = false" @updated="handleUserUpdated" />
    </Modal>

    <Modal maxWidth="md" v-model:show="showDeleteModal" @close="showDeleteModal = false">
        <UserDeleteModal :user="selectedUser" @close="showDeleteModal = false" @deleted="handleUserDeleted" />
    </Modal>
</template>

<style scoped>
.users-container {
    max-height: calc(100vh - 100px);
    display: flex;
    flex-direction: column;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 1.5rem;
}

.search-container {
    position: relative;
    width: 300px;
}

.search-input {
    width: 100%;
    padding: 0.5rem 1rem 0.5rem 2.5rem;
    border: 1px solid #e2e8f0;
    border-radius: 9999px;
    font-size: 0.875rem;
    outline: none;
    transition: all 0.3s;
}

.search-input:focus {
    border-color: #009879;
    box-shadow: 0 0 0 3px rgba(0, 152, 121, 0.2);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #a0aec0;
}

.table-container {
    flex-grow: 1;
    overflow-y: auto;
    overflow-x: auto;
    margin-top: 1rem;
}

.styled-table {
    border-collapse: separate;
    border-spacing: 0;
    font-size: 0.875rem;
    width: 100%;
}

.styled-table thead {
    position: sticky;
    top: 0;
    z-index: 1;
    background-color: #009879;
    color: #ffffff;
}

.styled-table th,
.styled-table td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #e2e8f0;
}

.styled-table tbody tr:hover {
    background-color: #f7fafc;
}

.sort-button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.75rem;
}

.action-button {
    padding: 0.25rem;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.action-button:hover {
    background-color: rgba(0, 0, 0, 0.1);
}

/* Custom scrollbar styles */
.table-container::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}

.table-container::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.table-container::-webkit-scrollbar-thumb {
    background: #009879;
    border-radius: 3px;
}

.table-container::-webkit-scrollbar-thumb:hover {
    background: #007c63;
}

@media (max-width: 640px) {
    .search-container {
        width: 100%;
    }
    
    .styled-table th,
    .styled-table td {
        padding: 0.5rem 0.75rem;
    }
}
</style>