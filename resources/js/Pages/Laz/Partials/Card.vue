<script setup>
const props = defineProps({
    title: String,
});
</script>
<template>
    <div
        class="flex items-center rounded-lg bg-white p-4 shadow-md dark:bg-gray-800"
    >
        <div
            class="mr-4 rounded-full bg-slate-100 p-3 text-slate-500 dark:bg-orange-500 dark:text-orange-100"
        >
            <slot name="icon"></slot>
            <!-- <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    fill-rule="evenodd"
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                    clip-rule="evenodd"
                ></path>
            </svg> -->
        </div>
        <div>
            <p
                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
                {{ props.title }}
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                <slot></slot>
            </p>
        </div>
    </div>
</template>
