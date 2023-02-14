<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div>
        <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
            <div>
                <ApplicationLogo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">Selamat datang di aplikasi Kreasip</div>

            <div class="mt-6 text-gray-500">
                Laravel Jetstream provides a beautiful, robust starting point
                for your next Laravel application. Laravel is designed to help
                you build your application using a development environment that
                is simple, powerful, and enjoyable. We believe you should love
                expressing your creativity through programming, so we have spent
                time carefully crafting the Laravel ecosystem to be a breath of
                fresh air. We hope you love it.
            </div>
        </div>

        <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-8 w-8 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"
                        />
                    </svg>
                    <div
                        class="ml-4 text-lg font-semibold leading-7 text-gray-600"
                    >
                        <a href="https://laravel.com/docs">Obrolan</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel has wonderful documentation covering every
                        aspect of the framework. Whether you're new to the
                        framework or have previous experience, we recommend
                        reading all of the documentation from beginning to end.
                    </div>

                    <a href="https://laravel.com/docs">
                        <div
                            class="mt-3 flex items-center text-sm font-semibold text-indigo-700"
                        >
                            <div>Explore the documentation</div>

                            <div class="ml-1 text-indigo-500">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-4 w-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                    />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-200 p-6 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-8 w-8 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"
                        />
                    </svg>
                    <div
                        class="ml-4 text-lg font-semibold leading-7 text-gray-600"
                    >
                        <a href="https://laracasts.com">Expense Tracker</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laracasts offers thousands of video tutorials on
                        Laravel, PHP, and JavaScript development. Check them
                        out, see for yourself, and massively level up your
                        development skills in the process.
                    </div>

                    <a href="https://laracasts.com">
                        <div
                            class="mt-3 flex items-center text-sm font-semibold text-indigo-700"
                        >
                            <div>Start watching Laracasts</div>

                            <div class="ml-1 text-indigo-500">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-4 w-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"
                                    />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-200 p-6">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-8 w-8 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"
                        />
                    </svg>

                    <div
                        class="ml-4 text-lg font-semibold leading-7 text-gray-600"
                    >
                        <a href="https://tailwindcss.com/"
                            >Laporan Akun Lazada</a
                        >
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Laravel Jetstream is built with Tailwind, an amazing
                        utility first CSS framework that doesn't get in your
                        way. You'll be amazed how easily you can build and
                        maintain fresh, modern designs with this wonderful
                        framework at your fingertips.
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 p-6 md:border-l">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-8 w-8 text-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                        />
                    </svg>
                    <div
                        class="ml-4 text-lg font-semibold leading-7 text-gray-600"
                    >
                        Authentication
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Authentication and registration views are included with
                        Laravel Jetstream, as well as support for user email
                        verification and resetting forgotten passwords. So,
                        you're free to get started what matters most: building
                        your application.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
