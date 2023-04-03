<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import SubNavigation from "@/Components/SubNavigation.vue";
import Swal from "sweetalert2";
import Icon from "@/Components/Icon.vue";
import { useForm, usePage } from "@inertiajs/vue3";

const form = useForm({
    id: "",
    name: "",
    type: "",
    description: "",
    cashless: "",
    icon: "",
    icon_color: "",
});

const submit = () => {
    form.post(route("extracker.categories.store"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
};

const edit = (data) => {
    form.id = data.id;
    form.name = data.name;
    form.type = data.type;
    form.description = data.description;
    form.cashless = data.cashless;
    form.icon = data.icon;
    form.icon_color = data.icon_color;
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
            form.delete(route("extracker.categories.destroy", id), {
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
    <AppLayout title="category transaksi">
        <template #header>
            <SubNavigation />
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex w-full gap-x-10">
                    <div
                        class="flex-auto overflow-hidden bg-white shadow-xl sm:rounded-lg"
                    >
                        <table
                            class="min-w-full table-auto overflow-x-scroll bg-white md:table-fixed"
                        >
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th
                                        class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                    >
                                        TYPE
                                    </th>
                                    <th
                                        class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                    >
                                        NAME
                                    </th>
                                    <th
                                        class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                    >
                                        DESCRIPTION
                                    </th>
                                    <th
                                        class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                    >
                                        CASHLESS
                                    </th>
                                    <th
                                        class="py-3 px-4 text-left text-sm font-semibold uppercase"
                                    >
                                        ICON
                                    </th>

                                    <th
                                        class="py-3 px-4 text-center text-sm font-semibold uppercase"
                                    >
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <template v-if="$page.props.categories.length">
                                    <tr
                                        v-for="category in $page.props
                                            .categories"
                                        :key="category.id"
                                        class="hover:bg-gray-100"
                                    >
                                        <td class="py-3 px-4 text-left">
                                            {{
                                                category.type === "income"
                                                    ? "Pemasukan"
                                                    : "Pengeluaran"
                                            }}
                                        </td>
                                        <td class="py-3 px-4 text-left">
                                            {{ category.name }}
                                        </td>
                                        <td class="py-3 px-4 text-left">
                                            {{ category.description }}
                                        </td>
                                        <td class="py-3 px-4 text-left">
                                            {{
                                                category.cashless
                                                    ? "Ya"
                                                    : "Tidak"
                                            }}
                                        </td>
                                        <td class="py-3 px-4 text-left">
                                            <span
                                                v-html="category.icon"
                                                :class="`text-${category.icon_color}-600`"
                                            ></span>
                                        </td>

                                        <td class="py-3 px-4">
                                            <button
                                                @click="edit(category)"
                                                class="mr-2 inline"
                                            >
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
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"
                                                    />
                                                </svg>
                                            </button>
                                            <button>
                                                <Icon
                                                    name="trash"
                                                    @click="
                                                        destroy(category.id)
                                                    "
                                                />
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
                    <div class="w-1/3">
                        <div class="bg-white px-4 py-3 shadow-xl sm:rounded-lg">
                            <h2 class="mb-3 text-lg font-semibold uppercase">
                                Add Category
                            </h2>
                            <form @submit.prevent="submit">
                                <input type="hidden" v-model="form.id" />
                                <div>
                                    <InputLabel for="name" value="Name" />
                                    <TextInput
                                        v-model="form.name"
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.name"
                                    />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="type" value="Type" />
                                    <select
                                        id="type"
                                        v-model="form.type"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    >
                                        <option value="income">
                                            Pemasukan
                                        </option>
                                        <option value="expense">
                                            Pengeluaran
                                        </option>
                                    </select>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.type"
                                    />
                                </div>

                                <div class="mt-4">
                                    <InputLabel
                                        for="description"
                                        value="Description"
                                    />
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
                                    <InputLabel
                                        value="Perbolehkan Non-tunai ?"
                                    />
                                    <div class="mt-2 flex items-center gap-x-6">
                                        <div class="flex items-center">
                                            <input
                                                class="appearance-none checked:bg-indigo-400 hover:bg-indigo-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                v-model="form.cashless"
                                                value="1"
                                                type="radio"
                                                name="cashless"
                                                id="radio1"
                                            />
                                            <label
                                                for="radio1"
                                                class="ml-2 text-sm text-gray-600"
                                                >Boleh</label
                                            >
                                        </div>
                                        <div class="flex items-center">
                                            <input
                                                class="appearance-none checked:bg-indigo-400 hover:bg-indigo-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                v-model="form.cashless"
                                                value="0"
                                                type="radio"
                                                name="cashless"
                                                id="radio2"
                                            />
                                            <label
                                                for="radio2"
                                                class="ml-2 text-sm text-gray-600"
                                                >Tidak</label
                                            >
                                        </div>
                                    </div>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.cashless"
                                    />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="icon" value="Icon" />
                                    <TextInput
                                        placeholder="copy from heroicons.com"
                                        v-model="form.icon"
                                        id="icon"
                                        type="text"
                                        class="mt-1 block w-full"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.icon"
                                    />
                                </div>

                                <div class="mt-4">
                                    <InputLabel
                                        for="icon_color"
                                        value="Icon Color"
                                    />
                                    <select
                                        id="icon_color"
                                        v-model="form.icon_color"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    >
                                        <option value="green">green</option>
                                        <option value="blue">blue</option>
                                        <option value="pink">pink</option>
                                        <option value="amber">amber</option>
                                        <option value="indigo">indigo</option>
                                        <option value="red">red</option>
                                    </select>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.icon_color"
                                    />
                                </div>

                                <div class="mt-4 flex items-center justify-end">
                                    <PrimaryButton
                                        class="ml-4"
                                        :disabled="form.processing"
                                    >
                                        save
                                    </PrimaryButton>
                                    <SecondaryButton
                                        class="ml-4"
                                        @click="form.reset()"
                                    >
                                        cancel
                                    </SecondaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
