<script setup>
import NavBar from '@/Components/NavBar.vue';
import Pagination from '@/Components/Pagination.vue';
import SearchBar from './Components/SearchBar.vue'
import BlogCard from './Components/BlogCard.vue'
import { onMounted, onUnmounted, ref } from 'vue';
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
const scroll = ref(0);

const handleScroll = () => {
    scroll.value = Math.round(window.scrollY);
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
<template>
    <Head title="Blog" />
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
                    <h2 class="text-4xl md:text-5xl font-semibold text-white">Blog</h2>
                    <div class="text-md md:text-lg tracking-wide space-x-4 flex text-white">
                        <Link class="hover:underline" :href="route('welcome')">HOME</Link>
                        <span class="mx-2">/</span>
                        <Link class="hover:underline" :href="route('blog.index')">BLOG</Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <main class="px-5 md:px-28">
        <SearchBar
            class="relative top-[-30px]"
            :categories="$page.props.categories"
            :years="$page.props.years"
            :selected-category="$page.props.selectedCategory"
            :selected-year="$page.props.selectedYear"
            :selected-month="$page.props.selectedMonth"
            :search-query="$page.props.searchQuery"
            @fetch-blogs="fetchBlogs"
        />
        <div class="flex flex-col items-center justify-center">
            <div v-if="$page.props.blogs.data" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                <BlogCard data-aos="fade-left" data-aos-delay="20" v-for="blog in $page.props.blogs.data" :blog="blog" />
            </div>
            <div v-else class="flex items-center justify-center h-96">
                <p class="text-lg">No blogs found.</p>
            </div>
        </div>
        <Pagination class="my-2"
            :first_page_url="$page.props.blogs.first_page_url"
            :from="$page.props.blogs.from"
            :last_page="$page.props.blogs.last_page"
            :last_page_url="$page.props.blogs.last_page_url"
            :links="$page.props.blogs.links"
        />
    </main>
    <Footer />
</template>
<script>
export default {
    methods: {
        fetchBlogs({ category, year, month, query }) {
            this.$inertia.get(route('blog.index', { category, year, month, query }));
        },
    },
};
</script>
