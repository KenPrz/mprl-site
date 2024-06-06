<script setup>
import NavBar from '@/Components/NavBar.vue'
</script>

<template>
    <section>
        <NavBar />
    </section>
    <section    
        data-aos="fade-in"
        data-aos-duration="500" 
        class="relative py-48 bg-cover bg-center h-auto" style="background-image: url('/images/solar-header-bg.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40 flex flex-col justify-center items-center text-center">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h1
                data-aos="fade-right"
                data-aos-delay="300"
                data-aos-duration="600"
                class="text-4xl text-offset-500">Renewable Energy</h1>
                <h2 
                data-aos="fade-left"
                data-aos-delay="300"
                data-aos-duration="600"
                class="text-5xl font-semibold text-white">Shine brighter, Live lighter</h2>
            </div>
        </div>
    </section>
</template>

<script>
export default {

}
</script>

<style scoped>
.bg-cover {
    background-size: cover;
}

.bg-center {
    background-position: center 100%;
}
</style>
