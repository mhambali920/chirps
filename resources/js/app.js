import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({
                methods: {
                    formatRupiah(money) {
                        return new Intl.NumberFormat("id-ID", {
                            style: "currency",
                            currency: "IDR",
                            minimumFractionDigits: 0,
                        }).format(money);
                    },
                    timeDiff(date) {
                        const dueDate = new Date(date);
                        const today = new Date();
                        const timeDiff = dueDate.getTime() - today.getTime();
                        const daysDiff = Math.ceil(
                            timeDiff / (1000 * 3600 * 24)
                        );
                        if (dueDate < today) {
                            return `Lewat ${Math.abs(daysDiff)} hari`;
                        }
                        return `${daysDiff} hari lagi`;
                    },
                },
            })
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
