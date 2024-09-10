<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Multiselect from 'vue-multiselect'
import InputError from '@/Components/InputError.vue';
import Toggle from '@/Components/Toggle.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { Link, useForm } from '@inertiajs/vue3';
import { VueDraggableNext } from 'vue-draggable-next';
import Editor from '@/Components/Editor.vue';
import { useFileSizeCheck } from '@/composables/useFileSizeCheck';
import { useToast } from 'vue-toastification';

const toast = useToast();
const { checkFileSize } = useFileSizeCheck(1.5);

const props = defineProps({
    categories: {
        type: Array,
        required: true
    },
    blog: {
        type: Object,
        required: true
    }
});

const newUploads = ref([]);
const form = useForm({
    new_images: [],
    deleted_images: [],
    categories: props.blog.categories || [],
    title: props.blog.title,
    content: props.blog.body,
    is_published: props.blog.is_published,
    is_featured: props.blog.is_featured
});

const blogContent = ref(props.blog.body);

const imagePreviews = ref(
    props.blog.images.map(image => ({
        id: image.id,
        url: `/storage/${image.image}`
    }))
);

function handleImageChange(event) {
    const files = event.target.files;
    const newImages = [];
    const newPreviews = [];
    
    Array.from(files).forEach(file => {
        if (checkFileSize(file)) {
            newImages.push(file);
            const reader = new FileReader();
            reader.onload = (e) => {
                newPreviews.push({
                    id: null,
                    url: e.target.result
                });
                if (newPreviews.length === newImages.length) {
                    newUploads.value.push(...newImages);
                    imagePreviews.value.push(...newPreviews);
                }
            };
            reader.readAsDataURL(file);
        } else {
            toast.error(`File "${file.name}" exceeds the 1.5 MB size limit.`);
        }
    });
}

function handleDeleteImage(id) {
    const imageIndex = imagePreviews.value.findIndex(image => image.id === id);
    const image = imagePreviews.value[imageIndex];
    if (image.id) {
        form.deleted_images.push(image.id);
    }
    imagePreviews.value.splice(imageIndex, 1);
    toast.info('Image removed. Save changes to confirm deletion.');
}

function updateBlog() {
    if(newUploads.value.length > 0) {
        form.new_images = newUploads.value;
    } else {
        form.new_images = null;
    }
    form.content = blogContent.value;
    // Extract just the IDs from the category objects
    form.categories = form.categories.map(cat => cat.id);
    form.post(route('admin.blog.update', props.blog.id), {
        onSuccess: () => {
            toast.success('Blog post updated successfully!');
            newUploads.value = [];
        },
        onError: () => {
            toast.error('There was an error updating the blog post. Please try again.');
        }
    });
}

onMounted(() => {
    form.clearErrors();
});
</script>

<template>
    <Head title="Edit Blog" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Blog</h2>
        </template>
        <div class="py-12">
            <div class="flex flex-col space-y-5 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-start">
                    <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.blog.index')">
                        Back
                    </Link>
                </div>
                <div class="w-full bg-white rounded-md p-4 shadow-md space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1 sm:col-span-2">
                            <label for="form-title" class="block text-lg font-medium text-gray-700">Title</label>
                            <input id="form-title" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.title" type="text">
                            <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                        <div class="col-span-1 sm:col-span-2">
                            <label for="categories" class="block text-lg font-medium text-gray-700">Categories</label>
                            <multiselect 
                                v-model="form.categories" 
                                :options="props.categories"
                                :multiple="true" 
                                :close-on-select="false" 
                                :clear-on-select="false"
                                :preserve-search="true" 
                                placeholder="Select categories" 
                                label="name" 
                                track-by="id"
                                :preselect-first="false"
                            >
                                <template #selection="{ values, search, isOpen }">
                                    <span class="multiselect__single" v-if="values.length && !isOpen">
                                        {{ values.length }} categories selected
                                    </span>
                                </template>
                            </multiselect>
                            <InputError class="mt-2" :message="form.errors.categories" />
                        </div>
                    </div>
                    <div class="flex flex-wrap space-x-4">
                        <div>
                            <label for="is_published" class="block text-lg font-medium text-gray-700">Published</label>
                            <Toggle v-model="form.is_published" />
                        </div>
                        <div>
                            <label for="is_featured" class="block text-lg font-medium text-gray-700">Featured</label>
                            <Toggle v-model="form.is_featured" />
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-4">
                        <VueDraggableNext v-model="imagePreviews" tag="div" class="flex flex-wrap">
                            <div v-for="img in imagePreviews" :key="img.id" class="relative w-1/2 sm:w-1/3 md:w-1/4 p-2">
                                <button @click="handleDeleteImage(img.id)" class="absolute -top-2 -right-2 text-white rounded-full p-1">
                                    <i style="color: red" class="pi pi-times-circle"></i>
                                </button>
                                <img :src="img.url" class="w-full h-auto rounded-md shadow-md cursor-move"/>
                            </div>
                        </VueDraggableNext>
                        <InputError class="mt-2" :message="form.errors.images" />
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500" @click="$refs.moreImages.click()">Add More Images (max 1.5 MB each)</button>
                        <input id="more-images" ref="moreImages" class="hidden" type="file" multiple @change="handleImageChange">
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <InputError class="mt-2" :message="form.errors.content" />
                    <Editor v-model="blogContent" />
                </div>
                <div class="flex justify-end mt-4">
                    <button class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" @click="updateBlog">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style scoped>
    #form-title {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        padding: 0.5rem;
        margin-top: 0.5rem;
    }
    /* Add any additional custom styles for multiselect here if needed */
</style>