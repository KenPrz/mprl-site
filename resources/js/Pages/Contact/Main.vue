<script setup>
import NavBar from '@/Components/NavBar.vue';
import Footer from '@/Components/Footer.vue';
import Modal from '@/Components/Modal.vue';
import { onMounted, onUnmounted, ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import Login from '@/Pages/Auth/Login.vue';
import Register from '@/Pages/Auth/Register.vue';
import InputError from '@/Components/InputError.vue';
import { useToast } from 'vue-toastification';

const toast = useToast();

const openLogin = () => {
    showLoginModal.value = true;
}

const showLoginModal = ref(false);
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

// Scroll position state
const scroll = ref(0);

// Form state using Inertia's useForm
const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    contact_number: '',
    address: '',
    monthly_elecBill: '',
    date: '',
    message: '',
});

// Function to handle scroll events
const handleScroll = () => {
    scroll.value = Math.round(window.scrollY);
};

// Mount and unmount event listeners for scroll
onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});

// Submit function to handle form submission
function submitInquire() {
    form.post(route('inquire.send'), {
        preserveScroll: true, // Correctly placed here
        onError: (errors) => {
            if (errors.loginRequired) {
                openLogin(); // Show the login modal
            }
        },
        onSuccess: () => {
            toast.success('Inquiry sent successfully!');
            form.reset();
        },
    });
}

