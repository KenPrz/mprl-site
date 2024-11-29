<script setup>
import { Link, Head, router } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import NavBar from '@/Components/NavBar.vue'
import Accordion from '@/Components/Accordion.vue'
import Footer from '@/Components/Footer.vue';
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

</script>
<template>

    <Head title="Home" />
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 0,
        'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
        <NavBar :is_black="scroll > 0" />
    </nav>
    <main>
        <section data-aos="fade-in" data-aos-duration="500" data-aos-once="true"
            class="relative py-24 md:py-48 bg-cover bg-center screen-height h-auto"
            style="background-image:url('/images/mprl-projects/solar-roof.jpeg');">
            <div class="absolute inset-0 bg-blue-600 bg-opacity-70 flex flex-col justify-center">
                <div class="container mx-auto px-6 md:px-8 lg:px-14 mt-20">
                    <!-- Heading Section -->
                    <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="200" data-aos-once="true"
                        class="flex flex-col items-center md:items-start space-y-4 md:space-y-6 mb-8 md:mb-10 text-center md:text-left">
                        <div class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl text-white leading-tight">
                            <h1>Providing Solar Solutions</h1>
                            <h1>For Your Every Need</h1>
                        </div>
                    </div>

                    <!-- Button Section -->
                    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="600" data-aos-once="true"
                        class="mt-10 flex flex-col sm:flex-row items-center sm:items-start sm:justify-start space-y-4 sm:space-y-0 sm:space-x-5">
                        <a :href="route('contact.index')"
                            class="text-center w-[200px] rounded-sm px-3 py-4 text-sm md:text-base font-medium border-2 border-main-500 bg-main-500 text-white hover:border-main-600 hover:bg-main-600 transition-colors duration-200">
                            Contact us
                        </a>
                        <a :href="route('brochure.download')"
                            class="text-center w-[200px] rounded-sm px-3 py-4 text-sm md:text-base font-medium border-2 border-white text-white hover:bg-white hover:text-black transition-colors duration-200">
                            Download Brochure
                        </a>
                    </div>

                    <!-- Stats Section -->
                    <div data-aos="fade-up" data-aos-delay="800" data-aos-duration="600" data-aos-once="true"
                        class="flex flex-col lg:flex-row justify-center lg:justify-between items-center mt-16 lg:mt-24 space-y-8 lg:space-y-0 lg:space-x-10">
                        <div data-aos="zoom-in" data-aos-delay="500" data-aos-duration="700" data-aos-once="true"
                            class="w-full lg:w-1/2 flex flex-col md:flex-row items-center md:items-start justify-start space-y-6 md:space-y-0 md:space-x-8">
                            <div class="flex items-center text-white space-x-4">
                                <span class="font-semibold text-4xl sm:text-5xl md:text-6xl">580+</span>
                                <div class="flex flex-col text-start text-base sm:text-lg font-normal">
                                    <span>Satisfied</span>
                                    <span>Clients</span>
                                </div>
                            </div>
                            <div class="flex items-center text-white space-x-4">
                                <span class="font-semibold text-4xl sm:text-5xl md:text-6xl">11+</span>
                                <div class="flex flex-col text-start text-base sm:text-lg font-normal">
                                    <span>Years of Experience</span>
                                    <span>in Solar Installation Service</span>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-left" data-aos-delay="1200" data-aos-duration="700" data-aos-once="true"
                            class="text-white text-center lg:text-start px-4 lg:px-0">
                            <p class="text-base sm:text-lg">Switch to solar energy and watch as your energy <br
                                    class="hidden lg:block"> costs drop down.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="mt-10 flex flex-col items-center justify-center bg-white-500 mx-10 md:mx-24 md:space-y-10">
            <section class="flex flex-col lg:flex-row items-center justify-center mx-auto px-4">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-once="true"
                    class="w-full md:w-1/2 flex items-center justify-end me-10">
                    <img src="/images/mprl-projects/who-are-we.jpeg" alt="House"
                        class="w-full md:w-full h-full object-cover ps-1">
                </div>
                <div class="w-full lg:w-1/2 flex flex-col space-y-6 lg:mx-10 lg:px-14">
                    <div class="flex flex-col mt-10 md:mb-14">
                        <h2 data-aos="fade-left" data-aos-delay="150" data-aos-duration="300" data-aos-once="true"
                            class="text-md text-main-500 font-semibold">ABOUT US</h2>
                        <h1 data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true"
                            class="text-5xl font-bold text-blue-500">WHO ARE WE?</h1>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <p class="text-blue-500 md:pe-10 md:text-justify" data-aos="fade-left" data-aos-delay="300"
                            data-aos-duration="400" data-aos-once="true">
                            <b>ONE MPRL Solar Power Corporation</b>
                            has been a trusted provider of solar energy solutions in the Bicol Region since 2013.
                            We're proud of our expertise and are excited to share it with more Filipinos.
                            We're expanding our services to NCR, CALABARZON, and neighbouring provinces,
                            bringing clean energy and reliable service to new communities.
                        </p>
                    </div>
                    <div class="w-full flex justify-center md:justify-start mt-4">
                        <a :href="route('about.index')"
                            class="text-center w-full md:w-[170px] px-6 py-2 text-sm md:text-base font-medium border-2 border-main-500 bg-main-500 text-white hover:border-main-600 hover:bg-main-600 transition-colors duration-200">
                            Learn more
                        </a>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-blue-500">
            <div class="mt-10 flex flex-col items-center justify-center mx-10 md:mx-24 md:space-y-10">
                <section class="flex flex-col lg:flex-row items-center justify-center mx-auto mt-14 mb-14">
                    <!-- Title Section - Stays at the top on mobile, moves to the left on large screens -->
                    <div
                        class="w-full lg:w-1/3 lg:h-auto flex flex-col items-center lg:items-start mb-10 lg:mb-0 lg:pr-8 space-y-2 text-center lg:text-left">
                        <h2 data-aos="fade-left" data-aos-delay="150" data-aos-duration="300" data-aos-once="true"
                            class="text-md text-main-500 font-semibold">OUR PRODUCTS</h2>
                        <h1 data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true"
                            class="text-3xl font-semibold text-white-500">Premium Solar Products, Expert Installation</h1>
                        <p data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true"
                            class="text-lg font-light text-white-500">Here are the products that we offer</p>
                    </div>

                    <!-- Grid Layout -->
                    <div class="w-full lg:w-2/3">
                        <!-- Responsive grid for 2 rows and 3 columns -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mt-5 lg:mt-0">
                            <template v-for="(product, index) in products" :key="index">
                                <div class="hover-card bg-white rounded-lg shadow-lg p-4 flex flex-col items-center justify-center transition-transform transform hover:scale-105"
                                    data-aos="fade-up" data-aos-once="true">
                                    <img :src="product.image" :alt="product.name" class="w-20 h-20 object-contain mb-2">
                                    <h3 class="text-md font-semibold mt-2">{{ product.name }}</h3>
                                    <p class="text-xs text-center">{{ product.description }}</p>
                                </div>
                            </template>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="mt-10 flex flex-col items-center justify-center mx-4 md:mx-24 md:space-y-10">
            <section class="flex flex-col items-center mx-auto px-4 mt-14 w-full space-y-10">
                <!-- Header Section -->
                <div class="flex flex-col md:flex-row items-center md:items-start justify-between w-full space-y-6 md:space-y-0">
                    <!-- Left Side -->
                    <div class="flex flex-col text-center md:text-left">
                        <h2 data-aos="fade-left" data-aos-delay="150" data-aos-duration="300" data-aos-once="true"
                            class="text-sm md:text-md text-main-500 font-semibold">
                            OUR SERVICES
                        </h2>
                        <h1 data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true"
                            class="text-3xl md:text-5xl font-bold text-blue-500 leading-tight">
                            We Cater To Your Needs
                        </h1>
                    </div>

                    <!-- Right Side -->
                    <div class="flex flex-col items-center md:items-end space-y-4">
                        <h2 data-aos="fade-left" data-aos-delay="150" data-aos-duration="300" data-aos-once="true"
                            class="text-sm md:text-md text-blue-500 font-semibold text-center md:text-right">
                            Here are the services that we offer
                        </h2>
                        <div>
                            <a :href="route('contact.index')"
                                class="text-center w-[150px] md:w-[200px] rounded-sm px-4 py-2 text-sm md:text-base font-medium border-2 border-main-500 bg-main-500 text-white hover:border-main-600 hover:bg-main-600 transition-colors duration-200">
                                Contact us
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Grid Section -->
                <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-6 p-4 justify-items-center">
                    <!-- Column 1 -->
                    <div class="w-full flex flex-col">
                        <img
                            src="/images/cater-your-needs/solar-panel-installation.png"
                            alt="solar-panel-installation"
                            class="w-full max-w-sm h-auto object-cover rounded-lg"
                        >
                        <div class="mt-6 text-blue-500">
                            <h1 class="text-lg md:text-2xl font-bold mb-2">
                                Solar Panel Installation
                            </h1>
                            <p>
                                We offer a hassle-free solar panel installation from start to finish.
                            </p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="w-full flex flex-col">
                        <img
                            src="/images/cater-your-needs/construction-services.png"
                            alt="construction-services"
                            class="w-full max-w-sm h-auto object-cover rounded-lg"
                        >
                        <div class="mt-6 text-blue-500">
                            <h1 class="text-lg md:text-2xl font-bold mb-2">
                                Construction Services
                            </h1>
                            <p>
                                We deliver high-quality, eco-friendly construction projects.
                            </p>
                        </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="w-full flex flex-col">
                        <img
                            src="/images/cater-your-needs/consultation-services.png"
                            alt="consultation-services"
                            class="w-full max-w-sm h-auto object-cover rounded-lg"
                        >
                        <div class="mt-6 text-blue-500">
                            <h1 class="text-lg md:text-2xl font-bold mb-2">
                                Consultation Services
                            </h1>
                            <p>
                                We provide expert energy and construction consulting for personalized solutions that meet your sustainability goals.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="flex flex-col items-center justify-center mx-4 md:mx-24 md:space-y-10 my-14">
            <section class="flex flex-col items-center justify-center w-full p-">
                <div class="w-full flex flex-col md:flex-row items-center justify-center">
                    <!-- Accordion Section -->
                    <div class="w-full p-5">
                        <h1 class="text-2xl md:text-3xl font-bold text-blue-500 mb-8 text-center">
                            Frequently Asked Questions
                        </h1>
                        <div class="w-full">
                            <!-- Accordion Component -->
                            <Accordion
                                class="md:mx-28"
                                :items="faq" 
                            />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <Footer />
