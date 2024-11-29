<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <footer>
        <div class="flex flex-col pt-4 space-y-2 bg-white-200">
            <section class="text-center px-8 md:px-16 ">
                <h1 class="text-xl font-semibold text-main-500 text-pretty">ONE MPRL Solar Power Corporation</h1>
                <p class="font-light text-sm text-blue-500">Trusted partner in providing solar solutions for your every need.</p>
            </section>
            <section class="py-3">
                <ul class="flex items-center justify-center space-x-5 sm:text-sm md:text-nm lg:text-md text-blue-500">
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
           <section class="text-center bg-main-500 text-white text-sm py-1 font-semibold tracking-wide">
                <h2>MPRL Solar Panel Trading © {{ new Date().getFullYear() }}. All Rights Reserved.</h2>
           </section> 
        </div>
    </footer>
</template>