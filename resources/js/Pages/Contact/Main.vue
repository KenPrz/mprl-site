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
import FollowUs from '@/Components/Contact/FollowUs.vue';

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
            style="background-image: url('/images/contact-us-bg.jpg');">
            <div class="absolute inset-0 bg-blue-500 bg-opacity-80 flex flex-col justify-center items-center text-center">
                <div class="flex flex-col items-center justify-center space-y-6">
                    <h2 class="text-4xl md:text-5xl font-semibold text-white">CONTACT US</h2>
                    <div class="text-md md:tracking-wide space-x-4 flex text-white">
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
    <main class="px-5 md:px-32 cursor-default">
        <div class="flex flex-col items-center justify-center">
            <div class="self-center my-24 w-full max-w-[1346px] max-md:mt-10">
                <!-- Container with responsive flex direction -->
                <div class="flex flex-col md:flex-row gap-32 max-md:gap-0">
                    <!-- First Column (Contact and Follow Us) -->
                    <div class="flex flex-col w-full md:w-5/12 max-md:ml-0">
                        <div class="flex flex-col text-blue-500 max-md:mt-10">
                            <div class="text-4xl font-semibold tracking-tighter">
                                We Would Love to <br> Connect with You!
                            </div>
                            <div data-aos-once="true" data-aos="fade-left" data-aos-duration="500" class="mt-5 text-xs tracking-tight text-blue-500 text-justify max-md:mt-10 max-md:max-w-full">
                                Interested in getting solar? Start a conversation with us through
                                email or messenger, or get in touch with our team using the form.
                            </div>
                        </div>
                        <!-- Show on Large screens: Follow Us Section and Map Section -->
                        <div class="hidden md:block">
                            <!-- Follow Us Section -->
                            <FollowUs />
                            
                            <!-- Map Section -->
                            <iframe class="mt-16 max-md:ml-0 w-full h-60 border-2 border-inherit rounded-[25px] hidden md:block" 
                            loading="lazy" allowfullscreen 
                            src="https://www.google.com/maps/embed/v1/view?zoom=15&center=14.1757%2C121.2482&key=AIzaSyCoYUwKxuWHK_QlAe2vJuApe_SbGirZ-fM">
                            </iframe>
                        </div>
                    </div>
    
                    <!-- Second Column (Form) -->
                    <div class="my-5 w-full md:w-7/12 mt-20 md:mt-0 max-md:ml-0 flex flex-col items-center text-start">
                        <form @submit.prevent="submitInquire" class="max-w-2xl mx-auto w-full">
                            <div class="flex flex-wrap gap-4 mb-8">
                                <div class="relative flex-1">
                                    <input v-model="form.first_name" type="text" id="first_name" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="first_name" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">First Name</label>
                                    <InputError class="mt-2" :message="form.errors.first_name" />
                                </div>
                                <div class="relative flex-1">
                                    <input v-model="form.last_name" type="text" id="last_name" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="last_name" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Last Name</label>
                                    <InputError class="mt-2" :message="form.errors.last_name" />
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-4 mb-8">
                                <div class="relative flex-1">
                                    <input v-model="form.email" type="text" id="email" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="email" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Email</label>
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>
                                <div class="relative flex-1">
                                    <input v-model="form.contact_number" type="text" id="contact_number" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="contact_number" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Contact Number</label>
                                    <InputError class="mt-2" :message="form.errors.contact_number" />
                                </div>
                            </div>
                            <div class="relative mb-8">
                                <textarea v-model="form.address" id="address" rows="2" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required></textarea>
                                <label for="address" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Address</label>
                                <InputError class="mt-2" :message="form.errors.address" />
                            </div>
                            <div class="flex flex-wrap gap-4 mb-8">
                                <div class="relative flex-1">
                                    <input v-model="form.monthly_elecBill" type="number" id="monthly_elecBill" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="monthly_elecBill" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Monthly Electric Bill</label>
                                    <InputError class="mt-2" :message="form.errors.monthly_elecBill" />
                                </div>
                                <div class="relative flex-1">
                                    <input v-model="form.date" id="date" name="date" type="date" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
                                    <label for="date" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Book a Site Visit</label>
                                    <InputError class="mt-2" :message="form.errors.date" />
                                </div>                        
                            </div>                    
                            <div class="relative mb-8">
                                <textarea v-model="form.message" id="message" rows="5" class="w-full peer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2 px-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required></textarea>
                                <label for="message" class="absolute text-sm text-gray-800 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-2 z-10 origin-[0] bg-transparent px-3 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-8 peer-focus:font-bold peer-valid:-translate-y-8">Message</label>
                                <InputError class="mt-2" :message="form.errors.message" />
                            </div>
                            <button :disabled="form.processing" type="submit" class="text-white bg-main-500 hover:bg-main-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-auto px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                        </form>
                    </div>
                </div>
                <!-- Show on Small screens: Follow Us Section and Map Section -->
                <div class="block md:hidden">
                    <FollowUs />
                    <iframe class="mt-16 max-md:ml-0 w-full h-60 border-2 border-inherit rounded-lg" 
                        loading="lazy" allowfullscreen 
                        src="https://www.google.com/maps/embed/v1/view?zoom=15&center=14.1757%2C121.2482&key=AIzaSyCoYUwKxuWHK_QlAe2vJuApe_SbGirZ-fM">
                    </iframe>
                </div>

                <!-- Contact Cards -->
                <div class="p-5 flex flex-col md:flex-row justify-center gap-6 mt-28 h-full w-full">
                    <div data-aos-once="true" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" class="card border rounded-lg shadow py-2 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-10 h-10 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-envelope" style="font-size: 20px"></i>
                            </span>
                        </div>
                        <h5 class="font-semibold mb-2 text-center">SEND US AN EMAIL</h5>
                        <p class="text-neutral-600 text-center text-xs">mprlsolar@gmail.com</p>
                    </div>                        
                    <div data-aos="fade-right" data-aos-delay="100" data-aos-duration="500" class="card border rounded-lg shadow py-2 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-10 h-10 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-location-dot" style="font-size: 20px"></i>
                            </span>
                        </div>
                        <h5 class="font-semibold mb-2 text-center">VISIT US AT OUR OFFICE</h5>
                        <p class="text-neutral-600 text-center text-xs">Blk 9 Lot 87 Seville St., La Vecina Camella Dos Rios, Cabuyao, Laguna 4025 Cabuyao, Philippines</p>
                    </div>
                    <div data-aos="fade-right" data-aos-delay="150" data-aos-duration="700" class="card border rounded-lg shadow py-2 mb-4 flex flex-col items-center w-full md:w-2/3 min-h-48 hover:shadow-xl hover:text-main-500">
                        <div class="row my-3">
                            <span class="w-10 h-10 bg-main-500 rounded-full flex items-center justify-center mb-2 text-white">
                                <i class="fa-solid fa-phone" style="font-size: 20px"></i>
                            </span>
                        </div>
                        <h5 class="font-semibold mb-2 text-center">GET IN TOUCH</h5>
                        <p class="text-neutral-600 text-center text-xs">0916-830-5551</p>
                        <p class="text-neutral-600 text-center text-xs">0967-362-0733</p>
                    </div>
                </div>
            </div>
        </div>
    </main>                         
<Footer />
</template>
<script>
export default {
  
};
</script>

<style scoped>
</style>
