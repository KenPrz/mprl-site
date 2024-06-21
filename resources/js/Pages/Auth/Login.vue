<script setup>
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/shadcn/ui/carousel'
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { onMounted } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});
const images = [
  ['images/guest-slideshow/bg-1.jpg', 'Slide 1'],
  ['images/guest-slideshow/bg-2.jpg', 'Slide 2'],
  ['images/guest-slideshow/bg-3.jpg', 'Slide 3'],
  ['images/guest-slideshow/bg-4.jpg', 'Slide 4'],
  ['images/guest-slideshow/bg-5.jpg', 'Slide 5'],
  ['images/guest-slideshow/bg-6.jpg', 'Slide 6']
]
const randomImage = images[Math.floor(Math.random() * images.length)][0];

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

</script>

<template>
  <GuestLayout>

    <Head title="Log in" />
    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>
    <div id="card-container" class="flex">
      <div class="w-3/5 hidden sm:block relative">
        <img class="w-full shadow-md" :src="randomImage" alt="Login Image">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-800 to-transparent opacity-75"></div>
        <div class="flex items-start mb-8 absolute -bottom-6 ps-2 z-10">
          <Link :href="route('welcome')">
          <ApplicationLogo class="w-auto h-24 fill-current text-gray-500 mx-auto" />
          </Link>
        </div>
      </div>
      <div>
      </div>
      <div class="w-full sm:w-3/5 flex flex-col justify-center">
        <div>
          <h1 class="text-2xl sm:text-3xl font-bold text-center mb-5 text-main-600">
            Log in
          </h1>
        </div>
        <div class="sm:px-16">
          <form @submit.prevent="submit">
            <div class="mb-4">
              <InputLabel for="email" value="Email" class="block text-gray-700 text-sm font-bold mb-2" />
              <TextInput id="email" type="email" class="mt-1 block w-full border rounded-md shadow-sm p-2"
                v-model="form.email" required autofocus autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="mb-4">
              <InputLabel for="password" value="Password" class="block text-gray-700 text-sm font-bold mb-2" />
              <TextInput id="password" type="password" class="mt-1 block w-full border rounded-md shadow-sm p-2"
                v-model="form.password" required autocomplete="current-password" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex flex-col sm:flex-row justify-between mb-4 space-y-2">
              <Link v-if="canResetPassword" :href="route('password.request')"
                class="underline text-xs sm:text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Forgot your password?
              </Link>
              <div class="flex items-center">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-xs sm:text-sm text-gray-600">Remember me</span>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <PrimaryButton class="w-full flex justify-center mt-2 py-2" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Log in
              </PrimaryButton>
            </div>
          </form>
        </div>
        <div>
          <div class="text-center mt-5 space-x-2 text-xs sm:text-sm">
            <span class=" text-gray-600">Don't have an account?</span>
            <Link :href="route('register')" class="font-medium text-blue-600 hover:text-blue-500">Register</Link>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
<style scoped>
img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

#card-container {
  height: 85vh;
}

@media (max-width: 640px) {
  #card-container {
    margin: 1em;
    height: auto;
  }
}
</style>