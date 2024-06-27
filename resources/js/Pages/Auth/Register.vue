<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const emit = defineEmits(['openLogin']);
const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const openLogin = () => {
    emit('openLogin');
};
</script>

<template>
        <Head title="Register" />
        <div id="card-container" class="flex">
            <div class="w-full flex flex-col justify-center sm:px-10">
                <div>
                    <h1 class="text-black text-center text-3xl sm:text-2xl font-bold sm:text-start mb-5">
                        Sign Up
                    </h1>
                </div>
                <div>
                    <form @submit.prevent="submit">
                        <div class="flex sm:flex-row flex-col space-y-5 sm:space-y-0 sm:space-x-2">
                            <div>
                                <InputLabel class="block sm:hidden" for="first_name" value="First Name" />
                                <TextInput :placeHolder="'First Name'" id="first_name" type="text" class="mt-1 block w-full" v-model="form.first_name" required
                                    autofocus autocomplete="first_name" />

                                <InputError class="mt-2" :message="form.errors.first_name" />
                            </div>
                            <div>
                                <InputLabel class="block sm:hidden" for="last_name" value="Last Name" />
                                <TextInput :placeHolder="'Last Name'" id="last_name" type="text" class="mt-1 block w-full" v-model="form.last_name" required
                                    autocomplete="last_name" />

                                <InputError class="mt-2" :message="form.errors.last_name" />
                            </div>
                        </div>
                        <div class="mt-4">
                            <InputLabel class="block sm:hidden" for="email" value="Email" />

                            <TextInput :placeHolder="'Email'" id="email" type="email" class="mt-1 block w-full" v-model="form.email" required
                                autocomplete="username" />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div class="mt-4">
                            <InputLabel class="block sm:hidden" for="password" value="Password" />

                            <TextInput :placeHolder="'Password'" id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="mt-4">
                            <InputLabel class="block sm:hidden" for="password_confirmation" value="Confirm Password" />
                            <TextInput :placeHolder="'Confirm Password'" id="password_confirmation" type="password" class="mt-1 block w-full"
                                v-model="form.password_confirmation" required autocomplete="new-password" />

                            <InputError class="mt-2" :message="form.errors.password_confirmation" />
                        </div>
                        <div class="flex items-center justify-between mt-5">
                            <PrimaryButton class="bg-red-500 hover:bg-red-600 py-3 w-full flex justify-center mt-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Register
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="text-center mt-5 space-x-2 text-sm">
                        <span class="text-gray-600">Already have an account?</span>
                        <button @click="openLogin" class="font-semibold text-main-600 hover:text-main-500">
                            Log in
                        </button>
                    </div>
                </div>
                <div class="flex w-full items-center justify-center py-4">
                    <div class="border-b border-gray-300 w-full mt-4 mb-4"></div>
                    <div class="text-gray-500 mx-4">or</div>
                    <div class="border-b border-gray-300 w-full mt-4 mb-4"></div>
                  </div>
                  <div class="flex w-full">
                    <button class="relative flex  item-center  justify-center w-full border p-3 border-black hover:bg-gray-100 rounded-lg space-x-2 text-xs sm:text-sm">
                      <i class="absolute left-5 pi pi-google ps-2" style="font-size:1.2rem"></i>
                      <span class="text-black ps-2">Connect with Google</span>
                    </button>
                  </div>
            </div>
        </div>
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