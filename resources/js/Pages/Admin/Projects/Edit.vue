<template>
  <Head title="Admin: Projects" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Project</h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-5">
        <div class="flex justify-start">
          <Link class="bg-main-400 px-4 py-2 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.projects.index')">
            <i class="fa-solid fa-arrow-left mr-2"></i><span>Go Back</span>
          </Link>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
          <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div class="col-span-1">
                <label for="form-name" class="block text-lg font-medium text-gray-700">Project Name</label>
                <input id="form-name" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.title" type="text" required>
                <InputError class="mt-2" :message="form.errors.title" />
              </div>
              <div class="col-span-1">
                <label for="form-category" class="block text-lg font-medium text-gray-700">Select Category</label>
                <select id="category" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.category_id">
                  <option disabled>Category</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                </select>
                <InputError class="mt-2" :message="form.errors.category_id" />
              </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 gap-4">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-1">
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-5">
                    <div class="col-span-1">
                      <label for="form-system-size" class="block text-lg font-medium text-gray-700">System Size</label>
                      <input id="form-system-size" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.system_size" type="number" required>
                      <InputError class="mt-2" :message="form.errors.system_size" />
                    </div>
                    <div class="col-span-1">
                      <label for="form-monthly-saving" class="block text-lg font-medium text-gray-700">Monthly Saving</label>
                      <input id="form-monthly-saving" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.monthly_saving" type="text" required>
                      <InputError class="mt-2" :message="form.errors.monthly_saving" />
                    </div>
                  </div>
                  <div class="mt-5">
                    <label for="form-description" class="block text-lg font-medium text-gray-700">Project Description</label>
                    <textarea class="w-full h-40 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.content"></textarea>
                    <InputError class="mt-2" :message="form.errors.content" />
                  </div>
                </div>
                <div class="col-span-1">
                  <div class="flex justify-between items-center">
                    <label for="file-upload" class="block text-lg font-medium text-gray-700 p-3">
                      Image/s <span class="text-sm">(3 images max, 1.5 MB per image)</span>
                    </label>
                    <InputError class="" :message="form.errors.image" />
                    <div class="flex justify-between items-center mt-2">
                      <div class="bg-main-500 hover:bg-main-600 px-2 py-1 rounded-lg text-white">
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
                      <div
                        v-for="(preview, index) in imagePreviews"
                        :key="index"
                        class="relative"
                      >
                        <img
                          :src="preview.id ? `/storage/${preview.images}` : preview.images"
                          class="w-32 h-32 object-cover rounded-lg mx-5"
                        />
                        <button
                          @click="removeImage(index)"
                          class="absolute top-0 right-5 h-8 w-8 bg-red-500 text-white rounded-full p-1 transform translate-x-1/2 -translate-y-1/2"
                        >
                          <i class="fa-solid fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex justify-end mt-5">
                <button type="button" class="bg-main-500 hover:bg-main-600 p-3 text-white rounded-lg" @click="updateProject">Update</button>
              </div>
            </div>
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
import { useFileSizeCheck } from '@/composables/useFileSizeCheck';

const toast = useToast();
const { checkFileSize } = useFileSizeCheck(1.5); // 1.5 MB limit

const props = defineProps({
  project: {
    type: Object,
    required: true,
  },
  categories: {
    type: Array,
    required: true,
  },
});

const form = useForm({
  title: props.project.title || '',
  category_id: props.project.category_id || '',
  system_size: props.project.system_size || '',
  monthly_saving: props.project.monthly_saving || '',
  content: props.project.content || '',
  image: [], // Holds new files for upload
  images_to_delete: [], // Holds IDs of images to delete
});

const imagePreviews = ref([]);

// Load existing images into imagePreviews
onMounted(() => {
  if (props.project.images && props.project.images.length > 0) {
    imagePreviews.value = props.project.images.map((img) => ({
      images: img.images, // Image path from server
      id: img.id, // Image ID for deletion
    }));
  }
  form.clearErrors();
});

function updateProject() {
  form.post(route('admin.projects.update', props.project.id), {
    preserveScroll: true,
    onSuccess: () => {
      toast.success('Project updated successfully!');
      form.image = []; // Clear new uploads after successful update
      form.images_to_delete = []; // Clear deletion list
    },
    onError: (errors) => {
      toast.error('Failed to update project. Please check the form and try again.');
      console.error(errors);
    },
  });
}

function handleFiles(event) {
  const files = Array.from(event.target.files);
  files.forEach((file) => {
    if (checkFileSize(file)) {
      const reader = new FileReader();
      reader.onload = (e) => {
        if (imagePreviews.value.length === 3) {
          removeImage(2);
        }
        imagePreviews.value.push({
          images: e.target.result,
          id: null
        });
        form.image.push(file);
      };
      reader.readAsDataURL(file);
    } else {
      toast.error(`File "${file.name}" exceeds the 1.5 MB size limit.`);
    }
  });
}

function removeImage(index) {
  const image = imagePreviews.value[index];
  if (image.id) {
    form.images_to_delete.push(image.id); // Mark image for deletion
    toast.info('Existing image marked for deletion. Save changes to confirm.');
  } else {
    // Remove new image from form.image array
    const newImageIndex = form.image.findIndex((file, i) => i === index - imagePreviews.value.filter(img => img.id).length);
    if (newImageIndex !== -1) {
      form.image.splice(newImageIndex, 1);
    }
    toast.info('New image removed.');
  }
  imagePreviews.value.splice(index, 1);
}

</script>

<style scoped>
textarea {
  width: 100%;
  height: 90%;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none;
}
</style>