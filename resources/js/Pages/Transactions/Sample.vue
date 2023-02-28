<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const openTab = ref(1);
const toggleTabs = (tabNumber) => {
    openTab.value = tabNumber;
};
</script>
<template>
    <AppLayout>
        <template #header
            ><h2
                class="text-lg font-semibold leading-tight text-gray-800 md:text-xl"
            >
                Yukk... Mulai Catat Pengeluaran Bisnis Mu Agar Bisnis Mu Lebih
                Terarah !
            </h2>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="flex w-full gap-4 overflow-hidden bg-white p-4 shadow-xl sm:rounded-lg"
                >
                    <!-- 
                    <div class="">
                        <div
                            class="relative flex items-center rounded-lg bg-indigo-400 p-4 text-white shadow-md dark:bg-gray-800"
                        >
                            <div
                                class="mr-4 rounded-full bg-indigo-100 p-3 text-indigo-500 dark:bg-indigo-500 dark:text-indigo-100"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </div>

                            <div>
                                <p class="mb-2 text-sm font-medium">
                                    Pemasukan
                                </p>
                                <p class="text-lg font-semibold">
                                    Rp 2.500.000
                                </p>
                            </div>
                        </div>
                        
                    </div> -->

                    <div class="flex w-full">
                        <ul class="mb-0 flex list-none flex-col pt-3 pb-4">
                            <li class="-mb-px mr-2 text-center last:mr-0">
                                <a
                                    class="block rounded px-5 py-3 text-xs font-bold uppercase leading-normal"
                                    v-on:click="toggleTabs(1)"
                                    v-bind:class="{
                                        'text-indigo-600 bg-white':
                                            openTab !== 1,
                                        'text-white bg-indigo-600':
                                            openTab === 1,
                                    }"
                                >
                                    Home
                                </a>
                            </li>
                            <li class="-mb-px mr-2 text-center last:mr-0">
                                <a
                                    class="block rounded px-5 py-3 text-xs font-bold uppercase leading-normal"
                                    v-on:click="toggleTabs(2)"
                                    v-bind:class="{
                                        'text-indigo-600 bg-white':
                                            openTab !== 2,
                                        'text-white bg-indigo-600':
                                            openTab === 2,
                                    }"
                                >
                                    Categories
                                </a>
                            </li>
                            <li class="-mb-px mr-2 text-center last:mr-0">
                                <a
                                    class="block rounded px-5 py-3 text-xs font-bold uppercase leading-normal"
                                    v-on:click="toggleTabs(3)"
                                    v-bind:class="{
                                        'text-indigo-600 bg-white':
                                            openTab !== 3,
                                        'text-white bg-indigo-600':
                                            openTab === 3,
                                    }"
                                >
                                    Transactions
                                </a>
                            </li>
                            <li class="-mb-px mr-2 text-center last:mr-0">
                                <a
                                    class="block rounded px-5 py-3 text-xs font-bold uppercase leading-normal"
                                    v-on:click="toggleTabs(4)"
                                    v-bind:class="{
                                        'text-indigo-600 bg-white':
                                            openTab !== 4,
                                        'text-white bg-indigo-600':
                                            openTab === 4,
                                    }"
                                >
                                    Pi/Utang
                                </a>
                            </li>
                        </ul>
                        <div
                            class="relative mb-6 flex w-full min-w-0 flex-col break-words rounded"
                        >
                            <div class="flex-auto px-4 py-5">
                                <div class="tab-content tab-space">
                                    <div
                                        v-bind:class="{
                                            hidden: openTab !== 1,
                                            block: openTab === 1,
                                        }"
                                    >
                                        <Link
                                            class="text-indigo-600"
                                            :href="
                                                route(
                                                    'extracker.categories.index'
                                                )
                                            "
                                            >Categories</Link
                                        >
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                        <p>
                                            Collaboratively administrate
                                            empowered markets via plug-and-play
                                            networks. Dynamically procrastinate
                                            B2C users after installed base
                                            benefits.
                                            <br />
                                            <br />
                                            Dramatically visualize customer
                                            directed convergence without
                                            revolutionary ROI.
                                        </p>
                                    </div>
                                    <div
                                        v-bind:class="{
                                            hidden: openTab !== 2,
                                            block: openTab === 2,
                                        }"
                                    >
                                        <p>
                                            Completely synergize resource taxing
                                            relationships via premier niche
                                            markets. Professionally cultivate
                                            one-to-one customer service with
                                            robust ideas.
                                            <br />
                                            <br />
                                            Dynamically innovate
                                            resource-leveling customer service
                                            for state of the art customer
                                            service.
                                        </p>
                                    </div>
                                    <div
                                        v-bind:class="{
                                            hidden: openTab !== 3,
                                            block: openTab === 3,
                                        }"
                                    >
                                        Lorem ipsum dolor sit amet consectetur,
                                        adipisicing elit. Aliquam maiores nulla
                                        doloribus provident facere. Nostrum,
                                        quisquam explicabo at nihil, assumenda
                                        nulla veritatis perferendis accusantium
                                        animi delectus placeat voluptate tempore
                                        iste.
                                    </div>
                                    <div
                                        v-bind:class="{
                                            hidden: openTab !== 4,
                                            block: openTab === 4,
                                        }"
                                    >
                                        <p>tab 4</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
