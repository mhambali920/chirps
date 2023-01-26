<script setup>
import { ref, onMounted } from "vue";
import Icon from "../Icon.vue";
defineProps(["users"]);
let open = ref(false);
const getWidth = () => {
    if (window.innerWidth > 1024) {
        open.value = true;
    }
};
onMounted(() => getWidth());
</script>
<template>
    <div class="rounded-lg bg-white px-4 py-2 shadow-sm md:px-6 md:py-4">
        <div class="flex items-center justify-between border-b text-slate-900">
            <span class="mr-4">Online Users</span>
            <Icon
                name="chevron-up"
                class="cursor-pointer lg:hidden"
                @click="open = !open"
            />
        </div>
        <ul class="mt-2 text-base" :class="open ? 'block' : 'hidden'">
            <li v-for="user in users" :key="user.id">{{ user.name }}</li>
        </ul>
    </div>
</template>
