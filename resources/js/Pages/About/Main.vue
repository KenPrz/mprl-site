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

const handleScroll = () => {
  scroll.value = Math.round(window.scrollY);
  updateActiveSection();
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
});

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

  <div class="relative py-44 bg-cover bg-bottom h-auto" style="background-image: url('/images/about-us-bg.jpg');">
    <div class="absolute inset-0 bg-blue-500 bg-opacity-80 flex flex-col justify-center items-center text-center">
      <div class="flex flex-col items-center justify-center space-y-6">
        <h2 class="text-4xl md:text-5xl font-semibold text-white">About Us</h2>
        <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
          <Link class="hover:underline" :href="route('welcome')">Home</Link>
          <span class="mx-2">/</span>
          <Link class="hover:underline" :href="route('about.index')">About Us</Link>
        </div>
      </div>
    </div>
  </div>

  <main>
    <div class="px-10 md:px-32 flex flex-col items-center justify-center">
      <div class="self-center my-24 w-full max-w-[1346px] max-md:mt-10">
        <!-- 1st Section -->
        <section>
          <div class="flex flex-col md:flex-row gap-24 max-md:gap-0">
            <div data-aos-once="true" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500" class="flex flex-col w-full md:w-6/12 max-md:ml-0">
              <p class="text-sm text-main-500">OUR STORY</p>
              <h1 class="text-2xl font-semibold text-blue-500">Dedicated to Delivering Solar Solutions with Cutting-Edge Technology.</h1>
              <div class="mt-12 leading-relaxed text-sm text-blue-500 text-justify max-md:mt-5 max-md:max-w-full gap-y-6 flex flex-col">
                <div>
                  <b>ONE MPRL Solar Power Corporation</b> is dedicated to delivering cutting-edge solar solutions that meet the unique needs of our clients.
                </div>
                <div>
                  From residential installations to large-scale commercial projects, our team of experts works closely with our clients to design and implement custom solar systems.
                </div>
                <div>
                  Our commitment to innovation and customer satisfaction has earned us a reputation as a leading provider of solar power solutions in the industry.
                </div>
              </div> 
            </div>          
            <div data-aos-once="true" data-aos="fade-right" data-aos-duration="500" data-aos-delay="500" class="w-full md:w-7/12 md:mt-0 max-md:ml-0 flex flex-col items-center text-start">
              <img 
                src="/images/mprl-projects/received_418454461188399.jpeg" alt="our-story"
                class="mt-5 w-full h-auto object-cover rounded"
              >
            </div>
          </div>
        </section>
        <!-- 2nd Section -->
        <section>
          <div class="mt-16 flex flex-col md:flex-row gap-28 max-md:gap-0">
            <div class="flex flex-col w-full w-full max-md:ml-0">
              <h1 data-aos-once="true" data-aos="fade-right" data-aos-duration="500" class="text-2xl font-semibold text-blue-500">OUR COMPANY’S VISION & MISSION</h1>
              <div data-aos-once="true" data-aos="fade-left" data-aos-duration="500" class="mt-14 text-blue-500 max-md:mt-5 max-md:max-w-full flex flex-col md:flex-row md:gap-48">
                <!-- Vision Section -->
                <div class="flex-1">
                  <h1 class="text-lg font-semibold">VISION</h1>
                  <p class="mt-2 text-justify text-sm">
                    To be a global leader in solar energy solutions, recognized for excellence, innovation, and sustainability.
                  </p>
                </div>
              
                <!-- Mission Section -->
                <div class="flex-1 mt-8 md:mt-0">
                  <h1 class="text-lg font-semibold">MISSION</h1>
                  <p class="mt-2 text-justify text-sm">
                    To accelerate solar energy adoption by providing innovative, reliable, and cost-effective solutions.
                  </p>
                </div>
              </div>             
            </div>
          </div>
        </section>
        <!-- 3rd Section -->
        <section>
          <div class="mt-24 flex flex-col md:flex-row gap-28 max-md:gap-0">
            <div class="flex flex-col w-full w-full max-md:ml-0 gap-y-8">
              <h1 data-aos-once="true" data-aos="fade-right" data-aos-duration="500" class="text-3xl font-semibold text-blue-500">OUR CORE VALUES</h1>
              <!-- Core Values First Row -->
              <div class="mt-6 text-blue-500 max-md:max-w-full flex flex-col md:flex-row md:gap-52 gap-10">
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Customer Satisfaction</h1>
                    <p class="mt-1">We go beyond expectations, delivering outstanding service that ensures our customers’ success.</p>
                  </div>
                </div>
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Honesty and Integrity</h1>
                    <p class="mt-1">We build trust through transparency and fairness.</p>
                  </div>
                </div>
              </div>
              <!-- Core Values Second Row -->
              <div class="max-md:max-w-full flex flex-col md:flex-row md:gap-52 text-blue-500 gap-10">
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Quality</h1>
                    <p class="mt-1">We ensure the highest standards in all our products and services.</p>
                  </div>
                </div>
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Respect</h1>
                    <p class="mt-1">We value every individual and foster a collaborative environment.</p>
                  </div>
                </div>
              </div>
              <!-- Core Values Third Row -->
              <div class="max-md:max-w-full flex flex-col md:flex-row md:gap-52 text-blue-500 gap-10">
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-right" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Responsibility</h1>
                    <p class="mt-1">We promote sustainability and ethical practices.</p>
                  </div>
                </div>
                <div class="flex-1 space-y-5 text-sm">
                  <div data-aos="fade-left" data-aos-once="true">
                    <h1 class="text-lg text-main-500 font-semibold">Reliability</h1>
                    <p class="mt-1">We provide dependable and consistent solutions.</p>
                  </div>
                </div>
              </div>   
            </div>
          </div>
        </section>
        <!-- 4th Section -->
        <section>
          <div class="mt-32 flex flex-col md:flex-row gap-28 max-md:gap-0 md:px-20">
            <div class="flex flex-col w-full w-full max-md:ml-0 gap-y-8">
              <h1 data-aos-once="true" data-aos="fade-up" data-aos-duration="500" class="text-3xl font-semibold text-blue-500 text-center">
                HISTORY TIMELINE
              </h1>
              <div class="mt-20 text-blue-500 max-md:mt-5 max-md:max-w-full flex flex-col md:flex-row md:gap-20 gap-14">
                <div class="flex-1 text-sm">
                  <div data-aos="fade-up" data-aos-once="true">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-5 px-8 items-center">
                      <h1 class="text-4xl text-main-500 font-bold">2011</h1>
                      <h2 class="text-xl text-blue-500 font-semibold text-center md:text-start">VISIONARY <br> BEGINNINGS</h2>
                    </div>
                    <p class="py-16 px-8 bg-blue-500 text-white font-light mt-8 text-justify rounded">
                      ONE MPRL Solar Power Corporation's journey began in 2011 as MPRL Solar Panel Trading and Construction Services. 
                      With a bold vision to transform solar energy in the Bicol Region, the company was dedicated to delivering 
                      innovative solutions from the start.
                    </p>
                  </div>
                </div>
                <div class="flex-1 text-sm">
                  <div data-aos="fade-up" data-aos-once="true">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-5 px-8 items-center">
                      <h1 class="text-4xl text-main-500 font-bold">2013</h1>
                      <h2 class="text-xl text-blue-500 font-semibold text-center md:text-start">ESTABLISHMENT <br>IN BICOL REGION</h2>
                    </div>
                    <p class="py-16 px-8 bg-blue-500 text-white font-light mt-8 text-justify rounded">
                      ONE MPRL Solar Power Corporation's journey began in 2011 as MPRL Solar Panel Trading and Construction Services. 
                      With a bold vision to transform solar energy in the Bicol Region, the company was dedicated to delivering 
                      innovative solutions from the start.
                    </p>
                  </div>
                </div>
              </div>
              <div class="mt-6 text-blue-500 max-md:mt-5 max-md:max-w-full flex flex-col md:flex-row md:gap-20 gap-14">
                <!-- 2015 Section -->
                <div class="flex-1 text-sm flex flex-col">
                  <div data-aos="fade-up" data-aos-once="true" class="flex flex-col h-full">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-5 px-2 items-center">
                      <h1 class="text-4xl text-main-500 font-bold">2015</h1>
                      <h2 class="text-xl text-blue-500 font-semibold text-center md:text-start">
                        RAPID EXPANSION INTO <br> NCR AND CALABARZON
                      </h2>
                    </div>
                    <p class="py-16 px-8 bg-blue-500 text-white font-light mt-8 text-justify rounded flex-grow">
                      By 2015, the company had rapidly expanded its footprint to the National Capital Region (NCR) and Calabarzon, 
                      quickly earning a reputation as a leading provider of solar energy solutions. This growth marked the beginning 
                      of MPRL's rise as a formidable player in the industry, consistently exceeding customer expectations with its 
                      innovative approach.
                    </p>
                  </div>
                </div>
              
                <!-- 2021 Section -->
                <div class="flex-1 text-sm flex flex-col">
                  <div data-aos="fade-up" data-aos-once="true" class="flex flex-col h-full">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-5 px-2 items-center">
                      <h1 class="text-4xl text-main-500 font-bold">2021</h1>
                      <h2 class="text-xl text-blue-500 font-semibold text-center md:text-start">
                        GLOBAL EXPERTISE AND <br> UNMATCHED QUALITY ASSURANCE
                      </h2>
                    </div>
                    <p class="py-16 px-8 bg-blue-500 text-white font-light mt-8 text-justify rounded flex-grow">
                      By 2021, MPRL had amassed invaluable global experience, which fueled its capacity to deliver superior, world-class 
                      solar solutions. With a steadfast commitment to excellence, the company reinforced its reputation for unparalleled 
                      quality and reliability, securing its place as a trailblazer in the solar energy landscape.
                    </p>
                  </div>
                </div>
              </div>
              
              <div class="mt-6 text-blue-500 max-md:mt-5 max-md:max-w-full flex flex-col md:flex-row md:gap-20 gap-14">
                <div class="flex-1 text-sm">
                  <div data-aos="fade-up" data-aos-once="true">
                    <div class="flex flex-col md:flex-row gap-2 md:gap-5 px-2 items-center md:mt-3">
                      <h1 class="text-4xl text-main-500 font-bold">2025</h1>
                      <h2 class="text-xl text-blue-500 font-semibold text-center md:text-start">
                        STRATEGIC EVOLUTION <br> TO ONEMPRL SOLAR POWER CORPORATION
                      </h2>
                    </div>
                    <p class="py-16 px-8 bg-blue-500 text-white font-light mt-8 md:mt-12 text-justify rounded">
                      In 2025, the company underwent a strategic transformation, emerging as ONEMPRL Solarpower Corporation. 
                      This rebranding signifies a bold, unified approach to the company’s mission of dominating the solar 
                      energy sector, embodying its relentless pursuit of innovation, 
                      leadership, and sustainable energy solutions for a brighter future.
                    </p>
                  </div>
                </div>
                <div class="flex-1 text-sm">
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- 5th Section -->
        <section>
          <div class="mt-32 flex flex-col md:flex-row gap-28 max-md:gap-0 md:px-20">
            <div class="flex flex-col w-full w-full max-md:ml-0 gap-y-8">
              <h1 data-aos-once="true" data-aos="fade-up" data-aos-duration="500" class="text-3xl font-semibold text-blue-500 text-center">
                CERTIFICATES & AWARDS
              </h1>
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
          </div>
        </section>
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
