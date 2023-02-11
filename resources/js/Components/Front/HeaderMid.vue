<script setup>
import { ref, onMounted } from "vue";
import Icon from "../../Components/Icon.vue";

const headerMid = ref(null);
const position = ref("relative");
const openNav = ref(false);
// function handleScroll() {
//     if (!headerMid.value) {
//         return;
//     }
//     const element = headerMid.value.getBoundingClientRect();
//     if (element.top > 0) {
//         position.value = "relative";
//     } else {
//         position.value = "fixed";
//     }
// }
// onMounted(() => {
//     window.addEventListener("scroll", handleScroll);
// });
</script>
<template>
    <div ref="headerMid" :class="position" class="top-0 left-0 bg-white">
        <div class="flex w-full items-center justify-center py-5 lg:px-24">
            <h1
                class="font-serif text-3xl uppercase leading-relaxed md:text-5xl"
            >
                <span class="text-4xl text-red-700 md:text-6xl">M</span>agazine
            </h1>
        </div>
        <div
            class="relative mx-4 flex flex-col-reverse items-center justify-center gap-4 border-t-4 border-double border-gray-400 py-2 md:mx-24 md:flex-row"
        >
            <nav
                class="w-full md:block md:w-auto"
                :class="openNav ? 'block' : 'hidden'"
            >
                <ul
                    class="flex flex-col text-sm font-medium md:relative md:flex-row"
                >
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        HOME
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        POLITICS
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        TECHNOLOGI
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        SPORTS
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        FASHION
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        FOOD
                    </li>
                    <li class="border-b-[1px] py-2 md:border-none md:px-2">
                        CONTACTS
                    </li>
                </ul>
            </nav>
            <div
                :class="openNav ? 'block' : 'hidden'"
                class="w-full border-t-2 border-gray-900 md:hidden"
            ></div>
            <div class="flex gap-4">
                <button class="lg:hidden" @click="openNav = !openNav">
                    <Icon v-if="openNav" name="x-mark" class="h-6 w-6" />
                    <Icon v-else name="bars" />
                </button>
                <div class="h-5 border-l-[1px] border-gray-400 lg:hidden"></div>
                <button><Icon name="search" /></button>
            </div>
        </div>
        <div class="mx-4 border-t-2 border-gray-900 md:mx-24"></div>
    </div>
</template>
