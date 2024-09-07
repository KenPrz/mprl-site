<script setup>
import NavBar from '@/Components/NavBar.vue';
import { onMounted, onUnmounted, ref, computed } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import ServicesCategory from '@/Pages/Services/Components/ServicesCategory.vue';
import ProjectTabs from '@/Pages/Services/Components/ProjectTabs.vue';
import FaqTabs from '@/Pages/Services/Components/FaqTabs.vue';

const scroll = ref(0);
const isSidebarOpen = ref(false);
const selectedCategory = ref(null);
const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};
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
  projectCategory: {
    type: Array,
    default: () => [],
    required: true,
  },
  projects: {
    type: Array,
    default: () => [],
    required: true,
  },
  faqs: {
    type: Array,
    default: () => [],
    required: true,
  },
});

// Computed property to get the first category
const firstCategory = computed(() => {
  return props.servicesCategory.length > 0 ? props.servicesCategory[0] : null;
});
const secondCategory = computed(() => {
  return props.servicesCategory.length > 0 ? props.servicesCategory[1] : null;
});
const thirdCategory = computed(() => {
  return props.servicesCategory.length > 0 ? props.servicesCategory[2] : null;
});
const fourthCategory = computed(() => {
  return props.servicesCategory.length > 0 ? props.servicesCategory[3] : null;
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
        <div class="hidden  lg:flex lg:items-center lg:w-1/4">
          <div class="lg:block border-blue-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0"
          :class="{
              'fixed mb-60': scroll > 3,
              'border-blue-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0 ': scroll === 0,
            }">
            <div class="text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4">
              <p class="ml-5 font-bold">SERVICES</p>
            </div>
            <div class="mt-2 sm:mt-0 lg:mt-2 w-full">
              <ServicesCategory :servicesCategory="servicesCategory" :is_black="scroll > 0" />
            </div>
          </div>
        </div>
        <!-- dropdown for smalle screen -->
        <div class="lg:hidden">
          <button
            @click="toggleSidebar"
            class="flex justify-between items-center w-full text-left py-2 px-4 bg-blue-600 text-white rounded-md"
            >
            SERVICES
            <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSidebarOpen }"></i>
            </button>
            <ul v-show="isSidebarOpen" class="mt-4 space-y-2">
              <div class="mt-2 ml-3">
                  <ul class="list-none p-0">
                      <li v-for="service in servicesCategory" :key="service.id">
                        <a :href="'#' + service.service_category">
                            <button 
                                @click="selectCategory(service.id)" 
                                class="w-5/6 text-start rounded-lg shadow-md px-4 py-2 m-1 bg-gray-200 hover:bg-blue-600 hover:text-white"
                                :class="{'bg-blue-600 text-white': selectedCategory === service.id}">
                                {{ service.service_category }}
                            </button>
                        </a>
                      </li>
                  </ul>
              </div>
            </ul>
        </div>
        <!-- services -->
        <div class="lg:w-3/4 ">
          <div class="flex justify-center ">
            <div class="flex flex-col md:flex-row">
              <div class="w-full md:w-1/2 p-4">
                <p class="text-3xl font-semibold tracking-wider">
                  POWER YOUR HOME WITH SUSTAINABLE SOLAR ENERGY
                </p>
                <p class="text-lg mt-5 text-justify">
                  We provide environmentally friendly and cost-effective options for powering your home or business
                  through our comprehensive services. Specializing in high-quality solar power systems,
                  we ensure reliable and sustainable energy solutions designed to meet your specific requirements.
                </p>
              </div>
              <div class="w-full md:w-1/2 mt-2">
                <img src="/images/house.png" alt="" class="w-full h-full object-cover">
              </div>
            </div>
          </div>
          <section :id="firstCategory.service_category">
            <div class="mt-20">
              <div class="flex justify-center">
                  <p v-if="firstCategory" class="text-3xl font-bold">
                      {{ firstCategory.service_category }}
                  </p>
              </div>
              <!-- Display services here -->
              <div>
                  <!-- Display solar system 1 -->
                  <h3 class="font-semibold text-xl mt-5 mb-5">Off-Grid Solar System</h3>
                  <div>
                    <img src="images/solar-system/solar_power_1.png" alt="" class="">
                  </div>
                  <div>
                    <p class="text-md mt-10 tracking-widest text-green-600 font-bold">Energy Independence</p>
                    <p class="text-md mt-2 tracking-widest">Live completely off the grid! This system uses batteries to store solar energy for nighttime and cloudy days.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">More Equipment</p>
                    <p class="text-md mt-2 tracking-widest">Requires batteries, inverters, and a larger initial investment.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Maintenance Needed</p>
                    <p class="text-md mt-2 tracking-widest">Requires batteries, inverters, and a larger initial investment.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Good for</p>
                    <p class="text-md mt-2 tracking-widest">Remote locations or those seeking complete energy independence, even during outages.</p>
                  </div>
              </div>
              <div class="mt-20">
                  <!-- Display solar system 1 -->
                  <h3 class="font-semibold text-xl mt-5 mb-5">Grid-Tied Solar System</h3>
                  <div>
                    <img src="images/solar-system/solar_power_2.png" alt="" class="">
                  </div>
                  <div>
                    <p class="text-md mt-10 tracking-widest text-green-600 font-bold">Simple and Cost-Effective</p>
                    <p class="text-md mt-2 tracking-widest">This is the most common setup. It connects your solar panels to the power grid.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Sell Surplus Power</p>
                    <p class="text-md mt-2 tracking-widest">Sunshine powers your home during the day, and extra electricity gets sent back to the grid, often earning you credits on your bill.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">No Backup Power</p>
                    <p class="text-md mt-2 tracking-widest">If the grid goes down, so does your solar power.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Good for</p>
                    <p class="text-md mt-2 tracking-widest">People who want to save on electricity bills and help the environment, with reliable grid access.</p>
                  </div>
              </div>
              <div class="mt-20">
                  <!-- Display solar system 3 -->
                  <h3 class="font-semibold text-xl mt-5 mb-5">Hybrid Solar System</h3>
                  <div>
                    <img src="images/solar-system/solar_power_3.png" alt="" class="">
                  </div>
                  <div>
                    <p class="text-md mt-10 tracking-widest text-green-600 font-bold">Best of Both Worlds</p>
                    <p class="text-md mt-2 tracking-widest">Combines grid-tie with battery backup. Use solar first, then grid power if needed, and store excess for later.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Increased Self-Reliance</p>
                    <p class="text-md mt-2 tracking-widest">Provides backup power during outages and lets you maximize solar use.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">More Complex System</p>
                    <p class="text-md mt-2 tracking-widest">Higher upfront cost than grid-tied, but less than fully off-grid.</p>
                  </div>
                  <div>
                    <p class="text-md mt-6 tracking-widest text-green-600 font-bold">Good for</p>
                    <p class="text-md mt-2 tracking-widest">People who want significant solar savings with some grid security and backup power for outages. </p>
                  </div>
              </div>
            </div>
          </section>
          <section class="mt-5 bg-no-repeat" style="background-image: url('images/bg-service.png'); background-size: 500px; background-position: left bottom;">
            <div class="mt-20" :id="secondCategory.service_category">
              <div class="flex justify-center">
                <p v-if="secondCategory" class="text-3xl font-bold">
                  {{ secondCategory.service_category }}
                </p>
              </div>
              <div class="flex justify-center text-center mt-10">
                <p class="text-xl">
                  ONE MPRL is providing a solution for a ground mount solar photovoltaic power plant, 
                  encompassing the full spectrum of services from initial site assessment and design to installation and 
                  ongoing maintenance, ensuring optimal performance and efficiency.
                </p>
              </div>
            </div>
            <div class="container mx-auto">
              <div class="flex flex-wrap justify-center -mx-2 sm:p-10">
                <div v-for="service in services" :key="service.id" class="w-full sm:w-1/2 lg:w-1/3 p-2">
                  <div v-if="service.category_id === 2 || service.category_id === '2'" class="flex flex-col h-full border rounded-lg shadow-md p-5 bg-white bg-opacity-90">
                    <div class="flex justify-center">
                      <img :src="`/storage/${service.image}`" :alt="service.name" class="rounded-t-lg">
                    </div>
                    <h3 class="font-bold text-lg mt-4 mb-5 text-center text-blue-500 leading-5">{{ service.name }}</h3>
                    <div
                      class="text-sm ml-5 flex-grow"
                      :style="{ whiteSpace: 'pre-wrap'}"
                    >
                      {{ service.description }}
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          </section>
          <section>
            <div class="mt-20">
              <p class="text-center text-lg text-blue-500">Our Completed Solar Power Solutions</p>
              <p v-if="thirdCategory" class="text-3xl font-bold text-center" :id="thirdCategory.service_category" >
                {{ thirdCategory.service_category }}
              </p>
            </div>
            <div class="mt-10">
              <ProjectTabs :projectCategory="projectCategory" :services="services" :projects="projects"/>
            </div>
          </section>
          <section class="mt-20">
              <div class="flex justify-center">
                <p v-if="fourthCategory" class="text-3xl font-bold" :id="fourthCategory.service_category" >
                  {{ fourthCategory.service_category }}
                </p>
              </div>
              <div class="mt-10">
              <FaqTabs :projectCategory="projectCategory" :services="services" :faqs="faqs"/>
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
