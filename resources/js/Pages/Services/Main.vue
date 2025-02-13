<script setup>
import NavBar from '@/Components/NavBar.vue';
import { onMounted, onUnmounted, ref, computed, watch} from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import ServicesCategory from '@/Pages/Services/Components/ServicesCategory.vue';
import ProjectTabs from '@/Pages/Services/Components/ProjectTabs.vue';
import FaqTabs from '@/Pages/Services/Components/FaqTabs.vue';

const scroll = ref(0);
const isSidebarOpen = ref(false);
const selectedCategory = ref(null);
const isFixedTop = ref(false);
const isActive = ref(null);
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
  updateActiveSection();
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

const updateActiveSection = () => {
  const sections = props.servicesCategory.map((category) => category.service_category);
  let currentSection = '';
  sections.forEach((sectionId) => {
    const sectionElement = document.getElementById(sectionId);
    if (sectionElement) {
      const { top, bottom } = sectionElement.getBoundingClientRect();
      // Adjust the criteria as needed
      if (top <= window.innerHeight / 2 && bottom >= window.innerHeight / 2) {
        currentSection = sectionId;
      }
    }
  });

  isActive.value = currentSection;
  selectedCategory.value = currentSection;
};


watch(() => scroll.value, () => {
  if (scroll.value > 230) {
    isFixedTop.value = true;
  } else {
    isFixedTop.value = false;
  }
  updateActiveSection();
});
</script>

<template>
  <Head title="Services" />
  <NavBar/>
  <div class="relative py-44 bg-cover bg-bottom h-auto" style="background-image: url('/images/about-us-bg.jpg');">
    <div class="absolute inset-0 bg-blue-500 bg-opacity-80 flex flex-col justify-center items-center text-center">
      <div class="flex flex-col items-center justify-center space-y-6">
        <h2 class="text-4xl md:text-5xl font-semibold text-white">Services</h2>
        <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
          <Link class="hover:underline" :href="route('welcome')">Home</Link>
          <span class="mx-2">/</span>
          <Link class="hover:underline" :href="route('services.index')">Services</Link>
        </div>
      </div>
    </div>
  </div>
  <main>
    <div class="container mx-auto px-4 md:px-8 lg:px-14 py-10">
      <div class="grid grid-cols-1 gap-4 p-4 lg:flex lg:gap-0 lg:items-start">
        <!-- services -->
        <div class="lg:full space-y-5">
            <div>
              <div class="flex justify-start text-blue-500">
                <p v-if="secondCategory" class="text-3xl text-blue-500 font-bold font-poppins">
                  {{ secondCategory.service_category }}
                </p>
              </div>
            </div>
            <div class="mt-2 font-poppins">
              <div class="flex flex-col lg:flex-row lg:justify-between lg:space-x-10">
                <div data-aos="fade-right">
                  <img src="images/services-images/solar_panel_installation.png" alt="" class="w-full">
                  <div class="px-10 text-blue-500 space-y-5">
                    <p class="text-xl font-bold">Solar Panel Services</p>
                    <p>
                      We offer a wide range of solar panel services including installation, maintenance, and repair services.
                    </p>
                    <div class="space-y-2 text-sm">
                      <p class="font-bold">
                        Installation Process:
                      </p>
                      <ul class="list-disc list-inside space-y-1">
                        <li>Consultation & Site Assessment (Ocular)</li>
                        <li>System Design</li>
                        <li>Proposal & Agreement</li>
                        <li>Permitting & Approvals</li>
                        <li>Installation</li>
                        <li>Inspections & Testing</li>
                        <li>Monitoring, Maintenance and Repair</li>
                        <li>Customer Support</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div data-aos="fade-right">
                  <img src="images/services-images/construction_services.png" alt="" clas="w-full">
                  <div class="px-10 text-blue-500 space-y-5">
                    <p class="text-xl font-bold">Construction Services</p>
                    <p>
                      We deliver high-quality and eco-friendly construction projects
                    </p>
                    <div class="space-y-2 text-sm">
                      <p class="font-bold">
                        Installation Process:
                      </p>
                      <ul class="list-disc list-inside space-y-1">
                        <li>Project Planning & Feasibility</li>
                        <li>Design & Engineering</li>
                        <li>Permitting & Compliance</li>
                        <li>Final Inspection & Handover</li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div data-aos="fade-right">
                  <img src="images/services-images/consultation_services.png" alt="" clas="w-full">
                  <div class="px-10 text-blue-500 space-y-5">
                    <p class="text-xl font-bold">Consultation Services</p>
                    <p>
                      We provide expert energy and construction consulting for personalized solutions that meet your sustainability goals.
                    </p>
                    <div class="space-y-2 text-sm">
                      <p class="font-bold">
                        Installation Process:
                      </p>
                      <ul class="list-disc list-inside space-y-1">
                        <li>Needs Assesment</li>
                        <li>Feasibility & ROI Analysis</li>
                        <li>Regulatory Guidance</li>
                        <li>Implementations Support</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          <section :id="thirdCategory.service_category">
            <div class="mt-20 space-y-10">
              <p v-if="thirdCategory" class="text-3xl text-blue-500 font-bold font-poppins">
                {{ thirdCategory.service_category }}
              </p>
              <p class="text-lg lg:w-1/2 font-poppins text-blue-500">Explore a currated selection of our successful projects, highlighting our expertise and commitment to delivering top-notch solutions.</p>
            </div>
            <div class="mt-10" data-aos="fade-left">
              <ProjectTabs :projectCategory="projectCategory" :services="services" :projects="projects"/>
            </div>
          </section>
          <section class="mt-10 text-blue-500" :id="fourthCategory.service_category">
              <div class="flex justify-center">
                <p v-if="fourthCategory" class="text-3xl font-bold">
                  {{ fourthCategory.service_category }}
                </p>
              </div>
              <div class="mt-10" data-aos="fade-up">
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
