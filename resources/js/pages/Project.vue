<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 transition-all duration-300 dark:from-gray-900 dark:to-gray-800">
        <!-- Back Button -->
        <div class="container mx-auto px-4 pt-8">
            <Link href="/#projekty" class="back-button">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Powrót do projektów
            </Link>
        </div>

        <!-- Project Content -->
        <div class="container mx-auto px-4 py-8">
            <!-- Hero Section -->
            <div class="animate-fade-in-up mb-12 text-center">
                <h1 class="mb-6 text-4xl font-bold text-gray-900 md:text-6xl dark:text-white">
                    {{ project.name }}
                </h1>
                <p class="mx-auto max-w-3xl text-xl leading-relaxed text-gray-600 dark:text-gray-300">
                    {{ project.description }}
                </p>
            </div>

            <!-- Project Images Gallery -->
            <div class="animate-fade-in-up animation-delay-200 mb-12">
                <div class="overflow-hidden rounded-2xl bg-white shadow-xl dark:bg-gray-800">
                    <!-- Main Image -->
                    <div class="relative aspect-video overflow-hidden bg-gray-100 dark:bg-gray-700">
                        <img
                            v-if="selectedImage"
                            :src="selectedImage"
                            :alt="project.name"
                            class="h-full w-full object-cover transition-transform duration-500 hover:scale-105"
                        />
                        <div v-else class="flex h-full items-center justify-center">
                            <div class="text-gray-400 dark:text-gray-500">
                                <svg class="mx-auto mb-4 h-16 w-16" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                <p class="text-sm">Brak obrazu</p>
                            </div>
                        </div>
                    </div>

                    <!-- Thumbnails -->
                    <div v-if="project.images && project.images.length > 1" class="bg-gray-50 p-4 dark:bg-gray-700">
                        <div class="flex gap-2 overflow-x-auto">
                            <button
                                v-for="(image, index) in project.images"
                                :key="index"
                                @click="selectedImage = image"
                                :class="[
                                    'h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border-2 transition-all duration-200',
                                    selectedImage === image
                                        ? 'border-blue-500 ring-2 ring-blue-200 dark:ring-blue-800'
                                        : 'border-gray-200 hover:border-gray-300 dark:border-gray-600 dark:hover:border-gray-500',
                                ]"
                            >
                                <img :src="image" :alt="`${project.name} ${index + 1}`" class="h-full w-full object-cover" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Details -->
            <div class="animate-fade-in-up animation-delay-400 mb-12 grid gap-8 md:grid-cols-2">
                <!-- Project Info -->
                <div class="rounded-2xl bg-white p-8 shadow-xl dark:bg-gray-800">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">Informacje o projekcie</h2>

                    <!-- Technologies -->
                    <div v-if="project.technologies && project.technologies.length > 0" class="mb-6">
                        <h3 class="mb-3 text-lg font-semibold text-gray-700 dark:text-gray-300">Technologie</h3>
                        <div class="flex flex-wrap gap-2">
                            <span
                                v-for="tech in project.technologies"
                                :key="tech"
                                class="rounded-full bg-blue-100 px-3 py-1 text-sm font-medium text-blue-800 dark:bg-blue-900 dark:text-blue-200"
                            >
                                {{ tech }}
                            </span>
                        </div>
                    </div>

                    <!-- Creation Date -->
                    <div v-if="project.created_at" class="mb-6">
                        <h3 class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Data utworzenia</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ formatDate(project.created_at) }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="rounded-2xl bg-white p-8 shadow-xl dark:bg-gray-800">
                    <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-white">Akcje</h2>

                    <div class="space-y-4">
                        <!-- Live Demo Button -->
                        <a
                            v-if="project.url"
                            :href="project.url"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-6 py-3 font-medium text-white transition-colors duration-200 hover:bg-blue-700"
                        >
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                                />
                            </svg>
                            Zobacz na żywo
                        </a>

                        <!-- GitHub Button -->
                        <a
                            v-if="project.github_url"
                            :href="project.github_url"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-gray-800 px-6 py-3 font-medium text-white transition-colors duration-200 hover:bg-gray-900 dark:bg-gray-700 dark:hover:bg-gray-600"
                        >
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            Zobacz kod źródłowy
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="animate-fade-in-up animation-delay-600 text-center">
                <Link
                    href="/#projekty"
                    class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-8 py-3 font-medium text-white transition-colors duration-200 hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100"
                >
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m0 0l4-4m-4 4l4 4" />
                    </svg>
                    Powrót do wszystkich projektów
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Project } from '@/types';
import { Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

interface Props {
    project: Project;
}

const props = defineProps<Props>();

// Selected image for gallery
const selectedImage = ref<string | null>(null);

// Initialize selected image
onMounted(() => {
    if (props.project.images && props.project.images.length > 0) {
        selectedImage.value = props.project.images[0];
    }
});

// Format date function
const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('pl-PL', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    });
};
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
}
</style>
