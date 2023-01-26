<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import Chirp from "@/Components/Chirp/Chirp.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";
import { onMounted, onUnmounted, ref } from "vue";

const props = defineProps(["chirps"]);
const onlineUsers = ref([]);
onMounted(() => {
    console.log("mounted");
});
Echo.join("chirp-channel")
    .here((users) => {
        console.log(users);
        onlineUsers.value = users;
    })
    .joining((user) => {
        console.log("joining " + user.name);
        onlineUsers.value.push(user);
    })
    .leaving((user) => {
        console.log("leaving " + user.name);
        onlineUsers.value = onlineUsers.value.filter((u) => {
            return u.id !== user.id;
        });
    })
    .listen("ChirpCreated", (e) => {
        console.log("==== even berhasil diterima ====");
        // console.log(e.id);
        props.chirps.unshift(e.id);
    });

const form = useForm({
    message: "",
});
const handleSubmit = () => {
    form.post(route("chirps.store"), {
        onSuccess: () => form.reset(),
    });
};
onUnmounted(() => {
    Echo.leave("chirp-channel");
});
</script>
<template>
    <Head title="Chirps" />
    <AppLayout>
        <div
            class="mx-auto flex w-full max-w-4xl flex-col-reverse justify-center md:flex-row"
        >
            <div class="max-w-2xl flex-1 p-4 sm:p-6 lg:p-8">
                <form @submit.prevent="handleSubmit">
                    <textarea
                        v-model="form.message"
                        @keydown.enter.exact.prevent="handleSubmit"
                        placeholder="What's on your mind?"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    ></textarea>
                    <InputError :message="form.errors.message" class="mt-2" />
                    <PrimaryButton class="mt-4">Send</PrimaryButton>
                </form>
                <div class="mt-6 divide-y rounded-lg bg-white shadow-sm">
                    <Chirp
                        v-for="chirp in props.chirps"
                        :key="chirp.id"
                        :chirp="chirp"
                    />
                </div>
            </div>
            <div v-if="onlineUsers" class="p-4 text-gray-600 sm:p-6 lg:p-8">
                <div class="rounded-lg bg-white px-6 py-4 shadow-sm">
                    <div class="border-b text-xl">Online users</div>
                    <ul class="mt-2">
                        <li v-for="user in onlineUsers" :key="user.id">
                            {{ user.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
