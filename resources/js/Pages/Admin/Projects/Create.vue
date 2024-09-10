<template>

  <Head title="Admin: Projects" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Project</h2>
    </template>
    <div class="p-4 sm:p-6 lg:p-8">
      <div class="max-w-7xl mx-auto space-y-6">
        <div class="flex justify-start">
          <Link class="bg-main-400 px-4 py-2 rounded-md text-white hover:bg-main-500"
            :href="route('admin.projects.index')">
          <i class="fa-solid fa-arrow-left mr-2"></i><span>Go Back</span>
          </Link>
        </div>
        <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
              <label for="form-name" class="block text-sm font-medium text-gray-700 mb-1">Project Name</label>
              <input id="form-name"
                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                v-model="form.title" type="text" required>
              <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div>
              <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Select Category</label>
              <select id="category"
                class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                v-model="form.category_id">
                <option disabled>Category</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
                </option>
              </select>
              <InputError class="mt-2" :message="form.errors.category_id" />
            </div>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-6">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label for="form-system-size" class="block text-sm font-medium text-gray-700 mb-1">System Size</label>
                  <input id="form-system-size"
                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    v-model="form.system_size" type="number" required>
                  <InputError class="mt-2" :message="form.errors.system_size" />
                </div>
                <div>
                  <label for="form-monthly-saving" class="block text-sm font-medium text-gray-700 mb-1">Monthly
                    Saving</label>
                  <input id="form-monthly-saving"
                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    v-model="form.monthly_saving" type="text" required>
                  <InputError class="mt-2" :message="form.errors.monthly_saving" />
                </div>
              </div>
              <div>
                <label for="form-description" class="block text-sm font-medium text-gray-700 mb-1">Project
                  Description</label>
                <textarea id="form-description"
                  class="w-full h-40 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                  v-model="form.content"></textarea>
                <InputError class="mt-2" :message="form.errors.content" />
              </div>
            </div>
            <div>
              <div class="flex justify-between items-center mb-2">
                <label for="file-upload" class="block text-sm font-medium text-gray-700">Image/s <span
                    class="text-xs">(3 images max)</span>
                </label>
                <InputError class="" :message="form.errors.image" />
                <div class="bg-green-500 px-3 py-1 rounded-lg text-white">
                  <input type="file" multiple @change="handleFiles" class="hidden" id="file-upload" />
                  <label for="file-upload" class="flex items-center cursor-pointer">
                    <i class="fa-solid fa-plus text-xl mr-1"></i>
                    <span class="hidden sm:inline">Add Images</span>
                  </label>
                </div>
              </div>
              <div class="bg-gray-300 rounded-lg w-full h-64 flex items-center justify-center overflow-hidden">
                <div class="flex space-x-2">
                  <div v-for="(preview, index) in imagePreviews" :key="index" class="relative">
                    <img :src="preview" class="w-32 h-32 object-cover rounded-lg mx-5" />
                    <button
                      @click="removeImage(index)"
                      class="absolute top-0 right-5 bg-red-500 h-8 w-8 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2"
                    >
                      <i class="fa-solid fa-times"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex justify-end mt-6">
            <button type="submit" class="bg-green-500 px-4 py-2 text-white rounded-lg hover:bg-green-600"
              @click="addProject">
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();
const props = defineProps({
  services: {
    type: Object,
    required: true,
  },
  categories: {
    type: Array,
    required: true,
  },
});

const form = useForm({
  title: '', 
  category_id: '',
  content: '',
  system_size: '',
  monthly_saving: '',
  image: [], // Holds new files for upload
});

const imagePreviews = ref([]);

function addProject() {
  form.post(route('admin.projects.store'), {
    preserveScroll: true,
    onSuccess: () => {
      toast.success('Project added successfully!');
      form.reset();
      imagePreviews.value = [];
    },
    onError: (errors) => {
      toast.error('Failed to add project!');
    },
  });
}

function handleFiles(event) {
  const files = Array.from(event.target.files);
  files.forEach((file) => {
    const reader = new FileReader();
    reader.onload = (e) => {
      // Check if there are already 3 images, if so, replace the last one
      if (imagePreviews.value.length === 3) {
        removeImage(2); // Remove the last image (index 2)
      }
      imagePreviews.value.push(e.target.result); // Add new image preview
      form.image.push(file); // Add file to form data
    };
    reader.readAsDataURL(file);
  });
}

function removeImage(index) {
  imagePreviews.value.splice(index, 1); // Remove preview at the given index
  form.image.splice(index, 1); // Remove corresponding file from form data
}

onMounted(() => {
  form.clearErrors();
});
</script>

<style scoped>
textarea {
  width: 100%;
  height: 100%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style>