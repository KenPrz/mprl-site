<script setup>
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/shadcn/ui/carousel'
import Autoplay from 'embla-carousel-autoplay'
import { Card, CardContent } from '@/shadcn/ui/card'
import BlogContent from './Components/BlogContent.vue';
import BlogCard from './Components/BlogCard.vue';
import NavBar from '@/Components/NavBar.vue';
import BlogImage from './Components/BlogImage.vue';
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

const props = defineProps({
  blog: {
    type: Object,
    required: true,
  },
  featured:{
    type: Object,
    default: null
  },
  more: {
    type: Array,
    default: null
  }
});

// Check if blog.body is a string and parse it, otherwise use as is
const blogBody = ref(typeof props.blog.body === 'string' ? JSON.parse(props.blog.body) : props.blog.body);
// i hate javascript so much P"JKOJDPKAJKP:SD why do i have to do this??? 
// might as well use typescript at this point but i'm too lazy to learn it so i'll just keep complaining about it.
// Seriously, why do i have to do this? Why can't it just be a string or an object? Why do i have to check if it's a string or an object?
// Why can't it just be one or the other? Why do i have to check if it's a string or an object? it's so stupid. I hate javascript so much.
// btw i'm not actually mad, i'm just being dramatic. I don't actually hate javascript, i just think it's stupid sometimes.
// btw its 2:30 am and i'm tired but i can't sleep so i'm just writing this comment to keep myself entertained. I'm not actually mad, i'm just bored.
// newjeans kpop group is the best kpop group ever. I love them so much. They're so talented and amazing. I love their music and their choreography.
// to the maintainer, if you're reading this, i'm sorry for the rant. currently i dont know what the fuck is going on with my life.
</script>

<template>
  <Head :title="blog.title" />
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
    <section class="w-full mt-5">
      <div class="flex justify-center md:px-32">
        <div class="container mx-auto w-full px-5 md:w-3/4 md:px-16">
          <div class="w-full pe-5">
            <div v-if="blog.images.length > 1">
              <Carousel
                :plugins="[Autoplay({
                  delay: 10000,
                })]"
              >
                  <CarouselContent>
                      <CarouselItem v-for="image in blog.images" :key="image.id">
                          <div>
                              <BlogImage class="card-image-height mb-5" :imageUrl="`/storage/${image.image}`" />
                          </div>
                      </CarouselItem>
                  </CarouselContent>
                  <CarouselPrevious class="absolute -left-4" />
                  <CarouselNext class="absolute -right-4" />
              </Carousel>
          </div>
          <div v-else>
              <BlogImage class="card-image-height" :imageUrl="`/storage/${blog.images[0].image}`" v-if="blog.images.length > 0" />
          </div>
          </div>
          <div class="flex space-x-2">
            <div v-if="$page.props.auth.user">
              <Link v-if="$page.props.auth.user.role_id == 1" :href="route('admin.blog.edit',props.blog.id)">
                <i class="pi pi-pen-to-square"></i>
              </Link>
            </div>
            <h1 class="text-3xl font-bold mb-4">{{ blog.title }}</h1>
          </div>
          <p class="text-gray-600 mb-4">By {{ blog.user_name }} on {{ formatDate(blog.created_at) }}</p>
          <div id="blog-body">
            <BlogContent :body="blogBody" />
          </div>
        </div>
        <div class="hidden md:flex md:w-1/4 flex-col">
          <section class="mb-6">
              <Card>
                <div class="px-5">
                  <h1 class="font-semibold text-xl text-center mt-2 border-b-2 pb-2">Featured</h1> 
                </div>
                <Carousel class="pt-1 shadow-md"
                  :plugins="[Autoplay({
                    delay: 4000,
                  })]"
                >
                  <CarouselContent>
                    <CarouselItem v-for="f in featured" :key="f.id">
                      <div>
                        <Link :href="route('blog.show',f.id)">
                          <img class="side-card-image-height" :src="`/storage/${f.first_image.image}`" :alt="f.title">
                          <div class="p-2">
                            <h1 class="text-lg font-semibold">{{f.title}}</h1>
                            <p class="text-gray-600 text-xs mt-1">{{ formatDate(f.created_at) }}</p>
                          </div>
                        </Link>
                      </div>
                    </CarouselItem>
                  </CarouselContent>
                  <CarouselPrevious  class="absolute -left-4"/>
                  <CarouselNext  class="absolute -right-4"/>
                </Carousel>
              </Card>
          </section>
          <section>
            <Card class="p-2 shadow-md">
              <h1 class="font-semibold text-xl text-center mt-2 border-b-2 pb-4">More News</h1>
              <Link :href="route('blog.show', blog.id)" v-for="blog in more" :key="blog.id">
                <div class="py-2 space-y-1 border-b-2 px-2 hover:bg-slate-200 transition-colors duration-300 min-h-20">
                  <h2>{{blog.title}}</h2>
                  <div class="flex space-x-1 items-center mb-4">
                    <i class="pi pi-calendar"></i>
                    <p class="text-gray-600 text-xs mt-1 font-">{{ formatDate(blog.created_at) }}</p>
                  </div>
                </div>
              </Link>
              <Link :href="route('blog.index')" class="text-start block mt-2 px-2 text-blue-500 transition-colors duration-300 hover:text-blue-800">View More</Link>
            </Card>
          </section>
        </div>
      </div>
    </section>
    <Footer />
</template>
<script>
export default {
  components: {
    BlogContent,
  },
  methods: {
    formatDate(date) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return new Date(date).toLocaleDateString(undefined, options);
    },
  },
};
</script>
<style scoped>
.card-image-height {
  width: 100%;
  height: 30em;
  object-fit: contain;
}
.side-card-image-height {
  width: 100%;
  height: 15em;
  object-fit: cover;
}
@media screen and (max-width: 768px) {
  .card-image-height {
    height: 20em;
  }
}
</style>