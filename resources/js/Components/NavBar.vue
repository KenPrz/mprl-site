<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Hamburger from './Hamburger.vue';
import NavLink from '@/Components/NavLink.vue';
import Modal from '@/Components/Modal.vue';
import Dropdown from '@/Components/Dropdown.vue';
import Login from '@/Pages/Auth/Login.vue';
import Register from '@/Pages/Auth/Register.vue';
import MessengerButton from '@/Components/MessengerButton.vue';
import { Link } from '@inertiajs/vue3';

const scrollY = ref(window.scrollY);
const isWhite = ref(scrollY.value > 0);
const isBurgerOpen = ref(false);
const autoAlign = ref('right');

// Function to update `isWhite` state based on `scrollY` or `isBurgerOpen`
const updateIsWhite = () => {
  if (isBurgerOpen.value) {
    isWhite.value = true; // Force `isWhite` to true if the hamburger is open
  } else {
    isWhite.value = scrollY.value > 0; // Update based on scroll position
  }
};

const handleScroll = () => {
  scrollY.value = window.scrollY;
  updateIsWhite();
};

// Function to handle screen resize for alignment
const updateAutoAlign = () => {
  autoAlign.value = window.innerWidth < 1200 ? 'right' : 'left';
};

// Watch scrollY changes to update `isWhite`
watch(scrollY, updateIsWhite);

// Watch isBurgerOpen changes to enforce `isWhite` logic
watch(isBurgerOpen, updateIsWhite);

onMounted(() => {
  updateAutoAlign(); // Initial check on mount
  window.addEventListener('resize', updateAutoAlign);
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateAutoAlign);
  window.removeEventListener('scroll', handleScroll);
});

// Function to handle hamburger open/close events
const handleHamburgerOpen = (isOpen) => {
  isBurgerOpen.value = isOpen;
};

