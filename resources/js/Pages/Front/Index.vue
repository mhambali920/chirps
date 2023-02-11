<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "./AppLayout.vue";
</script>
<template>
    <AppLayout>
        <Head title="Newspaper" />

        <!-- start middle -->
        <div id="middle" class="mx-4 md:mx-24">
            <div
                id="sliderwrapper"
                class="hidden border-b-4 border-gray-900 md:block"
            >
                <div class="my-8 grid grid-cols-4 gap-2 font-serif">
                    <div class="border-l p-2" v-for="(x, y) in 4" :key="y">
                        <h6 class="text-red-700">news</h6>
                        <h3 class="text-base font-semibold hover:text-red-700">
                            FAT BIAS STARTS EARLY AND TAKES A SERIOUS TOLL
                        </h3>
                    </div>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-8">
                <div class="lg:col-span-3">
                    <div class="border-b-4 border-double border-gray-400">
                        <h2
                            class="mt-10 mb-6 font-oswald text-4xl font-semibold uppercase"
                        >
                            Breaking News
                        </h2>
                    </div>
                    <!-- post hero -->
                    <div class="mt-5">
                        <article class="py-5">
                            <figure>
                                <a href=""
                                    ><img
                                        class="h-auto w-full"
                                        src="http://localhost:8000/postcontoh.jpeg"
                                        alt=""
                                /></a>
                            </figure>
                            <div
                                id="postinfo"
                                class="my-4 flex gap-4 text-sm uppercase"
                            >
                                <span>januari, 08 2023</span>
                                <span class="text-red-700">family</span>
                                <span
                                    >by
                                    <span class="text-red-700"
                                        >admin</span
                                    ></span
                                >
                            </div>
                            <header id="postheading">
                                <h2 class="font-serif text-3xl font-semibold">
                                    24 Tempat Wisata Bogor yang Paling Kekinian
                                    dan Instagramable
                                </h2>
                            </header>
                            <div id="posexcerp" class="mt-4">
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet.
                                </p>
                            </div>
                        </article>
                    </div>
                    <article class="border-t-2 border-gray-800 py-5">
                        <div
                            id="postinfo"
                            class="my-4 flex gap-4 text-sm uppercase"
                        >
                            <span>januari, 08 2023</span>
                            <span class="text-red-700">family</span>
                            <span
                                >by
                                <span class="text-red-700">admin</span></span
                            >
                        </div>
                        <header id="postheading">
                            <h2 class="font-serif text-3xl font-semibold">
                                Why Employees At Apple And Google Are More
                                Productive
                            </h2>
                        </header>
                        <div id="posexcerp" class="mt-4">
                            <p class="text-base font-normal">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Quod, nesciunt quos. Sit,
                                fugit! Voluptate harum deserunt, architecto qui
                                corrupti rem incidunt molestias ab fuga nisi
                                accusamus voluptates necessitatibus, accusantium
                                amet.
                            </p>
                        </div>
                    </article>
                </div>
                <!-- daily feed -->
                <div class="">
                    <div class="border-b-4 border-double border-gray-400">
                        <h2
                            class="mt-10 mb-6 font-oswald text-4xl font-semibold uppercase"
                        >
                            daily feed
                        </h2>
                    </div>
                    <div class="border-b-2 border-gray-900">
                        <article class="py-5" v-for="(x, y) in 3" :key="y">
                            <div
                                id="postinfo"
                                class="my-2 flex gap-2 text-xs uppercase"
                            >
                                <span class="text-gray-500">in</span>
                                <span class="text-red-700">family</span>
                            </div>
                            <header id="postheading">
                                <h2 class="font-serif text-xl font-semibold">
                                    The Impact of Family Structure on the Health
                                    of Children: Effects of Divorce
                                </h2>
                            </header>
                            <div id="posexcerp" class="mt-4">
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                </p>
                                <p
                                    class="text-sm font-semibold uppercase text-gray-800"
                                >
                                    read more
                                </p>
                            </div>
                        </article>
                    </div>
                    <p
                        class="mt-2 font-oswald uppercase text-red-700 hover:text-gray-500"
                    >
                        view more post
                    </p>
                </div>
            </div>
            <div class="mt-10 border-t-8 border-gray-900"></div>
            <!-- featured stories -->
            <div>
                <div class="border-b-4 border-double border-gray-400">
                    <h2
                        class="mt-10 mb-6 font-oswald text-4xl font-semibold uppercase"
                    >
                        Featured stories
                    </h2>
                </div>
                <div>
                    <div
                        class="grid grid-rows-2 gap-6 md:grid-cols-2 lg:grid-cols-4"
                    >
                        <article class="py-5" v-for="(x, y) in 8" :key="y">
                            <figure class="overflow-hidden">
                                <a href=""
                                    ><img
                                        class="h-auto w-full transition duration-700 hover:scale-105"
                                        src="http://localhost:8000/postcontoh.jpeg"
                                        alt=""
                                /></a>
                            </figure>
                            <div
                                id="postinfo"
                                class="my-2 flex gap-4 text-xs uppercase"
                            >
                                <span>januari, 08 2023</span>
                                <span class="text-red-700">family</span>
                            </div>
                            <header id="postheading">
                                <h2 class="font-serif text-xl font-semibold">
                                    Daftar 14 Kecamatan Bakal Masuk Kabupaten
                                    Bogor Barat
                                </h2>
                            </header>
                            <div id="posexcerp" class="mt-4">
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                </p>
                                <p
                                    class="text-sm font-semibold uppercase text-gray-800"
                                >
                                    read more
                                </p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="mt-10 mb-5 border-t-2 border-gray-900"></div>
            <p class="font-oswald uppercase text-red-700 hover:text-gray-500">
                view more post
            </p>
        </div>
        <!-- finish middle -->
        <!-- start bottom -->
        <div id="bottom" class="mx-24 border-b-8 border-gray-900 py-12">
            <div class="mx-auto w-full text-center">
                <h4 class="font-serif text-2xl font-semibold">
                    Sign up for the Spotlight Newsletter:
                </h4>
                <form
                    action=""
                    class="my-5 flex items-center justify-center gap-1"
                >
                    <input
                        type="text"
                        class="border-gray-300 transition duration-500 focus:border-red-700 focus:outline-none focus:ring-0"
                    /><button
                        type="submit"
                        class="bg-red-700 px-6 py-3 font-oswald text-xs uppercase text-white"
                    >
                        signup
                    </button>
                </form>
            </div>
        </div>
        <!-- finish bottom -->
    </AppLayout>
</template>
