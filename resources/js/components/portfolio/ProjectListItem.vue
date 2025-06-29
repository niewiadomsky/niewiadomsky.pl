<template>
    <div
        class="group relative overflow-hidden rounded-xl border border-gray-700/50 bg-gray-800/30 backdrop-blur-sm transition-all duration-500 hover:border-gray-600/50 hover:bg-gray-800/50 hover:shadow-2xl hover:shadow-blue-500/10"
    >
        <!-- Loading overlay -->
        <div v-if="isLoading" class="absolute inset-0 z-10 flex items-center justify-center bg-gray-800/80 backdrop-blur-sm">
            <div class="h-8 w-8 animate-spin rounded-full border-2 border-blue-500 border-t-transparent"></div>
        </div>

        <div class="flex flex-col gap-6 p-6 sm:flex-row sm:items-start">
            <!-- Project Image with Fallback -->
            <div class="relative w-full flex-shrink-0 overflow-hidden rounded-xl sm:w-56">
                <div class="h-48 bg-gradient-to-br from-gray-700 to-gray-800 sm:h-32">
                    <img
                        v-if="project.images && project.images.length > 0"
                        :src="project.images[0]"
                        :alt="project.name"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                        loading="lazy"
                        @error="handleImageError"
                        @load="handleImageLoad"
                    />
                    <!-- Fallback Icon -->
                    <div v-else class="flex h-full w-full items-center justify-center">
                        <svg class="h-12 w-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0-1.125.504-1.125 1.125V11.25a9 9 0 00-9-9z"
                            />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Project Info -->
            <div class="min-w-0 flex-1 space-y-3">
                <!-- Title and Date -->
                <div class="flex flex-col gap-1">
                    <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                        <h3 class="text-2xl font-bold text-white transition-colors duration-300 group-hover:text-blue-400">
                            {{ project.name }}
                        </h3>
                        <span :class="statusBadgeClass" class="inline-flex items-center rounded-full px-2 py-1 text-xs font-medium">
                            {{ projectStatusText }}
                        </span>
                    </div>
                    <div class="flex items-center gap-4 text-sm text-gray-400">
                        <span v-if="project.created_year">{{ project.created_year }}</span>
                    </div>
                </div>

                <!-- Description -->
                <div class="relative">
                    <p :class="['text-base text-gray-300 transition-all duration-300']">
                        {{ project.description }}
                    </p>
                </div>

                <!-- Skills/Technologies -->
                <div v-if="project.skills && project.skills.length > 0" class="flex flex-wrap gap-2">
                    <span
                        v-for="skill in displayedSkills"
                        :key="skill.id"
                        class="inline-flex items-center rounded-full bg-blue-900/30 px-3 py-1 text-sm font-medium text-blue-300 ring-1 ring-blue-700/50 transition-all duration-300 hover:bg-blue-900/50 hover:ring-blue-600/50"
                    >
                        {{ skill.name }}
                    </span>
                    <button
                        v-if="project.skills.length > 5 && !showAllSkills"
                        @click="showAllSkills = true"
                        class="inline-flex items-center rounded-full bg-gray-700/50 px-3 py-1 text-sm font-medium text-gray-400 ring-1 ring-gray-600/50 transition-all duration-300 hover:bg-gray-700 hover:text-gray-300"
                    >
                        {{ trans('portfolio.more_skills', { count: project.skills.length - 5 }) }}
                    </button>
                </div>
            </div>

            <!-- Actions with Hierarchy -->
            <div class="flex w-full shrink-0 gap-2 sm:w-auto">
                <!-- Primary Action -->
                <Link
                    :href="route('project.show', project.id)"
                    class="group/btn inline-flex flex-1 items-center justify-center rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 p-3 font-semibold text-white shadow-lg transition-all duration-300 hover:from-blue-600 hover:to-purple-700 hover:shadow-xl hover:shadow-blue-500/25 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                    :aria-label="trans('portfolio.view_project_details')"
                >
                    <svg
                        class="h-5 w-5 transition-transform duration-300 group-hover/btn:scale-110"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                    </svg>
                </Link>

                <!-- Secondary Actions -->
                <a
                    v-if="project.live_url"
                    :href="project.live_url"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group/btn inline-flex flex-1 items-center justify-center rounded-lg border border-gray-600/50 bg-gray-700/50 p-3 text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-gray-500 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                    :aria-label="trans('portfolio.view_live_demo')"
                    data-umami-event="Click into Live Demo"
                >
                    <svg
                        class="h-5 w-5 transition-transform duration-300 group-hover/btn:scale-110"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
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
                    rel="noopener noreferrer"
                    class="group/btn inline-flex flex-1 items-center justify-center rounded-lg border border-gray-600/50 bg-gray-700/50 p-3 text-gray-300 backdrop-blur-sm transition-all duration-300 hover:border-gray-500 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-none"
                    :aria-label="trans('portfolio.view_source_code_gh')"
                    data-umami-event="Click into GitHub"
                >
                    <svg class="h-5 w-5 transition-transform duration-300 group-hover/btn:scale-110" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 2C6.477 2 2 6.484 2 12.021c0 4.428 2.865 8.184 6.839 9.504.5.092.682-.217.682-.483 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.342-3.369-1.342-.454-1.157-1.11-1.465-1.11-1.465-.908-.62.069-.608.069-.608 1.004.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.832.091-.647.35-1.088.636-1.339-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.295 2.748-1.025 2.748-1.025.546 1.378.202 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.847-2.338 4.695-4.566 4.944.359.309.678.919.678 1.852 0 1.336-.012 2.417-.012 2.747 0 .268.18.579.688.481C19.138 20.2 22 16.447 22 12.021 22 6.484 17.523 2 12 2z"
                        />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Hover Gradient Overlay -->
        <div class="pointer-events-none absolute inset-0 opacity-0 transition-opacity duration-500 group-hover:opacity-100">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/5 to-purple-500/5"></div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Project } from '@/types';

