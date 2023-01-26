<script setup>
import { Head } from "@inertiajs/vue3";
import HeaderTop from "../../Components/Front/HeaderTop.vue";
import HeaderMid from "../../Components/Front/HeaderMid.vue";
</script>
<template>
    <Head title="Newspaper" />
    <div class="mx-auto min-h-screen max-w-[1400px] bg-white lg:bg-gray-100">
        <!-- start header -->
        <header id="header" class="bg-white">
            <!-- top -->
            <HeaderTop class="" />
            <!-- end top -->
            <!-- midle -->
            <HeaderMid />
            <div class="mt-2 flex border-t-4 border-slate-900"></div>
        </header>
        <!-- finish header -->
        <!-- start middle -->
        <div id="middle"></div>
        <!-- finish middle -->
        <!-- start bottom -->
        <div id="bottom"></div>
        <!-- finish bottom -->
        <!-- start footer -->
        <footer id="footer"></footer>
        <!-- finish footer -->
    </div>
</template>
