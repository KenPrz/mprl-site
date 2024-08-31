  <template>
    <Head title="Product" />
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 1,
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
    <div class="flex flex-col lg:ml-20 mt-10">
      <div class="grid grid-cols-1 gap-4 p-4 lg:flex lg:gap-0 lg:items-start lg:mr-20">
        <!-- Categories Section -->
        <div class="lg:flex lg:items-center lg:w-2/5">
          <div class="border-blue-600 grid grid-cols-1 sm:flex lg:flex-col lg:items-start lg:ml-0 lg:border-0">
            <div class="ml-10 text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4">
              <p class="ml-5 font-bold">CATEGORIES</p>
            </div>
            <div class="mt-2 sm:mt-0 lg:mt-2 w-full">
              <ProductFilter :categories="categories" @update-products="updateProducts" />
            </div>
            <div class="relative w-3/4 mt-10 hidden sm:block">
              <img src="images/products-images/contact.png" class="w-full h-auto" alt="Product Image">
              <div class="absolute inset-0 flex items-end justify-start mb-2 pl-3">
                <p class="text-white text-sm bg-orange-300 p-2 rounded-lg">CONTACT US</p>
              </div>
            </div>
            <div>
            <div class="mt-10 hidden sm:block">
              <div class="ml-10 text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4">
                <p class="ml-5 font-bold">NEW PRODUCTS</p>
              </div>
              <div class="mt-3 border rounded-lg hover:scale-105 transition-transform duration-300 hover:shadow-md" v-for="newproduct in newproducts" :key="newproduct.id">
                <div class="">
                  <div class="flex gap-5 p-2 pl-3">
                    <img class="w-1/4" alt="" :src="newproduct.first_image ? `/storage/${newproduct.first_image.images}` : '/images/products-images/solarpanel.png'">
                    <div>
                      <p class="ml-3 font-bold">{{ newproduct.name }}</p>
                      <p class="ml-3 text-sm flex mt-1">{{ newproduct.power_out }}Watts|{{newproduct.voltage }}Volts</p>
                      <a :href="`/product/${newproduct.id}`" class="text-sm bg-green-500 rounded-md text-white px-2 ml-3">View</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <!-- Product Display Cards -->
          <div class="lg:w-3/4">
            <div class="flex flex-col sm:flex-row sm:justify-between">
                <div class="sm:mr-4 mb-4 sm:mb-1">
                  <select name="sortBy" id="" class="mt-2 ml-4 sm:ml-0 px-3 py-1 border rounded-2xl" v-model="selectedSortOption" @change="sortProducts">
                    <option value="all" selected>Sort By</option>
                    <option value="name">Name</option>
                    <option value="power">Power Out</option>
                    <option value="voltage">Voltage</option>
                  </select>
                </div>
                <div class="relative w-full sm:w-auto mt-2">
                  <input type="text" v-model="searchQuery" class="border rounded-2xl px-3 py-1 m-1 sm:m-0 w-full sm:w-auto" placeholder="Search Product">
                  <!-- <button @click="searchProducts" class="bg-green-600 text-white rounded-3xl px-5 py-1 absolute top-1/2 right-0 transform -translate-y-1/2 sm:translate-x-1/2"><i class="fa-solid fa-magnifying-glass"></i><span> search</span></button> -->
                </div>
              </div>

          <div class="border-t-4 p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:flex-1">
            <div v-for="product in filteredProducts" :key="product.id" class="w-full">
              <ProductCard data-aos="fade-left" data-aos-delay="20" :product="product" />
            </div>
          </div>
         </div>
      </div>
    </div>
  </main>
  <Footer />
  </template>

  <script setup>
  import { ref, computed, onMounted, onUnmounted } from 'vue';
  import { Head } from '@inertiajs/vue3';
  import { Link } from '@inertiajs/vue3';
  import NavBar from '@/Components/NavBar.vue';
  import ProductCard from '@/Pages/Product/Components/ProductCard.vue';
  import ProductFilter from '@/Pages/Product/Components/ProductFilter.vue';
  import Footer from '@/Components/Footer.vue';


  const scroll = ref(0);
  const products = ref([]);
  const categories = ref([]);

  const selectedSortOption = ref('all');
  const searchQuery = ref('');

  const props = defineProps({
  initialProducts: Array,
  categories: Array,
  products: Array,
  newproducts: Array
  });

  const handleScroll = () => {
    scroll.value = Math.round(window.scrollY);
  };

  onMounted(() => {
    window.addEventListener('scroll', handleScroll);
  });

  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
  });

  function updateProducts(newProducts) {
  products.value = newProducts;
  }

  products.value = props.initialProducts;
  categories.value = props.categories;
  
  const sortedProducts = computed(() => {
  if (selectedSortOption.value === 'name') {
    return [...products.value].sort((a, b) => a.name.localeCompare(b.name));
  } else if (selectedSortOption.value === 'power') {
    return [...products.value].sort((a, b) => a.power_out - b.power_out);
  } else if (selectedSortOption.value === 'voltage') {
    return [...products.value].sort((a, b) => a.voltage - b.voltage);
  } else {
    return products.value;
  }
  });

  const filteredProducts = computed(() => {
  if (!searchQuery.value) {
    return sortedProducts.value;
  }
  return sortedProducts.value.filter(product =>
    product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
  );
  });

  function sortProducts() {
  sortedProducts.value;
  }
  function searchProducts() {
  filteredProducts.value;
  }
  
</script>

<style scoped>
.lg\:w-1\/5 {
  width: 25%;
}

.lg\:w-3\/4 {
  width: 75%;
}
.border-lime-600 {
  border-color: #A3E635; 
}

.ml-10 {
  margin-left: 2.5rem; 
}

.mt-10 {
  margin-top: 2.5rem; 
}

.w-full {
  width: 100%;
}

.p-4 {
  padding: 1rem; 
}

@media (min-width: 1024px) {
  .lg\:ml-0 {
    margin-left: 0;
  }
  .lg\:border-0 {
    border: 0;
  }
  .lg\:flex {
    display: flex;
  }
  .lg\:items-start {
    align-items: flex-start;
  }
}
.relative {
  position: relative;
}

.absolute {
  position: absolute;
}

.top-1\/2 {
  top: 50%;
}

.right-0 {
  right: 0;
}

.transform {
  transform: translateY(-50%);
}

.translate-x-1\/2 {
  transform: translateX(50%);
}

.sm\:translate-x-1\/2 {
  @media (min-width: 640px) {
    .translate-x-1\/2 {
      transform: translateX(50%);
    }
  }
}
</style>

