<template>
  <Head :title="products.name" />
  <NavBar/>
  <section>
    <div class="relative py-44 bg-cover bg-center h-auto" style="background-image: url('/images/blog-header-bg.png');">
      <div class="absolute inset-0 bg-blue-500 bg-opacity-70 flex flex-col justify-center items-center text-center">
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
      <div class="flex-col md:flex-row items-center md:items-start hidden md:block">
        <div class="mt-10">
          <div class="text-xl font-medium text-blue-600 lg:ml-0 border-blue-600 border-l-4 p-3">
            <p class="font-bold">NEW PRODUCTS</p>
          </div>
          <div class="mt-3 space-y-3">
            <div class="border rounded-lg hover:scale-105 transition-transform duration-300 hover:shadow-md p-3" v-for="newproduct in newproducts" :key="newproduct.id">
              <div class="flex gap-1 justify-center mt-2">
                <a :href="`/product/${newproduct.id}`">
                  <img class="w-auto max-h-40 object-cover" alt="" :src="newproduct.first_image ? `/storage/${newproduct.first_image.images}` : '/images/products-images/solarpanel.png'">
                  <div class="flex flex-col justify-between mt-2">
                    <p class="text-sm font-bold">{{ newproduct.name }}</p>
                    <p class="text-xs">{{ newproduct.power_out }} Watts | {{ newproduct.voltage }} Volts</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <p class="w-full text-start rounded-lg shadow-md px-4 py-2 m-1 bg-lime-500 text-white mt-10 lg:hidden">{{ products.category.name }}</p>
        </div>
      </div>
      <div class="container w-full md:w-3/4 bg-white shadow-lg rounded border p-4">
        <!-- Product Details -->
        <div class="flex flex-col lg:flex-row gap-10">
          <div class="w-full lg:w-2/5">
            <div>
              <div class=" mt-2 p-3 flex justify-center align-middle ">
                <img class="w-full lg:w-1/2" :src="mainImage" alt="Main Image">
              </div>
              <div class="flex gap-1 justify-center mt-2">
                <div
                  v-for="(image, index) in products.images"
                  :key="index"
                  class="w-auto max-h-40 border p-1 flex justify-center rounded-md shadow-md"
                  @click="changeImage(`/storage/${image.images}`)"
                >
                  <img class="w-full" :src="`/storage/${image.images}`" alt="Thumbnail Image">
                </div>
              </div>
            </div>
          </div>
          <div class="mt-5">
            <h2 class="text-3xl font-bold text-blue-500">{{ products.name }}</h2>
            <div class="mt-3">
                <div class="mt-2">
                  <p class="text-xl font-bold text-blue-500">Product Description*</p>
                </div>
              <div>
                <p class="text-sm mt-2 tracking-widest" v-html="products.description"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full mt-4 lg:mt-10">
            <div>
              <h4 class="font-bold mt-2 align-middle p-1 text-2xl text-blue-500 opacity-80">PRODUCT SPECIFICATIONS</h4>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Brand</div>
                <div class="ml-2">{{ products.name }}</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4  pt-3">
                <div class="w-1/3">Supplier</div>
                <div class="ml-2">{{ products.supplier }}</div>
              </div>
            </div>
            <div>
              <h4 class="font-bold mt-2 align-middle p-1 text-2xl text-blue-500 opacity-80">TECHNICAL SPECIFICATIONS</h4>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Power Output</div>
                <div class="ml-2">{{ products.power_out }} Watts</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Efficiency</div>
                <div class="ml-2">{{ products.efficiency }} %</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Voltage</div>
                <div class="ml-2">{{ products.voltage }} Volts</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Current</div>
                <div class="ml-2">{{ products.current }}A</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Type</div>
                <div class="ml-2">{{ products.type }}</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Temperature Coefficient</div>
                <div class="ml-2">{{ products.temp_coeff }}%/°C</div>
              </div>
            </div>
            <div>
              <h4 class="font-bold mt-2 align-middle p-1 text-2xl text-blue-500 opacity-80">PHYSICAL CHARACTERISTIC</h4>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Dimensions</div>
                <div class="ml-2">{{ products.dimension }}</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Weight</div>
                <div class="ml-2">{{ products.weight }}kg</div>
              </div>
            </div>
            <div>
              <h4 class="font-bold mt-2 align-middle p-1 text-2xl text-blue-500 opacity-80">OTHER DETAILS</h4>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Warranty</div>
                <div class="ml-2">{{ products.warranty }}</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Certifications</div>
                <div class="ml-2">{{ products.certification }}</div>
              </div>
              <div class="flex border-t-2 gap-24 text-xl tracking-wide mt-4 pt-3">
                <div class="w-1/3 -r-2">Data Sheet</div>
                <div class="ml-2">
                    <a v-if="products.datasheet" :href="`//${products.datasheet}`" target="_blank" rel="noopener noreferrer">
                        see datasheet
                    </a>
                    <span v-else>
                        no datasheet available
                    </span>
                </div>
              </div>
              <div class="mt-5">
                <button
                  @click="isAuthenticated ? (showModal = true) : (showLoginModal = true)"
                  :class="{
                    'bg-main-500 cursor-pointer': isAuthenticated,
                    'bg-gray-500 cursor-not-allowed': !isAuthenticated
                  }"
                  class="px-4 py-2 rounded-lg text-white text-xl"
                >
                  INQUIRE NOW
                </button>
              </div>
            </div>
          </div>
        <div class="border-t-4 mt-6">
          <div class="mt-2">
            <p class="text-xl">Similar Product Listing</p>
          </div>
          <div class="flex flex-wrap gap-2 lg:gap-5 justify-center">
            <div class="w-full sm:w-1/2 lg:w-1/4 mt-5" v-for="similarproduct in similarproducts" :key="similarproduct.id">
              <div class="hover:bg-slate-200 rounded-lg hover:shadow-lg p-4 h-full border">
                <img :src="similarproduct.first_image ? `/storage/${similarproduct.first_image.images}` : '/images/products-images/solarpanel.png'" class="w-full h-40 object-cover rounded-lg" alt="Similar Product Image">
                <p class="text-sm font-bold mt-2">{{ similarproduct.name }}</p>
                <p class="text-xs">{{ similarproduct.power_out }} Watts | {{ similarproduct.voltage }} Volts</p>
                <a :href="`/product/${similarproduct.id}`" class="text-xs bg-main-500 rounded-md text-white px-2 py-1 mt-1 inline-block">View</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Login Modal -->
  <Modal maxWidth="md" v-model:show="showLoginModal" @close="closeAllModals">
    <Login 
        @openRegister="handleRegisterSwitch"
        @closeLogin="closeAllModals"
    />
  </Modal>

  <!-- Register Modal -->
  <Modal maxWidth="md" v-model:show="showRegisterModal" @close="closeAllModals">
    <Register
        @openLogin="handleLoginSwitch"
        @closeRegister="closeAllModals"
    />
  </Modal>
  <!-- Modal -->
  <div v-if="showModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-md">
      <h2 class="text-xl font-bold mb-4">Great! Please fill out the form to inquire </h2>
      <form @submit.prevent="submitInquiry">
        <div class="mb-4">
          <label class="block text-gray-700">Name</label>
          <input v-model="form.name" type="text" class="w-full px-3 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Email</label>
          <input v-model="form.email" type="email" class="w-full px-3 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Phone Numer</label>
          <input v-model="form.phone" type="text" class="w-full px-3 py-2 border rounded-md" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700">Message</label>
          <textarea v-model="form.message" class="w-full px-3 py-2 border rounded-md" required></textarea>
        </div>
        <div class="flex justify-end">
          <button type="button" @click="showModal = false" class="bg-gray-300 px-4 py-2 rounded-lg mr-2">Cancel</button>
          <button :disabled="form.processing" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Send Inquiry</button>
        </div>
      </form>
    </div>
  </div>

  <Footer />
