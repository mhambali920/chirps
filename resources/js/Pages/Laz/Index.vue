<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Spiner from "@/Components/Spiner.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import InputError from "@/Components/InputError.vue";
import DialogModal from "@/Components/DialogModal.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import { ref } from "vue";
import Card from "./Partials/Card.vue";
const openModal = ref(false);
const showSpiner = ref(false);
const form = useForm({
    uploadFile: null,
});

router.on("start", () => {
    showSpiner.value = true;
});
router.on("finish", () => {
    showSpiner.value = false;
});

function submit() {
    form.post("/laz_transaction", {
        onSuccess: () => {
            form.reset();
            openModal.value = false;
        },
    });
}
const closeModal = () => {
    openModal.value = false;
    form.reset();
    form.clearErrors();
};
</script>
<template>
    <Head title="Laporan akun lazada" />
    <AppLayout>
        <template #header>
            <div class="flex flex-col items-center justify-between md:flex-row">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Laz Transaction Import
                </h2>
                <div class="flex gap-2">
                    <SecondaryButton
                        @click="form.delete(route('laztrx.destroy'))"
                        >clear data</SecondaryButton
                    >
                    <PrimaryButton @click="openModal = true" type="button"
                        >Upload</PrimaryButton
                    >
                </div>
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.trxs.min_date"
                    class="mb-4 text-xl font-semibold text-slate-700"
                >
                    Periode Transaksi : {{ $page.props.trxs.min_date }} -
                    {{ $page.props.trxs.max_date }}
                </div>
                <div class="mb-8 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <!-- Card -->
                    <Card title="Total Pembayaran">
                        <template #icon
                            ><svg
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
                        </template>
                        <template #default>
                            {{
                                formatRupiah($page.props.trxs.total_payment)
                            }}</template
                        >
                    </Card>
                    <!-- Card -->

                    <div
                        class="relative flex items-center rounded-lg bg-white p-4 shadow-md dark:bg-gray-800"
                    >
                        <div
                            class="mr-4 rounded-full bg-green-100 p-3 text-green-500 dark:bg-green-500 dark:text-green-100"
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
                        <Link
                            :href="route('laztrx.edit')"
                            class="group absolute inset-0 overflow-hidden"
                            ><span
                                class="flex h-full w-full translate-y-full items-center justify-center bg-white/10 font-semibold text-gray-700 backdrop-blur-sm transition-transform duration-300 group-hover:translate-y-0"
                                >Update Harga Modal</span
                            >
                        </Link>
                        <div>
                            <p
                                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Modal Produk
                            </p>
                            <p
                                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                {{
                                    formatRupiah(
                                        $page.props.trxs.total_base_price
                                    )
                                }}
                            </p>
                        </div>
                    </div>

                    <!-- Card -->
                    <div
                        class="flex items-center rounded-lg bg-white p-4 shadow-md dark:bg-gray-800"
                    >
                        <div
                            class="mr-4 rounded-full bg-blue-100 p-3 text-blue-500 dark:bg-blue-500 dark:text-blue-100"
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
                            <p
                                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                Laba Penjualan
                            </p>
                            <p
                                class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                            >
                                {{
                                    formatRupiah(
                                        $page.props.trxs.total_payment -
                                            $page.props.trxs.total_base_price
                                    )
                                }}
                            </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div
                        class="flex items-center rounded-lg bg-white p-4 shadow-md dark:bg-gray-800"
                    >
                        <div
                            class="mr-4 rounded-full bg-teal-100 p-3 text-teal-500 dark:bg-teal-500 dark:text-teal-100"
                        >
                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"
                                ></path>
                            </svg>
                        </div>
                        <div>
                            <p
                                class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                            >
                                <span class="text-lg font-semibold">
                                    {{
                                        $page.props.trxs
                                            .total_products_orders ?? 0
                                    }}
                                </span>
                                Produk Terjual
                            </p>
                            <p
                                class="font-medium text-gray-700 dark:text-gray-200"
                            >
                                Dari
                                <span class="text-lg font-semibold">
                                    {{
                                        $page.props.trxs.total_orders ?? 0
                                    }}</span
                                >
                                Pesanan
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th
                                    class="w-1/3 py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    FEE NAME
                                </th>
                                <th
                                    class="w-1/3 py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    AMOUNT
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <template
                                v-if="$page.props.transaction_details.length"
                            >
                                <tr
                                    v-for="(trx, key) in $page.props
                                        .transaction_details"
                                    :key="key"
                                    class="hover:bg-gray-100"
                                    :class="
                                        trx.amount < 0 ? 'text-red-600' : ''
                                    "
                                >
                                    <td class="w-1/3 py-3 px-4 text-left">
                                        {{ trx.fee_name }}
                                    </td>
                                    <td class="w-1/3 py-3 px-4 text-left">
                                        {{ formatRupiah(trx.amount) }}
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
            </div>
        </div>
        <!--Upload File Modal -->
        <DialogModal :closeable="false" :show="openModal" @close="closeModal">
            <template #title> Upload File </template>

            <template #content>
                Pastikan untuk mengupload file csv yang di download dari laporan
                akun Sellercenter lazada. Login ke Sellercenter → Keuangan →
                Laporan Akun → Pilih Tab Tinjauan Laporan → Laporan Pendapatan →
                Unduh → Detail Transaksi (csv).

                <div class="mt-4">
                    <input
                        accept=".csv"
                        class="w-full rounded-lg border px-4 py-2 text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100"
                        type="file"
                        @input="form.uploadFile = $event.target.files[0]"
                    />

                    <InputError
                        :message="form.errors.uploadFile"
                        class="mt-2"
                    />
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="submit"
                >
                    Proses
                </PrimaryButton>
            </template>
        </DialogModal>
        <Spiner :show="showSpiner" />
    </AppLayout>
</template>
