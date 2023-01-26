<script setup>
import Icon from "../../Components/Icon.vue";
</script>
<template>
    <div class="flex w-full items-center justify-center px-4 pt-10 pb-5">
        <h1 class="font-serif text-5xl uppercase leading-relaxed">
            <span class="text-6xl text-red-600">n</span>ewspaper
        </h1>
    </div>
    <div
        class="flex items-center justify-center gap-4 border-y-2 border-slate-900 py-2"
    >
        <button><Icon name="bars" /></button>
        <div class="h-5 border-l-[1px] border-gray-400"></div>
        <button><Icon name="search" /></button>
    </div>
</template>
