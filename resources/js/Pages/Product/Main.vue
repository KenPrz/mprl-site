<template>
   <Head title="Product" />
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
  <main>
    <div class="flex flex-col lg:ml-40 mt-10">
      <div class="grid grid-cols-1 gap-4 p-4 lg:flex lg:gap-0 lg:items-start lg:mr-20">
        <!-- Categories Section -->
        <div class="lg:flex lg:items-center lg:w-1/4">
          <div class="border-lime-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0">
            <div class="ml-10 text-xl font-medium text-lime-600 lg:ml-0 border-lime-600 border-l-4">
              <p class="ml-5 font-bold">CATEGORIES</p>
            </div>
            <div class="mt-2 sm:mt-0 lg:mt-2 w-full">
              <ProductFilter :categories="categories" @update-products="updateProducts" />
            </div>
            <div class="relative w-full mt-10 hidden sm:block">
              <img src="images/products-images/contact.png" class="w-full h-auto" alt="Product Image">
              <div class="absolute inset-0 flex items-end justify-start mb-2 pl-3">
                <p class="text-white text-sm bg-orange-300 p-2 rounded-lg">CONTACT US</p>
              </div>
            </div>
           <div>
            <div class="mt-10 hidden sm:block">
              <div class="ml-10 text-xl font-medium text-lime-600 lg:ml-0 border-lime-600 border-l-4">
                <p class="ml-5 font-bold">NEW PRODUCTS</p>
              </div>
            </div>
           </div>
          </div>
        </div>
        <!-- Product Display Cards -->
        <div class="border-t-4 p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:flex-1">
          <div v-for="product in products" :key="product.id" class="w-full">
            <ProductCard data-aos="fade-left" data-aos-delay="20" :product="product" />
          </div>
        </div>
      </div>
    </div>

  </main>
  <Footer />
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import NavBar from '@/Components/NavBar.vue';
import ProductCard from '@/Pages/Product/Components/ProductCard.vue';
import Pagination from '@/Components/Pagination.vue';
import ProductFilter from '@/Pages/Product/Components/ProductFilter.vue';
import Footer from '@/Components/Footer.vue';

const products = ref([]);
const categories = ref([]);

const props = defineProps({
  initialProducts: Array,
  categories: Array,
  products: Array,
  
  
});

function updateProducts(newProducts) {
  products.value = newProducts;
}

products.value = props.initialProducts;
categories.value = props.categories;

</script>

<style scoped>
</style>
