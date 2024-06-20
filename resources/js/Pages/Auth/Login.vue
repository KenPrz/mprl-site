<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    images:
        {
            type: Array,
            required: true,
            default: () =>[
                {
                    src: 'images/guest-slideshow/bg-1.jpg',
                    alt: 'Slide 1',
                },
                {
                    src: 'images/guest-slideshow/bg-2.jpg',
                    alt: 'Slide 2',
                },
                {
                    src: 'images/guest-slideshow/bg-3.jpg',
                    alt: 'Slide 3',
                },
                {
                    src: 'images/guest-slideshow/bg-4.jpg',
                    alt: 'Slide 4',
                }
            ]
        },
});


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
        <div class="flex p-2">
            <div class="w-2/5 hidden sm:block">
                <img class="w-full" src="/images/guest-slideshow/bg-2.jpg" alt="test">
            </div>
            <div class="w-full sm:w-3/5 sm:py-32">
                <div class="sm:px-16">
                    <div>
                        <Link href="/">
                            <ApplicationLogo class="w-auto h-24 fill-current text-gray-500" />
                        </Link>
                    </div>
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="email" value="Email" />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="username"
                            />
            
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
            
                        <div class="mt-4">
                            <InputLabel for="password" value="Password" />
            
                            <TextInput
                                id="password"
                                type="password"
                                class="mt-1 block w-full"
                                v-model="form.password"
                                required
                                autocomplete="current-password"
                            />
            
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>
                        <div class="flex justify-between mt-3">
                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                Forgot your password?
                            </Link>
                            <div class="flex items-center">
                                <Checkbox name="remember" v-model:checked="form.remember" />
                                <span class="ms-2 text-sm text-gray-600">Remember me</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <PrimaryButton class="w-full flex justify-center mt-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Log in
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
<style scoped>
img {
    border-radius: 10px;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
</style>    