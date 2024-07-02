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
        <section data-aos="fade-in" data-aos-duration="500" data-aos-once="true" class="relative py-24 md:py-48 bg-cover bg-center h-auto" style="background-image: url('/images/solar-header-bg.jpg');">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col items-center justify-center space-y-6 mb-10">
                        <h1 data-aos="fade-right" data-aos-delay="300" data-aos-duration="600" data-aos-once="true" class="text-3xl md:text-5xl text-offset-400 font-semibold">
                            Renewable Energy
                        </h1>
                        <h2 data-aos="fade-left" data-aos-delay="300" data-aos-duration="600" data-aos-once="true" class="text-4xl md:text-6xl font-semibold text-white">
                            Shine brighter, Live lighter
                        </h2>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="600" data-aos-once="true" class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-5">
                        <a href="#" class="w-full sm:w-1/5 px-6 py-3 text-sm md:text-base font-medium border-main-600 bg-main-600 text-white hover:bg-main-700 transition-colors duration-200">
                            Request a Quote
                        </a>
                        <a href="#" class="w-full sm:w-1/5 px-6 py-3 text-sm md:text-base font-medium border border-white text-white hover:bg-white hover:text-black transition-colors duration-200">
                            Download Brochure
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 left-0 w-full h-24 bg-gradient-to-t from-black to-transparent opacity-70"></div>
        </section>
        <section class="relative py-48 bg-cover bg-center h-auto"
            style="background-image: url('/images/mission-vision-bg.jpg');">
            <div
                class="absolute inset-0 bg-black bg-opacity-40 flex flex-col md:flex-row justify-center items-center md:px-48 text-white space-y-3 md:space-y-0 md:space-x-3">
                <div data-aos="fade-left" data-aos-once="true" data-aos-duration="500" class="px-4 md:w-1/2 flex flex-col items-start">
                    <h1 class="font-semibold text-left text-3xl py-3">
                        About MPRL Solar Trading
                    </h1>
                    <p data-aos="fade-left" data-aos-once="true" data-aos-delay="25" data-aos-duration="500" class="font-light font-pretty">
                        MPRL Solar Panel Trading offers hassle-free illumination solutions with our selection of
                        solar-powered LED lights. Easily install our lights within hours to light up pillars and columns
                        without the need for electrical wiring. With various types, styles, sizes, and colors available,
                        find the perfect fit for your space. Embrace sustainability - our solar lights are easy to
                        install and operate independently from the main electrical supply.
                    </p>
                    <div data-aos="fade-left" data-aos-once="true" data-aos-delay="50" data-aos-duration="500" class="mt-4">
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
                { title: 'Mission', content: 'To harness the power of the sun to provide innovative, sustainable, and affordable energy solutions, empowering communities and businesses to achieve energy independence and environmental stewardship.' },
                { title: 'Vision', content: 'To be a global leader in solar energy, driving the transition to a clean energy future, where solar power is accessible to all, and creating a sustainable planet for generations to come.' },
                { title: 'Core Values', content: 'Innovation: Continuously seeking new and better ways to improve solar technology and energy solutions.' }
            ],
        };
    },
};
</script>

<style scoped>
.bg-cover {
    background-size: cover;
    height: 100vh;
}

.bg-center {
    background-position: center 100%;
}
</style>
