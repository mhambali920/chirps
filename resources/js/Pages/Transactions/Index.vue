<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import Pagination from "@/Components/Pagination.vue";
import SubNavigation from "@/Components/SubNavigation.vue";
import Swal from "sweetalert2";
import { ref, reactive, watch, computed, defineProps } from "vue";
import { useForm, router } from "@inertiajs/vue3";
const props = defineProps({
    transactions: Object,
    categories: Array,
    month: String,
    total_income: [String, Number],
    total_expense: [String, Number],
});
const form = useForm({
    id: "",
    date: "",
    due_date: "",
    amount: "",
    payment_type: "cash",
    contact_name: "",
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
    form.contact_name = trx.contact_name;
    form.description = trx.description;
    form.category_id = trx.category_id;
    form.customer_id = trx.customer_id;
    openModal.value = true;
    headerModal.value = "Edit";
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
            router.delete(route("extracker.transactions.destroy", id), {
                preserveScroll: true,
            });
        }
    });
};
const openModal = ref(false);
const headerModal = ref("Tambah");
const closeModal = () => {
    openModal.value = false;
    headerModal.value = "Tambah";
    form.reset();
    form.clearErrors();
};

const params = reactive({
    month: props.month,
    type: "",
});

watch(params, () => {
    router.reload({ data: params, replace: true, preserveState: true });
});

const incCategory = computed(() => {
    return props.categories.filter((item) => {
        return item.type === "income";
    });
});
const expCategory = computed(() => {
    return props.categories.filter((item) => {
        return item.type === "expense";
    });
});
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
                        <div class="mb-4 flex items-center justify-between">
                            <PrimaryButton
                                @click="openModal = true"
                                type="button"
                            >
                                + Transaksi
                            </PrimaryButton>
                            <div>
                                <select
                                    v-model="params.type"
                                    id="type"
                                    class="mr-2 rounded-md border-0 bg-white shadow-md focus:ring-0"
                                >
                                    <option value="">Semua Transaksi</option>
                                    <option value="income">Pemasukan</option>
                                    <option value="expense">Pengeluaran</option>
                                </select>
                                <select
                                    id="month"
                                    v-model="params.month"
                                    class="rounded-md border-0 bg-white shadow-md focus:ring-0"
                                >
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="relative mb-4 overflow-x-auto bg-white shadow-md sm:rounded-lg"
                >
                    <div class="p-5 text-sm text-gray-500 dark:text-gray-400">
                        <p>
                            Saldo :
                            <span
                                class="text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >{{
                                    formatRupiah(total_income - total_expense)
                                }}</span
                            >
                        </p>
                        <p>
                            Total Pemasukan Bulan ini
                            <span
                                class="text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >{{ formatRupiah(total_income) }}</span
                            >
                        </p>
                        <p>
                            Total Pengeluaran Bulan ini
                            <span
                                class="text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                                >{{ formatRupiah(total_expense) }}</span
                            >
                        </p>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-left text-sm text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="bg-gray-200 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Kategori</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                                <th scope="col" class="px-6 py-3">Type</th>
                                <th scope="col" class="px-6 py-3">Catatan</th>
                                <th scope="col" class="px-6 py-3">Kontak</th>
                                <th scope="col" class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="item in transactions.data"
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
                                    {{ item.category.name }}
                                </td>
                                <td
                                    class="px-6 py-4"
                                    :class="{
                                        'text-red-600':
                                            item.category.type == 'expense',
                                    }"
                                >
                                    {{ formatRupiah(item.amount) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.category.type }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.description }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ item.contact_name }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex gap-2">
                                        <button
                                            @click="editTrx(item)"
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
                                            @click="destroy(item.id)"
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
                        </tbody>
                    </table>
                </div>
                <Pagination class="mt-6" :links="transactions.links" />
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
                        <option value="" disabled>
                            Silakan pilih kategori
                        </option>
                        <option value="" class="text-sm text-gray-400" disabled>
                            Pemasukan
                        </option>
                        <option
                            v-for="category in incCategory"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
                        </option>
                        <option value="" class="text-sm text-gray-400" disabled>
                            Pengeluaran
                        </option>
                        <option
                            v-for="category in expCategory"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
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
                    <InputLabel for="contact_name" value="Contact" />
                    <TextInput
                        id="contact_name"
                        v-model="form.contact_name"
                        type="text"
                        class="mt-1 block w-full"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.contact_name"
                    />
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
                                categories.find(
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