</template>
<script>
export default {
    data() {
        return {
            products: [
                {
                    name: 'Solar Panels',
                    description: 'A solar panel is a device that converts sunlight into electricity, providing a clean and renewable energy source.',
                    image: '/images/solar-icons/solar-panel.png'
                },
                {
                    name: 'Solar Streetlights',
                    description: 'A solar streetlight uses solar panels to convert sunlight into electricity, illuminating streets with sustainable, eco-friendly energy.',
                    image: '/images/solar-icons/street-light.png'
                },
                {
                    name: 'Inverter',
                    description: 'An inverter converts the direct current (DC) from solar panels into alternating current (AC), which powers your home or business.',
                    image: '/images/solar-icons/inverter.png'
                },
                {
                    name: 'Battery',
                    description: 'A battery stores energy from solar panels, providing power when sunlight is not available.',
                    image: '/images/solar-icons/battery.png'
                },
                {
                    name: 'Mounting System',
                    description: 'A mounting system securely holds solar panels in place, ensuring optimal sunlight exposure for maximum energy production.',
                    image: '/images/solar-icons/solar-mounts.png'
                },
                {
                    name: 'Solar System',
                    description: 'A solar system combines solar panels with other energy sources, like batteries or the grid, for efficient and reliable power generation.',
                    image: '/images/solar-icons/solar-system.png'
                },
            ],
            faq: [
                {
                    title: 'Is my home suitable for solar?',
                    content: 'Most homes are suitable for solar power, as long as they have a roof or open space that receives direct sunlight for most of the day. Our team can assess your property and recommend the best solar solution for your needs.'
                },
                {
                    title: 'How much will I save on my electricity bill?',
                    content: 'Your savings depend on your current energy usage, system size, and local electricity rates. Solar installers can provide estimates based on your specific situation.',
                },
                {
                    title: 'How much does a residential solar system cost?',
                    content: 'The cost of a residential solar system varies depending on the system size, location, and installation complexity. Our team can provide a customized quote based on your energy needs and budget.',
                },
                {
                    title: 'Does solar power my entire home at night?',
                    content: 'Solar panels generate electricity during the day, but not at night. To power your home at night, you can use energy stored in batteries or draw power from the grid. Our team can help you design a system that meets your energy needs 24/7.',
                },
                {
                    title: 'How much maintenance does a solar system require?',
                    content: 'Solar panels require minimal maintenance, usually limited to occasional cleaning and inspections. Inverters and batteries may need more regular maintenance, but our team can help you keep your system running smoothly.',
                },
                {
                    title: 'How long does it take to install a residential solar system?',
                    content: 'The installation timeline for a residential solar system varies depending on the system size, complexity, and local regulations. Our team can provide an estimated timeline for your specific project.',
                }
            ],
            hoveredImage: '/images/solar-icons/solar-panel.png'
        };
    },
};
</script>
<style scoped>
.bg-cover {
    background-size: cover;
}

