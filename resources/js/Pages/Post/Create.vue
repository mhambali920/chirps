<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

import ClasicEditor from "@ckeditor/ckeditor5-build-classic";

import { Head } from "@inertiajs/vue3";

const editor = ClasicEditor;
</script>
<template>
    <Head title="New post" />
    <AppLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Create New Post
                </h2>
            </div>
        </template>
        <div class="relative py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <form class="px-4 py-6">
                        <div>
                            <InputLabel for="title" value="Judul" />
                            <TextInput
                                id="title"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <InputLabel for="image" value="Image" />
                            <input
                                type="file"
                                id="image"
                                class="mt-1 w-full rounded-md border border-gray-300 px-2 py-1 text-sm text-slate-500 shadow-sm file:mr-4 file:rounded-full file:border-0 file:bg-indigo-50 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-indigo-700 hover:file:bg-indigo-100 focus:border-indigo-300 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <InputLabel value="Body" />
                            <Ckeditor :editor="editor" />
                            <InputError class="mt-2" />
                        </div>

                        <div class="mt-4 flex items-center justify-end">
                            <PrimaryButton class="ml-4">Save</PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
