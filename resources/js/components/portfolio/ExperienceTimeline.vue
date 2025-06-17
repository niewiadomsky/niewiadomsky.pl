<template>
    <div class="py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="mb-4 text-4xl font-bold text-white">{{ trans('portfolio.experience') }}</h2>
                <div class="mx-auto h-1 w-16 rounded-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
                <p class="mt-4 text-lg leading-8 text-gray-300">{{ trans('portfolio.experience_description') }}</p>
            </div>

            <div class="mt-16 flow-root">
                <div class="-my-8">
                    <div v-for="(experience, index) in experiences" :key="experience.id" class="relative py-8">
                        <div v-if="index < experiences.length - 1" class="absolute top-8 left-4 h-full w-px bg-gray-700/50"></div>

                        <div class="relative flex items-start space-x-4">
                            <div class="relative">
                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-800 ring-8 ring-gray-900">
                                    <svg class="text-primary h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            fill-rule="evenodd"
                                            d="M6 3.75A2.75 2.75 0 018.75 1h2.5A2.75 2.75 0 0114 3.75v.443c.57.255 1.074.64 1.5 1.14.426.5.787 1.076 1.032 1.728.245.652.368 1.353.368 2.08v4.156a2.75 2.75 0 01-2.75 2.75H5.75A2.75 2.75 0 013 13.25V9.1c0-.727.123-1.428.368-2.08.245-.652.606-1.228 1.032-1.728.426-.5.93-.885 1.5-1.14V3.75zM8.75 2.5a1.25 1.25 0 00-1.25 1.25v.519c.48.214.925.513 1.308.875h1.384c.383-.362.828-.66 1.308-.875v-.519A1.25 1.25 0 0012.5 2.5h-2.5zM4.5 9.1c0 .495.084.97.248 1.414.164.444.404.84.702 1.173.298.333.66.597 1.05.765V12a.75.75 0 00.75.75h5a.75.75 0 00.75-.75v-.548c.39-.168.752-.432 1.05-.765.298-.333.538-.73.702-1.173.164-.444.248-.92.248-1.414v-1.5a.75.75 0 00-.75-.75h-9a.75.75 0 00-.75.75v1.5z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </span>
                            </div>

                            <div class="min-w-0 flex-1 pt-1.5">
                                <div class="text-lg font-semibold text-white">{{ experience.position }} · {{ experience.company }}</div>
                                <p class="mt-0.5 text-sm text-gray-400">{{ formatPeriod(experience) }} · {{ experience.location }}</p>

                                <div class="mt-4 rounded-lg bg-gray-800/50 p-4 ring-1 ring-gray-700/30 ring-inset">
                                    <ul v-if="experience.entries" class="list-disc space-y-2 pl-5 text-sm text-gray-300">
                                        <li v-for="entry in experience.entries" :key="entry.id">
                                            {{ entry.description }}
                                        </li>
                                    </ul>
                                    <div v-if="experience.technologies" class="mt-4 flex flex-wrap gap-2">
                                        <span
                                            v-for="(tech, i) in experience.technologies"
                                            :key="i"
                                            class="inline-flex items-center rounded-md bg-gray-700 px-2 py-1 text-xs font-medium text-gray-300 ring-1 ring-gray-600 ring-inset"
                                        >
                                            {{ tech }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Experience } from '@/types';
import { inject } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { format } from 'date-fns';

defineProps<{
    experiences: Experience[];
}>();

const { props: pageProps } = usePage();
const locale = (pageProps as any).locale || 'en';
const trans = inject('trans') as (key: string) => string;

const formatPeriod = (experience: Experience) => {
    const startFormatted = format(new Date(experience.started_at), 'MM.yyyy');

    if (experience.ended_at) {
        const endFormatted = format(new Date(experience.ended_at), 'MM.yyyy');
        return `${startFormatted} - ${endFormatted}`;
    }

    return `${startFormatted} - ${trans('portfolio.present')}`;
};
</script>
