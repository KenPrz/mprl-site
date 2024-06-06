<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>
<template>
    <!-- Hide this section when scrolling -->
    <div
        class="flex pe-2 md:pe-0 justify-end md:justify-around bg-black text-white w-full text-sm font-light py-1 space-x-1">
        <div class="flex md:justify-center items-center space-x-1 md:space-x-4">
            <a href="" class="flex items-center space-x-2">
                <box-icon name='map' color="white" size="sm"></box-icon>
                <span class="hidden md:block">6620 Purok 1, San Antonio, Los Baños, Laguna</span>
            </a>
            <a href="" class="flex items-center space-x-2">
                <box-icon name='envelope' color="white" size="sm"></box-icon>
                <span class="hidden md:block">mprlsolar@gmail.com</span>
            </a>
        </div>
        <div class="flex items-center space-x-1 md:space-x-4">
            <a href="#" class="flex items-center">
                <box-icon name='facebook-circle' type='logo' color="white" size="sm"></box-icon>
            </a>
            <a href="#" class="flex items-center">
                <box-icon name='instagram' type='logo' color="white" size="sm"></box-icon>
            </a>
        </div>
    </div>
    <!-- Make this section sticky when scrolling -->
    <div class="flex justify-between md:justify-around py-1 items-center h-30">
        <div class="flex flex-col px-4 md:px-2">
            <ApplicationLogo />
            <button
                class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white py-1 px-3  md:hidden">
                Get a Quote
            </button>
        </div>
        <div>
            <ul class="flex space-x-5 sm:text-sm md:text-md lg:text-lg">
                <li>
                    <a class="hidden md:block" href="#">Home</a>
                    <box-icon class="md:hidden" :color="is_black? 'black':'white'" name='home' ></box-icon>
                </li>
                <li>
                    <a class="hidden md:block" href="#">About Us</a>
                    <box-icon class="md:hidden" :color="is_black? 'black':'white'" name='buildings' ></box-icon>
                </li>
                <li>
                    <a class="hidden md:block" href="#">Services</a>
                    <box-icon class="md:hidden" :color="is_black? 'black':'white'" name='wrench' ></box-icon>
                </li>
                <li>
                    <a class="hidden md:block" href="#">Blog</a>
                    <box-icon class="md:hidden" :color="is_black? 'black':'white'" name='book-open' ></box-icon>
                </li>
                <li>
                    <a class="hidden md:block" href="#">Contact Us</a>
                    <box-icon class="md:hidden" :color="is_black? 'black':'white'" name='message' ></box-icon>
                </li>
            </ul>
        </div>
        <div>
            <button
                class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white py-1 px-3 rounded-2xl hidden md:block">
                Get a Quote
            </button>
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            is_black: Boolean
        }
    }
</script>