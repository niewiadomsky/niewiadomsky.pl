<template>
    <section id="projekty" class="relative mx-auto max-w-7xl overflow-hidden px-4 py-20 sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2
                class="animate-gradient mb-4 bg-gradient-to-r from-blue-400 to-purple-500 bg-clip-text text-4xl font-bold text-transparent text-white"
            >
                Wybrane projekty
            </h2>
            <p class="mb-2 text-lg text-gray-300">Poznaj moje najciekawsze realizacje i technologie, z których korzystam.</p>
            <div class="mx-auto h-1 w-16 animate-pulse rounded-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
        </div>
            <TransitionGroup name="fade" tag="div" class="space-y-6">
                <ProjectListItem v-for="project in projects" :key="project.id" :project="project" />
            </TransitionGroup>
        <div class="mt-10 flex justify-center">
            <Link
                :href="route('projects')"
                class="flex items-center gap-2 rounded-md bg-gradient-to-r from-blue-400 to-purple-500 px-6 py-3 font-semibold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:from-purple-500 hover:to-blue-400"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L21 12m0 0l-3.75 5.25M21 12H3" />
                </svg>
                Zobacz wszystkie
            </Link>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Project } from '@/types';
import { Link } from '@inertiajs/vue3';
import { TransitionGroup } from 'vue';
import ProjectListItem from './ProjectListItem.vue';

defineProps<{
    projects: Project[];
}>();
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.7s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.animate-gradient {
    background-size: 200% 200%;
    animation: gradientMove 3s ease infinite;
}
@keyframes gradientMove {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}
</style>