</script>
<template>
  <nav :class="{
    'bg-white shadow-md fixed': isWhite,
    'bg-none text-white absolute bg-black bg-opacity-10': !isWhite
  }" class="flex flex-col top-0 w-full z-50 h-30 transition-all duration-500 ease-in-out">
    <div class="hidden md:block">
      <!-- Top info bar -->
      <div class="w-full bg-black text-white py-1">
        <div class="container mx-auto px-4 md:px-8 lg:px-14 flex justify-between text-sm font-light">
          <div class="flex md:justify-start items-center space-x-1 md:space-x-4">
            <div class="flex items-center space-x-2">
              <i class="pi pi-map-marker"></i>
              <span>Blk 9 Lot 87 Seville St., La Vecina Camella
                Dos Rios, Cabuyao, Laguna 4025 Cabuyao,
                Philippines</span>
            </div>
            <a href="mailto:mprlsolar@gmail.com" class="hidden md:flex items-center space-x-2">
              <i class="pi pi-envelope"></i>
              <span class="hidden md:block">mprlsolar@gmail.com</span>
            </a>
          </div>
          <div class="hidden md:flex items-center space-x-1 md:space-x-4">
            <a href="https://www.facebook.com/onemprl/" target="_blank" class="flex items-center">
              <i class="pi pi-facebook"></i>
            </a>
            <a href="#" class="flex items-center">
              <i class="pi pi-instagram"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Main Navigation -->
      <div class="container mx-auto px-4 md:px-8 lg:px-14">
        <div class="flex justify-between py-1 items-center h-30">
          <!-- Logo -->
          <div>
            <NavLink :href="route('welcome')" :isWhite="isWhite">
              <ApplicationLogo :isDark="isWhite" />
            </NavLink>
          </div>

          <!-- Navigation Links -->
          <div>
            <ul class="flex space-x-5 sm:text-sm md:text-md lg:text-lg">
              <div v-if="$page.props.auth.user">
                <li v-if="$page.props.auth.user.role_id == 1">
                  <NavLink class="hidden:block" :href="route('dashboard')" :active="route().current('dashboard')"
                    :isWhite="isWhite">
                    <span class="hidden md:block">Admin</span>
                    <span class="md:hidden">
                      <i style="font-size: 1.2rem" :style="isWhite ? 'color:black' : 'color:white'"
                        class="pi pi-shield"></i>
                    </span>
                  </NavLink>
                </li>
              </div>
              <li>
                <NavLink class="hidden:block" :href="route('welcome')" :active="route().current('welcome')"
                  :isWhite="isWhite">
                  <span class="hidden md:block">Home</span>
                  <span class="md:hidden">
                    <i style="font-size: 1.2rem" :style="isWhite ? 'color:black' : 'color:white'" class="pi pi-home"></i>
                  </span>
                </NavLink>
              </li>
              <li>
                <NavLink class="hidden:block" :href="route('about.index')" :active="route().current('about.index')"
                  :isWhite="isWhite">
                  <span class="hidden md:block">About Us</span>
                  <span class="md:hidden">
                    <i style="font-size: 1rem" :style="isWhite ? 'color:black' : 'color:white'" class="pi pi-building"></i>
                  </span>
                </NavLink>
              </li>
              <li>
                <NavLink class="hidden:block" :href="route('products')" :active="route().current('products')"
                  :isWhite="isWhite">
                  <span class="hidden md:block">Products</span>
                  <span class="md:hidden">
                    <i style="font-size: 1rem" :style="isWhite ? 'color:black' : 'color:white'"
                      class="pi pi-shopping-cart"></i>
                  </span>
                </NavLink>
              </li>
              <li>
                <NavLink class="hidden:block" :href="route('services.index')" :active="route().current('services.index')"
                  :isWhite="isWhite">
                  <span class="hidden md:block">Services</span>
                  <span class="md:hidden">
                    <i style="font-size: 1rem" :style="isWhite ? 'color:black' : 'color:white'" class="pi pi-briefcase"></i>
                  </span>
                </NavLink>
              </li>
              <li>
                <NavLink class="hidden:block" :href="route('blog.index')"
                  :active="route().current('blog.index') || route().current('blog.show')" :isWhite="isWhite">
                  <span class="hidden md:block">Blog</span>
                  <span class="md:hidden">
                    <i style="font-size: 1rem" :style="isWhite ? 'color:black' : 'color:white'" class="pi pi-pencil"></i>
                  </span>
                </NavLink>
              </li>
              <li>
                <NavLink class="hidden:block" :href="route('contact.index')" :active="route().current('contact.index')"
                  :isWhite="isWhite">
                  <span class="hidden md:block">Contact Us</span>
                  <span class="md:hidden">
                    <i style="font-size: 1rem" :style="isWhite ? 'color:black' : 'color:white'" class="pi pi-phone"></i>
                  </span>
                </NavLink>
              </li>
            </ul>
          </div>

          <!-- User Menu -->
          <div class="flex items-center space-x-5">
            <Dropdown :align="autoAlign" width="32">
              <template #trigger>
                <span class="inline-flex rounded-md">
                  <span class="rounded-full cursor-pointer">
                    <i class="pi pi-user" style="font-size:1.2em" :style="isWhite ? 'color:black' : 'color:white'"></i>
                  </span>
                </span>
              </template>
              <template #content>
                <div v-if="isAuthenticated" class="flex flex-col text-sm font-semibold">
                  <Link :href="route('profile.edit')"
                    class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                  <i style="font-size: 1rem" class="pi pi-user"></i>
                  <span>Account</span>
                  </Link>
                  <button type="button" @click="logout"
                    class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                    <i style="font-size: 1rem" class="pi pi-sign-out"></i>
                    <span>Logout</span>
                  </button>
                </div>
                <div v-else class="flex flex-col text-sm font-semibold">
                  <button @click="showLoginModal = true"
                    class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                    <i class="pi pi-sign-in"></i>
                    <span>
                      Login
                    </span>
                  </button>
                  <button @click="showRegisterModal = true"
                    class="flex items-center space-x-3 px-2 text-black hover:bg-slate-300 py-1">
                    <i class="pi pi-user-plus"></i>
                    <span>
                      Sign Up
                    </span>
                  </button>
                </div>
              </template>
            </Dropdown>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="block md:hidden">
      <Hamburger
        @update:isHamburgerOpen="handleHamburgerOpen"
        @show-login-modal="showLoginModal = true"
        @show-register-modal="showRegisterModal = true"
        :is-authenticated="isAuthenticated"
        :isWhite="isWhite" 
      />
    </div>

    <!-- Social Media Sidebar -->
    <div class="absolute -right-7 hover:right-0 sm:right-0 h-screen transition-all duration-200">
      <section id="icon-handler" class="flex flex-col h-full justify-center space-y-3">
        <span
          class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
          <a href="https://www.facebook.com/onemprl/">
            <i id="icon-size" class="pi pi-facebook"></i>
          </a>
        </span>
        <span
          class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
          <i id="icon-size" class="pi pi-instagram"></i>
        </span>
        <span @click="showContact = true"
          class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
          <i id="icon-size" class="pi pi-phone"></i>
        </span>
        <span
          class="p-2 sm:p-4 rounded-s-md bg-main-600 flex items-center justify-center hover:bg-main-500 hover:scale-[1.2] transition-all duration-200 cursor-pointer">
          <a href="mailto:mprlsolarpanel@gmail.com">
            <i id="icon-size" class="pi pi-envelope"></i>
          </a>
        </span>
      </section>
      <MessengerButton />
    </div>

    <!-- Modals -->
    <Modal maxWidth="md" v-model:show="showContact" @close="showContact = false">
      <div class="flex flex-col items-center space-y-4 p-8 bg-gray-100 rounded-lg shadow-md">
        <span class="text-2xl font-bold text-gray-800">Contact Us</span>
        <div class="text-center">
          <span class="block text-sm text-gray-800">0916-830-5551</span>
          <span class="block text-sm text-gray-800">0967-362-0733</span>
        </div>
      </div>
    </Modal>
    <Modal maxWidth="md" v-model:show="showLoginModal" @close="showLoginModal = false">
      <Login @openRegister="handleRegisterSwitch" @closeLogin="showLoginModal = false" />
    </Modal>
    <Modal maxWidth="md" v-model:show="showRegisterModal" @close="showRegisterModal = false">
      <Register @openLogin="handleLoginSwitch" @closeRegister="showRegisterModal = false" />
    </Modal>
  </nav>