import { Link } from '@inertiajs/vue3';
import { computed, inject, ref } from 'vue';

const trans = inject('trans') as (key: string, replacements?: Record<string, string | number>) => string;

interface Props {
    project: Project;
}

const props = defineProps<Props>();

// Reactive state
const isLoading = ref(false);
const isExpanded = ref(false);
const showAllSkills = ref(false);
const imageError = ref(false);

// Computed properties
const projectStatus = computed(() => {
    // You can extend this logic based on your project model
    if (props.project.live_url) return 'live';
    if (props.project.github_url) return 'open_source';
    return 'completed';
});

const projectStatusText = computed(() => {
    return trans(`portfolio.status_${projectStatus.value}`);
});

const statusBadgeClass = computed(() => {
    const status = projectStatus.value;
    const baseClasses = 'backdrop-blur-sm';

    switch (status) {
        case 'live':
            return `${baseClasses} bg-green-500/20 text-green-300 ring-1 ring-green-500/30`;
        case 'open_source':
            return `${baseClasses} bg-blue-500/20 text-blue-300 ring-1 ring-blue-500/30`;
        default:
            return `${baseClasses} bg-gray-500/20 text-gray-300 ring-1 ring-gray-500/30`;
    }
});

const displayedSkills = computed(() => {
    if (!props.project.skills) return [];
    return showAllSkills.value ? props.project.skills : props.project.skills.slice(0, 5);
});

// Methods
const toggleDescription = () => {
    isExpanded.value = !isExpanded.value;
};

const handleImageError = () => {
    imageError.value = true;
};

const handleImageLoad = () => {
    isLoading.value = false;
};
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-none {
    display: block;
}

/* Custom scrollbar for skills overflow */
.skills-container::-webkit-scrollbar {
    height: 4px;
}

.skills-container::-webkit-scrollbar-track {
    background: rgba(55, 65, 81, 0.3);
    border-radius: 2px;
}

.skills-container::-webkit-scrollbar-thumb {
    background: rgba(59, 130, 246, 0.5);
    border-radius: 2px;
}

.skills-container::-webkit-scrollbar-thumb:hover {
    background: rgba(59, 130, 246, 0.7);
}
</style>
