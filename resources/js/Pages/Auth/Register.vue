<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const images = [
  ['images/guest-slideshow/bg-1.jpg', 'Slide 1'],
  ['images/guest-slideshow/bg-2.jpg', 'Slide 2'],
  ['images/guest-slideshow/bg-3.jpg', 'Slide 3'],
  ['images/guest-slideshow/bg-4.jpg', 'Slide 4'],
]
const randomImage = images[Math.floor(Math.random() * images.length)][0];
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
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
                    <h1 class="text-2xl sm:text-3xl font-bold text-center mb-5">
                        Register
                    </h1>
                </div>
                <div class="sm:px-16">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Name" />

                            <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                autofocus autocomplete="name" />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="email" value="Email" />

                            <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autocomplete="username" />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />

                            <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="password_confirmation" value="Confirm Password" />
                            <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                                v-model="form.password_confirmation" required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                        <div class="flex items-center justify-between mt-5">
                            <PrimaryButton class="w-full flex justify-center mt-2 py-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="text-center mt-5 space-x-2">
                        <span class="text-sm text-gray-600">Already have an account?</span>
                        <Link :href="route('login')" class="font-medium text-blue-600 hover:text-blue-500">
                            Log in
                        </Link>
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