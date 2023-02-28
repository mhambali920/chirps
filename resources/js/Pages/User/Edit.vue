<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router, Head, Link } from "@inertiajs/vue3";
</script>
<template>
    <Head title="User Edit" />
    <AppLayout>
        <template #header>
            <div class="">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Edit User
                </h2>
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-xl sm:rounded-lg"
                ></div>
            </div>
        </div>
    </AppLayout>
</template>
