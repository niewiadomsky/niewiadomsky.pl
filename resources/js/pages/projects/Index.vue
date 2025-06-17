<template>
    <Head>
        <title>{{ trans('portfolio.my_projects') }}</title>
    </Head>
    <div class="min-h-screen bg-gray-900">
        
        <!-- Header Section -->
        <div class="bg-gradient-to-b from-gray-800 to-gray-900 py-16">
            <div class="flex justify-center py-4">
                <LanguageSwitcher />
            </div>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-4xl font-bold text-transparent sm:text-5xl">
                        {{ trans('portfolio.my_projects') }}
                    </h1>
                    <p class="mx-auto max-w-2xl text-lg text-gray-300">
                        {{ trans('portfolio.my_projects_description') }}
                    </p>
                </div>
            </div>
            
        </div>

        <div class="mx-auto max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
            <div class="text-center">
                <Link
                    :href="route('home')"
                    class="inline-flex items-center rounded-full bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-3 font-medium text-white shadow-lg transition-all duration-300 hover:from-gray-700 hover:to-gray-800 hover:shadow-xl"
                >
                    <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    {{ trans('portfolio.back_to_homepage') }}
                </Link>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div v-if="projects.length > 0" class="space-y-6">
                <div
                    v-for="(project, index) in projects"
                    :key="project.id"
                    class="slide-in-up"
                    :style="{ animationDelay: `${index * 0.1}s` }"
                >
                    <ProjectListItem :project="project" />
                </div>
            </div>

            <div v-else class="py-16 text-center">
                <div class="mx-auto max-w-md">
                    <svg class="mx-auto h-12 w-12 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                        />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-300">{{ trans('portfolio.no_projects') }}</h3>
                    <p class="mt-2 text-gray-500">{{ trans('portfolio.no_projects_found') }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import LanguageSwitcher from '@/components/portfolio/LanguageSwitcher.vue';
import ProjectListItem from '@/components/portfolio/ProjectListItem.vue';
import { Project, Skill } from '@/types';

import { Head, Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface Props {
    projects: Project[];
}

const props = defineProps<Props>();

</script>

<style scoped>
/* Custom animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.slide-in-up {
    animation: slideInUp 0.6s ease-out;
    animation-fill-mode: both;
}

/* Smooth transitions for filter buttons */
button {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Custom scrollbar for better UX */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(55, 65, 81, 0.3);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb {
    background: rgba(156, 163, 175, 0.5);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(156, 163, 175, 0.7);
}
</style>
