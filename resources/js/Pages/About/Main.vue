<script setup>
import NavBar from '@/Components/NavBar.vue';
import { Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';

// Scroll-related logic
const scroll = ref(0);

const handleScroll = () => {
  scroll.value = Math.round(window.scrollY);
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});

// Menu and Sidebar logic
const isSolarMenuOpen = ref(false);
const isComProfOpn = ref(false);
const activeMenuItem = ref(null);

const openSolarMenu = () => {
  isSolarMenuOpen.value = !isSolarMenuOpen.value;
  activeMenuItem.value = 'solar';
};

const openCompanyProfile = () => {
  isComProfOpn.value = !isComProfOpn.value;
  activeMenuItem.value = 'companyProfile';
};

const isSidebarOpen = ref(false);
const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
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
  <nav
    :class="{
      'bg-white shadow-md fixed': scroll > 0,
      'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }"
    class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out"
  >
    <NavBar :is_black="scroll > 0" />
  </nav>

  <div
    class="relative py-44 bg-cover bg-center h-auto"
    style="background-image: url('/images/blog-header-bg.png');"
  >
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
    <div class="flex flex-col mx-5 md:mx-20 lg:mx-20 mt-10">
      <div class="lg:flex">
        <!-- sidemenu -->
        <div class="hidden lg:block lg:w-2/6">
            <div class="pl-5">
            <div class="border-blue-600 border-l-4">
                <p class="text-xl font-bold text-blue-600 ml-5">ABOUT ONE MPRL</p>
            </div>
            <ul class="mt-4">
                <li>
                <button
                    @click="openSolarMenu"
                    class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                >
                    Solar Power
                    <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSolarMenuOpen }"></i>
                </button>
                <ul v-show="isSolarMenuOpen" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                    <li><a href="#solar1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power Works?</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar Systems</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major Benefits of Solar Energy</a></li>
                </ul>
                </li>
                <li class="mt-1">
                <button
                    @click="openCompanyProfile"
                    class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                >
                    Company Profile
                    <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
                </button>
                <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History Timeline</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision - Mission</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team - Commitment</a></li>
                </ul>
                </li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates & Awards</a></li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder & Investors</a></li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational Chart</a></li>
            </ul>
            </div>
        </div>
      <!-- to make dropdown -->
        <div class="lg:hidden">
            <button
            @click="toggleSidebar"
            class="flex justify-between items-center w-full text-left py-2 px-4 bg-blue-600 text-white rounded-md"
            >
            ABOUT ONE MPRL
            <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSidebarOpen }"></i>
            </button>
            <ul v-show="isSidebarOpen" class="mt-4 space-y-2">
                <li>
                    <button
                    @click="openSolarMenu"
                    class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                    >
                    Solar Power
                    <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isSolarMenuOpen }"></i>
                    </button>
                    <ul v-show="isSolarMenuOpen" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                    <li><a href="#solar1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power Works?</a></li>
                    <li><a href="#typeofsolar" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar Systems</a></li>
                    <li><a href="#benefits" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major Benefits of Solar Energy</a></li>
                    </ul>
                </li>
                <li class="mt-1">
                    <button
                    @click="openCompanyProfile"
                    class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                    >
                    Company Profile
                    <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
                    </button>
                    <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History Timeline</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision - Mission</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team - Commitment</a></li>
                    </ul>
                </li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates & Awards</a></li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder & Investors</a></li>
                <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational Chart</a></li>
            </ul>
        </div>

      <!-- Content Area -->
        <div class="lg:w-3/4 lg:ml-20 mt-10 lg:mt-0">
            <div>
                <div class="text-2xl font-bold text-blue-600 text-center">Solar Power</div>
                <div class="mt-5">
                    <p>Solar energy is a clean, abundant, and renewable resource that's essential for building a sustainable future. By harnessing the sun's power, we can significantly reduce greenhouse gas emissions and lessen our dependence on fossil fuels.</p>
                    <p class="mt-2">Ready to dive deeper into solar energy? Let's explore how solar panels work or discover the different types of solar energy systems.</p>
                </div>
                <div id="solar1" class="mt-20">
                    <img src="images/about-images/history.png" alt="hisdtou">
                </div>
            </div>
            <div class="mt-32" id="typeofsolar">
                    <div class="text-2xl font-bold text-blue-600 text-center">Types of Solar Systems</div>
                    <div class="flex flex-col lg:flex-row mt-10">
                        <div class="w-full lg:w-2/3">
                            <p class="text-xl font-semibold text-blue-600 tracking-wide">Residential</p>
                            <p class="mt-5 text-sm tracking-wide">
                                Residential solar power systems are designed for private homes, providing an eco-friendly way to generate electricity for everyday use.
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
                            <img src="images/about-images/photo.png" alt="Residential Solar">
                        </div>
                    </div>

                    <div class="flex flex-col lg:flex-row-reverse mt-10">
                        <div class="w-full lg:w-2/3">
                            <p class="text-xl text-end font-semibold text-blue-600 tracking-wide">Commercial & Industrial</p>
                            <p class="mt-5 text-sm tracking-wide text-end">
                                Commercial and industrial solar power systems are designed for businesses and large-scale operations, providing scalable and efficient energy solutions.
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
                            <img src="images/about-images/comm.png" alt="Commercial Solar">
                        </div>
                    </div>
            </div>
            <div class="mt-32" id="benefits">
                <div class="text-2xl font-bold text-blue-600 text-center">Four Major Benefits of</div>
                <p class="text-lg  text-blue-600 text-center">Solar Energy</p>
                <p class="mt-10">Adopting solar power for your home brings numerous advantages, including significant savings on electricity bills and a 
                    reduction in your carbon footprint. 
                    Additionally, solar power offers long-term financial benefits and contributes to environmental sustainability. 
                    Discover the many rewards of transitioning to solar energy!
                </p>
                <div class="mt-10">
                    <div class="lg:flex justify-center gap-3">
                        <div class="w-1/2">
                                <div class="bg-blue-500 flex text-white rounded-lg mt-4" style="width: 400px; height: 200px;">
                                    <img src="images/about-images/envi.png" alt="" class="hidden lg:block h-24 ml-3 mt-3">
                                    <div class="mt-4 ml-2 p-4 flex flex-col justify-between">
                                        <p class="text-xl">Environmental Protection</p>
                                        <p class="text-sm mt-2">
                                            Solar energy is a clean and renewable resource that produces no greenhouse gas emissions, 
                                            helping to mitigate climate change and reduce air pollution.
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-blue-500 flex text-white rounded-lg mt-4" style="width: 400px; height: 200px;">
                                    <img src="images/about-images/enerEnv.png" alt="" class="hidden lg:block h-24 ml-3 mt-5">
                                    <div class="mt-4 ml-2 p-4 flex flex-col">
                                        <p class="text-xl">Energy Independence</p>
                                        <p class="text-sm mt-2">
                                            By generating your own electricity, you become less reliant on traditional power grids and fluctuating energy costs.
                                        </p>
                                    </div>
                                </div>
                        </div>
                        <div class="w-1/2">
                            <div class="w-1/2">
                                <div class="bg-blue-500 flex text-white rounded-lg mt-4" style="width: 400px; height: 200px;">
                                    <img src="images/about-images/cost.png" alt="" class="hidden lg:block h-24 ml-3 mt-5">
                                    <div class="mt-4 ml-2 p-4 flex flex-col">
                                        <p class="text-xl">Cost Savings</p>
                                        <p class="text-sm mt-2">
                                            Solar panels can significantly reduce electricity bills over time, 
                                            providing long-term financial benefits.
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-blue-500 flex text-white rounded-lg mt-4" style="width: 400px; height: 200px;">
                                    <img src="images/about-images/prop.png" alt="" class="hidden lg:block h-24 ml-3 mt-5">
                                    <div class="mt-4 ml-2 p-4 flex flex-col">
                                        <p class="text-xl">Increased Property Value</p>
                                        <p class="text-sm mt-2">
                                            Homes with solar panels often have higher market values, making it a worthwhile investment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-32" id="benefits">
                <div class="text-2xl font-bold text-blue-600 text-center">Certificates & Awards</div>
                <p class="mt-10">ONE MPRL Solar Power Corporation is recognized for its exceptional contributions to sustainable energy solutions. 
                    The company has earned numerous certificates and awards, including:
                </p>
                <div class="mt-10">
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 justify-center">
                        <img
                        v-for="(image, index) in images"
                        :key="index"
                        :src="image.src"
                        :alt="'Image ' + (index + 1)"
                        class="w-48 shadow-lg cursor-pointer"
                        @click="openPreview(image.src)"
                        />
                    </div>
                    <div v-if="isPreviewOpen" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                    <div class="relative">
                        <img :src="previewImage" alt="Preview" class="max-w-full max-h-full" />
                        <button @click="closePreview" class="absolute top-0 right-1 text-black text-md font-semibold">X</button>
                    </div>
                    </div>
                </div>
            </div>
            <div class="mt-32" id="benefits">
                <div class="text-2xl font-bold text-blue-600 text-center">Share Holder & Investors</div>
                <p class="mt-10">ONE MPRL Solar Power Corporation values the critical role of its shareholders and investors in driving the company’s growth and success in the renewable energy sector. The company is committed to maintaining transparent,
                     productive relationships with its financial supporters.
                </p>
                <div class="mt-10">
                    <img src="images/about-images/Shareholder.png" alt="">
                </div>
            </div>
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
</style>
