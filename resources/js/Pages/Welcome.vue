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
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col space-y-6 mb-10">
                        <div class="font-bold text-8xl text-white-500 text-start">
                            <h1>Providing Solar Solutions</h1>
                            <h1>For Your Every Need</h1>
                        </div>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="600" data-aos-once="true"
                        class="flex flex-col sm:flex-row items-center justify-start space-y-4 sm:space-y-0 sm:space-x-5">
                        <a :href="route('contact.index')"
                            class="w-[200px] rounded-sm px-6 py-5 text-sm md:text-base font-medium border-2 border-main-500 bg-main-500 text-white hover:border-main-600 hover:bg-main-600 transition-colors duration-200">
                            Contact us
                        </a>
                        <a :href="route('brochure.download')"
                            class="w-[200px] rounded-sm px-6 py-5 text-sm md:text-base font-medium border-2 border-white text-white hover:bg-white hover:text-black transition-colors duration-200">
                            Download Brochure
                        </a>
                    </div>
                    <div class="flex items-center justify-between mt-20">
                        <div class="flex items-center justified-center text-white space-x-2">
                            <span class="font-semibold text-6xl">130+</span>
                            <div class="mt-2 flex flex-col justified-center text-white text-start text-lg font-normal">
                                <span>Satisfied</span>
                                <span>Clients</span>
                            </div>
                            <span class="font-semibold text-6xl">11+</span>
                            <div class="mt-2 flex flex-col justified-center text-white text-start text-lg font-normal">
                                <span>Years of Experience</span>
                                <span>in Solar Installation Service</span>
                            </div>
                        </div>
                        <div class="text-white text-start">
                            <p class="text-lg">Switch to solar energy and watch as your energy <br> costs drop down.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex flex-col bg-white-500 py-10">
            <span class="w-full text-center">Our trusted brands and partner distributors</span>
        </div>
        <div class="mt-10 flex flex-col items-center justify-center bg-white-500 mx-10 md:mx-24 md:space-y-10">
            <section class="flex-row md:flex items-center justify-center my-5 space-y-5">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-once="true"
                    class="w-full md:w-1/2 flex items-center justify-end me-10">
                    <img src="/images/mprl-projects/who-are-we.jpeg" alt="House"
                        class="w-full md:w-3/4 h-full object-cover rounded-lg">
                </div>
                <div class="w-full md:w-1/2 flex flex-col">
                    <h1 data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true"
                        class="text-2xl font-bold">Who are we?</h1>
                    <div class="flex flex-col space-y-2">
                        <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="400" data-aos-once="true">
                            <span class="font-semibold">ONE MPRL <span class="text-offset-500">Solar</span> Power
                                Corporation</span> is a leading provider of solar energy solutions in the
                            Philippines, with a strong foundation in the Bicol Region since 2013. We are a company on
                            the move, with a vision to expand our expertise and quality service to NCR, CALABARZON, and
                            neighboring provinces.
                        </p>
                        <p data-aos="fade-left" data-aos-delay="350" data-aos-duration="400" data-aos-once="true">
                            Our core mission is to empower our customers to harness the sun's clean and sustainable
                            power. We achieve this by designing, installing, and maintaining customized solar power
                            systems for residential, and commercial clients. Our dedicated team prioritizes exceptional
                            customer service, ensuring a smooth experience from initial consultation to
                            post-installation maintenance.
                        </p>
                    </div>
                </div>
            </section>
            <section class="flex flex-col items-center my-10 px-4 md:px-8 border-b-2 pb-5 sm:pb-10">
                <!-- Pulsating H1 -->
                <h1 class="text-xl md:text-2xl font-semibold mb-5 p-4 md:p-5 bg-offset-400 text-white rounded-xl relative z-10 animate-pulse"
                    data-aos="fade-down" data-aos-once="true">
                    How Does Solar Power Work?
                </h1>

                <div class="relative flex flex-col items-center w-full max-w-xl md:max-w-4xl">
                    <!-- Timeline Line with Multiple Traveling Circles -->
                    <div class="absolute w-1 bg-gray-300 h-full top-0 left-1/2 transform -translate-x-1/2 z-0">
                        <div class="circle-traveling" style="animation-delay: 0s;"></div>
                        <div class="circle-traveling" style="animation-delay: 2s;"></div>
                        <div class="circle-traveling" style="animation-delay: 4s;"></div>
                    </div>

                    <!-- Timeline Item 1 -->
                    <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                        data-aos-once="true">
                        <div class="w-full md:w-1/2 flex justify-end pr-0 md:pr-5 z-10 md:z-0">
                            <div class="bg-main-500 text-white py-3 px-4 rounded-lg shadow-lg">
                                Step 1: Sunlight Hits Panels - Solar panels capture sunlight with photovoltaic (PV)
                                cells.
                            </div>
                        </div>
                        <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 green-circle hidden md:block"></div>
                        <div class="w-0 md:w-1/2"></div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="flex w-full flex-col md:flex-row justify-end items-center mb-8" data-aos="fade-left"
                        data-aos-once="true">
                        <div class="w-0 md:w-1/2"></div>
                        <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 green-circle hidden md:block"></div>
                        <div class="w-full md:w-1/2 flex justify-start pl-0 md:pl-5">
                            <div class="bg-main-500 text-white py-3 px-4 rounded-lg shadow-lg z-10 md:z-0">
                                Step 2: Electricity Generation - PV cells convert sunlight into direct current (DC)
                                electricity.
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                        data-aos-once="true">
                        <div class="w-full md:w-1/2 flex justify-end pr-0 md:pr-5">
                            <div class="bg-main-500 text-white py-3 px-4 rounded-lg shadow-lg z-10 md:z-0">
                                Step 3: Inverter Conversion - An inverter transforms DC into alternating current (AC)
                                for home use.
                            </div>
                        </div>
                        <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 green-circle hidden md:block"></div>
                        <div class="w-0 md:w-1/2"></div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="flex w-full flex-col md:flex-row justify-end items-center mb-8" data-aos="fade-left"
                        data-aos-once="true">
                        <div class="w-0 md:w-1/2"></div>
                        <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 green-circle hidden md:block"></div>
                        <div class="w-full md:w-1/2 flex justify-start pl-0 md:pl-5">
                            <div class="bg-main-500 text-white py-3 px-4 rounded-lg shadow-lg z-10 md:z-0">
                                Step 4: Powering Your Space - The AC electricity powers your appliances and devices.
                            </div>
                        </div>
                    </div>

                    <!-- Timeline Item 5 -->
                    <div class="flex w-full flex-col md:flex-row justify-start items-center mb-8" data-aos="fade-right"
                        data-aos-once="true">
                        <div class="w-full md:w-1/2 flex justify-end pr-0 md:pr-5">
                            <div class="bg-main-500 text-white py-3 px-4 rounded-lg shadow-lg z-10 md:z-0">
                                Step 5: Storing Energy - Excess energy is stored in batteries for later use or fed back
                                into the grid.
                            </div>
                        </div>
                        <div class="bg-main-500 w-6 h-6 rounded-full shadow-lg z-10 green-circle hidden md:block"></div>
                        <div class="w-0 md:w-1/2"></div>
                    </div>

                    <!-- Battery Section with Blinking Light -->
                    <div class="flex w-full md:w-1/2 justify-center items-center mt-5 md:mt-10 z-30" data-aos="fade-up"
                        data-aos-once="true">
                        <div class="bg-gray-700 text-white py-4 px-6 rounded-lg shadow-lg flex items-center space-x-4">
                            <div class="w-5 h-5 bg-yellow-500 rounded-full blink"></div>
                            <div>
                                <p class="font-semibold">Battery Storage</p>
                                <p>Stored energy is ready for use when the sun isn't shining or as backup power.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Call-to-Action Section -->
                <div class="flex flex-col items-center mt-12" data-aos="fade-up" data-aos-once="true">
                    <p class="text-lg font-semibold mb-3">Want to Learn More?</p>
                    <p class="text-gray-700 mb-5 text-center">Interested in how solar power works?</p>
                    <a :href="route('about.index')"
                        class="py-2 px-5 bg-main-500 text-white text-sm rounded-full hover:bg-main-600 transition-colors duration-200">
                        Yes, I'm Interested!
                    </a>
                </div>
            </section>

            <section class="flex flex-col items-center justify-center max-w-6xl mx-auto">
                <div class="flex flex-col text-center mb-8 text-blue-500">
                    <h1 class="text-xl">Our Products</h1>
                    <h2 class="text-2xl font-semibold">Illuminate with the power of the <span
                            class="text-offset-500">sun</span></h2>
                </div>
                <div class="flex w-full justify-center items-center">
                    <!-- Left Image Display Area -->
                    <div class="hidden lg:flex items-center justify-center w-1/3 h-auto">
                        <img :src="hoveredImage" alt="Product Image" class="w-full h-auto object-contain"
                            v-if="hoveredImage">
                    </div>
                    <!-- Grid Layout -->
                    <div class="w-full lg:w-2/3">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-10">
                            <template v-for="(product, index) in products" :key="index">
                                <div @mouseover="showImage(product.image)"
                                    class="hover-card bg-white rounded-lg shadow-lg p-5 flex flex-col items-center justify-center transition-transform transform hover:scale-105"
                                    data-aos="fade-up" data-aos-once="true">
                                    <img :src="product.image" :alt="product.name" class="w-24 h-24 object-contain">
                                    <h3 class="text-lg font-semibold mt-3">{{ product.name }}</h3>
                                    <p class="text-sm text-center">{{ product.description }}</p>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </section>
            <section class="flex flex-col md:max-w-5xl border-t-2 border-blue-400 pt-5 md:pt-10 mx-auto">
                <h1 data-aos="fade-up" data-aos-once="true" class="text-2xl md:text-3xl font-semibold text-blue-500 text-center mb-5">Types of Solar Systems
                </h1>
                <div
                    class="flex flex-col md:flex-row w-full items-center justify-center space-y-5 md:space-y-0 md:space-x-5">
                    <!-- Card 1 -->
                    <div
                        data-aos="fade-right" data-aos-once="true"
                        class="w-full md:w-2/6 hover-card border bg-white rounded-lg shadow-lg p-5 flex flex-col items-center justify-between">
                        <div class="w-3/4 flex justify-center">
                            <img class="h-auto w-full object-contain" src="/images/solar-icons/house.png"
                                alt="atial Solar System">
                        </div>
                        <div class="flex flex-col items-center justify-center text-center px-5 mt-5 flex-grow">
                            <h2 class="text-blue-500 text-lg md:text-xl font-semibold">Residential Solar System</h2>
                            <p class="text-sm md:text-base my-4">Empower your home with clean, renewable energy through
                                our
                                customized residential solar
                                solutions. Save on electricity bills and contribute to a sustainable future.</p>
                        </div>
                        <a
                            :href="route('about.index',{
                                sectionName: 'residential-type'
                            })"
                            class="mt-5 px-10 py-2 bg-main-500 hover:bg-main-600 text-white rounded-full text-sm md:text-base font-semibold">
                            Learn more
                        </a>
                    </div>
                    <!-- Card 2 -->
                    <div
                        data-aos="fade-left" data-aos-once="true"
                        class="w-full md:w-2/6 hover-card border bg-white rounded-lg shadow-lg p-5 flex flex-col items-center justify-between">
                        <div class="w-3/4 flex justify-center">
                            <img class="h-auto w-full object-contain" src="/images/solar-icons/industrial.png"
                                alt="Commercial & Industrial Solar System">
                        </div>
                        <div class="flex flex-col items-center justify-center text-center px-5 mt-5 flex-grow">
                            <h2 class="text-blue-500 text-lg md:text-xl font-semibold">Commercial & Industrial (CNI)
                                Solar System
                            </h2>
                            <p class="text-sm md:text-base my-2">Optimize your business operations with our robust solar
                                power
                                systems. Reduce energy costs and enhance your company's sustainability footprint.</p>
                        </div>
                        <a :href="route('about.index',{
                                sectionName: 'commercial-type'
                            })"
                            class="mt-5 px-10 py-2 bg-main-500 hover:bg-main-600 text-white rounded-full text-sm md:text-base font-semibold">
                            Learn more
                        </a>
                    </div>
                </div>
            </section>
            <section class="flex flex-col items-center justify-center w-full min-h-screen p-5">
                <div class="flex flex-col md:flex-row w-full max-w-6xl items-center justify-center">
                    <!-- Accordion Section -->
                    <div class="w-full md:w-1/2 p-5">
                        <h1 class="text-2xl font-semibold text-blue-500 mb-8 md:text-left text-center">Frequently Asked Questions</h1>
                        <Accordion :items="faq" />
                    </div>
                    <!-- Image Section -->
                    <div class="w-full md:w-1/2 p-5 flex justify-center mt-8 md:mt-0">
                        <div class="h-64 w-64 flex items-center justify-center">
                            <img src="/images/solar-icons/faq.png" alt="Solar Panels" class="w-full h-auto object-cover">
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
            hoveredImage: '/images/solar-icons/solar-panel.png',
        };
    },
    methods: {
        showImage(image) {
            this.hoveredImage = image;
        },
        hideImage() {
            this.hoveredImage = null;
        }
    }
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
