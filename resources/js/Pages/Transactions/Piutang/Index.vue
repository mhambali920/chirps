<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SubNavigation from "@/Components/SubNavigation.vue";
import DialogModal from "@/Components/DialogModal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { reactive, ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    utang: Object,
    piutang: Object,
    total_piutang: [Number, String],
    total_utang: [Number, String],
});
const openModalAccept = ref(false);
const openModalPiutang = ref(false);
const openModalUtang = ref(false);
const openModalPay = ref(false);

const showTablePiutang = ref(true);

let details = reactive({});
let remaining_debt = ref(null);

// piutang
const showDetailPiutang = (item) => {
    openModalPiutang.value = true;
    details = item;
};

const showFormAccept = ref(false);
const acceptForm = useForm({
    trx_id: null,
    amount: null,
    date: null,
});
const accept = (id, total) => {
    remaining_debt.value = total;
    openModalAccept.value = true;
    acceptForm.trx_id = id;
};
const submitAccept = () => {
    acceptForm.post(route("extracker.piutang.accept"));
};

// utang
const showDetailUtang = (item) => {
    openModalUtang.value = true;
    details = item;
};
const showFormPay = ref(false);
const payForm = useForm({
    trx_id: null,
    amount: null,
    date: null,
});
const pay = (id, total) => {
    remaining_debt.value = total;
    openModalPay.value = true;
    payForm.trx_id = id;
};
const submitPay = () => {
    payForm.post(route("extracker.utang.pay"));
};

