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
    <div
        class="rounded-md bg-white px-4 py-2 font-medium text-gray-500 shadow-sm md:px-6 md:py-4"
    >
        <div class="flex items-center justify-between border-b">
            <span class="mr-4">Online Users</span>
            <Icon
                name="chevron-up"
                class="cursor-pointer lg:hidden"
                :class="{ 'rotate-180': !open }"
                @click="open = !open"
            />
        </div>
        <Transition
            enter-active-class="duration-300 ease-out"
            enter-from-class="transform opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="transform opacity-0"
        >
            <ul
                v-if="open"
                class="mt-2 text-base"
                :class="open ? 'block' : 'hidden'"
            >
                <li v-for="user in users" :key="user.id" class="ml-2 list-disc">
                    {{ user.name }}
                </li>
            </ul>
        </Transition>
    </div>
</template>
