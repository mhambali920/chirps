<script setup>
import { onMounted, ref } from "vue";
import Icon from "../Icon.vue";
let openTopNav = ref(false);
let openTopHeader = ref(false);
const getWidth = () => {
    if (window.innerWidth > 1024) {
        openTopHeader.value = true;
        openTopNav.value = true;
    }
};
onMounted(() => getWidth());
</script>
<template>
    <div
        :class="openTopHeader ? 'flex' : 'hidden'"
        class="header_top relative flex-col transition duration-500 lg:flex lg:flex-row-reverse lg:justify-between lg:bg-gray-100 lg:px-24"
    >
        <div
            class="flex justify-center bg-gray-100 py-3 text-gray-700 lg:hidden"
        >
            <button @click="openTopNav = !openTopNav">
                <Icon v-if="openTopNav" name="x-mark" />
                <Icon v-else name="bars" class="h-4 w-4" />
            </button>
        </div>
        <nav
            :class="openTopNav ? 'block' : 'hidden'"
            class="py-4 lg:bg-gray-100"
        >
            <ul
                class="flex flex-col items-center gap-4 font-semibold lg:flex-row"
            >
                <li class="text-xs">
                    <a href="#" class="font-sans hover:text-slate-700">HOME</a>
                </li>
                <li class="text-xs">
                    <a href="#" class="font-sans hover:text-slate-700"
                        >POLITICS</a
                    >
                </li>
                <li class="text-xs">
                    <a href="#" class="font-sans hover:text-slate-700"
                        >THE OPINION</a
                    >
                </li>
                <li class="text-xs">
                    <a href="#" class="font-sans hover:text-slate-700"
                        >CONTACT</a
                    >
                </li>
            </ul>
        </nav>
        <div
            class="border-y-[1px] py-4 text-center font-sans text-xs font-light lg:border-none lg:bg-gray-100"
        >
            Sunday, January 22, 2023
        </div>
    </div>
    <!-- toggle header top -->
    <div
        class="flex w-full justify-center bg-gray-100 py-3 text-gray-700 lg:hidden"
    >
        <button @click="openTopHeader = !openTopHeader">
            <Icon name="chevron-up" :class="{ 'rotate-180': !openTopHeader }" />
        </button>
    </div>
</template>
