<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { router, Head, Link } from "@inertiajs/vue3";
import Swal from "sweetalert2";

defineProps({
    posts: Object,
});
const edit = (post) => {
    console.log(post);
};
const destroy = (id) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // Do something when confirmed
            router.delete(route("posts.destroy", { post: id }), {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "User has been deleted.",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                },
                onError: (errors) => {
                    // Menampilkan SweetAlert2 dengan pesan error
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting the post.",
                        icon: "error",
                        confirmButtonText: "OK",
                    });
                },
            });
        }
    });
};
</script>
<template>
    <Head title="Post list" />
    <AppLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Posts List
                </h2>
                <Link
                    :href="route('post.create')"
                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring focus:ring-gray-300 active:bg-gray-900 disabled:opacity-25"
                    >Add New Post</Link
                >
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table
                        class="min-w-full table-auto overflow-x-scroll bg-white md:table-fixed"
                    >
                        <thead
                            class="bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">image</th>
                                <th scope="col" class="px-6 py-3">category</th>
                                <th scope="col" class="px-6 py-3">title</th>
                                <th scope="col" class="px-6 py-3">body</th>
                                <th scope="col" class="px-6 py-3">author</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <template v-if="posts.data.length">
                                <tr
                                    v-for="post in posts.data"
                                    :key="post.id"
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                >
                                    <td class="w-64 px-6 py-4">
                                        <img
                                            v-if="post.image"
                                            src="/storage/post-image/"
                                            +
                                            post.image
                                            alt=""
                                            srcset=""
                                        />
                                        <img
                                            v-else
                                            src="/storage/post-image/default-01.webp"
                                            alt=""
                                            srcset=""
                                        />
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ post.category.name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ post.title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ post.excerpt }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ post.user.name }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex gap-2">
                                            <button
                                                @click="edit(post)"
                                                class="rounded-lg bg-indigo-100 p-1 focus:ring-1 focus:ring-indigo-600"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-5 w-5 text-indigo-600"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                    />
                                                </svg>
                                            </button>
                                            <button
                                                @click="destroy(post.id)"
                                                class="rounded-lg bg-red-100 p-1 focus:ring-1 focus:ring-red-600"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-5 w-5 text-red-600"
                                                >
                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            <tr v-else>
                                <td
                                    colspan="2"
                                    class="w-1/3 py-24 px-4 text-center text-2xl text-gray-400"
                                >
                                    Tidak ada data
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div
                    class="mt-6 flex flex-col items-center justify-between md:flex-row"
                >
                    <div class="text-gray-700">
                        {{
                            `Showing ${posts.from} to ${posts.to} of  ${posts.total} data`
                        }}
                    </div>
                    <Pagination :links="posts.links" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
