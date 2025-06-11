<template>
    <div class="flex items-center space-x-2">
        <template v-for="(language, index) in availableLanguages" :key="language.code">
            <button
                @click="switchLanguage(language.code)"
                class="w-8 h-6 rounded transition-all duration-200 hover:scale-105 flag-background-icon"
                :class="[language.code === currentLocale ? 'border-2 border-orange-500' : 'hover:border-orange-100', language.flagClass]"
                :title="`Switch to ${language.name}`"
            >
            </button>

            <!-- Slash separator -->
            <span v-if="index < availableLanguages.length - 1" class="text-gray-400 select-none"> / </span>
        </template>
    </div>
</template>

<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const currentLocale = computed(() => page.props.locale || 'en');

const availableLanguages = [
    {
        code: 'en',
        name: 'English',
        flagClass: 'flag-icon-gb', // Great Britain flag for English
        tooltip: 'Switch to English',
    },
    {
        code: 'pl',
        name: 'Polski',
        flagClass: 'flag-icon-pl', // Poland flag
        tooltip: 'Zmień na polski',
    },
];

const switchLanguage = (locale) => {
    if (locale === currentLocale.value) {
        return;
    }

    // Make a POST request to switch language
    router.post(
        '/language/switch',
        {
            locale: locale,
        },
        {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                // Force a page reload to update the language
                window.location.reload();
            },
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
