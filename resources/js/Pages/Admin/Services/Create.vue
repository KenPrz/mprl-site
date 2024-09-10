<template>
    <Head title="Admin: Services" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
            <div class="flex justify-start">
                <Link class="bg-main-500 px-4 py-2 rounded-md text-white hover:bg-main-600" :href="route('admin.services.index')">
                    <i class="fa-solid fa-arrow-left mr-2"></i><span>Go Back</span>
                </Link>
            </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
            <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <label for="form-name" class="block text-lg font-medium text-gray-700">Service Name</label>
                        <input id="form-name" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.name" type="text" required>
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div class="col-span-1">
                        <label for="form-category" class="block text-lg font-medium text-gray-700">Select Category</label>
                        <select id="category" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.category_id">
                            <option disabled>Category</option>
                            <option v-for="category in props.categories" :key="category.id" :value="category.id">{{category.service_category}}</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.category_id" />
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="col-span-1 mt-3">
                            <label for="prod-name" class="block text-lg font-medium text-gray-700">Description</label>
                            <textarea 
                                class="mt-1 w-full h-60 p-5 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" 
                                v-model="form.description" 
                                @input="handleInput"
                            ></textarea>
                            <!-- <Editor v-model="form.description" /> -->
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>
                        <div class="col-span-1">
                            <div class="flex justify-between">
                                <label for="prod-name" class="block text-lg font-medium text-gray-700 p-3">Service Image <span class="text-xs">(1 image max)</span></label>
                                <div class="flex justify-between items-center mt-2">
                                    <div class="bg-main-500 px-2 py-2 rounded-lg text-white hover:bg-main-600">
                                        <input type="file" multiple @change="handleFiles" class="hidden" id="file-upload" />
                                        <label for="file-upload" class="flex cursor-pointer">
                                            <i class="fa-solid fa-plus text-xl"></i>
                                            <span class="ml-1 hidden sm:flex items-center">Add Images</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-300 rounded-lg w-full h-56 mt-2 flex items-center justify-center overflow-hidden">
                                <div class="flex space-x-2">
                                    <div v-for="(preview, index) in imagePreviews" :key="index" class="relative">
                                        <img :src="preview" class="w-32 h-32 object-cover rounded-lg" />
                                        <button @click="removeImage(index)" class="absolute top-0 right-0 h-8 w-8 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2">
                                            <i class="fa-solid fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="flex justify-end">
                        <button type="submit" placeholder="" class="bg-main-500 p-3 text-white rounded-lg hover:bg-main-600" @click="addService">Create</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
import { ref, watch, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import { useToast } from 'vue-toastification';
import { useFileSizeCheck } from '@/composables/useFileSizeCheck';

const toast = useToast();
const { checkFileSize } = useFileSizeCheck(1.5); // 1.5 MB limit

const props = defineProps({
  services: {
    type: Object,
  },
  categories: {
    type: Array,
    required: true
  }
});

const form = useForm({
  name: '',
  category_id: '',
  description: '',
  image: []
});

function addService() {
  form.post(route('admin.services.store'), {
    preserveScroll: true,
    onSuccess: () => {
      toast.success('Service added successfully!');
      form.reset();
      imagePreviews.value = [];
    },
    onError: (errors) => {
      toast.error('Failed to add service. Please check the form and try again.');
      console.error(errors);
    }
  });
}

const imagePreviews = ref([]);

function handleFiles(event) {
  const files = event.target.files;

  // Ensure only one file is handled
  if (files.length > 0) {
    const file = files[0]; // Take the first file

    if (checkFileSize(file)) {
      // Clear previous previews and form image data
      imagePreviews.value = [];
      form.image = [];

      const reader = new FileReader();
      reader.onload = (e) => {
        imagePreviews.value.push(e.target.result); // Add the preview for the selected image
        form.image.push(file); // Add the file object to form data
      };
      reader.readAsDataURL(file);
    } else {
      toast.error(`File "${file.name}" exceeds the 1.5 MB size limit.`);
    }
  }
}

function removeImage(index) {
  imagePreviews.value.splice(index, 1);
  form.image.splice(index, 1);
  toast.info('Image removed.');
}

// Function to handle input and add bullets
function handleInput() {
  // Split the description into lines
  const lines = form.description.split('\n');

  // Add bullet point if a line is not empty and doesn't already have one
  for (let i = 0; i < lines.length; i++) {
    if (lines[i] && !lines[i].startsWith('• ')) {
      lines[i] = '• ' + lines[i];
    }
  }

  // Join the lines back and update the description
  form.description = lines.join('\n');
}

onMounted(() => {
  form.clearErrors();
});
</script>