<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import NavLink from '@/Components/NavLink.vue';
</script>
<template>
    <!-- Hide this section when scrolling -->
    <div
        class="flex pe-2 md:pe-0 justify-end md:justify-around bg-black text-white w-full text-sm font-light py-1 space-x-1">
        <div class="flex md:justify-center items-center space-x-1 md:space-x-4">
            <a href="" class="flex items-center space-x-2">
                <i class="pi pi-map-marker"></i>
                <span class="hidden md:block">6620 Purok 1, San Antonio, Los Baños, Laguna</span>
            </a>
            <a href="" class="flex items-center space-x-2">
                <i class="pi pi-envelope"></i>
                <span class="hidden md:block">mprlsolar@gmail.com</span>
            </a>
        </div>
        <div class="flex items-center space-x-1 md:space-x-4">
            <a href="#" class="flex items-center">
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
            <button
                class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white py-1 px-3  md:hidden">
                Get a Quote
            </button>
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
                    <NavLink class="hidden:block" :href="route('services.index')" :active="route().current('services.index')" :is_black="is_black">
                        <span class="hidden md:block">Services</span>
                        <span class="md:hidden" >
                            <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-wrench"></i>
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
        <div v-if="isAuthenticated" class="flex space-x-2 px-2">
            <NavLink :href="route('profile.edit')" :is_black="is_black">
                <span class="hidden md:block">Account</span>
                <span class="md:hidden" >
                    <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-user"></i>
                </span>
            </NavLink>
            <span>/</span>
            <Button
                @click="logout"
            >
                <span class="hidden md:block">Logout</span>
                <span class="md:hidden" >
                    <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-sign-out"></i>
                </span>
            </Button>
        </div>
        <div v-else class="flex space-x-2 px-2">
            <NavLink :href="route('login')" :is_black="is_black">
                <span class="hidden md:block">Login</span>
                <span class="md:hidden" >
                    <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-sign-in"></i>
                </span>
            </NavLink>
            <span>/</span>
            <NavLink :href="route('register')" :is_black="is_black">
                <span class="hidden md:block">Register</span>
                <span class="md:hidden" >
                    <i style="font-size: 1rem" :style="is_black? 'color:black':'color:white'" class="pi pi-user-plus"></i>
                </span>
            </NavLink>
        </div>
    </div>
    <div class="flex justify-end relative">
        <button
            id="get-quote"
            class="absolute -bottom-12 right-5 bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white py-1 px-3 rounded-2xl hidden md:block">
            Get a Quote
        </button>
    </div>
</template>
<script>
    export default {
        props: {
            is_black: Boolean
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            }
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
        animation: ripple 1s infinite;
    }

    #get-quote:hover {
        animation: pulsate 1s infinite;
    }
    @keyframes ripple {
        0% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
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
</style>
