<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { usePage, Link } from "@inertiajs/vue3";
import { computed } from "vue";

const showBasePrice = computed(
    () => usePage().props.fee_name == "Item Price Credit"
);
</script>
<template>
    <AppLayout title="Fee name details">
        <template #header>
            <div class="flex flex-col items-center justify-between md:flex-row">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Fee Name :
                    <span class="text-gray-500">{{
                        $page.props.fee_name
                    }}</span>
                </h2>
                <Link :href="route('laztrx.index')" class="text-indigo-500">
                    &laquo; back
                </Link>
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    DATE
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    TYPE
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    DETAILS
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    AMOUNT
                                </th>
                                <th
                                    v-if="showBasePrice"
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    BASE PRICE
                                </th>
                                <th
                                    v-if="showBasePrice"
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    MARGIN
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    ORDER NO
                                </th>
                                <th
                                    class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                >
                                    SELLER SKU
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <template v-if="$page.props.trxs.data.length">
                                <tr
                                    v-for="trx in $page.props.trxs.data"
                                    :key="trx.id"
                                    class="hover:bg-gray-100"
                                >
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.transaction_date }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.transaction_type }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.details }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ formatRupiah(trx.amount) }}
                                    </td>
                                    <td
                                        v-if="showBasePrice"
                                        class="py-3 px-4 text-left"
                                    >
                                        <div v-if="trx.lazproduct">
                                            {{
                                                formatRupiah(
                                                    trx.lazproduct.base_price
                                                )
                                            }}
                                        </div>
                                    </td>
                                    <td
                                        v-if="showBasePrice"
                                        class="py-3 px-4 text-left"
                                    >
                                        <div v-if="trx.lazproduct">
                                            {{
                                                formatRupiah(
                                                    trx.amount -
                                                        trx.lazproduct
                                                            .base_price
                                                )
                                            }}
                                        </div>
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.order_no }}
                                    </td>
                                    <td class="py-3 px-4 text-left">
                                        {{ trx.seller_sku }}
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
                            `Showing ${$page.props.trxs.from} to ${$page.props.trxs.to} of  ${$page.props.trxs.total} data`
                        }}
                    </div>
                    <Pagination :links="$page.props.trxs.links" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
