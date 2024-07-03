<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import Toggle from '@/Components/Toggle.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { VueDraggableNext } from 'vue-draggable-next';

const props = defineProps({
    categories: {
        type: Array,
        required: true
    }
});

const form = useForm({
    images: [],
    category: '',
    title: '',
    content: '',
    is_published: true,
    is_featured: false
});

const blogContent = ref('');
const imagePreviews = ref([]);

function handleImageChange(event) {
    const files = event.target.files;
    const newImages = [];
    const newPreviews = [];

    Array.from(files).forEach(file => {
        newImages.push(file);
        const reader = new FileReader();
        reader.onload = (e) => {
            newPreviews.push(e.target.result);
            if (newPreviews.length === files.length) {
                form.images.push(...newImages);
                imagePreviews.value.push(...newPreviews);
            }
        };
        reader.readAsDataURL(file);
    });
}

function submitBlog() {
    form.content = JSON.stringify(blogContent.value);
    form.post(route('admin.blog.store'),
        {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                imagePreviews.value = [];
            }
        });
}

onMounted(() => {
    form.clearErrors();
});
</script>

<template>
    <Head title="Create Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Blog</h2>
        </template>
        <div class="py-12">
            <div class="flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-start">
                    <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.blog.index')">
                        Back
                    </Link>
                </div>
                <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
                    <div class="flex-row sm:flex sm:items-center sm:space-x-4">
                        <div class="sm:w-3/4">
                            <label for="form-title" class="block text-lg font-medium text-gray-700">Title</label>
                            <input :disabled="form.processing" id="form-title" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.title" type="text">
                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div class="sm:w-1/4">
                            <label for="category" class="block text-lg font-medium text-gray-700">Category</label>
                            <select id="category" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.category">
                                <option disabled default>Category</option>
                                <option v-for="category in props.categories" :key="category.id" :value="category.id">{{category.name}}</option>
                            </select>
                            <InputError class="mt-2" :message="form.errors.category" />
                        </div>
                        <div class="flex space-x-3">
                            <div>
                                <label for="is_published" class="block text-lg font-medium text-gray-700">Published</label>
                                <Toggle v-model="form.is_published" />
                            </div>
                            <div>
                                <label for="is_featured" class="block text-lg font-medium text-gray-700">Featured</label>
                                <Toggle v-model="form.is_featured" />
                            </div>
                        </div>
                    </div>
                    <div v-show="imagePreviews.length<1" class="mb-4">
                        <label for="images" class="block text-lg font-medium text-gray-700 mb-2">
                          Images
                        </label>
                        <div class="relative">
                          <input
                            :disabled="form.processing"
                            id="images"
                            type="file"
                            multiple
                            @change="handleImageChange"
                            class="hidden"
                          />
                          <label
                            for="images"
                            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-transparent"
                          >
                            <svg
                              class="w-5 h-5 mr-2 text-gray-400"
                              fill="none"
                              stroke="currentColor"
                              viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                              ></path>
                            </svg>
                            <span>Choose images</span>
                          </label>
                          <p class="mt-1 text-sm text-gray-500">
                            Select one or more image files
                          </p>
                        </div>
                      </div>
                    <div class="flex flex-wrap mt-4">
                        <VueDraggableNext v-model="imagePreviews" tag="div" class="flex flex-wrap">
                            <div v-for="(src, index) in imagePreviews" :key="index" class="w-1/4 p-2">
                                <button @click="imagePreviews.splice(index, 1)" class="relative top-0 right-0">
                                    <i style="color:red" class="pi pi-times-circle"></i>
                                </button>
                                <img :src="src" class="w-full h-auto rounded-md shadow-md cursor-move"/>
                            </div>
                        </VueDraggableNext>
                        <InputError class="mt-2" :message="form.errors.images" />
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button
                            :disabled="form.processing"
                            v-show="imagePreviews.length > 0"
                            @click="$refs.moreImages.click()"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-main-500 border border-transparent rounded-md shadow-sm hover:bg-main-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-500 transition duration-150 ease-in-out"
                            >
                            <i class="pi pi-plus pe-2"></i>
                            Add More Images
                        </button>
                        <input :disabled="form.processing" id="more-images" ref="moreImages" class="hidden" type="file" multiple @change="handleImageChange">
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <InputError class="mt-2" :message="form.errors.content" />
                    <div>
                        <QuillEditor toolbar="essential" v-model:content="blogContent" theme="snow"/>
                    </div>
                </div>
                <div class="flex justify-center mt-4">
                    <button :disabled="form.processing" class="w-full inline-flex justify-center items-center px-4 py-2 text-sm font-medium text-white bg-main-500 border border-transparent rounded-md shadow-sm hover:bg-main-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main-500 transition duration-150 ease-in-out" @click="submitBlog">
                        <i style="font-size:1.2rem" class="pi pi-arrow-circle-up me-2"></i>
                        <span class="text-lg font-semibold">Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
    #form-title {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem;
        margin-top: 0.5rem;
    }
</style>
