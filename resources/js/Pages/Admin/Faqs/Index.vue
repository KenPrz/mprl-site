<template>
    <Head title="Admin: FAQs" />
    <AuthenticatedLayout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Frequently Ask Questions</h2>
      </template>
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
            <section class="p-2 flex justify-between px-5 items-center py-5">
              <input
                v-model="form.searchQuery"
                ref="searchBarRef"
                type="text"
                placeholder="Search..."
                id="searchbar"
                class="w-1/4 p-2"
                @input="handleInput"
              />
              <Link
                class="flex space-x-1 items-center bg-main-400 px-3 py-2 rounded-md text-white hover:bg-main-500"
                :href="route('admin.faqs.create')"
              >
                <i class="pi pi-plus-circle"></i>
                <span>Add Q&A</span>
              </Link>
            </section>
            <section>
              <FaqsTable :faqs="faqs.data" />
            </section>
            <section class="py-3">
              <Pagination
                :first_page_url="faqs.first_page_url"
                :from="faqs.from"
                :last_page="faqs.last_page"
                :last_page_url="faqs.last_page_url"
                :links="faqs.links"
              />
            </section>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { ref, watch, onMounted } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import Pagination from '@/Components/Pagination.vue';
  import { Head, useForm, Link } from '@inertiajs/vue3';
  import FaqsTable from './Components/FaqsTable.vue';
  
  const props = defineProps({
    faqs: {
      type: Object,
      required: true
    },
    searchQuery: {
      type: String,
      default: ''
    }
  });
  
  const form = useForm({
    searchQuery: props.searchQuery
  });
  
  const searchBarRef = ref(null);
  
  function debounce(func, wait) {
    let timeout;
    return function(...args) {
      clearTimeout(timeout);
      timeout = setTimeout(() => func.apply(this, args), wait);
    };
  }
  
  const debouncedSearch = debounce(() => {
    form.get(route('admin.faqs.index'));
  }, 600);
  
  const handleInput = () => {
    debouncedSearch();
  };
  
  onMounted(() => {
    if (searchBarRef.value) {
      searchBarRef.value.focus();
    }
  });
  </script>
  
  <style scoped>
  #searchbar {
    border: 2px solid #ccc;
    border-radius: 20px;
  }
  </style>
  