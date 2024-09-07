<script setup>
import NavBar from '@/Components/NavBar.vue';
import { Link } from '@inertiajs/vue3';
import { nextTick, onMounted, onUnmounted, ref, watch, onUpdated } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import AOS from 'aos';
import 'aos/dist/aos.css';
const props = defineProps({
  sectionScroll: {
    type: String,
    default: null
  }
});
// Scroll-related logic
const scroll = ref(0);
const isFixedTop = ref(false);
const isActive = ref(null);

const handleScroll = () => {
  scroll.value = Math.round(window.scrollY);
  updateActiveSection();
};

const updateActiveSection = () => {
  const sections = [
    'about-solar',
    'solar',
    'solar-types',
    'solar-benefits',
    'company-profile',
    'history',
    'vision-mission',
    'core-values',
    'team',
    'certificates',
    'shareholders',
    'org-chart'
  ];
  let currentSection = '';

  sections.forEach((sectionId) => {
    const sectionElement = document.getElementById(sectionId);
    if (sectionElement) {
      const { top, bottom } = sectionElement.getBoundingClientRect();
      if (top <= window.innerHeight / 2 && bottom >= window.innerHeight / 2) {
        currentSection = sectionId;
      }
    }
  });

  isActive.value = currentSection;
};

onMounted(async () => {
  window.addEventListener('scroll', handleScroll);
  if (props.sectionScroll) {
    await waitForFullPageLoad();
    scrollToSection(props.sectionScroll);
  }
  nextTick(() => {
    AOS.init();
  });
});
onUpdated(() => {
  AOS.refresh();
});
const waitForFullPageLoad = () => {
  return new Promise((resolve) => {
    if (document.readyState === 'complete') {
      resolve();
    } else {
      window.addEventListener('load', resolve);
    }
  });
};

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

watch(() => scroll.value, () => {
  if (scroll.value > 230) {
    isFixedTop.value = true;
  } else {
    isFixedTop.value = false;
  }

  // Update active section based on scroll position
  updateActiveSection();
});

// Menu and Sidebar logic
const isSolarMenuOpen = ref(false);
const isComProfOpn = ref(false);
const activeMenuItem = ref(null);
const isSidebarOpen = ref(false);
const selectedSection = ref(null);

const toggleSolarMenu = () => {
  if (!isSolarMenuOpen.value) {
    isSolarMenuOpen.value = true;
    isComProfOpn.value = false; // Close Company Profile menu
    activeMenuItem.value = 'solar';
  } else {
    isSolarMenuOpen.value = false;
    activeMenuItem.value = null;
  }
};

const toggleCompanyProfileMenu = () => {
  if (!isComProfOpn.value) {
    isComProfOpn.value = true;
    isSolarMenuOpen.value = false; // Close Solar Power menu
    activeMenuItem.value = 'companyProfile';
  } else {
    isComProfOpn.value = false;
    activeMenuItem.value = null;
  }
};

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

const scrollToSection = (targetId) => {
  selectedSection.value = targetId;
  const targetElement = document.getElementById(targetId);
  if (targetElement) {
    const offset = 150; // Adjust based on your fixed header height
    const elementPosition = targetElement.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.scrollY - offset;
    window.scrollTo({
      top: offsetPosition,
      behavior: 'smooth'
    });
  }
};

// Image preview logic
const images = ref([
  { src: 'images/about-images/cert1/1.png' },
  { src: 'images/about-images/cert1/2.png' },
  { src: 'images/about-images/cert1/3.png' },
  { src: 'images/about-images/cert2/1.png' },
  { src: 'images/about-images/cert2/2.png' },
  { src: 'images/about-images/cert2/3.png' },
  { src: 'images/about-images/cert3/1.png' },
  { src: 'images/about-images/cert3/2.png' },
  { src: 'images/about-images/cert3/3.png' },
]);

const isPreviewOpen = ref(false);
const previewImage = ref('');

const openPreview = (imageSrc) => {
  previewImage.value = imageSrc;
  isPreviewOpen.value = true;
};

