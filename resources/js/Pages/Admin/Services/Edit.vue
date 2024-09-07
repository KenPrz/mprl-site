<template>
    <Head title="Admin: Services" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-start">
                <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.services.index')">
                    <i class="fa-solid fa-arrow-left px-4"></i><span>Go Back</span>
                </Link>
            </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
            <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-1">
                  <label for="form-name" class="block text-lg font-medium text-gray-700">Service Name</label>
                  <input
                    id="form-name"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    v-model="form.name"
                    type="text"
                  />
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="col-span-1">
                  <label for="form-category" class="block text-lg font-medium text-gray-700">Select Category</label>
                  <select
                    id="category"
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    v-model="form.category_id"
                  >
                    <option disabled value="">Category</option>
                    <option v-for="category in props.categories" :key="category.id" :value="category.id">
                      {{ category.service_category }}
                    </option>
                  </select>
                  <InputError class="mt-2" :message="form.errors.category_id" />
                </div>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div class="col-span-1">
                    <label for="prod-name" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea
                      class="mt-1 w-full h-60 p-5 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                      v-model="form.description"
                    ></textarea>
                    <InputError class="mt-2" :message="form.errors.description" />
                  </div>
                  <div class="col-span-1">
                    <div class="flex justify-between">
                      <label for="prod-name" class="block text-lg font-medium text-gray-700 p-3">Image <sup>(max 1 image upload)</sup></label>
                      <div class="flex justify-between items-center mt-2">
                        <div class="bg-green-500 px-2 py-1 rounded-lg text-white">
                          <input
                            type="file"
                            @change="handleFiles"
                            class="hidden"
                            id="file-upload"
                          />
                          <label for="file-upload" class="flex cursor-pointer">
                            <i class="fa-solid fa-plus text-xl"></i>
                            <span class="ml-1 hidden sm:flex items-center">Add Image</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="bg-gray-300 rounded-lg w-full h-56 mt-2 flex items-center justify-center overflow-hidden">
                      <div v-if="imagePreviews.length" class="relative">
                        <img :src="imagePreviews[0]" class="w-24 h-24 object-cover rounded-lg" />
                        <button @click="removeImage" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2">
                          <i class="fa-solid fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="flex justify-end mt-5">
                  <button
                    type="submit"
                    placeholder=""
                    class="bg-green-500 px-3 py-1 text-white rounded-lg"
                    @click="updateService"
                  >
                    Update
                  </button>
                </div>
              </div>
            </div>
          </div>
          {{ form }}
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { useForm } from '@inertiajs/vue3';
  import InputError from '@/Components/InputError.vue';
  import Editor from '@/Components/Editor.vue';
  import { useToast } from 'vue-toastification';
  
  const props = defineProps({
    service: {
      type: Object,
      required: true
    },
    categories: {
      type: Array,
      required: true
    }
  });
  
  const toast = useToast();
  const imagePreviews = ref([]);
  
  const form = useForm({
    name: props.service.name || '',
    category_id: props.service.category_id || '',
    description: props.service.description || '',
    image: [] // Form images handled separately
  });
  
  // Handle file uploads and update image previews
  function handleFiles(event) {
    const files = event.target.files;
  
    // Ensure only one file is handled
    if (files.length > 0) {
      const file = files[0]; // Take the first file
  
      // Clear previous previews and form image data
      imagePreviews.value = [];
      form.image = [];
  
      const reader = new FileReader();
      reader.onload = (e) => {
        imagePreviews.value.push(e.target.result); // Add the preview for the selected image
        form.image.push(file); // Add the file object to form data
      };
      reader.readAsDataURL(file);
    }
  }
  
  // Remove selected image preview and associated file
  function removeImage() {
    imagePreviews.value = [];
    form.image = [];
    // Clear file input
    document.getElementById('file-upload').value = '';
  }
  
  // Update service data on form submission
  function updateService() {
    // Make the request using Inertia
    form.post(route('admin.services.update', props.service.id), {
      onSuccess: () => {
        toast.success('Service Updated successfully!');
        // Reset form and previews on success
        form.reset();
        imagePreviews.value = [];
      },
      onError: (errors) => {
        console.log(errors); // Debug validation errors if needed
        toast.error('Failed to update service!');
      }
    });
  }
  
  // Load existing image preview on component mount
  onMounted(() => {
    if (props.service.image) {
      imagePreviews.value.push(`/storage/${props.service.image}`);
    }
  });
  </script>

  <style scoped>
  </style>
  