<template>
    <div>
        <nav class="flex flex-col">
            <div class="flex pe-2 md:pe-0 justify-end md:justify-around bg-black text-white w-full text-sm font-light py-1 space-x-1">
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
            <div class="flex justify-around py-1 items-center">
                <div>
                    <ApplicationLogo />
                </div>
                <div>
                    <ul class="flex space-x-5 text-lg">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <button class="bg-primary-500 hover:bg-primary-600 transition-colors duration-200 text-white py-1 px-3 rounded-2xl">
                        Get a Quote
                    </button>
                </div>
            </div>
        </nav>
    </div>
</template>
<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue'
</script>