const closePreview = () => {
  isPreviewOpen.value = false;
  previewImage.value = '';
};
</script>



<template>

  <Head title="About" />
  <nav :class="{
    'bg-white shadow-md fixed': scroll > 0,
    'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
  }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
    <NavBar :is_black="scroll > 0" />
  </nav>

  <div class="relative py-44 bg-cover bg-center h-auto" style="background-image: url('/images/blog-header-bg.png');">
    <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
      <div class="flex flex-col items-center justify-center space-y-6">
        <h2 class="text-4xl md:text-5xl font-semibold text-white">About Us</h2>
        <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
          <Link class="hover:underline" :href="route('welcome')">HOME</Link>
          <span class="mx-2">/</span>
          <Link class="hover:underline" :href="route('about.index')">About Us</Link>
        </div>
      </div>
    </div>
  </div>

  <main>
    <div class="flex flex-col mx-5 md:mx-20 lg:mx-20 mt-10 overflow-hidden">
      <div class="lg:flex">
        <!-- sidemenu -->
        <div class="hidden lg:block lg:w-1/4">
          <div :class="[isFixedTop ? 'fixed top-40 w-1/5' : '']">
            <div class="border-blue-600 border-l-4">
              <p class="text-xl font-bold text-blue-600 ml-5">ABOUT ONE MPRL</p>
            </div>
            <ul class="mt-4">
              <li>
                <button @click="toggleSolarMenu" :class="{
                  'bg-blue-600 text-white':
                    activeMenuItem === 'solar' ||
                    isActive === 'solar' ||
                    isActive === 'solar-types' ||
                    isActive === 'solar-benefits',
                  'bg-gray-200':
                    activeMenuItem !== 'solar' &&
                    isActive !== 'solar' &&
                    isActive !== 'solar-types' &&
                    isActive !== 'solar-benefits'
                }"
                  class="flex justify-between items-center w-full text-left py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                  <a @click.prevent="scrollToSection('about-solar')" href="#about-solar">Solar Power</a>
                  <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSolarMenuOpen }"></i>
                </button>
                <ul v-show="isSolarMenuOpen" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                  <li><a @click.prevent="scrollToSection('solar')" href="#solar" :class="{
                    'bg-blue-600 text-white': selectedSection === 'solar' || isActive === 'solar',
                    'bg-gray-200': selectedSection !== 'solar' && isActive !== 'solar'
                  }"
                      class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      How Solar Power Works?
                    </a></li>
                  <li><a @click.prevent="scrollToSection('solar-types')" href="#solar-types" :class="{
                    'bg-blue-600 text-white': selectedSection === 'solar-types' || isActive === 'solar-types',
                    'bg-gray-200': selectedSection !== 'solar-types' && isActive !== 'solar-types'
                  }"
                      class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      Types of Solar Systems
                    </a></li>
                  <li><a @click.prevent="scrollToSection('solar-benefits')" href="#solar-benefits" :class="{
                    'bg-blue-600 text-white': selectedSection === 'solar-benefits' || isActive === 'solar-benefits',
                    'bg-gray-200': selectedSection !== 'solar-benefits' && isActive !== 'solar-benefits'
                  }"
                      class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      Four Major Benefits of Solar Energy
                    </a></li>
                </ul>
              </li>
              <li class="mt-2">
                <button @click="toggleCompanyProfileMenu" :class="{
                  'bg-blue-600 text-white':
                    activeMenuItem === 'companyProfile' ||
                    isActive === 'company-profile' ||
                    isActive === 'history' ||
                    isActive === 'vision-mission' ||
                    isActive === 'core-values' ||
                    isActive === 'team',
                  'bg-gray-200':
                    activeMenuItem !== 'companyProfile' &&
                    isActive !== 'company-profile' &&
                    isActive !== 'history' &&
                    isActive !== 'vision-mission' &&
                    isActive !== 'core-values' &&
                    isActive !== 'team'
                }"
                  class="flex justify-between items-center w-full text-left py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                  <a @click.prevent="scrollToSection('company-profile')" href="#company-profile">
                    Company Profile
                  </a>
                  <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
                </button>
                <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                  <li><a @click.prevent="scrollToSection('history')" href="#history" :class="{
                    'bg-blue-600 text-white': selectedSection === 'history' || isActive === 'history',
                    'bg-gray-200': selectedSection !== 'history' && isActive !== 'history'
                  }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      History Timeline
                    </a></li>
                  <li><a @click.prevent="scrollToSection('vision-mission')" href="#vision-mission" :class="{
                    'bg-blue-600 text-white': selectedSection === 'vision-mission' || isActive === 'vision-mission',
                    'bg-gray-200': selectedSection !== 'vision-mission' && isActive !== 'vision-mission'
                  }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      Vision - Mission
                    </a></li>
                  <li><a @click.prevent="scrollToSection('core-values')" href="#core-values" :class="{
                    'bg-blue-600 text-white': selectedSection === 'core-values' || isActive === 'core-values',
                    'bg-gray-200': selectedSection !== 'core-values' && isActive !== 'core-values'
                  }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      Core Values
                    </a></li>
                  <li><a @click.prevent="scrollToSection('team')" href="#team" :class="{
                    'bg-blue-600 text-white': selectedSection === 'team' || isActive === 'team',
                    'bg-gray-200': selectedSection !== 'team' && isActive !== 'team'
                  }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                      Team - Commitment
                    </a></li>
                </ul>
              </li>
              <li class="mt-2">
                <a @click.prevent="scrollToSection('certificates')" href="#certificates" :class="{
                  'bg-blue-600 text-white': selectedSection === 'certificates' || isActive === 'certificates',
                  'bg-gray-200': selectedSection !== 'certificates' && isActive !== 'certificates'
                }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                  Certificates & Awards
                </a>
              </li>
              <li class="mt-2">
                <a @click.prevent="scrollToSection('shareholders')" href="#shareholders" :class="{
                  'bg-blue-600 text-white': selectedSection === 'shareholders' || isActive === 'shareholders',
                  'bg-gray-200': selectedSection !== 'shareholders' && isActive !== 'shareholders'
                }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                  Share Holder & Investors
                </a>
              </li>
              <li class="mt-2">
                <a @click.prevent="scrollToSection('org-chart')" href="#org-chart" :class="{
                  'bg-blue-600 text-white': selectedSection === 'org-chart' || isActive === 'org-chart',
                  'bg-gray-200': selectedSection !== 'org-chart' && isActive !== 'org-chart'
                }" class="block py-2 px-4 hover:text-white hover:bg-blue-600 rounded-md">
                  Organizational Chart
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- to make dropdown in smal scrn -->
        <div class="lg:hidden">
          <button @click="toggleSidebar"
            class="flex justify-between items-center w-full text-left py-2 px-4 bg-blue-600 text-white rounded-md">
            ABOUT ONE MPRL
            <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSidebarOpen }"></i>
          </button>
          <ul v-show="isSidebarOpen" class="mt-4 space-y-2">
            <li>
              <button @click="toggleSolarMenu"
                class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">
                <a @click.prevent="scrollToSection('about-solar')" href="#about-solar">Solar Power</a>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSolarMenuOpen }"></i>
              </button>
              <ul v-show="isSolarMenuOpen" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                <li><a @click.prevent="scrollToSection('solar')" href="#solar"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power
                    Works?</a></li>
                <li><a @click.prevent="scrollToSection('solar-types')" href="#solar-types"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar
                    Systems</a></li>
                <li><a @click.prevent="scrollToSection('solar-benefits')" href="#solar-benefits"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major
                    Benefits of Solar Energy</a></li>
              </ul>
            </li>
            <li class="mt-1">
              <button @click="toggleCompanyProfileMenu"
                class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">
                <a @click.prevent="scrollToSection('company-profile')" href="#company-profile">Company Profile</a>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
              </button>
              <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                <li><a @click.prevent="scrollToSection('history')" href="#history"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History
                    Timeline</a></li>
                <li><a @click.prevent="scrollToSection('vision-mission')" href="#vision-mission"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision -
                    Mission</a></li>
                <li><a @click.prevent="scrollToSection('core-values')" href="#core-values"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a>
                </li>
                <li><a @click.prevent="scrollToSection('team')" href="#team"
                    class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team -
                    Commitment</a></li>
              </ul>
            </li>
            <li class="mt-1"><a @click.prevent="scrollToSection('certificates')" href="#certificates"
                class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates &
                Awards</a></li>
            <li class="mt-1"><a @click.prevent="scrollToSection('shareholders')" href="#shareholders"
                class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder &
                Investors</a></li>
            <li class="mt-1"><a @click.prevent="scrollToSection('org-chart')" href="#org-chart"
                class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational
                Chart</a></li>
          </ul>
        </div>
        <!-- Content Area -->
        <div class="lg:w-3/4 lg:ml-20 mt-10 lg:mt-0 space-y-32">
          <section id="about-solar" class="space-y-32">
            <section id="solar">
              <h1 class="text-4xl font-bold text-center">Solar Power</h1>
              <div class="mt-5 text-justify text-lg" data-aos="fade-right" data-aos-once="true">
                <p>Solar energy is a clean, abundant, and renewable resource that's essential for building a sustainable
                  future. By harnessing the sun's power, we can significantly reduce greenhouse gas emissions and lessen
                  our dependence on fossil fuels.</p>
                <p class="mt-2">Ready to dive deeper into solar energy? Let's explore how solar panels work or discover
                  the different types of solar energy systems.</p>
              </div>
              <div id="solar1" class="mt-20">
                <img src="images/about-images/history.png" alt="history" data-aos="fade-left" data-aos-once="true">
              </div>
            </section>
            <section id="solar-types">
              <h1 class="text-4xl font-semibold text-blue-600 text-center">Types of Solar Power Systems</h1>
              <div class="flex flex-col lg:flex-row mt-10">
                <div class="w-full lg:w-2/3" data-aos="fade-right" data-aos-once="true">
                  <p id="residential-type" class="text-2xl font-semibold text-blue-600 tracking-wide">Residential</p>
                  <p class="mt-3 text-lg tracking-wide">
                    Residential solar power systems are designed for private homes, providing an eco-friendly way to
                    generate electricity for everyday use.
                  </p>

                  <div class="mt-10 hidden lg:block">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6">
                      <div class="space-y-6">
                        <p class="text-green-600 font-semibold text-sm">Cost Savings:</p>
                        <p class="text-green-600 font-semibold text-sm">Environmental Sustainability:</p>
                        <p class="text-green-600 font-semibold text-sm">Energy Independence:</p>
                        <p class="text-green-600 font-semibold text-sm">Hedge Against Rising Energy Costs:</p>
                      </div>
                      <div class="space-y-6">
                        <p class="text-sm">Lower monthly energy costs.</p>
                        <p class="text-sm">Reduce carbon footprint.</p>
                        <p class="text-sm">Solar panels can boost property value.</p>
                        <p class="text-sm">Less reliance on traditional power grids.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-10 lg:mt-0 ">
                  <img src="images/about-images/photo.png" alt="Residential Solar" data-aos="fade-left"
                    data-aos-once="true">
                </div>
              </div>

              <div class="flex flex-col lg:flex-row-reverse mt-10" id="commercial-type">
                <div class="w-full lg:w-2/3" data-aos="fade-left" data-aos-once="true">
                  <p class="text-2xl text-end font-semibold text-blue-600 tracking-wide">Commercial & Industrial</p>
                  <p class="mt-5 text-lg tracking-wide text-end">
                    Commercial and industrial solar power systems are designed for businesses and large-scale
                    operations, providing scalable and efficient energy solutions.
                  </p>
                  <div class="mt-10 hidden lg:block">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6">
                      <div class="space-y-6">
                        <p class="text-green-600 font-semibold text-sm">Cost Savings:</p>
                        <p class="text-green-600 font-semibold text-sm">Environmental Sustainability:</p>
                        <p class="text-green-600 font-semibold text-sm">Energy Independence:</p>
                        <p class="text-green-600 font-semibold text-sm">Hedge Against Rising Energy Costs:</p>
                      </div>
                      <div class="space-y-6">
                        <p class="text-sm">Lower monthly energy costs.</p>
                        <p class="text-sm">Reduce carbon footprint.</p>
                        <p class="text-sm">Solar panels can boost property value.</p>
                        <p class="text-sm">Less reliance on traditional power grids.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-10 lg:mt-0 ">
                  <img src="images/about-images/comm.png" alt="Commercial Solar" data-aos="fade-right"
                    data-aos-once="true">
                </div>
              </div>
            </section>
            <section id="solar-benefits">
              <h1 class="text-4xl font-semibold text-blue-600 text-center">Four Major Benefits of</h1>
              <p class="text-lg mt-2 text-blue-600 text-center">Solar Energy</p>
              <p class="mt-10">Adopting solar power for your home brings numerous advantages, including significant
                savings on electricity bills and a
                reduction in your carbon footprint.
                Additionally, solar power offers long-term financial benefits and contributes to environmental
                sustainability.
                Discover the many rewards of transitioning to solar energy!
              </p>
              <div class="mt-10">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-3 justify-center">
                  <div class="flex bg-blue-500 rounded-lg p-3" data-aos="fade-right" data-aos-once="true">
                    <img src="images/about-images/envi.png" alt="" class="hidden lg:block mt-2 h-24 w-24 m-5">
                    <div class="ml-3 mt-5 text-white text-justify m-5">
                      <p class="text-lg font-semibold">Environmental Protection</p>
                      <p class="text-sm mt-3">Solar energy is a clean and renewable resource that produces no greenhouse
                        gas emissions,
                        helping to mitigate climate change and reduce air pollution.
                      </p>
                    </div>
                  </div>
                  <div class="flex bg-blue-500 rounded-lg p-3" data-aos="fade-left" data-aos-once="true">
                    <img src="images/about-images/cost.png" alt="" class="hidden lg:block mt-2 h-24 w-24 m-5">
                    <div class="ml-3 mt-5 text-white text-justify m-5">
                      <p class="text-lg font-semibold">Cost Savings</p>
                      <p class="text-sm mt-3">Solar panels can significantly reduce electricity bills over time,
                        providing long-term financial benefits.
                      </p>
                    </div>
                  </div>
                  <div class="flex bg-blue-500 rounded-lg p-3" data-aos="fade-right" data-aos-once="true">
                    <img src="images/about-images/enerEnv.png" alt="" class="hidden lg:block mt-2 h-24 w-24 m-5">
                    <div class="ml-3 mt-5 text-white text-justify m-5">
                      <p class="text-lg font-semibold">Energy Independence</p>
                      <p class="text-sm mt-3">
                        By generating your own electricity, you become less reliant on traditional power grids and
                        fluctuating energy costs.
                      </p>
                    </div>
                  </div>
                  <div class="flex bg-blue-500 rounded-lg p-3" data-aos="fade-left" data-aos-once="true">
                    <img src="images/about-images/prop.png" alt="" class="hidden lg:block mt-2 h-24 w-24 m-5">
                    <div class="ml-3 mt-5 text-white text-justify m-5">
                      <p class="text-lg font-semibold">Increased Property Value</p>
                      <p class="text-sm mt-3">
                        Homes with solar panels often have higher market values, making it a worthwhile investment.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </section>
          <section id="company-profile" class="space-y-32">
            <section id="intro" data-aos="fade-right" data-aos-once="true">
              <h1 class="text-4xl font-bold">
                Empowering Sustainability: ONE MPRL Solar's Commitment to Renewable Energy
              </h1>
              <div class="flex flex-col md:flex-row md:space-x-8 mt-5">
                <div class="w-full md:w-3/5">
                  <p class="mt-4 text-justify text-lg">
                    Since its establishment in 2013, ONE MPRL Solar Power Corporation
                    (formerly MPRL Solar Panel Trading and Construction Services)
                    has a proven track record of delivering high-quality solar technology.
                    We prioritize dependable, efficient, and sustainable power solutions for our clients.
                    This commitment to quality extends to using only premium solar panels and components from trusted
                    manufacturers,
                    guaranteeing the longevity and optimal performance of your solar system.
                  </p>
                  <p class="mt-4 text-justify text-lg">
                    At ONE MPRL Solar, we believe that solar energy is the future of energy production.
                    Solar power is clean, renewable and sustainable, making it an ideal energy source for the future.
                    By harnessing the power of the sun, we can reduce our dependence on fossil fuels and help combat
                    climate change.
                  </p>
                </div>
                <div class="w-full md:w-2/5 mt-4 md:mt-0">
                  <img src="/images/mprl-projects/received_418454461188399.jpeg" alt="about-us"
                    class="mt-5 w-full h-48 rounded-lg object-cover">
                  <img src="/images/mprl-projects/received_1114681562925648.jpeg" alt="about-us"
                    class="mt-2 w-full lg:h-24 h-48 rounded-lg object-cover">
                  <img src="/images/mprl-projects/received_463160816647010.jpeg" alt="about-us"
                    class="mt-2 w-full lg:h-24 h-48 rounded-lg object-cover">
                </div>
              </div>
            </section>
            <section id="history">
              <h1 class="text-4xl font-semibold text-blue-600 text-center">History Timeline</h1>
              <h4 class="text-xl font-semibold text-center tracking-wide mt-3">Milestones in Solar Innovation</h4>

              <div class="relative flex flex-col items-center w-full max-w-xl md:max-w-4xl mt-10">
                <!-- Timeline Line -->
                <div
                  class="line-container absolute w-1 bg-blue-600 h-full top-0 left-1/2 transform -translate-x-1/2 z-0">
                </div>

                <!-- Timeline Left -->
                <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                  data-aos-once="true">
                  <div class="w-full md:w-1/2 flex pr-0 md:pr-5 z-10 md:z-0">
                    <div class="bg-white w-full lg:text-start text-center px-4 space-y-2">
                      <h1 class="font-bold italic text-main-500 text-4xl">2011</h1>
                      <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                        Visionary Beginnings in the Bicol Region
                      </h4>
                      <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                        <p class="text-white text-sm text-justify">
                          Founded in 2011 as MPRL Solar Panel Trading and Construction Services,
                          ONEMPRL Solarpower Corporation embarked on its journey with an audacious vision to
                          revolutionize solar energy solutions in the Bicol Region.
                          From the outset, the company was committed to delivering cutting-edge solar power innovations.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 hidden md:block"></div>
                  <div class="w-0 md:w-1/2"></div>
                </div>

                <!-- Timeline Item Right -->
                <div class="flex w-full flex-col md:flex-row justify-end items-center mb-8" data-aos="fade-left"
                  data-aos-once="true">
                  <div class="w-0 md:w-1/2"></div>
                  <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 hidden md:block"></div>
                  <div class="bg-white w-full md:w-1/2 flex justify-start pl-0 md:pl-5">
                    <div class="w-full lg:text-start text-center px-4 space-y-2">
                      <h1 class="font-bold italic  text-main-500 text-4xl">2015</h1>
                      <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                        Rapid Expansion into NCR and Calabarzon
                      </h4>
                      <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                        <p class="text-white text-sm text-justify">
                          By 2015, the company had rapidly expanded its footprint to the National Capital Region (NCR)
                          and Calabarzon, quickly earning a reputation as a leading provider of solar energy solutions.
                          This growth marked the beginning of MPRL's rise as a formidable player in the industry,
                          consistently exceeding customer expectations with its innovative approach.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Timeline Left -->
                <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                  data-aos-once="true">
                  <div class="w-full md:w-1/2 flex pr-0 md:pr-5 z-10 md:z-0">
                    <div class="bg-white w-full lg:text-start text-center px-4 space-y-2">
                      <h1 class="font-bold italic text-main-500 text-4xl">2021</h1>
                      <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                        Global Expertise and Unmatched Quality Assurance
                      </h4>
                      <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                        <p class="text-white text-sm text-justify">
                          By 2021, MPRL had amassed invaluable global experience, which fueled its capacity
                          to deliver superior, world-class solar solutions. With a steadfast commitment to
                          excellence, the company reinforced its reputation for unparalleled quality and
                          reliability, securing its place as a trailblazer in the solar energy landscape.
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 hidden md:block"></div>
                  <div class="w-0 md:w-1/2"></div>
                </div>

                <!-- Timeline Item Right -->
                <div class="flex w-full flex-col md:flex-row justify-end items-center mb-8" data-aos="fade-left"
                  data-aos-once="true">
                  <div class="w-0 md:w-1/2"></div>
                  <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 hidden md:block"></div>
                  <div class="bg-white w-full md:w-1/2 flex justify-start pl-0 md:pl-5">
                    <div class="w-full lg:text-start text-center px-4 space-y-2">
                      <h1 class="font-bold italic  text-main-500 text-4xl">2025</h1>
                      <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                        Strategic Evolution to ONEMPRL Solarpower Corporation
                      </h4>
                      <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                        <p class="text-white text-sm text-justify">
                          In 2025, the company underwent a strategic transformation,
                          emerging as ONEMPRL Solarpower Corporation. This rebranding signifies a bold,
                          unified approach to the company’s mission of dominating the solar energy sector,
                          embodying its relentless pursuit of innovation, leadership, and sustainable
                          energy solutions for a brighter future.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section id="vision-mission">
              <h1 class="text-4xl font-semibold text-blue-600 text-center">Vision - Mission</h1>
              <div class="flex flex-col md:flex-row md:space-x-8 mt-10">
                <div class="w-full lg:w-3/5 md:w-1/2 space-y-10">
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-3xl font-medium text-blue-600 tracking-wide">
                      MISSION
                    </h1>
                    <p class="mt-2 text-justify text-lg">
                      To accelerate solar energy adoption by providing innovative, reliable, and cost-effective
                      solutions.
                      We aim to reduce carbon emissions, promote sustainability,
                      and empower individuals and businesses to harness solar power for a greener future.
                    </p>
                  </div>
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-3xl text-blue-600 font-medium tracking-wide">
                      VISION
                    </h1>
                    <p class="mt-2 text-justify text-lg">
                      To be a global leader in solar energy solutions, recognized for excellence, innovation,
                      and sustainability. We envision a world powered by clean, renewable solar energy,
                      making it accessible and affordable for all through continuous innovation and collaboration.
                    </p>
                  </div>
                </div>
                <div class="lg:w-2/5 md:w-1/2 hidden md:block mt-4 md:mt-0">
                  <img src="images/svg/2.svg" alt="about-us" class="w-full h-full object-cover">
                </div>
              </div>
            </section>
            <section id="core-values">
              <h1 class="text-4xl font-semibold text-blue-600 text-center">Core Values</h1>
              <div class="justify-start flex space-x-5 mt-10">
                <div class="w-1/2 space-y-5">
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Customer Satisfaction</h1>
                    <p class="mt-1">We deliver exceptional service and exceed expectations.</p>
                  </div>
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Quality</h1>
                    <p class="mt-1">We ensure the highest standards in all our products and services.</p>
                  </div>
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Responsibility</h1>
                    <p class="mt-1">We promote sustainability and ethical practices.</p>
                  </div>
                </div>
                <div class="w-1/2 space-y-5">
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Honesty and Integrity</h1>
                    <p class="mt-1">We build trust through transparency and fairness.</p>
                  </div>
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Respect</h1>
                    <p class="mt-1">We value every individual and foster a collaborative environment.</p>
                  </div>
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-xl font-medium text-main-500 tracking-wide">Reliability</h1>
                    <p class="mt-1">We provide dependable and consistent solutions.</p>
                  </div>
                </div>
              </div>
            </section>
            <section id="team">
              <div class="justify-start flex space-x-5 mt-10 mb-10">
                <div class="lg:w-1/2 space-y-5">
                  <div>
                    <img src="images/svg/23.svg" alt="about-us" class="w-full h-full object-cover">
                  </div>
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-2xl font-semibold text-blue-600 text-center">Our Commitment</h1>
                    <p class="mt-5 text-justify text-lg">
                      We are committed to providing exceptional customer service and support,
                      from initial consultation to post-installation maintenance.
                      Our dedication to promoting sustainability and environmental responsibility
                      through the use of clean, renewable energy is unwavering.
                    </p>
                  </div>
                </div>
                <div class="lg:w-1/2 space-y-5">
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-2xl font-semibold text-blue-600 text-center">Our Team</h1>
                    <p class="mt-5 text-justify text-lg">
                      Our team consists of highly skilled engineers, technicians,
                      and solar energy experts with years of experience in the industry.
                      We use only the highest quality solar panels and components from trusted
                      manufacturers to ensure the reliability and efficiency of our systems.
                    </p>
                  </div>
                  <div>
                    <img src="images/svg/24.svg" alt="about-us" class="w-full h-full object-cover">
                  </div>
                </div>
              </div>
            </section>
          </section>
          <section class="space-y-32">
            <div id="certificates">
              <h1 class="text-4xl font-bold text-center">Certificates & Awards</h1>
              <p class="mt-10">ONE MPRL Solar Power Corporation is recognized for its exceptional contributions to
                sustainable energy solutions.
                The company has earned numerous certificates and awards, including:
              </p>
              <div class="mt-10" data-aos="fade-left" data-aos-once="true">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 justify-center">
                  <img v-for="(image, index) in images" :key="index" :src="image.src" :alt="'Image ' + (index + 1)"
                    class="w-48 shadow-lg cursor-pointer" @click="openPreview(image.src)" />
                </div>
                <div v-if="isPreviewOpen"
                  class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                  <div class="relative">
                    <img :src="previewImage" alt="Preview" class="max-w-full max-h-full" />
                    <button @click="closePreview"
                      class="absolute top-0 right-1 text-black text-md font-semibold">X</button>
                  </div>
                </div>
              </div>
            </div>
            <div id="shareholders">
              <h1 class="text-4xl font-bold text-center">Share Holders & Investors</h1>
              <p class="mt-10">ONE MPRL Solar Power Corporation values the critical role of its shareholders and
                investors in driving the company’s growth and success in the renewable energy sector. The company is
                committed to maintaining transparent,
                productive relationships with its financial supporters.
              </p>
              <div class="">
                <img src="images/about-images/Shareholder.png" alt="Shareholder"
                  class="mt-5 w-full h-full rounded-lg object-cover"
                  @click="openPreview('images/about-images/Shareholder.png')" />
                <div v-if="isPreviewOpen"
                  class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
                  @click.self="closePreview">
                  <div class="relative">
                    <!-- Preview Image -->
                    <img :src="previewImage" alt="Preview" class="max-w-full max-h-screen rounded-md" />
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section id="org-chart">
            <div class="text-4xl font-bold text-center ">Organizational Structure</div>
            <div data-aos="fade-right" data-aos-once="true">
              <p class="mt-10 text-justify text-lg">
                ONE MPRL Solar Power Corporation operates with a well-defined
                organizational structure designed to foster efficiency, innovation,
                and collaborative efforts across all levels of the company.
              </p>
            </div>
            <img src="images/company-profile/Organizational.png" alt="Organizational chart"
              class="mt-5 w-full h-full rounded-lg object-cover"
              @click="openPreview('images/company-profile/Organizational.png')" />
            <div v-if="isPreviewOpen" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
              @click.self="closePreview">
              <div class="relative">
                <!-- Preview Image -->
                <img :src="previewImage" alt="Preview" class="max-w-full max-h-screen rounded-md" />
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
.rotate-180 {
  transform: rotate(180deg);
}

.line-container {
  width: 5px;
  /* or 1px if you prefer */
  background: radial-gradient(circle, rgb(20, 35, 84) 50%, transparent 51%) repeat-y;
  background-size: 5px 10px;
  /* Adjust as needed for spacing */
  position: absolute;
  /* Ensure it's positioned correctly */
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  z-index: -1;
  /* Ensures it is behind all other elements */
}
</style>