.screen-height {
    height: 100vh;
}

@media screen and (max-width: 768px) {
    .screen-height-custom {
        height: 120vh;
    }
}

@media screen and (min-width: 768px) {
    .screen-height-custom {
        height: 100vh;
    }
}

.bg-center {
    background-position: center 100%;
}

.hover-card {
    cursor: pointer;
    transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
    position: relative;
    z-index: 1;
}

.hover-card:hover {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px) !important;
}

/* Pulsating H1 */
@keyframes pulse {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.02);
    }

    100% {
        transform: scale(1);
    }
}

.animate-pulse {
    animation: pulse 2s infinite;
}

/* Circle Traveling Down the Line */
@keyframes travel {
    0% {
        top: 0;
    }

    100% {
        top: 100%;
    }
}

.circle-traveling {
    position: absolute;
    top: 0;
    left: 50%;
    width: 8px;
    height: 8px;
    background-color: yellow;
    border-radius: 50%;
    animation: travel 6s infinite linear;
    transform: translateX(-50%);
}

/* Blinking Light in Battery */
@keyframes blink {

    0%,
    50%,
    100% {
        opacity: 1;
    }

    25%,
    75% {
        opacity: 0.5;
    }
}

.blink {
    animation: blink 1.2s infinite;
}
</style>
