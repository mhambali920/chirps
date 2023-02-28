<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import TrxCard from "@/Components/Trx/TrxCard.vue";
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    id: "",
    date: "",
    due_date: "",
    amount: "",
    payment_type: "cash",
    description: "",
    category_id: "",
    customer_id: "",
});
const submit = () =>
    form.post(route("extracker.transactions.store"), {
        onSuccess: () => closeModal(),
    });

const editTrx = (trx) => {
    form.id = trx.id;
    form.date = trx.date;
    form.due_date = trx.due_date;
    form.amount =
        trx.amount > 0
            ? trx.amount.toString()
            : trx.amount.toString().substring(1);
    form.payment_type = trx.date;
    form.description = trx.description;
    form.category_id = trx.category_id;
    form.customer_id = trx.customer_id;
    openModal.value = true;
    headerModal.value = "Edit";
};

const openModal = ref(false);
const headerModal = ref("Tambah");
const closeModal = () => {
    openModal.value = false;
    headerModal.value = "Tambah";
    form.reset();
    form.clearErrors();
};
</script>
<template>
    <AppLayout title="Transaction">
        <template #header
            ><h2
                class="text-lg font-semibold leading-tight text-gray-800 md:text-xl"
            >
                Yukk... Mulai catat pemasukan dan pengeluaran bisnismu, agar
                bisnis mu lebih terarah !
            </h2>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="flex w-full flex-col-reverse gap-4 overflow-hidden md:flex-row"
                >
                    <div class="flex-auto">
                        <div class="mb-4 flex gap-2">
                            <Link
                                :href="route('extracker.categories.index')"
                                class="flex items-center rounded-lg border-2 border-gray-400 px-4 py-2 text-gray-600 focus:border-indigo-500 focus:bg-indigo-200 focus:text-indigo-700"
                            >
                                <span class="mr-2">Categories</span>
                            </Link>
                            <Link
                                :href="route('extracker.transactions.create')"
                                class="flex items-center rounded-lg border-2 border-gray-400 px-4 py-2 text-gray-600 focus:border-indigo-500 focus:bg-indigo-200 focus:text-indigo-700"
                            >
                                <span class="mr-2">Add Transaction</span>
                            </Link>
                            <button
                                @click="openModal = true"
                                class="flex items-center rounded-lg border-2 border-gray-400 px-4 py-2 text-gray-600 focus:border-indigo-500 focus:bg-indigo-200 focus:text-indigo-700"
                            >
                                <span class="mr-2">modal</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-5 w-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"
                                    />
                                </svg>
                            </button>
                            <button
                                class="flex items-center rounded-lg border-2 border-gray-400 px-4 py-2 text-gray-600 focus:border-indigo-500 focus:bg-indigo-200 focus:text-indigo-700"
                            >
                                <span class="mr-2">Group By</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-5 w-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div class="">
                            <!-- group per tanggal -->
                            <div
                                class="border-b-2 py-4"
                                v-for="(trxs, index) in $page.props
                                    .transactions"
                                :key="index"
                            >
                                <div
                                    class="my-2 flex items-center justify-between px-4 font-oswald font-semibold"
                                >
                                    <h3>
                                        {{ index }}
                                    </h3>
                                    <p
                                        :class="{
                                            'text-red-500': trxs.total <= 0,
                                        }"
                                    >
                                        {{ formatRupiah(trxs.total) }}
                                    </p>
                                </div>
                                <!-- card -->
                                <TrxCard :trxs="trxs.data" @edit="editTrx" />
                            </div>
                        </div>
                    </div>
                    <div class="max-w-lg border-2">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Iure, nihil atque! Voluptatibus maiores ex commodi
                        expedita debitis dolorem amet, iste ad quas cum. Neque,
                        natus quas dolor unde voluptas ab.
                    </div>
                </div>
            </div>
        </div>
        <DialogModal :closeable="false" :show="openModal" @close="closeModal">
            <template #title>{{ headerModal }} data transaksi</template>

            <template #content>
                <input type="hidden" />
                <div>
                    <InputLabel for="date" value="Tanggal" />
                    <TextInput
                        id="date"
                        v-model="form.date"
                        type="date"
                        class="mt-1 block w-full"
                        required
                    />
                    <InputError class="mt-2" :message="form.errors.date" />
                </div>
                <div class="mt-4">
                    <InputLabel for="category" value="Kategory" />
                    <select
                        id="category"
                        v-model="form.category_id"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                        <option
                            v-for="category in $page.props.categories"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.type }} - {{ category.name }}
                        </option>
                    </select>
                    <InputError
                        class="mt-2"
                        :message="form.errors.category_id"
                    />
                </div>
                <div class="mt-4">
                    <InputLabel for="amount" value="Jumlah" />
                    <TextInput
                        id="amount"
                        v-model="form.amount"
                        type="number"
                        class="mt-1 block w-full"
                    />
                    <InputError class="mt-2" :message="form.errors.amount" />
                </div>

                <div class="mt-4">
                    <InputLabel for="description" value="Description" />
                    <textarea
                        v-model="form.description"
                        id="description"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    ></textarea>
                    <InputError
                        class="mt-2"
                        :message="form.errors.description"
                    />
                </div>
                <div class="mt-4 block">
                    <InputLabel value="METODE PEMBAYARAN" />
                    <div class="mt-2 flex items-center gap-x-6">
                        <div class="flex items-center">
                            <input
                                class="appearance-none checked:bg-indigo-400 hover:bg-indigo-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.payment_type"
                                value="cash"
                                type="radio"
                                name="payment_type"
                                id="radio1"
                            />
                            <label
                                for="radio1"
                                class="ml-2 text-sm text-gray-600"
                                >Tunai</label
                            >
                        </div>
                        <div
                            class="flex items-center"
                            v-if="
                                $page.props.categories.find(
                                    (category) =>
                                        category.id === form.category_id
                                )?.cashless !== 0
                            "
                        >
                            <input
                                class="appearance-none checked:bg-indigo-400 hover:bg-indigo-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                v-model="form.payment_type"
                                value="noncash"
                                type="radio"
                                name="payment_type"
                                id="radio2"
                            />
                            <label
                                for="radio2"
                                class="ml-2 text-sm text-gray-600"
                                >Non Tunai</label
                            >
                        </div>
                    </div>
                    <InputError
                        class="mt-2"
                        :message="form.errors.payment_type"
                    />
                </div>
                <div class="mt-4 block" v-if="form.payment_type === 'noncash'">
                    <InputLabel for="due_date" value="Tanggal Jatuh Tempo" />
                    <TextInput
                        :min="new Date().toISOString().split('T')[0]"
                        id="due_date"
                        v-model="form.due_date"
                        type="date"
                        class="mt-1 block w-full"
                    />
                    <InputError class="mt-2" :message="form.errors.due_date" />
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ml-3"
                    @click="submit"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    >Save</PrimaryButton
                >
            </template>
        </DialogModal>
    </AppLayout>
</template>
