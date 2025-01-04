<template>
  <div class="py-4">
    <img
      v-if="isDark"
      class="h-8 svg-scale"
      :src="logoDark"
      alt="Dark Logo"
    >
    <img
      v-else
      class="h-8 svg-scale"
      :src="logoLight"
      alt="Light Logo"  
    >
  </div>
</template>

<script setup>
import logoDark from '@/../../public/images/svg/logo/Full-Colour.svg';
import logoLight from '@/../../public/images/svg/logo/Inverse.svg';

const props = defineProps({
  isDark: {
    type: Boolean,
    required: false,
    default: false
  },
});
</script>

<style scoped>
.mobile-svg-scale {
  transform: scale(0.8);
}
.svg-scale {
  transform: scale(1.0);
}
@media screen and (min-width: 768px){
  .svg-scale {
    transform: scale(1.5);
  }
  .mobile-svg-scale {
    display: none;
  }
}
</style>