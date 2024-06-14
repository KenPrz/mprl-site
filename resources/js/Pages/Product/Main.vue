<script setup>
import NavBar from '@/Components/NavBar.vue'
import AccordionProd from '@/Pages/Product/Components/AccordionProd.vue'
import ProductCard from '@/Pages/Product/Components/ProductCard.vue';
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
        <div class="flex flex-col ml-40 mt-10">
            
            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4 mr-20">
                <div class="">
                    <div class=" border-lime-600 border-l-4">
                        <div class="ml-20 text-xl font-medium text-lime-600	">CATEGORIES</div>
                        
                    </div>
                    
                    <div class="">
                        <AccordionProd :items="accordionItems" />
                    </div>
                   
                    
                </div>
                <!-- Product Display Card -->
                 <ProductCard />
            </div>
        </div>
    </main>
    <Footer />
</template>
<script>
    export default{
        components: {
            AccordionProd
        },
        
    data() {
        return {
        accordionItems: [
            { title: 'Solar Panel', content: 'Residential Solar' },
            { title: 'Solar Street Light', content: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam deleniti, pariatur autem nihil iusto dicta vel consectetur. Sint ab tempora blanditiis aperiam earum eum.' },
            { title: 'Solar Water Pump', content: 'Content for Accordion Item 3' }
        ]
        };
  }
}
</script>

<style scoped>
</style>
