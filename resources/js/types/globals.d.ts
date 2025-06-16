import type { route as routeFn } from 'ziggy-js';

declare global {
    const route: typeof routeFn;
    interface Window {
        umami: {
            track: (event: string, data?: Record<string, any>) => void | undefined;
        } | undefined;
    }
}


declare module '@vue/runtime-core' {
    interface ComponentCustomProperties {
        trans: (key: string, replacements?: Record<string, string | number>) => string;
        transChoice: (key: string, count: number, replacements?: Record<string, string | number>) => string;
    }
}
