import './bootstrap';
import '../css/app.css';
import 'aos/dist/aos.css';
import 'primeicons/primeicons.css'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { QuillEditor } from '@vueup/vue-quill'
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import AOS from 'aos';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
AOS.init()
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('QuillEditor', QuillEditor)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#49ab3c',
    },
});