const closeModal = () => {
    openModalAccept.value = false;
    openModalPiutang.value = false;
    openModalUtang.value = false;
    openModalPay.value = false;
    showFormAccept.value = false;
    acceptForm.clearErrors();
    payForm.clearErrors();
};
</script>
<template>
    <AppLayout title="Transaction">
        <template #header>
            <SubNavigation />
        </template>
        <div class="relative py-7">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="flex w-full flex-col-reverse gap-4 overflow-hidden md:flex-row"
                >
                    <div class="flex-auto">
                        <div
                            class="relative mb-4 overflow-x-auto bg-white shadow-md sm:rounded-lg"
                        >
                            <div
                                class="p-5 text-sm text-gray-500 dark:text-gray-400"
                            >
                                <p>
                                    Total Piutang yang belum di terima
                                    <span
                                        class="text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                        >{{ formatRupiah(total_piutang) }}</span
                                    >
                                </p>
                                <p>
                                    Total Hutang yang belum di bayar
                                    <span
                                        class="text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                        >{{ formatRupiah(total_utang) }}</span
                                    >
                                </p>
                            </div>
                        </div>
                        <div class="mb-4 flex w-full items-center bg-white">
                            <ul
                                class="flex flex-wrap border-b border-gray-200 text-center text-sm font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400"
                            >
                                <li class="mr-2">
                                    <button
                                        @click="showTablePiutang = true"
                                        :class="{
                                            'border-b-2 border-gray-400 font-semibold':
                                                showTablePiutang,
                                        }"
                                        class="inline-block rounded-t-lg p-4 dark:bg-gray-800 dark:text-blue-500"
                                    >
                                        Data Piutang
                                    </button>
                                </li>
                                <li class="mr-2">
                                    <button
                                        :class="{
                                            'border-b-2 border-gray-400 font-semibold':
                                                !showTablePiutang,
                                        }"
                                        @click="showTablePiutang = false"
                                        class="inline-block rounded-t-lg p-4 hover:bg-gray-50 hover:text-gray-600 dark:hover:bg-gray-800 dark:hover:text-gray-300"
                                    >
                                        Data Hutang
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div
                            v-if="showTablePiutang"
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Piutang
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sudah Diterima
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal Jatuh Tempo
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kontak
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Details</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="item in piutang"
                                        :key="item.id"
                                        class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                    >
                                        <th
                                            scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                        >
                                            {{ item.date }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ item.category_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatRupiah(item.amount) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatRupiah(item.accepted) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ item.due_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ item.contact_name }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button
                                                @click="
                                                    accept(
                                                        item.id,
                                                        item.amount -
                                                            item.accepted
                                                    )
                                                "
                                                class="mr-2 font-medium text-blue-600 hover:underline dark:text-blue-500"
                                            >
                                                Terima
                                            </button>
                                            <button
                                                @click="showDetailPiutang(item)"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                            >
                                                Rincian
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div
                            v-else
                            class="relative overflow-x-auto shadow-md sm:rounded-lg"
                        >
                            <table
                                class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
                            >
                                <thead
                                    class="bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Hutang
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Sudah Dibayar
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal Jatuh Tempo
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kontak
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Details</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="item in utang"
                                        :key="item.id"
                                        class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600"
                                    >
                                        <th
                                            scope="row"
                                            class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white"
                                        >
                                            {{ item.date }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ item.category_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatRupiah(item.amount) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatRupiah(item.paid) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ item.due_date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ item.contact_name }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <button
                                                @click="
                                                    pay(
                                                        item.id,
                                                        item.amount - item.paid
                                                    )
                                                "
                                                class="mr-2 font-medium text-blue-600 hover:underline dark:text-blue-500"
                                            >
                                                Bayar
                                            </button>
                                            <button
                                                @click="showDetailUtang(item)"
                                                class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                            >
                                                Rincian
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <DialogModal :show="openModalPay" @close="closeModal">
            <template #title
                ><div class="text-lg font-bold">Bayar Utang</div></template
            >

            <template #content>
                <div v-show="!showFormPay" class="text-lg">
                    Bayar seluruhnya atau sebagian ?
                </div>
                <div v-if="showFormPay">
                    <p class="text-sm text-gray-800">
                        Utang yang belum di bayar sebesar
                        <span class="font-semibold">{{
                            formatRupiah(remaining_debt)
                        }}</span>
                    </p>
                    <div>
                        <InputLabel for="date" value="Tanggal" />
                        <TextInput
                            id="date"
                            v-model="payForm.date"
                            type="date"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="payForm.errors.date"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="amount" value="Jumlah" />
                        <TextInput
                            id="amount"
                            v-model="payForm.amount"
                            type="number"
                            class="mt-1 block w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="payForm.errors.amount"
                        />
                    </div>
                </div>
            </template>

            <template #footer>
                <SecondaryButton v-if="!showFormPay">
                    Seluruhnya
                </SecondaryButton>
                <SecondaryButton
                    v-if="!showFormPay"
                    @click="showFormPay = true"
                    class="ml-3"
                >
                    Sebagian
                </SecondaryButton>
                <PrimaryButton
                    v-if="showFormPay"
                    class="ml-3"
                    @click="submitPay"
                    >Save</PrimaryButton
                ></template
            >
        </DialogModal>
        <DialogModal :show="openModalAccept" @close="closeModal">
            <template #title
                ><div class="text-lg font-bold">Terima Piutang</div></template
            >
            <template #content>
                <div v-show="!showFormAccept" class="text-lg">
                    Terima seluruhnya atau sebagian ?
                </div>
                <div v-if="showFormAccept">
                    <p class="text-sm text-gray-800">
                        Piutang yang belum di terima sebesar
                        <span class="font-semibold">{{
                            formatRupiah(remaining_debt)
                        }}</span>
                    </p>
                    <div>
                        <InputLabel for="date" value="Tanggal" />
                        <TextInput
                            id="date"
                            v-model="acceptForm.date"
                            type="date"
                            class="mt-1 block w-full"
                            required
                        />
                        <InputError
                            class="mt-2"
                            :message="acceptForm.errors.date"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="amount" value="Jumlah" />
                        <TextInput
                            id="amount"
                            v-model="acceptForm.amount"
                            type="number"
                            class="mt-1 block w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="acceptForm.errors.amount"
                        />
                    </div>
                </div>
            </template>

            <template #footer>
                <SecondaryButton v-if="!showFormAccept">
                    Seluruhnya
                </SecondaryButton>
                <SecondaryButton
                    v-if="!showFormAccept"
                    @click="showFormAccept = true"
                    class="ml-3"
                >
                    Sebagian
                </SecondaryButton>
                <PrimaryButton
                    v-if="showFormAccept"
                    class="ml-3"
                    @click="submitAccept"
                    >Save</PrimaryButton
                >
            </template>
        </DialogModal>
        <DialogModal :show="openModalPiutang" @close="closeModal">
            <template #title>
                <div class="text-lg font-bold">Detail Piutang</div></template
            >
            <template #content
                ><div class="p-6">
                    <div class="w-3/4 border-red-200">
                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="text-lg">
                                    Piutang Belum Diterima
                                </div>
                                <div
                                    class="ml-2 h-2 w-2 rounded-full bg-red-600"
                                >
                                    &nbsp;
                                </div>
                            </div>
                            <div class="mt-2 font-bold">
                                {{
                                    formatRupiah(
                                        details.amount - details.accepted
                                    )
                                }}
                            </div>
                        </div>
                        <div class="my-2 h-1 border-b border-gray-400">
                            &nbsp;
                        </div>
                        <div class="mb-6">
                            Tanggal Jatuh Tempo:
                            <span>{{ details.due_date }}</span> (
                            <span class="">{{
                                timeDiff(details.due_date)
                            }}</span>
                            )
                        </div>
                        <div class="flex items-center">
                            <div class="px-2">
                                <i class="far fa-note-sticky fa-2x"></i>
                            </div>
                            <div>
                                <div>
                                    Piutang dibuat pada
                                    {{ details.date }} sejumlah
                                    {{ formatRupiah(details.amount) }}
                                </div>
                                <div>
                                    Sudah diterima sejumlah
                                    {{ formatRupiah(details.accepted) }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 grid gap-x-4 md:grid-cols-2">
                            <div class="border-4 border-black p-2">
                                <div class="font-bold">Transaksi</div>
                                <div class="text-lg">
                                    {{ details.category_name }}
                                </div>
                                <div class="text-sm"></div>
                            </div>
                            <div class="border-4 border-black p-2">
                                <div class="font-bold">Pelanggan</div>
                                <div class="text-lg">
                                    {{ details.contact_name }}
                                </div>
                                <div class="text-sm">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 mb-4 font-bold">Riwayat Penerimaan</div>
                    <div class="max-h-36 w-full overflow-y-scroll">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <td class="py-2 px-4">Tanggal</td>
                                    <td class="py-2 px-4">Penerimaan</td>
                                    <td class="py-2 px-4">Sisa Piutang</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="item in details.installments"
                                    :key="item.id"
                                    class="border-b border-gray-200"
                                >
                                    <td class="py-2 px-4">{{ item.date }}</td>
                                    <td class="py-2 px-4">
                                        {{ formatRupiah(item.amount) }}
                                    </td>
                                    <td class="py-2 px-4">
                                        <span>{{
                                            formatRupiah(item.remaining_debt)
                                        }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
            <template #footer> </template>
        </DialogModal>
        <DialogModal :show="openModalUtang" @close="closeModal">
            <template #title>
                <div class="text-lg font-bold">Detail Utang</div></template
            >
            <template #content
                ><div class="p-6">
                    <div class="w-3/4 border-red-200">
                        <div class="mt-4">
                            <div class="flex items-center">
                                <div class="text-lg">Utang Belum Dibayar</div>
                                <div
                                    class="ml-2 h-2 w-2 rounded-full bg-red-600"
                                >
                                    &nbsp;
                                </div>
                            </div>
                            <div class="mt-2 font-bold">
                                {{
                                    formatRupiah(details.amount - details.paid)
                                }}
                            </div>
                        </div>
                        <div class="my-2 h-1 border-b border-gray-400">
                            &nbsp;
                        </div>
                        <div class="mb-6">
                            Tanggal Jatuh Tempo:
                            <span>{{ details.due_date }}</span> (
                            <span class="">{{
                                timeDiff(details.due_date)
                            }}</span>
                            )
                        </div>
                        <div class="flex items-center">
                            <div class="px-2">
                                <i class="far fa-note-sticky fa-2x"></i>
                            </div>
                            <div>
                                <div>
                                    Utang dibuat pada
                                    {{ details.date }} sejumlah
                                    {{ formatRupiah(details.amount) }}
                                </div>
                                <div>
                                    Sudah dibayar sejumlah
                                    {{ formatRupiah(details.paid) }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 grid gap-x-4 md:grid-cols-2">
                            <div class="border-4 border-black p-2">
                                <div class="font-bold">Transaksi</div>
                                <div class="text-lg">
                                    {{ details.category_name }}
                                </div>
                                <div class="text-sm"></div>
                            </div>
                            <div class="border-4 border-black p-2">
                                <div class="font-bold">Kontak</div>
                                <div class="text-lg">
                                    {{ details.contact_name }}
                                </div>
                                <div class="text-sm">-</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 mb-4 font-bold">Riwayat Pembayaran</div>
                    <div class="max-h-36 w-full overflow-y-scroll">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <td class="py-2 px-4">Tanggal</td>
                                    <td class="py-2 px-4">Pembayaran</td>
                                    <td class="py-2 px-4">Sisa Utang</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="item in details.installments"
                                    :key="item.id"
                                    class="border-b border-gray-200"
                                >
                                    <td class="py-2 px-4">{{ item.date }}</td>
                                    <td class="py-2 px-4">
                                        {{ formatRupiah(item.amount) }}
                                    </td>
                                    <td class="py-2 px-4">
                                        <span>{{
                                            formatRupiah(item.remaining_debt)
                                        }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
            <template #footer> </template>
        </DialogModal>
    </AppLayout>
</template>
