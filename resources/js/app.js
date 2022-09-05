import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import moment from "moment";
import Icon from "/resources/js/Components/Icon.vue"
import process from "@inertiajs/inertia-vue3/.eslintrc";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'GIGUS';
const baseUrl = window.location.origin;

createInertiaApp({
    title: (title) => `${title} :: ${appName}`,

    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),

    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({
                components: {Link, Head, Icon},
                computed: {
                    appName() {
                        return appName
                    },

                    appUrl() {
                        return baseUrl;
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
                    },

                    dateSorting(arg, latest = true) {
                        // If sorting should be done, return the latest, else return the normal order
                        return latest ?  arg.sort((a, b) =>  new Date(b.created_at) - new Date(a.created_at)) :
                            arg.sort((a, b) =>  new Date(a.created_at) - new Date(b.created_at));
                    },

                    salarySorting(arg, small_diff = true) {
                        // for this, return the smallest diff between min and max salary if small_diff is true or vice-versa
                        return small_diff ?  arg.sort((a, b) =>  (a.max_salary - a.min_salary) - (b.max_salary - b.min_salary)) :
                            arg.sort((a, b) =>  (b.max_salary - b.min_salary) - (a.max_salary - a.min_salary) );
                    },
                },
            })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
