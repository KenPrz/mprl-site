<template>
    <footer class="fixed bottom-0">
        <div class="flex flex-col pt-4 space-y-2">
            <section class="text-center px-8 md:px-16 ">
                <h1 class="text-xl font-semibold text-primary-500 text-pretty">MPRL Solar Panel Trading</h1>
                <p class="font-light text-sm">MPRL Solar Panel Trading specializes in supplying efficient and eco-friendly solar-powered LED
                    lights. Our lights offer easy installation and come in a variety of types, styles, sizes, and
                    colors. Say goodbye to electrical wiring - our lights run on solar power, making them both
                    convenient and environmentally friendly.</p>
            </section>
            <section class="flex items-center justify-center">
                <a href="#" class="flex items-center">
                    <box-icon name='facebook-circle' type='logo' color="black" size="sm"></box-icon>
                </a>
                |
                <a href="#" class="flex items-center">
                    <box-icon name='instagram' type='logo' color="black" size="sm"></box-icon>
                </a>
            </section>
            <section class="border py-4">
                <ul class="flex items-center justify-center space-x-10 sm:text-sm md:text-nm lg:text-md">
                    <li>
                        <a class="hidden md:block" href="#">Home</a>
                        <box-icon class="md:hidden" color="black" name='home' ></box-icon>
                    </li>
                    <li>
                        <a class="hidden md:block" href="#">About Us</a>
                        <box-icon class="md:hidden" color="black" name='buildings' ></box-icon>
                    </li>
                    <li>
                        <a class="hidden md:block" href="#">Services</a>
                        <box-icon class="md:hidden" color="black" name='wrench' ></box-icon>
                    </li>
                    <li>
                        <a class="hidden md:block" href="#">Blog</a>
                        <box-icon class="md:hidden" color="black" name='book-open' ></box-icon>
                    </li>
                    <li>
                        <a class="hidden md:block" href="#">Contact Us</a>
                        <box-icon class="md:hidden" color="black" name='message' ></box-icon>
                    </li>
                </ul>
            </section>
            <section class="flex justify-center text-sm h-full">
                <div class="flex flex-col justify-center items-center pe-4">
                    <box-icon name='envelope' color="black" size="sm"></box-icon>
                    <span class="hidden md:block">mprlsolar@gmail.com</span>
                </div>
                <div class="flex flex-col justify-center items-center px-6 border-x">
                    <box-icon name='map' color="black" size="sm"></box-icon>
                    <span class="hidden md:block">6620 Purok 1, San Antonio, Los Baños, Laguna</span>
                </div>
                <div class="flex flex-col justify-center items-center ps-4">
                    <box-icon name='phone' color="black" size="sm" type='solid' ></box-icon>
                    <span>Globe: 0956-769-3494</span>
                    <span>TM: 0953-039-8460</span>
                    <span>Smart: 0932-921-1767</span>
                </div>
            </section>
           <section class="text-center bg-primary-500 text-white text-sm py-1">
                <h2>MPRL Solar Panel Trading © 2024. All Rights Reserved.</h2>
           </section> 
        </div>
    </footer>
</template>

<script>
export default {

}
</script>

<style scoped></style>