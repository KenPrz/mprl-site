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
  <NavBar/>

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
    <div class="container mx-auto px-4 md:px-8 lg:px-14 py-10 max-md:mt-10">
      <!-- 1st Section -->
      <section class="py-10">
        <div class="flex flex-col-reverse md:flex-row md:items-center md:justify-between gap-8 md:gap-12 lg:gap-16">
          <!-- Text Content -->
          <div data-aos-once="true" data-aos="fade-left" data-aos-duration="500" data-aos-delay="500"
            class="flex flex-col w-full md:w-1/2">
            <!-- Subheading -->
            <h2 class="text-base text-main-500 font-semibold mb-2">
              OUR STORY
            </h2>
            
            <!-- Main heading -->
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-blue-500 mb-6 leading-tight">
              Dedicated to Delivering Solar Solutions with Cutting-Edge Technology.
            </h1>
            
            <!-- Paragraphs -->
            <div class="space-y-6 text-blue-500">
              <div class="text-base md:text-lg leading-relaxed">
                <b>ONE MPRL Solar Power Corporation</b> is dedicated to delivering cutting-edge solar solutions that meet the unique needs of our clients.
              </div>
              <div class="text-base md:text-lg leading-relaxed">
                From residential installations to large-scale commercial projects, our team of experts works closely with our clients to design and implement custom solar systems.
              </div>
              <div class="text-base md:text-lg leading-relaxed">
                Our commitment to innovation and customer satisfaction has earned us a reputation as a leading provider of solar power solutions in the industry.
              </div>
            </div>
          </div>

          <!-- Image -->
          <div data-aos-once="true" data-aos="fade-right" data-aos-duration="500" data-aos-delay="500"
            class="w-full md:w-1/2 flex items-center justify-center">
            <img
              src="/images/mprl-projects/received_418454461188399.jpeg"
              alt="our-story"
              class="w-full h-auto object-cover rounded-lg shadow-md"
            >
          </div>
        </div>
      </section>
        <!-- Vision & Mission Section -->
      <section class="py-10">
        <div class="flex flex-col gap-8 md:gap-12">
          <!-- Heading -->
          <h2 data-aos-once="true" data-aos="fade-right" data-aos-duration="500" 
              class="text-2xl md:text-3xl lg:text-4xl font-bold text-blue-500">
            OUR COMPANY'S VISION & MISSION
          </h2>

          <!-- Vision & Mission Container -->
          <div class="flex flex-col md:flex-row gap-8 md:gap-16">
            <!-- Vision Section -->
            <div data-aos-once="true" data-aos="fade-up" data-aos-duration="500" 
                class="flex-1 p-6 rounded-lg bg-gradient-to-br from-blue-50 to-white border border-blue-100 shadow-lg">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <h3 class="text-lg md:text-xl font-semibold text-main-500">VISION</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                To be a global leader in solar energy solutions, recognized for excellence, innovation, and sustainability.
              </p>
            </div>
          
            <!-- Mission Section -->
            <div data-aos-once="true" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100"
                class="flex-1 p-6 rounded-lg bg-gradient-to-br from-blue-50 to-white border border-blue-100 shadow-lg">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3 class="text-lg md:text-xl font-semibold text-main-500">MISSION</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                To accelerate solar energy adoption by providing innovative, reliable, and cost-effective solutions.
              </p>
            </div>
          </div>             
        </div>
      </section>

      <!-- Core Values Section -->
      <section class="py-10">
        <div class="flex flex-col gap-12">
          <!-- Heading -->
          <h2 data-aos-once="true" data-aos="fade-right" data-aos-duration="500" 
              class="text-2xl md:text-3xl lg:text-4xl font-bold text-blue-500">
            OUR CORE VALUES
          </h2>

          <!-- Core Values Grid -->
          <div class="grid md:grid-cols-3 gap-6 md:gap-8">
            <!-- Customer Satisfaction -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="0"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Customer Satisfaction</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We go beyond expectations, delivering outstanding service that ensures our customers' success.
              </p>
            </div>

            <!-- Honesty and Integrity -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="100"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Honesty and Integrity</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We build trust through transparency and fairness.
              </p>
            </div>

            <!-- Quality -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="200"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Quality</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We ensure the highest standards in all our products and services.
              </p>
            </div>

            <!-- Respect -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="300"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Respect</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We value every individual and foster a collaborative environment.
              </p>
            </div>

            <!-- Responsibility -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="400"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Responsibility</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We promote sustainability and ethical practices.
              </p>
            </div>

            <!-- Reliability -->
            <div data-aos="fade-up" data-aos-once="true" data-aos-delay="500"
                class="group p-6 rounded-lg bg-white border border-blue-100 shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
              <div class="flex items-center gap-3 mb-4">
                <svg class="w-8 h-8 text-main-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <h3 class="text-lg font-semibold text-main-500">Reliability</h3>
              </div>
              <p class="text-base md:text-lg leading-relaxed text-blue-500">
                We provide dependable and consistent solutions.
              </p>
            </div>
          </div>
        </div>
      </section>
        <!-- 4th Section -->
        <section>
          <div class="flex flex-col md:flex-row gap-28 max-md:gap-0 md:px-20">
            <div class="flex flex-col w-full max-md:ml-0 gap-y-8 my-12">
              <h1 data-aos-once="true" data-aos="fade-up" data-aos-duration="500" 
                class="text-center text-2xl md:text-3xl lg:text-4xl font-bold text-blue-500">
                HISTORY TIMELINE
              </h1>
              <div class="container mx-auto p-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 auto-rows-fr">
                  <!-- 2011 Section -->
                  <div class="milestone-card flex flex-col" data-aos="fade-up" data-aos-once="true">
                    <div class="flex items-center gap-4 px-4 h-20">
                      <h2 class="text-4xl font-bold text-main-500 shrink-0">2011</h2>
                      <h3 class="text-xl font-semibold text-blue-500 text-left">
                        VISIONARY <br> BEGINNINGS
                      </h3>
                    </div>
                    <div class="flex-grow mt-4">
                      <p class="p-8 bg-blue-500 text-white font-light rounded text-justify h-full">
                        ONE MPRL Solar Power Corporation's journey began in 2011 as ONEMPRL Solar Power Corporation and Construction Services. 
                        With a bold vision to transform solar energy in the Bicol Region, the company was dedicated to delivering 
                        innovative solutions from the start.
                      </p>
                    </div>
                  </div>

                  <!-- 2013 Section -->
                  <div class="milestone-card flex flex-col" data-aos="fade-up" data-aos-once="true">
                    <div class="flex items-center gap-4 px-4 h-20">
                      <h2 class="text-4xl font-bold text-main-500 shrink-0">2013</h2>
                      <h3 class="text-xl font-semibold text-blue-500 text-left">
                        ESTABLISHMENT <br> IN BICOL REGION
                      </h3>
                    </div>
                    <div class="flex-grow mt-4">
                      <p class="p-8 bg-blue-500 text-white font-light rounded text-justify h-full">
                        ONE MPRL Solar Power Corporation's journey began in 2011 as ONEMPRL Solar Power Corporation and Construction Services. 
                        With a bold vision to transform solar energy in the Bicol Region, the company was dedicated to delivering 
                        innovative solutions from the start.
                      </p>
                    </div>
                  </div>

                  <!-- 2015 Section -->
                  <div class="milestone-card flex flex-col" data-aos="fade-up" data-aos-once="true">
                    <div class="flex items-center gap-4 px-4 h-20">
                      <h2 class="text-4xl font-bold text-main-500 shrink-0">2015</h2>
                      <h3 class="text-xl font-semibold text-blue-500 text-left">
                        RAPID EXPANSION INTO <br> NCR AND CALABARZON
                      </h3>
                    </div>
                    <div class="flex-grow mt-4">
                      <p class="p-8 bg-blue-500 text-white font-light rounded text-justify h-full">
                        By 2015, the company had rapidly expanded its footprint to the National Capital Region (NCR) and Calabarzon, 
                        quickly earning a reputation as a leading provider of solar energy solutions. This growth marked the beginning 
                        of MPRL's rise as a formidable player in the industry, consistently exceeding customer expectations with its 
                        innovative approach.
                      </p>
                    </div>
                  </div>

                  <!-- 2021 Section -->
                  <div class="milestone-card flex flex-col" data-aos="fade-up" data-aos-once="true">
                    <div class="flex items-center gap-4 px-4 h-20">
                      <h2 class="text-4xl font-bold text-main-500 shrink-0">2021</h2>
                      <h3 class="text-xl font-semibold text-blue-500 text-left">
                        GLOBAL EXPERTISE AND <br> UNMATCHED QUALITY ASSURANCE
                      </h3>
                    </div>
                    <div class="flex-grow mt-4">
                      <p class="p-8 bg-blue-500 text-white font-light rounded text-justify h-full">
                        By 2021, MPRL had amassed invaluable global experience, which fueled its capacity to deliver superior, world-class 
                        solar solutions. With a steadfast commitment to excellence, the company reinforced its reputation for unparalleled 
                        quality and reliability, securing its place as a trailblazer in the solar energy landscape.
                      </p>
                    </div>
                  </div>

                  <!-- 2025 Section -->
                  <div class="milestone-card flex flex-col" data-aos="fade-up" data-aos-once="true">
                    <div class="flex items-center gap-4 px-4 h-20">
                      <h2 class="text-4xl font-bold text-main-500 shrink-0">2025</h2>
                      <h3 class="text-xl font-semibold text-blue-500 text-left">
                        STRATEGIC EVOLUTION <br> TO ONEMPRL SOLAR POWER CORPORATION
                      </h3>
                    </div>
                    <div class="flex-grow mt-4">
                      <p class="p-8 bg-blue-500 text-white font-light rounded text-justify h-full">
                        In 2025, the company underwent a strategic transformation, emerging as ONEMPRL Solarpower Corporation. 
                        This rebranding signifies a bold, unified approach to the company's mission of dominating the solar 
                        energy sector, embodying its relentless pursuit of innovation, leadership, and sustainable energy solutions 
                        for a brighter future.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- History Timeline Section -->
        <section>
          <div class="flex flex-col md:flex-row gap-28 max-md:gap-0 md:px-20">
            <div class="flex flex-col w-full max-md:ml-0 gap-y-8">
              <!-- Section Title -->
              <h1 
                class="text-center text-2xl md:text-3xl lg:text-4xl font-bold text-blue-500"
                data-aos="fade-up"
                data-aos-once="true"
                data-aos-duration="500"
              >
                CERTIFICATES & AWARDS
              </h1>

              <!-- Image Grid Container -->
              <div 
                class="mt-10 flex justify-center"
                data-aos="fade-left"
                data-aos-once="true"
              >
                <!-- Image Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-16 place-items-center">
                  <img 
                    v-for="(image, index) in images"
                    :key="index"
                    :src="image.src"
                    :alt="'Image ' + (index + 1)"
                    class="w-48 shadow-lg cursor-pointer"
                    @click="openPreview(image.src)"
                  />
                </div>

                <!-- Image Preview Modal -->
                <div 
                  v-if="isPreviewOpen"
                  class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75"
                >
                  <div class="relative">
                    <img 
                      :src="previewImage"
                      alt="Preview"
                      class="max-w-full max-h-full"
                    />
                    <button 
                      @click="closePreview"
                      class="absolute top-0 right-1 text-black text-md font-semibold"
                    >
                      X
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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
