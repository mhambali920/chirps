<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Icon from "@/Components/Icon.vue";
import Pagination from "@/Components/Pagination.vue";
import { router, Head } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const deleteUser = (id) => {
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
            router.delete(route("users.destroy", { user: id }), {
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
                        text: "An error occurred while deleting the user.",
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
    <Head title="User list" />
    <AppLayout>
        <template #header>
            <div class="">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Users List
                </h2>
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table
                        class="min-w-full table-auto overflow-x-scroll bg-white md:table-fixed"
                    >
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    NAME
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    EMAIL
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    ROLE
                                </th>
                                <th
                                    class="py-3 px-4 text-center text-sm font-semibold uppercase"
                                >
                                    ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <template v-if="$page.props.users.data.length">
                                <tr
                                    v-for="user in $page.props.users.data"
                                    :key="user.id"
                                    class="hover:bg-gray-100"
                                >
                                    <td class="py-3 px-4 text-left">
                                        {{ user.name }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ user.email }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ user.role }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <button @click="deleteUser(user.id)">
                                            <Icon name="trash" />
                                        </button>
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
                            `Showing ${$page.props.users.from} to ${$page.props.users.to} of  ${$page.props.users.total} data`
                        }}
                    </div>
                    <Pagination :links="$page.props.users.links" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
