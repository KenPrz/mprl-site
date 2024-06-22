<script setup>
import NavBar from '@/Components/NavBar.vue';
import { onMounted, onUnmounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

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

const props = defineProps({
  products: {
    type: Object,
    required: true,
  }
});
</script>
<template>
    <Head :title="products.name" />
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
                    <h2 class="text-4xl md:text-5xl font-semibold text-white">Products</h2>
                    <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
                        <Link class="hover:underline" :href="route('welcome')">HOME</Link>
                        <span class="mx-2">/</span>
                        <Link class="hover:underline" :href="route('products')">Product</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full mt-5">
        <div class="flex justify-center md:px-32">
            <div class="container mx-auto w-full px-5 md:w-3/4 md:px-16 bg-white shadow-lg rounded border p-2">
                <div class="flex flex-row justify-between mt-5 py-3">
                    <div class="w-56 border text-center h-56">
                        <img src="" alt="">
                        img here
                    </div>
                    <div class="w-4/5 border ml-3">
                        <div class="p-5">
                            <h3 class="font-bold">Product Name: {{ products.name }}</h3>
                            <h3>Product Category: {{ products.category_id }}</h3>
                            <p>Description: {{ }}</p>
                            <h3>Date Uploaded: {{ products.created_at }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    <Footer />
</template>
<script>
   
</script>
