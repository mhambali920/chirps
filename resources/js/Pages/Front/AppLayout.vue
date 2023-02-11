<script setup>
import { Head } from "@inertiajs/vue3";
import HeaderTop from "../../Components/Front/HeaderTop.vue";
import HeaderMid from "../../Components/Front/HeaderMid.vue";
</script>
<template>
    <Head title="Newspaper" />
    <div class="min-h-screen max-w-screen-2xl bg-white md:mx-4">
        <!-- start header -->
        <header id="header" class="relative">
            <HeaderTop />
            <HeaderMid />
        </header>
        <!-- finish header -->
        <slot></slot>
        <!-- start footer -->
        <footer id="footer" class="mx-24 mt-16 border-t-2 border-gray-900 py-5">
            <div class="flex items-center justify-center gap-4">
                <img src="../../../../public/facebook.png" alt="" class="w-4" />
                <img
                    src="../../../../public/instagram.png"
                    alt=""
                    class="w-4"
                />
                <img src="../../../../public/twitter.png" alt="" class="w-4" />
            </div>
            <div class="pt-6 text-center text-xs">
                <span>The Magazine © 2023 / All Rights Reserved</span>
            </div>
        </footer>
        <!-- finish footer -->
    </div>
</template>
