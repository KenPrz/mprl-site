<script setup>
import { ref, watch, defineEmits } from 'vue';
import NavLink from './NavLink.vue';
import ApplicationLogo from './ApplicationLogo.vue';

const isOpen = ref(false);

const props = defineProps({
  isWhite: {
    type: Boolean,
    default: false,
  },
  isAuthenticated: {
    type: Boolean,
    default: false,
  }
});

const emits = defineEmits([
  'update:isWhite',
  'update:is-hamburger-open',
  'show-login-modal',
  'show-register-modal'
]);

const baseColor = ref(props.isWhite);

// Watch for changes in the prop and update baseColor accordingly
watch(() => props.isWhite, (newValue) => {
  baseColor.value = newValue;
});

const toggleMenu = () => {
  isOpen.value = !isOpen.value;
  const newColor = !baseColor.value;
  emits('update:is-hamburger-open', isOpen.value);
};

const showLoginModal = () => {
  emits('show-login-modal');
}

const showRegisterModal = () => {
  emits('show-register-modal');
}
</script>

<template>
  <nav>
    <!-- Main Navbar -->
    <div class="flex justify-between items-center px-8 py-3 md:px-10 lg:px-20">
      <!-- Logo -->
      <NavLink :href="route('welcome')">
        <ApplicationLogo :isDark="baseColor" />
      </NavLink>

      <!-- Hamburger Icon -->
      <button @click="toggleMenu" class="flex flex-col space-y-1 w-6 h-6 md:hidden z-50">
        <span class="block w-full h-1 rounded transition-transform duration-300" :class="{
          'bg-black-500': baseColor,
          'bg-white': !baseColor,
          'rotate-45 translate-y-2': isOpen,
        }"></span>
        <span class="block w-full h-1 rounded transition-opacity duration-300" :class="{
          'bg-black-500': baseColor,
          'bg-white': !baseColor,
          'opacity-0': isOpen,
        }"></span>
        <span class="block w-full h-1 rounded transition-transform duration-300" :class="{
          'bg-black-500': baseColor,
          'bg-white': !baseColor,
          '-rotate-45 -translate-y-2': isOpen,
        }"></span>
      </button>
    </div>

    <!-- Dropdown Menu for Mobile -->
    <ul v-show="isOpen" :class="{
      'opacity-100 translate-y-0': isOpen,
      'opacity-0 -translate-y-4': !isOpen,
    }" class="md:hidden text-black-500 space-y-2 px-4 py-2 transform transition-all duration-300">
      <li>
        <NavLink :href="route('welcome')" :active="route().current('welcome')">
          <span class="text-black-500">Home</span>
        </NavLink>
      </li>
      <li>
        <NavLink :href="route('about.index')" :active="route().current('about.index')">
          <span class="text-black-500">About Us</span>
        </NavLink>
      </li>
      <li>
        <NavLink :href="route('products')" :active="route().current('products')">
          <span class="text-black-500">Products</span>
        </NavLink>
      </li>
      <li>
        <NavLink :href="route('services.index')" :active="route().current('services.index')">
          <span class="text-black-500">Services</span>
        </NavLink>
      </li>
      <li>
        <NavLink :href="route('blog.index')" :active="route().current('blog.index')">
          <span class="text-black-500">Blog</span>
        </NavLink>
      </li>
      <li>
        <NavLink :href="route('contact.index')" :active="route().current('contact.index')">
          <span class="text-black-500">Contact Us</span>
        </NavLink>
      </li>
      <li v-if="isAuthenticated" class="flex flex-col items-start space-y-1">
        <NavLink :href="route('profile.edit')">
          <span class="text-main-500">Account</span>
        </NavLink>
        <button class="text-red-500 font-semibold" @click="logout">Logout</button>
      </li>
      <li v-else class="flex flex-col items-start space-y-1">
        <button class="text-main-500 font-semibold" @click="showLoginModal">Login</button>
        <button class="text-blue-500 font-semibold" @click="showRegisterModal">Register</button>
      </li>
    </ul>
  </nav>
</template>
