import '../css/app.css';

import { LinguaVue } from '@cyberwolf.studio/lingua-vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import { ZiggyVue } from 'ziggy-js';
import { initializeTheme } from './composables/useAppearance';
import { Lingua } from './lingua';

// Extend ImportMeta interface for Vite...
declare module 'vite/client' {
    interface ImportMetaEnv {
        readonly VITE_APP_NAME: string;
        [key: string]: string | boolean | undefined;
    }

    interface ImportMeta {
        readonly env: ImportMetaEnv;
        readonly glob: <T>(pattern: string) => Record<string, () => Promise<T>>;
    }
}

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    progress: {
        delay: 100,
        color: '#22c55e',
        showSpinner: false,
    },
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob<DefineComponent>('./pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const app = createApp({
            render: () => h(App, props),
            mounted() {
                // Add page transition classes
                document.body.classList.add('page-transition');
            },
        });

        app.use(plugin);
        app.use(ZiggyVue);
        app.use(LinguaVue, {
            Lingua,
        });
        app.mount(el);

        return app;
    },
});

// This will set light / dark mode on page load...
initializeTheme();
