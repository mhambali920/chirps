<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>
<template>
    <nav class="flex flex-row gap-x-5 text-gray-600">
        <NavLink
            :href="route('extracker.categories.index')"
            :active="route().current('extracker.categories.index')"
            >Category
        </NavLink>
        <NavLink
            :href="route('extracker.transactions.index')"
            :active="route().current('extracker.transactions.index')"
            >Transaction
        </NavLink>

        <NavLink
            :href="route('extracker.piutang.index')"
            :active="route().current('extracker.piutang.index')"
            >Pi/Utang
        </NavLink>
    </nav>
</template>
