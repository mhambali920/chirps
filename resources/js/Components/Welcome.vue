<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div>
        <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
            <div>
                <ApplicationLogo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">Selamat datang di aplikasi Kreasip</div>

            <div class="mt-6 text-gray-500">
                Aplikasi web multifungsi yang memberikan kemudahan dalam
                berbagai aktivitas bisnis Anda!. kami menawarkan fitur expense
                tracker untuk membantu Anda mengatur keuangan dengan lebih
                efisien, serta hitung margin penjualan Lazada yang dapat
                memudahkan Anda dalam menghitung keuntungan dari penjualan
                produk di platform tersebut. Kreasip hadir untuk memberikan
                solusi terbaik bagi kebutuhan bisnis Anda. Mari bergabung dan
                nikmati kemudahan Kreasip!
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
                        <Link :href="route('chirps.index')">Obrolan</Link>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Disini kamu bebas mengobrol ngaler ngidul dengan sesama
                        pengguna ataupun berkeluh kesah tentang kerasnya
                        kehidupan, yang penting sopan aja ya.
                    </div>
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
                        <Link :href="route('extracker.transactions.index')"
                            >Expense Tracker</Link
                        >
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Catatan keuangan merupakan salah satu hal yang penting
                        dalam bisnis, dan Kreasip hadir untuk membantu Anda
                        dalam mengelola keuangan dengan lebih mudah dan efisien.
                        Dengan fitur expense tracker yang tersedia di dalam
                        aplikasi, Anda dapat dengan mudah mencatat dan melacak
                        semua pengeluaran bisnis Anda, sehingga Anda dapat
                        mengontrol dan meminimalkan pengeluaran yang tidak
                        perlu.
                    </div>
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
                        <Link :href="route('laztrx.index')"
                            >Laporan Akun Lazada</Link
                        >
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Dengan fitur hitung margin penjualan Lazada, Anda juga
                        dapat dengan cepat menghitung keuntungan yang diperoleh
                        dari penjualan produk di platform tersebut. Kreasip
                        hadir sebagai solusi terbaik untuk membantu Anda
                        mengelola catatan keuangan bisnis dengan lebih efektif,
                        sehingga bisnis Anda dapat tumbuh dan berkembang dengan
                        baik.
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
                        ??
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Kalo ada bug atau error silakan hubungi admin di nomor
                        085890811119 / 081299702225
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
