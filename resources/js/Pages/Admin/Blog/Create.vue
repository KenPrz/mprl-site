<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import Toggle from '@/Components/Toggle.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { QuillDeltaToHtmlConverter } from 'quill-delta-to-html';
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
    const deltaContent = blogContent.value;
    const converter = new QuillDeltaToHtmlConverter(deltaContent.ops, {});
    form.content = converter.convert();
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
                            <input id="form-title" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.title" type="text">
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
                        <div>
                            <label for="is_published" class="block text-lg font-medium text-gray-700">Published</label>
                            <Toggle v-model="form.is_published" />
                        </div>
                        <div>
                            <label for="is_featured" class="block text-lg font-medium text-gray-700">Featured</label>
                            <Toggle v-model="form.is_featured" />
                        </div>
                    </div>
                    <div>
                        <label for="images" class="block text-lg font-medium text-gray-700">Images</label>
                        <input id="images" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="file" multiple @change="handleImageChange">
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
                        <button class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500" @click="$refs.moreImages.click()">Add More Images</button>
                        <input id="more-images" ref="moreImages" class="hidden" type="file" multiple @change="handleImageChange">
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <InputError class="mt-2" :message="form.errors.content" />
                    <div>
                        <QuillEditor toolbar="essential" v-model:content="blogContent" theme="snow"/>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" @click="submitBlog">
                        Submit
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
