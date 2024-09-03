<template>
  <Head title="Product" />
    <nav :class="{
        'bg-white shadow-md fixed': scroll > 1,
        'bg-none text-white absolute bg-black bg-opacity-10': scroll === 0
    }" class="flex flex-col top-0 w-full bg-none z-50 h-30 transition-all duration-500 ease-in-out">
        <NavBar :is_black="scroll > 0" />
    </nav>
  <section>
    <div class="relative py-44 bg-cover bg-center h-auto" style="background-image: url('/images/blog-header-bg.png');">
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
    <div class="flex flex-col md:flex-row justify-center md:px-32 gap-4">
      <div class="flex flex-col md:flex-row items-center md:items-start">
        <div class="mt-10 hidden sm:block w-full">
          <div class="ml-10 text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4">
            <p class="ml-5 font-bold">NEW PRODUCTS</p>
          </div>
          <div class="mt-3">
            <div class="border rounded-lg hover:scale-105 transition-transform duration-300 hover:shadow-md p-2" v-for="newproduct in newproducts" :key="newproduct.id">
              <div class="flex gap-1 items-start mt-2">
                <img class="w-1/3 h-20 object-cover" alt="" :src="newproduct.first_image ? `/storage/${newproduct.first_image.images}` : '/images/products-images/solarpanel.png'">
                <div class="flex flex-col justify-between">
                  <p class="text-sm font-bold">{{ newproduct.name }}</p>
                  <p class="text-xs">{{ newproduct.power_out }} Watts | {{ newproduct.voltage }} Volts</p>
                  <a :href="`/product/${newproduct.id}`" class="text-xs  rounded-md text-white px-2 py-1 mt-1 inline-block">View</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <p class="w-full text-start rounded-lg shadow-md px-4 py-2 m-1 bg-lime-500 text-white mt-10 lg:hidden">{{ products.category.name }}</p>
        </div>
      </div>
      <div class="container mx-auto w-full md:w-3/4 bg-white shadow-lg rounded border p-4">
        <!-- Product Details -->
        <div class="flex flex-col md:flex-row">
          <div class="w-full md:w-2/5">
            <h2 class="text-xl font-bold">{{ products.name }}</h2>
            <div>
              <div class="border mt-2 p-3 flex justify-center align-middle rounded-md">
                <img class="w-full md:w-1/2" :src="mainImage ? `/storage/${props.products.images[0].images}` : '/images/products-images/solarpanel.png' " alt="Main Image">
              </div>
              <div class="flex gap-1 justify-center mt-2">
                <div
                  v-for="(image, index) in products.images"
                  :key="index"
                  class="w-20 border p-1 flex justify-center rounded-md shadow-md"
                  @click="changeImage(`/storage/${image.images}`)"
                >
                  <img class="w-full" :src="`/storage/${image.images}`" alt="Thumbnail Image">
                </div>
              </div>
            </div>
          </div>
          <div class="w-full md:w-3/5 mt-4 md:mt-0 md:ml-10">
            <div>
              <h4 class="bg-gray-200 mt-2 align-middle p-1">PRODUCT SPECIFICATIONS</h4>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Brand</div>
                <div class="ml-2">{{ products.name }}</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Supplier</div>
                <div class="ml-2">{{ products.supplier }}</div>
              </div>
            </div>
            <div>
              <h4 class="bg-gray-200 mt-2 align-middle p-1">TECHNICAL SPECIFICATIONS</h4>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Power Output</div>
                <div class="ml-2">{{ products.power_out }} Watts</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Efficiency</div>
                <div class="ml-2">{{ products.efficiency }} %</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Voltage</div>
                <div class="ml-2">{{ products.voltage }} Volts</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Current</div>
                <div class="ml-2">{{ products.current }}A</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Type</div>
                <div class="ml-2">{{ products.type }}</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Temperature Coefficient</div>
                <div class="ml-2">{{ products.temp_coeff }}%/°C</div>
              </div>
            </div>
            <div>
              <h4 class="bg-gray-200 mt-2 align-middle p-1">PHYSICAL CHARACTERISTIC</h4>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Dimensions</div>
                <div class="ml-2">{{ products.dimension }}</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Weight</div>
                <div class="ml-2">{{ products.weight }}kg</div>
              </div>
            </div>
            <div>
              <h4 class="bg-gray-200 mt-2 align-middle p-1">OTHER DETAILS</h4>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Warranty</div>
                <div class="ml-2">{{ products.warranty }} years</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Certifications</div>
                <div class="ml-2">{{ products.certification }}</div>
              </div>
              <div class="flex border gap-2">
                <div class="w-1/3 border-r-2">Data Sheet</div>
                <div class="ml-2">{{ products.datasheet }}</div>
              </div>
              <div class="mt-5">
                <button @click="showModal = true" class="bg-green-500 p-2 rounded-lg text-white">INQUIRE NOW</button>
                <span v-if="inquirySuccess" class="ml-4 text-green-600">Message sent successfully!</span>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <div class="mt-2">
            <p class="text-xl">Product Description*</p>
          </div>
          <div>
            <p class="text-sm mt-2 tracking-widest" v-html="products.description"></p>
          </div>
        </div>
        <div class="border-t-4 mt-6">
          <div class="mt-2">
            <p class="text-xl">Similar Product Listing</p>
          </div>
          <div class="flex flex-wrap gap-5 justify-center">
            <div class="w-full sm:w-1/2 lg:w-1/4 mt-5" v-for="similarproduct in similarproducts" :key="similarproduct.id">
              <div class="hover:bg-slate-200 rounded-lg hover:shadow-lg p-4 h-full border">
                <img :src="similarproduct.first_image ? `/storage/${similarproduct.first_image.images}` : '/images/products-images/solarpanel.png'" class="w-full h-40 object-cover rounded-lg" alt="Similar Product Image">
                <p class="text-sm font-bold mt-2">{{ similarproduct.name }}</p>
                <p class="text-xs">{{ similarproduct.power_out }} Watts | {{ similarproduct.voltage }} Volts</p>
                <a :href="`/product/${similarproduct.id}`" class="text-xs bg-green-500 rounded-md text-white px-2 py-1 mt-1 inline-block">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-md">
      <h2 class="text-xl font-bold mb-4">Inquire Now</h2>
      <form @submit.prevent="submitInquiry">
        <div class="mb-4">
          <label class="block text-gray-700">Name</label>
          <input v-model="inquiry.name" type="text" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Email</label>
          <input v-model="inquiry.email" type="email" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Phone Numer</label>
          <input v-model="inquiry.phone" type="number" class="w-full px-3 py-2 border rounded-md">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Message</label>
          <textarea v-model="inquiry.message" class="w-full px-3 py-2 border rounded-md"></textarea>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded-lg mr-2">Cancel</button>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Send Inquiry</button>
        </div>
      </form>
    </div>
  </div>

  <Footer />
