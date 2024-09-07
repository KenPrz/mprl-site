<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <footer>
        <div class="flex flex-col pt-4 space-y-2 bg-white-200">
            <section class="text-center px-8 md:px-16 ">
                <h1 class="text-xl font-semibold text-main-500 text-pretty">MPRL Solar Panel Trading</h1>
                <p class="font-light text-sm">MPRL Solar Panel Trading specializes in supplying efficient and eco-friendly solar-powered LED
                    lights. Our lights offer easy installation and come in a variety of types, styles, sizes, and
                    colors. Say goodbye to electrical wiring - our lights run on solar power, making them both
                    convenient and environmentally friendly.</p>
            </section>
            <section class="flex items-center justify-center space-x-4">
                <a href="https://www.facebook.com/onemprl/" class="flex items-center">
                    <i style="font-size: 1.2rem"  class="pi pi-facebook"></i>
                </a>
                <span>|</span>
                <a href="https://www.m.me/onemprl?" class="flex items-center">
                    <i style="font-size: 1.2rem"  class="pi pi-comment"></i>
                </a>
                <span>|</span>
                <a href="#" class="flex items-center">
                    <i style="font-size: 1.2rem"  class="pi pi-instagram"></i>
                </a>
            </section>
            <section class="border py-4">
                <ul class="flex items-center justify-center space-x-10 sm:text-sm md:text-nm lg:text-md">
                    <li>
                        <Link :href="route('welcome')">
                            <span class="hidden md:block">Home</span>
                            <span class="md:hidden">
                                <i style="font-size: 1.2rem" class="pi pi-home"></i>
                            </span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('about.index')">
                            <span class="hidden md:block">About Us</span>
                            <span class="md:hidden">
                                <i style="font-size: 1.2rem" class="pi pi-building"></i>
                            </span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('services.index')">
                            <span class="hidden md:block">Services</span>
                            <span class="md:hidden">
                                <i style="font-size: 1.2rem" class="pi pi-briefcase"></i>
                            </span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('blog.index')">
                            <span class="hidden md:block">Blog</span>
                            <span class="md:hidden">
                                <i style="font-size: 1.2rem" class="pi pi-pencil"></i>
                            </span>
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('contact.index')">
                            <span class="hidden md:block">Contact Us</span>
                            <span class="md:hidden">
                                <i style="font-size: 1.2rem" class="pi pi-phone"></i>
                            </span>
                        </Link>
                    </li>
                </ul>
            </section>
            <section class="flex justify-center text-sm h-full">
                <div class="flex flex-col justify-center items-center pe-4">
                    <i style="font-size: 1.2rem"  class="pi pi-envelope"></i>
                    <span class="hidden md:block">mprlsolar@gmail.com</span>
                </div>
                <div class="flex flex-col justify-center items-center px-6 border-x">
                    <i style="font-size: 1.2rem"  class="pi pi-map-marker"></i>
                    <span class="hidden md:block">6620 Purok 1, San Antonio, Los Baños, Laguna</span>
                </div>
                <div class="flex flex-col justify-around items-center ps-4 space-y-2">
                    <i style="font-size: 1.2rem"  class="pi pi-phone"></i>
                    <div class="flex flex-col">
                        <span>Globe: 0956-769-3494</span>
                        <span>TM: 0953-039-8460</span>
                        <span>Smart: 0932-921-1767</span>
                    </div>
                </div>
            </section>
           <section class="text-center bg-main-500 text-white text-sm py-1">
                <h2>MPRL Solar Panel Trading © 2024. All Rights Reserved.</h2>
           </section> 
        </div>
    </footer>
</template>