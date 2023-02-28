<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    date: "",
    due_date: "",
    amount: "",
    payment_type: "cash",
    description: "",
    category_id: "",
    customer_id: "",
});

const submit = () => form.post(route("extracker.transactions.store"));
</script>
<template>
    <AppLayout title="add transaction">
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <form @submit.prevent="submit" class="max-w-md">
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
                        <InputError
                            class="mt-2"
                            :message="form.errors.amount"
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
                    <div
                        class="mt-4 block"
                        v-if="form.payment_type === 'noncash'"
                    >
                        <InputLabel
                            for="due_date"
                            value="Tanggal Jatuh Tempo"
                        />
                        <TextInput
                            id="due_date"
                            v-model="form.due_date"
                            type="date"
                            class="mt-1 block w-full"
                        />
                        <InputError
                            class="mt-2"
                            :message="form.errors.due_date"
                        />
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <PrimaryButton
                            class="ml-4"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Save
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
