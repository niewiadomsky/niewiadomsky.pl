<template>
    <div
        class="overflow-hidden rounded-lg border border-gray-700 bg-gray-800/50 backdrop-blur-sm transition-all duration-300 hover:border-gray-600 hover:bg-gray-800/70"
    >
        <div class="p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                <!-- Project Info -->
                <div class="flex-1">
                    <div class="mb-3">
                        <h3 class="text-xl font-semibold text-white">{{ project.name }}</h3>
                        <p v-if="project.description" class="mt-2 leading-relaxed text-gray-300">
                            {{ project.description }}
                        </p>
                    </div>

                    <!-- Technologies Used -->
                    <div v-if="project.skills && project.skills.length > 0" class="mb-4">
                        <h4 class="mb-2 text-sm font-medium text-gray-400">Użyte technologie:</h4>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="skill in project.skills"
                                :key="skill.id"
                                class="inline-flex items-center rounded-full bg-blue-900/30 px-3 py-1 text-sm font-medium text-blue-300 ring-1 ring-blue-700/50"
                            >
                                {{ skill.name }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col xl:flex-row">
                    <Link
                        :href="route('project.show', project.id)"
                        class="inline-flex items-center justify-center rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 px-4 py-2 text-sm font-medium text-white shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-purple-700 hover:shadow-xl"
                    >
                        <span>Zobacz szczegóły</span>
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </Link>
                    <a
                        v-if="project.url"
                        :href="project.url"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-lg border border-gray-600/50 bg-gray-700/50 px-4 py-2 text-sm font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-gray-500 hover:bg-gray-700"
                    >
                        <span>Live demo</span>
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                            />
                        </svg>
                    </a>
                    <a
                        v-if="project.github_url"
                        :href="project.github_url"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-lg border border-gray-600/50 bg-gray-700/50 px-4 py-2 text-sm font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-gray-500 hover:bg-gray-700"
                    >
                        <span>GitHub</span>
                        <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                            />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Project } from '@/types';
import { Link } from '@inertiajs/vue3';

interface Props {
    project: Project;
}

defineProps<Props>();
</script>

<style scoped>
/* Component-specific styles can be added here if needed */
</style>
