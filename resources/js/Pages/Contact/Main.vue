<script setup>
import NavBar from '@/Components/NavBar.vue'
import Accordion from '@/Components/Accordion.vue'
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
</script>
<template>
    <Head title="Contact" />
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 0,
        'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
        <NavBar :is_black="scroll > 0" />
    </nav>
    <section>
        <div class="relative py-44 bg-cover bg-center h-auto"
            style="background-image: url('/images/blog-header-bg.png');">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
                <div class="flex flex-col items-center justify-center space-y-6">
                    <h2 class="text-4xl md:text-5xl font-semibold text-white">CONTACT US</h2>
                    <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
                        <Link class="hover:underline" :href="route('welcome')">HOME</Link>
                        <span class="mx-2">/</span>
                        <Link class="hover:underline" :href="route('blog.index')">BLOG</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="px-5 md:px-28">
        <div class="flex flex-col items-center justify-center">
            <div class="self-center mt-24 mb-24 w-full max-w-[1346px] max-md:mt-10 max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col max-md:gap-0">
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col px-5 mt-5 text-neutral-700 max-md:mt-10 max-md:max-w-full">
                            <div class="text-5xl font-semibold tracking-tighter max-md:max-w-full max-md:text-4xl">
                                We Would Love to Connect with You!
                            </div>
                            <div class="mt-14 text-xl tracking-tight text-justify max-md:mt-10 max-md:max-w-full">
                                Interested in getting solar? Start a conversation with us through
                                email or messenger, or get in touch with our team using the form
                                below.
                            </div>
                            <div class="row py-5 flex"> <!-- Added flex and justify-center classes to center the buttons -->
                                <a href="https://www.facebook.com/p/MPRL-Solar-Panel-Trading-100066355175014/?paipv=0&eav=AfbZZElfTbUUslLmCJvufBw-zGw2TrPxHRlLWYEZWMl-8Yr17qFc4Pug4XcRPIA2-pc&_rdr" target="_blank" class="flex items-center mx-2">
                                    <button class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white rounded-full w-8 h-8 flex justify-center items-center">
                                        <i class="pi pi-facebook"></i>
                                    </button>
                                </a>
                                <a href="https://www.facebook.com/p/MPRL-Solar-Panel-Trading-100066355175014/?paipv=0&eav=AfbZZElfTbUUslLmCJvufBw-zGw2TrPxHRlLWYEZWMl-8Yr17qFc4Pug4XcRPIA2-pc&_rdr" target="_blank" class="flex items-center mx-2">
                                    <button class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white rounded-full w-8 h-8 flex justify-center items-center">
                                        <i class="fa-brands fa-facebook-messenger"></i>
                                    </button>
                                </a>
                                <a href="https://www.facebook.com/p/MPRL-Solar-Panel-Trading-100066355175014/?paipv=0&eav=AfbZZElfTbUUslLmCJvufBw-zGw2TrPxHRlLWYEZWMl-8Yr17qFc4Pug4XcRPIA2-pc&_rdr" target="_blank" class="flex items-center mx-2">
                                    <button class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white rounded-full w-8 h-8 flex justify-center items-center">
                                        <i class="pi pi-instagram"></i>
                                    </button>
                                </a>
                            </div>
                                                                               
                        </div>
                    </div>
                    <iframe class="ml-24 my-5 w-6/12 max-md:ml-0 max-md:w-full border-2 border-inherit" style="border-radius: 25px;" loading="lazy" 
                    allowfullscreen src="https://www.google.com/maps/embed/v1/view?zoom=15&center=14.1757%2C121.2482&key=AIzaSyCoYUwKxuWHK_QlAe2vJuApe_SbGirZ-fM"></iframe>
                </div>
            </div>
        </div>
    </main>
    <Footer />
</template>
<script>
export default {
  
};
</script>

<style scoped>
</style>
