<script setup>
import NavBar from '@/Components/NavBar.vue';
import { Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';

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

const isSolarMenuOpen = ref(false);
const isComProfOpn = ref(false);
const activeMenuItem = ref(null);
const isSidebarOpen = ref(false);
const selectedSection = ref(null);

const openSolarMenu = () => {
  isSolarMenuOpen.value = !isSolarMenuOpen.value;
  activeMenuItem.value = 'solar';
};

const openCompanyProfile = () => {
  isComProfOpn.value = !isComProfOpn.value;
  activeMenuItem.value = 'companyProfile';
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
                  <li><a @click.prevent="scrollToSection('solar1')" href="#solar1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power Works?</a></li>
                  <li><a @click.prevent="scrollToSection('solar2')" href="#solar2" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar Systems</a></li>
                  <li><a @click.prevent="scrollToSection('solar3')" href="#solar3" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major Benefits of Solar Energy</a></li>
                </ul>
              </li>
              <li class="mt-1">
                <button
                  @click="openCompanyProfile"
                  class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                >
                  <a @click.prevent="scrollToSection('profile')" href="#profile">Company Profile</a>
                  <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
                </button>
                <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                  <li><a @click.prevent="scrollToSection('profile1')" href="#profile1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History Timeline</a></li>
                  <li><a @click.prevent="scrollToSection('profile2')" href="#profile2" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision - Mission</a></li>
                  <li><a @click.prevent="scrollToSection('profile3')" href="#profile3" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a></li>
                  <li><a @click.prevent="scrollToSection('profile4')" href="#profile4" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team - Commitment</a></li>
                </ul>
              </li>
              <li class="mt-1"><a @click.prevent="scrollToSection('certificates')" href="#certificates" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates & Awards</a></li>
              <li class="mt-1"><a @click.prevent="scrollToSection('shareholders')" href="#shareholders" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder & Investors</a></li>
              <li class="mt-1"><a @click.prevent="scrollToSection('org-chart')" href="#org-chart" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational Chart</a></li>
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
                <li><a @click.prevent="scrollToSection('solar1')" href="#solar1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power Works?</a></li>
                <li><a @click.prevent="scrollToSection('solar2')" href="#solar2" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar Systems</a></li>
                <li><a @click.prevent="scrollToSection('solar3')" href="#solar3" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major Benefits of Solar Energy</a></li>
              </ul>
            </li>
            <li class="mt-1">
              <button
                @click="openCompanyProfile"
                class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
              >
                <a @click.prevent="scrollToSection('profile')" href="#profile">Company Profile</a>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
              </button>
              <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                <li><a @click.prevent="scrollToSection('profile1')" href="#profile1" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History Timeline</a></li>
                <li><a @click.prevent="scrollToSection('profile2')" href="#profile2" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision - Mission</a></li>
                <li><a @click.prevent="scrollToSection('profile3')" href="#profile3" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a></li>
                <li><a @click.prevent="scrollToSection('profile4')" href="#profile4" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team - Commitment</a></li>
              </ul>
            </li>
            <li class="mt-1"><a @click.prevent="scrollToSection('certificates')" href="#certificates" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates & Awards</a></li>
            <li class="mt-1"><a @click.prevent="scrollToSection('shareholders')" href="#shareholders" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder & Investors</a></li>
            <li class="mt-1"><a @click.prevent="scrollToSection('org-chart')" href="#org-chart" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational Chart</a></li>
          </ul>
        </div>

      <!-- Content Area -->
        <div class="lg:w-3/4 lg:ml-20 mt-10 lg:mt-0">
            <section id="solar1">
                <div class="text-2xl font-bold text-blue-600 text-center">Solar Power</div>

            </section>
            <section 
              v-if="selectedSection === null ||
                  selectedSection === 'profile' || 
                  selectedSection === 'profile1' || 
                  selectedSection === 'profile2' || 
                  selectedSection === 'profile3' || 
                  selectedSection === 'profile4'" 
                id="profile" class="space-y-16">
              <div data-aos="fade-right" data-aos-once="true">
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
                      This commitment to quality extends to using only premium solar panels and components from trusted manufacturers, 
                      guaranteeing the longevity and optimal performance of your solar system.                  
                    </p>
                    <p class="mt-4 text-justify text-lg">
                      At ONE MPRL Solar, we believe that solar energy is the future of energy production. 
                      Solar power is clean, renewable and sustainable, making it an ideal energy source for the future. 
                      By harnessing the power of the sun, we can reduce our dependence on fossil fuels and help combat climate change.
                    </p>
                  </div>
                  <div class="w-full md:w-2/5 mt-4 md:mt-0">
                    <img src="/images/mprl-projects/received_418454461188399.jpeg" alt="about-us" class="mt-5 w-full h-48 rounded-lg object-cover">
                    <img src="/images/mprl-projects/received_1114681562925648.jpeg" alt="about-us" class="mt-2 w-full lg:h-24 h-48 rounded-lg object-cover">
                    <img src="/images/mprl-projects/received_463160816647010.jpeg" alt="about-us" class="mt-2 w-full lg:h-24 h-48 rounded-lg object-cover">
                  </div>
                </div>
              </div>
              <section v-if="selectedSection === 'profile' || selectedSection === 'profile1'" id="profile1" class="pb-16">
                <h1 class="text-4xl font-bold text-center">History Timeline</h1>
                <h4 class="text-xl font-semibold text-center tracking-wide mt-3">Milestones in Solar Innovation</h4>
                
                <div class="relative flex flex-col items-center w-full max-w-xl md:max-w-4xl mt-10">
                    <!-- Timeline Line -->
                    <div class="line-container absolute w-1 bg-blue-600 h-full top-0 left-1/2 transform -translate-x-1/2 z-0"></div>

                    <!-- Timeline Left -->
                    <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                      data-aos-once="true">
                      <div class="w-full md:w-1/2 flex pr-0 md:pr-5 z-10 md:z-0">
                        <div class="bg-white w-full lg:text-start text-center px-4 space-y-2">
                          <h1 class="font-bold italic italic text-main-500 text-4xl">2013</h1>
                          <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                            Established in Bicol Region
                          </h4>
                          <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                            <p class="text-white text-sm text-justify">
                              ONE MPRL Solar Power Corporation was founded in 2013 as MPRL Solar Panel Trading 
                              and Construction Services. The company started its journey in the Bicol Region 
                              with a vision to provide top-quality solar power solutions.
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
                            <h1 class="font-bold italic italic text-main-500 text-4xl">2017</h1>
                            <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                              Expansion to NCR and CALABARZON
                            </h4>
                            <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                              <p class="text-white text-sm text-justify">
                                By 2015, the company expanded its operations to the National Capital Region 
                                (NCR) and CALABARZON, establishing itself as a trusted provider of solar energy 
                                solutions in these key regions.
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
                            Global Experience and Quality Assurance
                          </h4>
                          <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                            <p class="text-white text-sm text-justify">
                              By 2021, ONE MPRL Solar Power Corporation had gained extensive 
                              global experience, enabling it to deliver the highest quality 
                              solar solutions. The company's reputation for quality and 
                              reliability continued to grow.
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
                            <h1 class="font-bold italic italic text-main-500 text-4xl">2024</h1>
                            <h4 class="font-semibold text-blue-600 text-xl uppercase leading-5">
                              Rebranding to ONE MPRL Solar Power Corporation
                            </h4>
                            <div class="bg-blue-600 mt-2 py-3 px-4 rounded-lg shadow-lg">
                              <p class="text-white text-sm text-justify">
                                In 2024, the company made a strategic decision to rebrand itself as 
                                ONE MPRL Solar Power Corporation. This new name reflects the company's 
                                unified approach and its ongoing mission to be a leading provider of 
                                solar energy solutions.
                              </p>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </section>
              <section v-if="selectedSection === 'profile' || selectedSection === 'profile2'" id="profile2">
                <div class="text-4xl font-bold text-center text-center">Vision - Mission</div>
                <div class="flex flex-col md:flex-row md:space-x-8 mt-10">
                  <div class="w-full lg:w-3/5 md:w-1/2 space-y-10">
                    <div data-aos="fade-right" data-aos-once="true">
                      <h1 class="text-3xl font-medium text-blue-600 tracking-wide">
                        MISSION
                      </h1>
                      <p class="mt-2 text-justify text-lg">
                        To accelerate solar energy adoption by providing innovative, reliable, and cost-effective solutions. 
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
              <section v-if="selectedSection === 'profile' || selectedSection === 'profile3'" id="profile3" class="pb-16">
                <div class="text-4xl font-bold text-center text-center">Core Values</div>
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
              <section v-if="selectedSection === 'profile' || selectedSection === 'profile4'" id="profile4" class="pb-16">
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
            <section v-if="selectedSection === 'org-chart'" id="org-chart" class="pb-16">
              <div class="text-4xl font-bold text-center text-center">Organizational Structure</div>
              <div data-aos="fade-right" data-aos-once="true">
                <p class="mt-10 text-justify text-lg">
                  ONE MPRL Solar Power Corporation operates with a well-defined 
                  organizational structure designed to foster efficiency, innovation, 
                  and collaborative efforts across all levels of the company.
                </p>
              </div>
              <img src="images/company-profile/Organizational.png" alt="Organizational chart" class="mt-5 w-full h-full rounded-lg object-cover">
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
  width: 5px; /* or 1px if you prefer */
  background: radial-gradient(circle, rgb(20, 35, 84) 50%, transparent 51%) repeat-y;
  background-size: 5px 10px; /* Adjust as needed for spacing */
  position: absolute; /* Ensure it's positioned correctly */
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  z-index: -1; /* Ensures it is behind all other elements */
}
</style>
