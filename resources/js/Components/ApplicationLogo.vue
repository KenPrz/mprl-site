<template>
  <div class="hidden sm:block">
    <img
      v-if="isDark"
      class="h-20 svg-scale"
      :src="logoHorizontalDark"
      alt="Dark Logo"
    >
    <img
      v-else
      class="h-20 svg-scale"
      :src="logoHorizontalLight"
      alt="Light Logo"  
    >
  </div>
  <div class="block sm:hidden">
    <img
      v-if="isDark"
      class="h-12 mobile-svg-scale"
      :src="logoMarkDark"
      alt="Dark Logo"
    >
    <img
      v-else
      class="h-12 mobile-svg-scale"
      :src="logoMarkLight"
      alt="Light Logo"
    >
  </div>
</template>

<script setup>
import logoHorizontalDark from '@/../../public/images/svg/logo/Horizontal/Horizontal-Logo-Black-01.svg';
import logoHorizontalLight from '@/../../public/images/svg/logo/Horizontal/Horizontal-Logo-01.svg';
import logoMarkDark from '@/../../public/images/svg/logo/Logomrak/Logomark-Black-01.svg';
import logoMarkLight from '@/../../public/images/svg/logo/Logomrak/Logomark-01.svg';

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