import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import moment from "moment";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'GIGUS';

createInertiaApp({
    title: (title) => `${title} :: ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({
                computed: {
                    appName() {
                        return appName
                    },
                },

                methods: {
                    formatDate(value, time = true, def = 'DD-MM-YYYY') {
                        let format = time ? def + " HH:mm" : def

                        if (value == null)
                        { return 'Not specified' }
                        else { return moment(value).format(format) }
                    },

                    formatMoney(value) {
                        return new Intl.NumberFormat().format(value)
                    }
                },
            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
