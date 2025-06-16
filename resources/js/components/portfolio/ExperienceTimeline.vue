<template>
    <div class="py-20">
        <h2 class="text-base-content mb-16 text-center text-4xl font-extrabold">{{ trans('portfolio.experience') }}</h2>

        <ul class="timeline timeline-snap-icon max-md:timeline-compact md:timeline-vertical">
            <li v-for="(experience, index) in experiences" :key="experience.id">
                <div class="timeline-middle">
                    <svg class="text-primary h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            clip-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            fill-rule="evenodd"
                        />
                    </svg>
                </div>
                <div :class="['mb-10', index % 2 === 0 ? 'timeline-start md:text-end' : 'timeline-end']">
                    <time class="text-sm text-gray-400 italic">{{ formatPeriod(experience) }}</time>
                    <div class="text-lg font-bold text-white">{{ experience.position }} {{ trans('portfolio.at') }} {{ experience.company }}</div>
                    <div class="text-sm text-gray-400">{{ experience.location }}</div>
                    <div
                        class="timeline-box hover:border-primary/30 hover:shadow-primary/20 mt-2 rounded-lg border border-gray-700/50 bg-gray-800/30 p-4 shadow-xl backdrop-blur-sm transition-all hover:bg-gray-700/60"
                    >
                        <ul v-if="experience.entries" class="list-inside list-disc text-sm text-gray-300" :class="{ 'text-left': index % 2 !== 0 }">
                            <li v-for="entry in experience.entries" :key="entry.id">
                                {{ entry.description }}
                            </li>
                        </ul>
                        <div
                            v-if="experience.technologies"
                            class="mt-4 flex flex-wrap gap-2"
                            :class="{ 'justify-start': index % 2 !== 0, 'md:justify-end': index % 2 === 0 }"
                        >
                            <span v-for="(tech, i) in experience.technologies" :key="i" class="badge badge-outline">
                                {{ tech }}
                            </span>
                        </div>
                    </div>
                </div>
                <hr v-if="index < experiences.length - 1" />
            </li>
        </ul>
    </div>
</template>

<script setup lang="ts">
import { Experience } from '@/types';

import { usePage } from '@inertiajs/vue3';

defineProps<{
    experiences: Experience[];
}>();

const { props: pageProps } = usePage();
const locale = (pageProps as any).locale || 'en';

const formatPeriod = (experience: Experience) => {
    const options: Intl.DateTimeFormatOptions = { year: 'numeric', month: '2-digit' };
    const localeString = locale === 'pl' ? 'pl-PL' : 'en-US';
    const startFormatted = new Date(experience.started_at).toLocaleDateString(localeString, options);

    if (experience.ended_at) {
        const endFormatted = new Date(experience.ended_at).toLocaleDateString(localeString, options);
        return `${startFormatted} - ${endFormatted}`;
    }

    return `${startFormatted} - ${trans('portfolio.present')}`;
};
</script>