// Emit event to open the login modal (if needed elsewhere)
const emit = defineEmits(['openLogin']);
</script>
<template>
    <Head title="Contact" />
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
                    <h2 class="text-4xl md:text-5xl font-semibold text-white">CONTACT US</h2>
                    <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
                        <a class="hover:underline" :href="route('welcome')">HOME</a>
                        <span class="mx-2">/</span>
                        <a class="hover:underline" :href="route('contact.index')">CONTACT US</a>
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
    <main class="px-5 md:px-28 cursor-default">
        <div class="flex flex-col items-center justify-center">
            <div class="self-center mt-24 mb-24 w-full max-w-[1346px] max-md:mt-10 max-md:max-w-full">
                <div class="flex gap-24 max-md:flex-col max-md:gap-0">
                    <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col px-5 mt-5 text-neutral-700 max-md:mt-10 max-md:max-w-full">
                            <div class="text-5xl font-semibold tracking-tighter max-md:max-w-full max-md:text-4xl">
                                We Would Love to Connect with You!
                            </div>
                            <div data-aos-once="true" data-aos="fade-left"  data-aos-duration="500" class="mt-14 text-xl tracking-tight text-justify max-md:mt-10 max-md:max-w-full">
                                Interested in getting solar? Start a conversation with us through
                                email or messenger, or get in touch with our team using the form
                                below.
                            </div>
                            <div data-aos-once="true" data-aos="fade-left" data-aos-duration="500" class="row mt-12">
                                <div class="text-3xl font-semibold tracking-tighter max-md:max-w-full max-md:text-4xl">
                                    Follow Us
                                </div>
                            </div>
                            <div class="row mt-3 flex">
                                <div data-aos="fade-left" data-aos-delay="300" data-aos-duration="500" data-aos-once="true">
                                    <a href="https://www.facebook.com/onemprl/" target="_blank" class="flex items-center mx-2">
                                        <button class="bg-yellow-500 hover:bg-amber-700 text-white rounded-md w-8 h-8 flex justify-center items-center">
                                            <i class="pi pi-facebook" style="font-size: 20px"></i>
                                        </button>
                                    </a>
                                </div>
                                <div data-aos="fade-left" data-aos-delay="500" data-aos-duration="500" data-aos-once="true">
                                    <a href="https://www.m.me/onemprl?" target="_blank" class="flex items-center mx-2">
                                        <button class="bg-yellow-500 hover:bg-amber-700 text-white rounded-md w-8 h-8 flex justify-center items-center">
                                            <i class="fa-brands fa-facebook-messenger" style="font-size: 20px"></i>
                                        </button>
                                    </a>
                                </div>
                                <div data-aos="fade-left" data-aos-delay="700" data-aos-duration="500" data-aos-once="true">
                                    <a href="https://www.facebook.com/onemprl/" target="_blank" class="flex items-center mx-2">
                                        <button class="bg-yellow-500 hover:bg-amber-700 text-white rounded-md w-8 h-8 flex justify-center items-center">
                                            <i class="pi pi-instagram" style="font-size: 20px"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>                                                                               
                        </div>
                    </div>
                    <iframe class="my-5 w-6/12 max-md:ml-0 max-md:w-full border-2 border-inherit" style="border-radius: 25px;" loading="lazy" 
                    allowfullscreen src="https://www.google.com/maps/embed/v1/view?zoom=15&center=14.1757%2C121.2482&key=AIzaSyCoYUwKxuWHK_QlAe2vJuApe_SbGirZ-fM"></iframe>
                </div>
                <div class="flex flex-col md:flex-row justify-center gap-6 mt-28 h-full">
                    <div data-aos-once="true" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" class="card border rounded-lg shadow p-10 py-5 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-14 h-14 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-envelope" style="font-size: 25px"></i>
                            </span>
                        </div>
                        <h5 class="text-l font-semibold mb-2 text-center">SEND US AN EMAIL</h5>
                        <p class="text-neutral-600 text-center text-sm">mprsunpower104@gmail.com</p>
                    </div>                        
                    <div data-aos="fade-right" data-aos-delay="100" data-aos-duration="500" class="card border rounded-lg shadow p-10 py-5 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-14 h-14 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-location-dot" style="font-size: 25px"></i>
                            </span>
                        </div>
                        <h5 class="text-l font-semibold mb-2 text-center">VISIT US AT OUR OFFICE</h5>
                        <p class="text-neutral-600 text-center text-sm">6620 Purok 1, San Antonio, Los Baños, Laguna</p>
                    </div>
                    <div data-aos="fade-right" data-aos-delay="150" data-aos-duration="700" class="card border rounded-lg shadow p-10 py-5 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-14 h-14 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-phone" style="font-size: 25px"></i>
                            </span>
                        </div>
                        <h5 class="text-l font-semibold mb-2 text-center">GET IN TOUCH</h5>
                        <p class="text-neutral-600 text-center text-sm">Globe: 0956-769-3494</p>
                        <p class="text-neutral-600 text-center text-sm">TM: 0953-039-8460</p>
                        <p class="text-neutral-600 text-center text-sm">Smart: 0932-921-1767</p>
                    </div>
                </div>                                            
            </div>
        </div>
    </main>
    <section>
        <div class="relative py-80 bg-cover bg-center h-auto" style="background-image: url('/images/mprl-projects/solar-1.jpeg');">
            <div class="absolute inset-0 bg-black bg-opacity-75 flex flex-col justify-center items-center text-start">
                <form @submit.prevent="submitInquire" class="max-w-2xl mx-auto w-full">
                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="relative flex-1">
                            <input v-model="form.first_name" type="text" id="first_name" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="first_name" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">First Name</label>
                            <InputError class="mt-2" :message="form.errors.first_name" />
                        </div>
                        <div class="relative flex-1">
                            <input v-model="form.last_name" type="text" id="last_name" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="last_name" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Last Name</label>
                            <InputError class="mt-2" :message="form.errors.last_name" />
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="relative flex-1">
                            <input v-model="form.email" type="text" id="email" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="email" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Email</label>
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="relative flex-1">
                            <input v-model="form.contact_number" type="text" id="contact_number" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="contact_number" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Contact Number</label>
                            <InputError class="mt-2" :message="form.errors.contact_number" />
                        </div>
                    </div>
                    <div class="relative mb-8">
                        <textarea v-model="form.address" id="address" rows="2" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required></textarea>
                        <label for="address" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Address</label>
                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>
                    <div class="flex flex-wrap gap-4 mb-8">
                        <div class="relative flex-1">
                            <input v-model="form.monthly_elecBill" type="number" id="monthly_elecBill" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="monthly_elecBill" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Monthly Electric Bill</label>
                            <InputError class="mt-2" :message="form.errors.monthly_elecBill" />
                        </div>
                        <div class="relative flex-1">
                            <input v-model="form.date" id="date" name="date" type="date" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                            <label for="date" class="absolute text-sm text-slate-50 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Book a Site Visit</label>
                            <InputError class="mt-2" :message="form.errors.date" />
                        </div>                        
                    </div>                    
                    <div class="relative mb-8">
                        <textarea v-model="form.message" id="message" rows="5" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required></textarea>
                        <label for="message" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-5 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:text-slate-50 peer-focus:font-bold peer-valid:text-slate-50 peer-valid:-translate-y-8">Message</label>
                        <InputError class="mt-2" :message="form.errors.message" />
                    </div>
                    <button :disabled="form.processing" type="submit" class="text-white bg-main-500 hover:bg-main-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                </form>
            </div>
        </div>
    </section>                      
<Footer />
</template>
<script>
export default {
  
};
</script>

<style scoped>
</style>
