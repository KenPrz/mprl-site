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
    <Head title="Product" />
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 0,
        'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
        <NavBar :is_black="scroll > 0" />
    </nav>
    <section>
        <div class="relative py-48 bg-cover bg-center h-auto"
            style="background-image: url('/images/blog-header-bg.png');">
            <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
                <div class="flex flex-col items-center justify-center space-y-4">
                    <h1 class="text-4xl text-offset-500">Renewable Energy</h1>
                    <h2 class="text-5xl font-semibold text-white">Shine brighter, Live lighter</h2>
                </div>
            </div>
        </div>
    </section>
    <main>
        <div class="flex flex-col items-center justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                This is the product section!
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
