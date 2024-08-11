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
            style="background-image:url('/images/mprl-projects/solar-roof.jpeg');">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col items-center justify-center space-y-6 mb-10">
                        <h1 data-aos="fade-right" data-aos-delay="300" data-aos-duration="600" data-aos-once="true"
                            class="text-3xl md:text-5xl font-semibold">
                            <span class="text-main-500">Renewable</span> <span class="text-offset-400">Energy</span>
                        </h1>
                        <h2 data-aos="fade-left" data-aos-delay="300" data-aos-duration="600" data-aos-once="true"
                            class="text-4xl md:text-6xl font-semibold text-white">
                            Shine Brighter, Live lighter
                        </h2>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600" data-aos-duration="600" data-aos-once="true"
                        class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-5">
                        <a :href="route('contact.index')"
                            class="rounded-md w-full sm:w-1/5 px-6 py-3 text-sm md:text-base font-medium border-main-600 bg-main-500 text-white hover:bg-main-600 transition-colors duration-200">
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
        <div class="mt-10 flex flex-col items-center justify-center bg-white-500 mx-10 md:mx-24 md:space-y-10">
            <section class="flex-row md:flex items-center justify-center my-5 space-y-5">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-duration="600" data-aos-once="true" class="w-full md:w-1/2 flex items-center justify-end me-10">
                    <img src="/images/mprl-projects/who-are-we.jpeg" alt="House"
                        class="w-full md:w-3/4 h-full object-cover rounded-lg">
                </div>
                <div class="w-full md:w-1/2 flex flex-col">
                    <h1 data-aos="fade-left" data-aos-delay="250" data-aos-duration="300" data-aos-once="true" class="text-2xl font-bold">Who are we?</h1>
                    <div class="flex flex-col space-y-2">
                        <p data-aos="fade-left" data-aos-delay="300" data-aos-duration="400" data-aos-once="true">
                            <span class="font-semibold">ONE MPRL <span class="text-offset-500">Solar</span> Power Corporation</span> is a leading provider of solar energy solutions in the
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
            <section class="flex flex-col">
                <div class="flex flex-col items-start space-y-3 w-1/2">
                    <h1 class="text-xl font-semibold">How Does Solar Power Works?</h1>
                    <p class="text-lg">Uncover the Magic Behind Solar Panels: Turning Sunlight into Clean, Renewable Energy for Your
                        Home or Business</p>
                    <button class="bg-main-400 hover:bg-main-600 rounded-lg text-md py-1 px-2 text-white-500 transition-colors duration-200">
                        Learn More
                    </button>
                </div>
                <div class="">
                    <p>
                        Discover how sunlight transforms into clean, renewable energy! Learn about the fascinating process behind solar panels and how they power your home or business efficiently and sustainably. Dive into the future of energy today!
                    </p>
                </div>
            </section>
            <section class="flex items-center justify-center">

            </section>
        </div>
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
