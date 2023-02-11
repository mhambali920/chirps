<script setup>
import { Head } from "@inertiajs/vue3";
import AppLayout from "./AppLayout.vue";
</script>
<template>
    <AppLayout>
        <Head title="Newspaper" />

        <!-- start middle -->
        <div id="middle" class="mx-4 md:mx-24">
            <div class="grid md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-8">
                <div class="md:col-span-3">
                    <!-- post hero -->
                    <div class="py-5">
                        <article>
                            <header id="postheading">
                                <h2 class="font-serif text-3xl font-semibold">
                                    24 Tempat Wisata Bogor yang Paling Kekinian
                                    dan Instagramable
                                </h2>
                            </header>
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

                            <figure>
                                <a href=""
                                    ><img
                                        class="h-auto w-full"
                                        src="http://localhost:8000/postcontoh.jpeg"
                                        alt=""
                                /></a>
                            </figure>

                            <div id="posexcerp" class="mt-4">
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet.
                                </p>
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet.
                                </p>
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet.
                                </p>
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit. Ratione
                                    aspernatur quis, reprehenderit incidunt
                                    natus, praesentium molestiae repellat, vero
                                    doloribus fugiat qui! Aspernatur
                                    perspiciatis corporis repellat animi! Ut
                                    expedita molestias cupiditate quasi,
                                    consequatur quod accusantium voluptatum ex
                                    repellat officia cum quos hic doloremque
                                    quidem exercitationem suscipit reiciendis
                                    molestiae, laudantium voluptate corporis!
                                </p>
                                <p class="text-base font-normal">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Quod, nesciunt quos. Sit,
                                    fugit! Voluptate harum deserunt, architecto
                                    qui corrupti rem incidunt molestias ab fuga
                                    nisi accusamus voluptates necessitatibus,
                                    accusantium amet.
                                </p>
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
                </div>
                <!-- latest articles-->
                <aside class="my-5 border-l-[1px] border-gray-200 px-5">
                    <h3 class="text-sm font-medium uppercase">
                        Latest articles
                    </h3>
                    <ul class="my-5 ml-5 list-disc">
                        <li>hahah</li>
                        <li>hahah</li>
                        <li>hahah</li>
                        <li>hahah</li>
                    </ul>
                </aside>
            </div>
            <div class="mt-10 border-t-2 border-gray-900"></div>
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
