<script setup>
import NavBar from '@/Components/NavBar.vue';
import { onMounted, onUnmounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import ProductFilter from './Components/ProductFilter.vue';

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
            <div>
                <div class="border-lime-600 border-l-4  md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="ml-20 text-xl font-medium text-lime-600">CATEGORIES</div>
                </div>
                <div>
                    <ProductFilter :categories="categories" @update-products="updateProducts" />
                </div>
            </div>
            <div class="container mx-auto w-full md:w-3/4 md:px-16 bg-white shadow-lg rounded border">
                <div class="flex justify-between">
                    <div class="w-2/5">
                        <h2 class="text-xl font-bold">{{ products.name }}</h2>
                        <p class="text-sm mt-2 tracking-widest">{{ products.desciption }}</p>
                        <div class="border mt-2 p-3 flex justify-center align-middle rounded-md">
                            <img class="w-1/2" src="https://rukminim2.flixcart.com/image/850/1000/xif0q/solar-panel/m/k/w/335-polycrystalline-335w-solar-panel-single-unit-solar-universe-original-imagztmhc2sacmb9.jpeg?q=20&crop=false" alt="">
                        </div>
                        <div class=" flex gap-1 justify-center  mt-2">
                            <div  class="w-20 border p-1 flex justify-center rounded-md shadow-md">
                                <img class="w-1/2" src="https://rukminim2.flixcart.com/image/850/1000/xif0q/solar-panel/m/k/w/335-polycrystalline-335w-solar-panel-single-unit-solar-universe-original-imagztmhc2sacmb9.jpeg?q=20&crop=false" alt="">
                            </div>
                            <div  class="w-20 border p-1 flex justify-center rounded-md shadow-md">
                                <img class="w-1/2" src="https://rukminim2.flixcart.com/image/850/1000/xif0q/solar-panel/m/k/w/335-polycrystalline-335w-solar-panel-single-unit-solar-universe-original-imagztmhc2sacmb9.jpeg?q=20&crop=false" alt="">
                            </div>
                            <div  class="w-20 border p-1 flex justify-center rounded-md shadow-md">
                                <img class="w-1/2" src="https://rukminim2.flixcart.com/image/850/1000/xif0q/solar-panel/m/k/w/335-polycrystalline-335w-solar-panel-single-unit-solar-universe-original-imagztmhc2sacmb9.jpeg?q=20&crop=false" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="w-3/4">
                        <div class="ml-10 ">
                            <div>
                                <h4 class="bg-gray-200 mt-2 align-middle p-1">
                                    PRODUCT SPECIFICATIONS 
                                </h4>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Brand</div>
                                    <div class="ml-2">{{products.name}}</div>
                                </div>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Supplier</div>
                                    <div class="ml-2">{{products.supplier}}</div>
                                </div>
                                
                            </div>
                            <div>
                                <h4 class="bg-gray-200 mt-2 align-middle p-1">
                                    TECHNICAL SPECIFICATIONS 
                                </h4>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Power Output</div>
                                    <div class="ml-2">{{products.power_out}} Volts</div>
                                </div>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Efficiency</div>
                                    <div class="ml-2">{{products.efficiency}} watts</div>
                                </div>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Voltage</div>
                                    <div class="ml-2">{{products.voltage}} Volts</div>
                                </div>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Type</div>
                                    <div class="ml-2">{{products.type}} watts</div>
                                </div>
                                <div class="flex border gap-2">
                                    <div class="w-1/3 border-r-2">Operating Temp</div>
                                    <div class="ml-2">{{products.temp_coeff}} °C</div>
                                </div>
                            </div>
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
