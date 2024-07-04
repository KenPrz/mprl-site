import './bootstrap';
import '../css/app.css';
import 'aos/dist/aos.css';
import 'primeicons/primeicons.css'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import AOS from 'aos';


const options = {
    transition: "Vue-Toastification__bounce",
    maxToasts: 20,
    newestOnTop: true
};
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
AOS.init()
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toast, options)
            .mount(el);
    },
    progress: {
        color: '#49ab3c',
    },
});
