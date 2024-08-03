<script setup>
import NavBar from '@/Components/NavBar.vue';
import Accordion from '@/Components/Accordion.vue';
import { onMounted, onUnmounted, ref, computed } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import ServicesCategory from '@/Pages/Services/Components/ServicesCategory.vue';

const scroll = ref(0);
const props = defineProps({
  servicesCategory: {
    type: Array,
    default: () => [],
    required: true,
  },
  services: {
    type: Array,
    default: () => [],
    required: true,
  },
});

// Computed property to get the first category
const firstCategory = computed(() => {
  return props.servicesCategory.length > 0 ? props.servicesCategory[0] : null;
});

const handleScroll = () => {
  scroll.value = Math.round(window.scrollY);
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>



<template>
  <Head title="Services" />
  <nav
    :class="{
      'bg-white shadow-md fixed': scroll > 0,
      'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0,
    }"
    class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out"
  >
    <NavBar :is_black="scroll > 0" />
  </nav>
  <section>
    <div
      class="relative py-44 bg-cover bg-center h-auto"
      style="background-image: url('/images/blog-header-bg.png');"
    >
      <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
        <div class="flex flex-col items-center justify-center space-y-6">
          <h2 class="text-4xl md:text-5xl font-semibold text-white">Services</h2>
          <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
            <Link class="hover:underline" :href="route('welcome')">HOME</Link>
            <span class="mx-2">/</span>
            <Link class="hover:underline" :href="route('services.index')">Services</Link>
          </div>
        </div>
      </div>
    </div>
  </section>
  <main>
    <div class="flex flex-col lg:ml-20 mt-10">
      <div class="grid grid-cols-1 gap-4 p-4 lg:flex lg:gap-0 lg:items-start lg:mr-20">
        <!-- categories -->
        <div class="lg:flex lg:items-center lg:w-2/5">
          <div class="border-blue-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0">
            <div class="text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4">
              <p class="ml-5 font-bold">SERVICES</p>
            </div>
            <div class="mt-2 sm:mt-0 lg:mt-2 w-full">
              <ServicesCategory :servicesCategory="servicesCategory" />
            </div>
          </div>
        </div>
        <!-- services -->
        <div class="lg:w-3/4 ">
          <div class="flex justify-center ">
            <div class="flex flex-col md:flex-row">
              <div class="w-full md:w-1/2 p-4">
                <p class="text-3xl font-semibold tracking-wider">
                  POWER YOUR HOME WITH SUSTAINABLE SOLAR ENERGY
                </p>
                <p class="text-md font-poppins mt-5">
                  We provide environmentally friendly and cost-effective options for powering your home or business
                  through our comprehensive services. Specializing in high-quality solar power systems,
                  we ensure reliable and sustainable energy solutions designed to meet your specific requirements.
                </p>
              </div>
              <div class="w-full md:w-1/2 mt-2">
                <img src="/images/house.png" alt="House" class="w-full h-full object-cover">
              </div>
            </div>
          </div>
          <section>
            <div class="mt-20">
              <div class="flex justify-center">
                  <p v-if="firstCategory" class="text-3xl font-bold">
                  {{ firstCategory.service_category }}
                  </p>
              </div>
              <!-- Display services here -->
              <div v-for="service in services" :key="service.id" class="mt-20">
                <h3 class="font-semibold text-xl mt-5 mb-5">{{ service.name }}</h3>
                <div>
                  <img :src="`/storage/${service.image}`" :alt="service.name">
                </div>
                <p class="text-md mt-10 tracking-widest " v-html="service.description"></p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
  <Footer />
</template>

<style scoped>
</style>
