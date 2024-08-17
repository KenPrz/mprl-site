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

const openSolarMenu = () => {
    isSolarMenuOpen.value = !isSolarMenuOpen.value;
    activeMenuItem.value = 'solar';
};
const openCompanyProfile = () => {
    isComProfOpn.value = !isComProfOpn.value;
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
    <div class="flex flex-col ml-40 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 mr-20 mt-10">
        <!-- Sidebar Menu -->
        <div class="lg:w-3/4">
        <div class=" pl-5">
            <div class="border-blue-600 border-l-4">
                <p class=" text-xl font-bold text-blue-600 ml-5">ABOUT ONE MPRL</p>
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
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">How Solar Power Works?</a></li>
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Types of Solar Systems</a></li>
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Four Major Benefits of Solar Energy</a></li>
                </ul>
            </li>
            <li class="mt-1">
                <button
                @click="openCompanyProfile"
                class="flex justify-between items-center w-full text-left py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md"
                >
                Company Profile
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': isComProfOpn }"></i>
                </button>
                <ul v-show="isComProfOpn" class="pl-4 mt-2 space-y-2 border-blue-600 border-l-4">
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">History Timeline</a></li>
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Vision - Mission</a></li>
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Core Values</a></li>
                <li><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Team - Commitment</a></li>
                </ul>
            </li>
            <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Certificates & Awards</a></li>
            <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Share Holder & Investors</a></li>
            <li class="mt-1"><a href="#" class="block py-2 px-4 bg-gray-200 hover:text-white hover:bg-blue-600 rounded-md">Organizational Chart</a></li>
            </ul>
        </div>
        </div>

        <!-- Content Area -->
        <div class="lg:w-3/4">
        HEHLO
        </div>
    </div>
    </div>
</main>

<Footer />
</template>

<style scoped>
</style>
