<script setup>
import NavBar from '@/Components/NavBar.vue'
import Accordion from '@/Components/Accordion.vue'
import { onMounted, onUnmounted, ref } from 'vue';
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
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 0,
        'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
        <NavBar :is_black="scroll > 0" />
    </nav>
    <main>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam iste voluptas expedita doloribus, delectus, est odit provident possimus facilis consequuntur eligendi, nostrum quasi! Dolore, maxime ex aut nobis fuga itaque!
    </main>
    <Footer />
</template>
<script>
export default {
  
};
</script>

<style scoped>
</style>
