<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: '',
  password: '',
  remember: false,
});
const submit = () => {
  form.post(route('login.create'), {
    onSuccess: () => {
      form.reset();
      closeLogin();
    },
  });
};

const emit = defineEmits(['openRegister', 'closeLogin']);
const openRegister = () => {
  emit('openRegister');
};
const closeLogin = () => {
  emit('closeLogin');
};
</script>

<template>
    <Head title="Log in" />
    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
      {{ status }}
    </div>
    <div id="card-container" class="flex px-5 sm:px-10">
      <div class="w-full flex flex-col justify-center">
        <div>
          <h1 class="text-start text-xl sm:text-2xl tracking-tighter font-bold mb-5 text-black">
            Log in
          </h1>
        </div>
        <div>
          <form @submit.prevent="submit">
            <div class="mb-4">
              <TextInput :place-holder="'Email address'"id="email" type="email" class="mt-1 block w-full border rounded-md shadow-sm p-2"
                v-model="form.email" required autofocus autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div class="mb-4">
              <TextInput :placeholder="'Password'" id="password" type="password" class="mt-1 block w-full border rounded-md shadow-sm p-2"
                v-model="form.password" required autocomplete="current-password" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4 space-y-2 pb-3 px-1">
              <div class="flex items-center">
                <Checkbox name="remember" v-model:checked="form.remember" />
                <span class="ml-2 text-xs sm:text-sm text-gray-600">Remember me</span>
              </div>
              <Link :href="route('password.request')"
                class="text-xs sm:text-sm text-main-500 hover:text-main-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Forgot password?
              </Link>
            </div>
            <div class="flex items-center justify-between">
              <PrimaryButton class="rounded w-full bg-red-500 hover:bg-red-600 flex justify-center py-3" :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing">
                Log in
              </PrimaryButton>
            </div>
          </form>
        </div>
        <div class="flex flex-col items-center justify-center px-1">
          <div class="w-full flex justify-around text-center mt-5 space-x-2 text-xs sm:text-sm">
            <span class=" text-gray-600">Don't have an account?</span>
            <button @click="openRegister" class="font-medium text-main-600 hover:text-main-500">Create Account</button>
          </div>
          <div class="flex w-full items-center justify-center py-4">
            <div class="border-b border-gray-300 w-full mt-4 mb-4"></div>
            <div class="text-gray-500 mx-4">or</div>
            <div class="border-b border-gray-300 w-full mt-4 mb-4"></div>
          </div>
          <div class="flex w-full">
            <a :href="route('google.login')" class="relative flex  item-center  justify-center w-full border p-3 border-black hover:bg-gray-100 rounded-lg space-x-2 text-xs sm:text-sm cursor-pointer">
              <i class="absolute left-5 pi pi-google ps-2" style="font-size:1.2rem"></i>
              <span class="text-black ps-2">Connect with Google</span>
            </a>
          </div>
        </div>
      </div>
    </div>
</template>
<style scoped>
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