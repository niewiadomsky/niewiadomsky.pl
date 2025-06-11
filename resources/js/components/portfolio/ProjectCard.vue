<template>
    <div
        class="group transform overflow-hidden rounded-2xl border border-gray-700/50 bg-gray-800/50 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-600/50"
    >
        <div class="relative overflow-hidden">
            <img
                v-if="project.images && project.images.length > 0"
                :src="project.images[0]"
                :alt="project.name"
                class="h-48 w-full object-cover transition-transform duration-300 group-hover:scale-110"
            />
            <div
                class="absolute inset-0 bg-gradient-to-t from-gray-900/60 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"
            ></div>
        </div>
        <div class="p-6">
            <h3 class="mb-3 text-xl font-semibold text-white">{{ project.name }}</h3>
            <p class="mb-6 leading-relaxed text-gray-300">{{ project.description }}</p>
            <div class="flex items-center justify-between">
                <div class="flex space-x-3">
                    <Link
                        :href="route('project.show', project.id)"
                        class="inline-flex items-center rounded-full bg-gradient-to-r from-blue-500 to-purple-600 px-4 py-2 font-medium text-white shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-purple-700 hover:shadow-xl"
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
                        class="inline-flex items-center rounded-full border border-gray-600/50 bg-gray-700/50 px-4 py-2 font-medium text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-gray-500 hover:bg-gray-700"
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
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Project } from '@/types';
import { Link } from '@inertiajs/vue3';

defineProps<{
    project: Project;
}>();
</script>
