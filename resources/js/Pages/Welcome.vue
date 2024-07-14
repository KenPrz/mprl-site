<script setup>
import { Link, Head } from '@inertiajs/vue3';
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
            style="background-image:url('/images/guest-slideshow/bg-3.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col items-center justify-center space-y-6 mb-10">
                        <h1 data-aos="fade-right" data-aos-delay="300" data-aos-duration="600" data-aos-once="true"
                            class="text-3xl md:text-5xl font-semibold">
                            <span class="text-main-500">Renewable</span> <span class="text-offset-400">Energy</span>
                        </h1>
                        <h2 data-aos="fade-left" data-aos-delay="300" data-aos-duration="600" data-aos-once="true"
                            class="text-4xl md:text-6xl font-semibold text-white">
                            Harnessing the power of the sun to create a brighter future
                        </h2>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="600" data-aos-once="true"
                        class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-5">
                        <a :href="route('contact.index')"
                            class="rounded-md w-full sm:w-1/5 px-6 py-3 text-sm md:text-base font-medium border-main-600 bg-main-600 text-white hover:bg-main-700 transition-colors duration-200">
                            Contact us
                        </a>
                        <a :href="route('brochure.download')"
                            class="rounded-md w-full sm:w-1/5 px-6 py-3 text-sm md:text-base font-medium border border-white text-white hover:bg-white hover:text-black transition-colors duration-200">
                            Download Brochure
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-black to-transparent opacity-70">
            </div>
            <div class="w-full absolute bottom-0 py-[3px] bg-main-400"></div>
        </section>
        <section class="relative py-48 bg-cover bg-center screen-height-custom h-auto"
            style="background-image: url('/images/guest-slideshow/bg-2.jpg');">
            <div
                class="absolute inset-0 bg-black bg-opacity-40 flex flex-col md:flex-row justify-center items-center md:px-48 text-white space-y-3 md:space-y-0 md:space-x-3">
                <div data-aos="fade-left" data-aos-once="true" data-aos-duration="500"
                    class="px-4 md:w-1/2 flex flex-col items-start">
                    <h1 class="font-semibold text-left text-3xl py-3">
                        About MPRL <span class="text-offset-400">Solar</span> Trading
                    </h1>
                    <p data-aos="fade-left" data-aos-once="true" data-aos-delay="25" data-aos-duration="500"
                        class="font-light font-pretty text-lg">
                        MPRL Solar Panel Trading offers hassle-free solutions with our selection of
                        solar-powered LED lights. Easily install our lights within hours to light up pillars and columns
                        without the need for electrical wiring. With various types, styles, sizes, and colors available,
                        find the perfect fit for your space. Embrace sustainability - our solar lights are easy to
                        install and operate independently from the main electrical supply.
                    </p>
                    <div data-aos="fade-left" data-aos-once="true" data-aos-delay="50" data-aos-duration="500"
                        class="mt-4">
                        <Link :href="route('about.index')"
                            class="border py-1 px-2 rounded-xl hover:bg-white hover:text-black transition-all duration-200">
                        Read More
                        </Link>
                    </div>
                </div>
                <div class="px-4 w-full md:w-1/2 text-center md:text-left">
                    <Accordion :items="accordionItems" :initialActiveIndex="0" />
                </div>
            </div>
            <div class="w-full absolute bottom-0 py-[3px] bg-offset-500 z-10"></div>
        </section>
        <section class="bg-cover bg-center h-auto" style="background-image: url('/images/guest-slideshow/bg-4.jpg');">
            <div class="relative inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="container mx-auto px-4 py-16 lg:py-32">
                    <h2 data-aos="fade-up" data-aos-once="true"
                        class="text-4xl font-semibold text-center mb-16 text-white">Why Choose Our <span
                            class="text-offset-400">Solar</span> Solutions?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-sun text-4xl text-offset-500 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Eco-Friendly Energy</h3>
                            <p class="text-gray-600">Harness clean, renewable energy from the sun to reduce your carbon
                                footprint and contribute to a sustainable future.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-money-bill-wave text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Cost Savings</h3>
                            <p class="text-gray-600">Significantly reduce your electricity bills and enjoy long-term
                                savings with our efficient solar panel systems.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-tools text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Easy Installation</h3>
                            <p class="text-gray-600">Our solar solutions are designed for quick and hassle-free
                                installation, minimizing disruption to your daily life.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="400" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-cog text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Low Maintenance</h3>
                            <p class="text-gray-600">Our durable solar panels and LED lights require minimal upkeep,
                                ensuring worry-free operation for years to come.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-clock text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">24/7 Power</h3>
                            <p class="text-gray-600">Enjoy uninterrupted power supply with our solar battery storage
                                solutions, even during grid outages.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true"
                            class="bg-white rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-award text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Quality Assured</h3>
                            <p class="text-gray-600">We offer top-tier solar products backed by warranties and excellent
                                customer support for your peace of mind.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative bg-cover bg-center h-auto"
            style="background-image: url('/images/guest-slideshow/bg-1.jpg');">
            <div class="w-full absolute bottom-0 py-[3px] bg-offset-500 z-10"></div>
            <div class="w-full absolute top-0 py-[3px] bg-main-400 z-10"></div>
            <div class="relative inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                <div class="container mx-auto px-4 py-16 lg:py-32">
                    <h2 data-aos="fade-up" data-aos-once="true"
                        class="text-4xl font-semibold text-center mb-16 text-white">What we offer?</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-solar-panel text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Solar Panel Installation</h3>
                            <p class="text-gray-600">Professional installation services for residential and commercial
                                solar panel systems to maximize energy efficiency.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="200" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-battery-full text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Battery Storage Solutions</h3>
                            <p class="text-gray-600">Advanced battery systems to store excess solar energy, ensuring a
                                reliable power supply even during outages.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-lightbulb text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">LED Lighting</h3>
                            <p class="text-gray-600">Energy-efficient LED lighting solutions for indoor and outdoor use,
                                enhancing both aesthetics and functionality.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="400" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-tools text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Maintenance Services</h3>
                            <p class="text-gray-600">Regular maintenance and support to ensure optimal performance and
                                longevity of your solar power systems.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-handshake text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Consultation Services</h3>
                            <p class="text-gray-600">Expert consultation to help you choose the best solar solutions
                                tailored to your specific needs and budget.</p>
                        </div>
                        <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true"
                            class="bg-gray-100 rounded-lg shadow-md p-6 hover-card">
                            <i class="fas fa-recycle text-4xl text-main-600 mb-4"></i>
                            <h3 class="text-xl font-semibold mb-2">Sustainability Solutions</h3>
                            <p class="text-gray-600">Comprehensive sustainability services to help you reduce your
                                environmental impact and promote green living.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative bg-cover bg-center screen-height h-auto"
            style="background-image: url('/images/solar-header-bg.jpg');">
            <div class="relative screen-height inset-0 bg-black bg-opacity-20 flex items-center justify-center">
                <div class="container mx-auto px-4 py-16 lg:py-32 text-white-500 text-center">
                    <div class="flex">
                        <div class="flex flex-col justify-start">
                            <h1 class="text-3xl md:text-5xl lg:text-6xl font-semibold mb-16">Ready to make the switch to
                                <span class="text-offset-500">solar?</span></h1>
                            <div class="flex flex-col w-full justify-start space-y-4">
                                <a :href="route('contact.index')"
                                    class="rounded-md flex items-center w-full sm:w-1/5 px-6 py-3 text-start text-sm md:text-lg font-medium border-main-600 bg-main-600 text-white hover:bg-main-700 transition-colors duration-200 space-x-2">
                                    <i class="pi pi-phone"></i>
                                    <span>Contact Us</span>
                                </a>
                                <a :href="route('products')"
                                    class="rounded-md flex items-center w-full sm:w-1/5 px-6 py-3 text-start text-sm md:text-lg font-medium border-offset-600 bg-offset-600 text-white hover:bg-offset-700 transition-colors duration-200 space-x-2">
                                    <i class="pi pi-shopping-bag"></i>
                                    <span>Browse our products</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full absolute top-0 py-[3px] bg-main-400 z-10"></div>
        </section>
    </main>
    <Footer />
</template>

<script>
export default {
    components: {
        Accordion
    },
    data() {
        return {
            accordionItems: [
                {
                    title: 'Mission',
                    content: `Our mission is to accelerate the adoption of solar 
                    energy by providing innovative, reliable, and cost-effective solar solutions to our customers. We are
                    committed to reducing carbon emissions, promoting
                    sustainability, and creating a cleaner, greener future for
                    generations to come. Through our expertise,
                    dedication, and passion for renewable energy, we aim
                    to empower individuals and businesses to harness the
                    power of the sun to meet their energy needs while
                    contributing to a more sustainable planet.`
                },
                {
                    title: 'Vision',
                    content: `Our vision at MPRL Solar Panel Trading and
                    Construction Services is to be a global leader in
                    solar energy solutions, known for our commitment
                    to excellence, innovation, and sustainability. We
                    envision a world where solar power is the primary
                    source of energy, powering homes, businesses, and
                    communities with clean, renewable energy.
                    Through continuous research, development, and
                    collaboration, we strive to revolutionize the way
                    energy is produced and consumed, making solar
                    energy accessible and affordable for everyone.`
                },
            ],
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
</style>
