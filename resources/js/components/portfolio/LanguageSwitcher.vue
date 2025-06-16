<template>
    <div class="flex items-center space-x-2">
        <template v-for="(language, index) in availableLanguages" :key="language.code">
            <button
                @click="switchLanguage(language.code)"
                class="flag-background-icon h-6 w-8 rounded transition-all duration-200 hover:scale-105"
                :class="[language.code === currentLocale ? 'border-2 border-orange-500' : 'hover:border-orange-100', language.flagClass]"
                :title="language.tooltip"
                data-umami-event="Change language to {{ language.name }}"
            ></button>

            <!-- Slash separator -->
            <span v-if="index < availableLanguages.length - 1" class="text-gray-400 select-none"> / </span>
        </template>
    </div>
</template>

<script setup lang="ts">
import { router, usePage } from '@inertiajs/vue3';
import { computed, inject } from 'vue';

const trans = inject('trans') as (key: string, replacements?: Record<string, string | number>) => string;
const page = usePage();
const currentLocale = computed(() => (page.props as any).locale || 'en');

const availableLanguages = computed(() => [
    {
        code: 'en',
        name: 'English',
        flagClass: 'flag-icon-gb', // Great Britain flag for English
        tooltip: trans('portfolio.switch_to_english'),
    },
    {
        code: 'pl',
        name: 'Polski',
        flagClass: 'flag-icon-pl', // Poland flag
        tooltip: trans('portfolio.switch_to_polish'),
    },
]);

const switchLanguage = (locale: string) => {
    if (locale === currentLocale.value) {
        return;
    }

    // Make a POST request to switch language
    router.reload(
        {
            headers: {
                'Accept-Language': locale,
            },
            async: false,
            showProgress: true,
        },
    );
};
</script>

<style scoped>
button:hover {
    transform: scale(1.05);
}

button:active {
    transform: scale(0.95);
}
</style>
