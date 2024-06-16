<script setup>
import { ref } from 'vue';
const delay = ref(100);
</script>
<template>
    <div>
        <div data-aos="fade-left" :data-aos-duration="delay" v-for="(item, index) in items" :key="index" class="py-1">
            <div @click="toggleAccordion(index)" :class="activeIndex === index ? 'bg-slate-100 text-black' : ''"
                class="w-full hover:bg-lime-600 hover:text-white transition-colors duration-200 flex border rounded-lg justify-between items-center py-2 px-4 cursor-pointer">
                <span class="text-lg">{{ item.title }}</span>
                <box-icon color="white" v-if="activeIndex === index" name='chevron-up'></box-icon>
                <box-icon color="white" v-else name='chevron-up' rotate='180'></box-icon>
            </div>
            <div v-show="activeIndex === index" class="p-4  border-lime-600 border-l-4 ml-1">
                <Transition class="rounded bg-slate-100 p-2">
                    <p class="" v-if="activeIndex === index">{{ item.content }}</p>
                </Transition>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: true
        },
        initialActiveIndex: {
            type: Number,
            default: null
        }
    },
    data() {
        return {
            activeIndex: this.initialActiveIndex
        };
    },
    methods: {
        toggleAccordion(index) {
            if (this.activeIndex === index) {
                this.activeIndex = null;
            } else {
                this.activeIndex = index;
            }
        }
    }
};
</script>

<style scoped>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>