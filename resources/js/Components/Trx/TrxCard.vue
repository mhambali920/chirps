<script setup>
import { router, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

defineProps({
    trxs: {
        type: Array,
        required: true,
    },
});

defineEmits(["edit"]);
const form = useForm({});
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
            router.delete(route("extracker.transactions.destroy", id), {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Data has been deleted.",
                        icon: "success",
                        confirmButtonText: "OK",
                    });
                },
                onError: (errors) => {
                    console.log(errors);
                    // Menampilkan SweetAlert2 dengan pesan error
                    Swal.fire({
                        title: "Error!",
                        text: "An error occurred while deleting the data.",
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
    <div
        v-for="trx in trxs"
        :key="trx.id"
        class="my-2 flex flex-row items-center gap-x-4 rounded-lg bg-white p-4 shadow-lg"
    >
        <div
            class="rounded-lg p-2"
            :class="`text-${trx.category_color}-600 bg-${trx.category_color}-100`"
        >
            <span v-html="trx.category_icon"></span>
        </div>
        <div class="tengah flex-auto">
            <p class="font-medium">
                {{ trx.category_name }}
            </p>
            <p class="font-medium text-gray-400">
                {{ trx.description }} - {{ trx.contact_name }}
            </p>
        </div>
        <div class="kanan">
            <p
                class="font-semibold"
                :class="{
                    'text-red-500': trx.amount <= 0,
                }"
            >
                {{ formatRupiah(trx.amount) }}
            </p>
        </div>
        <div>
            <div class="flex gap-2">
                <button
                    @click="$emit('edit', trx)"
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
                    @click="destroy(trx.id)"
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
        </div>
    </div>
</template>