</template>
<script>
import { useToast } from 'vue-toastification';
const toast = useToast();
export default {
  data() {
    return {
      showLoginModal: false,
      showRegisterModal: false,
      showQuoteModal: false,
      showContact: false,
    }
  },
  methods: {
    logout() {
      this.$inertia.post(route('logout'), {
        onFinish: () => {
          toast.success('Logged out successfully!');
        }
      });
    },
    handleRegisterSwitch() {
      this.showLoginModal = false;
      this.showRegisterModal = true;
    },
    handleLoginSwitch() {
      this.showRegisterModal = false;
      this.showLoginModal = true;
    },

  },
  computed: {
    isAuthenticated() {
      return this.$page.props.auth.user !== null;
    }
  }
}
</script>
<style scoped>
#get-quote {
  z-index: 100;
  transition: transform 0.5s;
}

#get-quote:hover {
  animation: pulsate 1s infinite;
}

@keyframes ripple {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.02);
  }

  100% {
    transform: scale(1);
  }
}

@keyframes pulsate {
  0% {
    transform: scale(1);
  }

  50% {
    transform: scale(1.1);
  }

  100% {
    transform: scale(1);
  }
}

#icon-size {
  font-size: 1.2rem;
  color: white !important;
}

@media screen and (min-width: 768px) {
  #icon-size {
    font-size: 1.5rem;
  }
}
</style>