</template>


<script setup>
import NavBar from '@/Components/NavBar.vue';
import { onMounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link, useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import Login from '@/Pages/Auth/Login.vue';
import Register from '@/Pages/Auth/Register.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();

const scroll = ref(0);
const showModal = ref(false);
const showLoginModal = ref(false);


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
  },
  isAuthenticated: Boolean
});

const form = useForm({
  name: '',
  email: '',
  phone: '',
  product: props.products?.name || '',
  message: '',
});

const openLogin = () => {
    showLoginModal.value = true;
}

const showRegisterModal = ref(false);

// Function to open the login modal and close the register modal
const handleLoginSwitch = () => {
    showLoginModal.value = true;
    showRegisterModal.value = false;
};

// Function to open the register modal and close the login modal
const handleRegisterSwitch = () => {
    showRegisterModal.value = true;
    showLoginModal.value = false;
};

// Function to close both modals
const closeAllModals = () => {
    showLoginModal.value = false;
    showRegisterModal.value = false;
};

function submitInquiry() {
    form.post(route('productInquiry.send'), {
        onError: (errors) => {
          showModal.value = false;
            if (errors.loginRequired) {
                openLogin(); // Show the login modal
            }
        },
        onSuccess: () => {
            toast.success('Inquiry sent successfully!');
            form.reset();
            showModal.value = false;
        },
    });
}

onMounted(() => {
  if (props.products.images.length > 0) {
    mainImage.value = `/storage/${props.products.images[0].images}`;
  }
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
