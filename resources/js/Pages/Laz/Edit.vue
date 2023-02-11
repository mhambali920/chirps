<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { computed, onMounted, ref } from "vue";
import { Head, router, Link, usePage } from "@inertiajs/vue3";

const inputs = ref([]);
let trxs = computed(() => usePage().props.trxs);
onMounted(() => {
    trxs.value.map((v) => ({ ...v, editing: false }));
});
const update = (data, base_price) => {
    router.post(
        route("lazproduct.update"),
        {
            product_name: data.details,
            base_price: base_price,
            lazada_sku: data.lazada_sku,
        },
        { preserveScroll: true }
    );
};
</script>
<template>
    <Head title="Laporan akun lazada" />
    <AppLayout>
        <template #header>
            <div class="flex items-center gap-x-4">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Upadate Harga Modal
                </h2>
                <Link :href="route('laztrx.index')"
                    ><SecondaryButton>Skip</SecondaryButton></Link
                >
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <p class="mb-1">
                    <sup>*</sup> Tekan
                    <kbd
                        class="rounded-lg border border-gray-200 bg-white px-2 py-1.5 text-gray-800 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-100"
                        >Enter</kbd
                    >
                    setelah mengedit kolom harga modal
                </p>
                <p class="mb-2">
                    <sup>*</sup> Pengisian harga modal akan sangat berpengaruh
                    pada hasil perhitungan laba penjualan
                </p>
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    NAMA BARANG
                                </th>
                                <th
                                    class="w-1/5 py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    HARGA MODAL
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    TOTAL
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    LAZADA SKU
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    SELLER SKU
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <template v-if="trxs.length">
                                <tr
                                    v-for="(trx, index) in trxs"
                                    :key="trx.id"
                                    class="hover:bg-gray-100"
                                >
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.details }}
                                    </td>
                                    <td
                                        class="py-3 px-4 text-left"
                                        :class="
                                            trx.base_price <= 0
                                                ? 'text-red-600'
                                                : ''
                                        "
                                    >
                                        <div
                                            v-if="trx.editing"
                                            class="flex h-full w-full items-center justify-between gap-2"
                                        >
                                            <input
                                                :ref="
                                                    (el) => (inputs[index] = el)
                                                "
                                                class="w-40 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                type="number"
                                                @keyup.enter="
                                                    update(trx, trx.base_price)
                                                "
                                                v-model="trx.base_price"
                                            />
                                            <div class="flex items-end gap-2">
                                                <button
                                                    @click="trx.editing = false"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="h-6 w-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"
                                                        />
                                                    </svg>
                                                </button>
                                                <!-- <button
                                                    @click="
                                                        update(
                                                            trx,
                                                            trx.base_price
                                                        )
                                                    "
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="h-6 w-6"
                                                    >
                                                        <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M4.5 12.75l6 6 9-13.5"
                                                        />
                                                    </svg>
                                                </button> -->
                                            </div>
                                        </div>
                                        <div
                                            v-else
                                            class="flex h-full w-full items-center justify-between gap-2"
                                        >
                                            <span>{{
                                                formatRupiah(trx.base_price)
                                            }}</span>
                                            <button
                                                @click="
                                                    trx.editing = true;
                                                    $nextTick(() =>
                                                        inputs[index].focus()
                                                    );
                                                "
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="h-6 w-6"
                                                >
                                                    <path
                                                        d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z"
                                                    />
                                                    <path
                                                        d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z"
                                                    />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.total }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.lazada_sku }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.seller_sku }}
                                    </td>
                                </tr>
                            </template>
                            <tr v-else>
                                <td
                                    colspan="5"
                                    class="py-12 px-4 text-center text-2xl text-gray-400"
                                >
                                    Tidak ada data
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 flex justify-end">
                    <Link :href="route('laztrx.index')"
                        ><PrimaryButton>Selesai</PrimaryButton></Link
                    >
                </div>
            </div>
        </div>
    </AppLayout>
</template>