</template>


<script setup>
import NavBar from '@/Components/NavBar.vue';
import { ref, computed, onMounted, onUnmounted } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import axios from 'axios';
const scroll = ref(0);
const showModal = ref(false);
const inquiry = ref({
  name: '',
  email: '',
  phone: '',
  product: '',
  message: '',
});

const inquirySuccess = ref(false);
const submitInquiry = () => {
  axios.post('/inquire-product', {
    name: inquiry.value.name,
    email: inquiry.value.email,
    phone: inquiry.value.phone,
    product: props.products.name,
    message: inquiry.value.message
  })
  .then(response => {
    console.log('Inquiry submitted:', response.data);
    showModal.value = false;
    inquirySuccess.value = true; 
    inquiry.value = {
      name: '',
      email: '',
      phone: '',
      message: '',
    };
    setTimeout(() => {
      inquirySuccess.value = false;
    }, 5000);
  })
  .catch(error => {
    console.error('Error submitting inquiry:', error);
  });
};
const handleScroll = () => {
    scroll.value = Math.round(window.scrollY);
  };
onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
const props = defineProps({
  products: {
    type: Object,
    required: true,
  },
  similarproducts: {
    type: Array,
    required: true
  },
  newproducts: {
    type: Array,
    required: true
  }
});

onMounted(() => {
  if (props.products.images.length > 0) {
    mainImage.value = `/storage/${props.products.images[0].images}`;
  }
  window.addEventListener('scroll', handleScroll);
});

const mainImage = ref('');

const changeImage = (image) => {
  mainImage.value = image;
};
</script>



<style>
img {
  cursor: pointer;
  transition: transform 0.3s;
}
img:hover {
  transform: scale(1.1);
}
</style>
