<script setup>
import { ref, reactive } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { useToast } from 'vue-toastification';
import Modal from '@/Components/Modal.vue';
const props = defineProps({
    faqs: {
        type: Array,
        required: true
    }
});
</script>
<script>
const toast = useToast();

export default {
    data() {
        return {
            showDeleteModal: false,
            selected: {
                question: null,
                id: null
            }
        }
    },
    methods: {
        openDeleteModal(question, id) {
            this.selected.question = question;
            this.selected.id = id;
            this.showDeleteModal = true;
        },
        deleteProject(id) {
            this.$inertia.delete(route('admin.faqs.destroy', id), {
                onSuccess: () => {
                    toast.success('Faq deleted successfully!');
                    this.selected.question = null;
                    this.selected.id = null;
                    this.showDeleteModal = false;
                },
                onError: () => {
                    toast.error('Failed to delete Faq!');
                    this.selected.question = null;
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
                    <button>
                        ID
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button>
                        Question
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button>
                        Category
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    <button>
                        Answer
                        <i class="pi pi-sort"></i>
                    </button>
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="faq in props.faqs" :key="faq.id">
                <td>{{ faq.id }}</td>
                <td>{{ faq.question }}</td>
                <td>{{ faq.catergory_id }}</td> <!-- Use category_name instead of category_id -->
                <td>{{ faq.answer }}</td>
                <td>
                    <span class="flex items-center space-x-2">
                            <Link :href="route('admin.faqs.edit',faq.id)" class="text-green-500">
                                <i class="fa-solid fa-pen"></i>
                            </Link>
                            <button @click="openDeleteModal(faq.question, faq.id)" class="text-red-500">
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
            <p class="text-center">Are you sure you want to delete <span class="font-semibold">"{{ selected.question }}"</span>?</p>
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
