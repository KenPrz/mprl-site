<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
import Modal from '@/Components/Modal.vue';
import Dropdown from '@/Components/Dropdown.vue';
import Login from '@/Pages/Auth/Login.vue';
import Register from '@/Pages/Auth/Register.vue';
import { Link } from '@inertiajs/vue3';
import {ref, onMounted, onUnmounted} from 'vue';
import { show } from '@unovis/ts/components/tooltip/style';

const autoAlign = ref('right');
const updateAutoAlign = () => {
  if (window.innerWidth < 1200) {
    autoAlign.value = 'right';
  } else {
    autoAlign.value = 'left';
  }
};

onMounted(() => {
  updateAutoAlign();
  window.addEventListener('resize', updateAutoAlign);
});
onUnmounted(() => {
  window.removeEventListener('resize', updateAutoAlign);
});
</script>
<template>
    <!-- Hide this section when scrolling -->
    <div
        class="ps-2 md:ps-0 flex pe-2 md:pe-0 justify-start md:justify-around bg-black text-white w-full text-sm font-light py-1 space-x-2">
        <div class="flex md:justify-center items-center space-x-1 md:space-x-4">
            <a href="https://internet.com/" class="flex items-center space-x-2">
                <i class="pi pi-map-marker"></i>
                <span>6620 Purok 1, San Antonio, Los Baños, Laguna</span>
            </a>
            <a href="mailto:mprlsolar@gmail.com" class="hidden md:flex items-center space-x-2">
                <i class="pi pi-envelope"></i>
                <span class="hidden md:block">mprlsolar@gmail.com</span>
            </a>
        </div>
        <div class="hidden md:flex items-center space-x-1 md:space-x-4">
            <a href="https://www.facebook.com/profile.php?id=100066355175014" target="_blank"class="flex items-center">
                <i class="pi pi-facebook"></i>
            </a>
            <a href="#" class="flex items-center">
                <i class="pi pi-instagram"></i>
            </a>
        </div>
    </div>
    <!-- Make this section sticky when scrolling -->
    <div class="flex justify-between md:justify-around py-1 items-center h-30">
        <div class="flex flex-col px-4 md:px-2">
            <NavLink :href="route('welcome')" :is_black="is_black">
                <ApplicationLogo />
            </NavLink>
        </div>
        <div>
            <ul class="flex space-x-5 sm:text-sm md:text-md lg:text-lg">
                <li>
                    <NavLink class="hidden:block" :href="route('welcome')" :active="route().current('welcome')" :is_black="is_black">
                        <span class="hidden md:block">Home</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1.2rem" :style="is_black? 'color:black':'color:white'" class="pi pi-home"></i>
                        </span>
                    </NavLink>
                </li>
                <li>
                    <NavLink class="hidden:block" :href="route('about.index')" :active="route().current('about.index')" :is_black="is_black">
                        <span class="hidden md:block">About Us</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-building"></i>
                        </span>
                    </NavLink>
                </li>
                <li>
                    <NavLink class="hidden:block" :href="route('products')" :active="route().current('products')" :is_black="is_black">
                        <span class="hidden md:block">Products</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-shopping-cart"></i>
                        </span>
                    </NavLink>
                </li>
                <li>
                    <NavLink class="hidden:block" :href="route('services.index')" :active="route().current('services.index')" :is_black="is_black">
                        <span class="hidden md:block">Services</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-briefcase"></i>
                        </span>
                    </NavLink>
                </li>
                <li>
                    <NavLink class="hidden:block" :href="route('blog.index')" :active="route().current('blog.index')" :is_black="is_black">
                        <span class="hidden md:block">Blog</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-pencil"></i>
                        </span>
                    </NavLink>
                </li>
                <li>
                    <NavLink class="hidden:block" :href="route('contact.index')" :active="route().current('contact.index')" :is_black="is_black">
                        <span class="hidden md:block">Contact Us</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-phone"></i>
                        </span>
                    </NavLink>
                </li>
            </ul>
        </div>
        <div class="flex items-center space-x-5 px-2">
            <span
                @click="showModal"
                id="get-quote"
                class="bg-main-500 hover:bg-main-600 transition-colors duration-200 text-white py-1 px-3 rounded-2xl hidden md:block">
                Get a Quote
            </span>
            <Dropdown :align="autoAlign" width="32">
                <template #trigger>
                    <span class="inline-flex rounded-md">
                        <span class="rounded-full"
                        >
                            <i class="pi pi-user"
                            style="font-size:1.2em" :style="is_black? 'color:black':'color:white'"></i>
                        </span>
                    </span>
                </template>
                <template #content>
                    <div v-if="isAuthenticated" class="flex flex-col text-sm font-semibold">
                        <Link :href="route('profile.edit')" class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                            <i style="font-size: 1rem" class="pi pi-user"></i>
                            <span>Account</span>
                        </Link>
                        <span
                            @click="logout"
                            class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1"
                        >
                            <i style="font-size: 1rem" class="pi pi-sign-out"></i>
                            <span>Logout</span>
                        </span>
                    </div>
                    <div v-else class="flex flex-col text-sm font-semibold">
                        <span @click="showLoginModal=true" class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                            <i class="pi pi-sign-in"></i>
                            <span>
                                Login
                            </span>
                        </span>
                        <span @click="showRegisterModal=true" class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                            <i class="pi pi-user-plus"></i>
                            <span>
                                Sign Up
                            </span>
                        </span>
                    </div>
                </template>
            </Dropdown>
        </div>
    </div>
    <Modal maxWidth="md" v-model:show="showContact" @close="showContact=false">
        <div class="flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md">
            <span class="text-2xl font-bold text-gray-800">Contact Us</span>
            <div class="text-center">
                <span class="block text-sm text-gray-600">Globe: <span class="font-medium text-gray-800">0956-769-3494</span></span>
                <span class="block text-sm text-gray-600">TM: <span class="font-medium text-gray-800">0953-039-8460</span></span>
                <span class="block text-sm text-gray-600">Smart: <span class="font-medium text-gray-800">0932-921-1767</span></span>
            </div>
        </div>        
    </Modal>
    <Modal maxWidth="md" v-model:show="showLoginModal" @close="showLoginModal=false">
        <Login 
            @openRegister="handleRegisterSwitch"
            @closeLogin="showLoginModal=false"
        />
    </Modal>
    <Modal maxWidth="md" v-model:show="showRegisterModal" @close="showRegisterModal=false">
        <Register 
            @openLogin="handleLoginSwitch"
            @closeRegister="showRegisterModal=false"
        />
    </Modal>
    <Modal maxWidth="md" v-model:show="showQuoteModal" @close="showQuoteModal=false">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit id necessitatibus quos architecto repellendus deleniti, cum obcaecati aperiam facere sunt mollitia qui eaque quo earum doloribus similique sed minus reprehenderit.
    </Modal>
    <div class="absolute -right-7 hover:right-0 sm:right-0 h-screen transition-all duration-200">
        <section id="icon-handler" class="flex flex-col h-full justify-center space-y-3">
            <span class="p-2 sm:p-4 rounded-s-md bg-red-400 flex items-center justify-center hover:bg-red-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
                <i id="icon-size" style="" class="pi pi-facebook"></i>
            </span>
            <span  class="p-2 sm:p-4 rounded-s-md bg-red-400 flex items-center justify-center hover:bg-red-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
                <i id="icon-size" style="" class="pi pi-instagram"></i>
            </span>
            <span @click="showContact=true"  class="p-2 sm:p-4 rounded-s-md bg-red-400 flex items-center justify-center hover:bg-red-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
                <i id="icon-size" style="" class="pi pi-phone"></i>
            </span>
            <span  class="p-2 sm:p-4 rounded-s-md bg-red-400 flex items-center justify-center hover:bg-red-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
                <i id="icon-size" style="" class="pi pi-envelope"></i>
            </span>
        </section>
    </div>
</template>
<script>
    export default {
        props: {
            is_black: Boolean
        },
        data() {
            return {
                showLoginModal: false,
                showRegisterModal: false,
                showQuoteModal: false,
                showContact: false,
            }
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
            handleRegisterSwitch() {
                this.showLoginModal = false;
                this.showRegisterModal = true;
            },
            handleLoginSwitch() {
                this.showRegisterModal = false;
                this.showLoginModal = true;
            },

        },
        computed: {
            isAuthenticated() {
                return this.$page.props.auth.user !== null;
            }
        }
    }
</script>
<style scoped>
    #get-quote {
        z-index: 100;
        transition: transform 0.5s;
    }

    #get-quote:hover {
        animation: pulsate 1s infinite;
    }
    @keyframes ripple {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes pulsate {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }

    #icon-size{
        font-size:1.2rem;
        color:white !important;
    }

    @media screen and (min-width: 768px) {
        #icon-size{
            font-size:1.5rem;
        }
    }
</style>
