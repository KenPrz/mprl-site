<template>
    <Head title="Admin: Faqs" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Frequently Ask Questions</h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-start">
            <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.faqs.index')">
              <i class="fa-solid fa-arrow-left px-4"></i><span>Go Back</span>
            </Link>
          </div>
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
            <div class="w-full bg-white rounded-md p-4 shadow-md space-y-2">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="col-span-1">
                  <label for="form-name" class="block text-lg font-medium text-gray-700">Question</label>
                  <input id="form-name" class="w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" v-model="form.question" type="text" required>
                  <InputError class="mt-2" :message="form.errors.question" />
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
                    <div class="mt-5">
                      <label for="form-description" class="block text-lg font-medium text-gray-700">Answer</label>
                      <Editor v-model="form.answer" />
                      <InputError class="mt-2" :message="form.errors.answer" />
                    </div>
                </div>
                <div class="flex justify-end mt-5">
                  <button type="" class="bg-green-500 px-3 py-1 text-white rounded-lg" @click="updateFaq">Update</button>
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
  import Editor from '@/Components/Editor.vue';
  
  const props = defineProps({
    faqs: {
      type: Object,
      required: true
    },
    categories: {
      type: Array,
      required: true
    }
  });
  
  const form = useForm({
  question: props.faqs.question,
  category_id: props.faqs.category_id,
  answer: props.faqs.answer,
});
function updateFaq(){
    form.patch(route('admin.faqs.update', props.faqs.id));
}
  
  onMounted(() => {
    form.clearErrors();
  });
</script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  