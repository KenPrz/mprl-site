<script setup>
import { ArrowRight } from "lucide-vue-next";
import { useCarousel } from "./useCarousel";
import { cn } from "@/lib/utils";
import { Button } from "@/shadcn/ui/button";

const props = defineProps({
  class: { type: null, required: false },
});

const { orientation, canScrollNext, scrollNext } = useCarousel();
</script>

<template>
  <Button
    :disabled="!canScrollNext"
    :class="
      cn(
        'touch-manipulation absolute h-10 w-10 rounded-full p-0',
        orientation === 'horizontal'
          ? '-right-12 top-1/2 -translate-y-1/2'
          : '-bottom-12 left-1/2 -translate-x-1/2 rotate-90',
        props.class,
      )
    "
    variant="outline"
    @click="scrollNext"
  >
    <slot>
      <i  class="h-4 w-4 text-current pi pi-angle-right"></i>
    </slot>
  </Button>
</template>
