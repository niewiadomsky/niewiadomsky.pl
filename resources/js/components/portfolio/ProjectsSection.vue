<template>
    <section id="projekty" class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-4xl font-bold text-white">Wybrane projekty</h2>
            <div class="mx-auto h-1 w-16 rounded-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
        </div>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <ProjectCard v-for="project in projects" :key="project.id" :project="project" />
        </div>
        <div class="flex justify-center">
            <Link :href="route('projects')" class="rounded-md bg-gradient-to-r from-blue-400 to-purple-500 px-4 py-2 text-white">
                Zobacz wszystkie
            </Link>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Project } from '@/types';
import ProjectCard from './ProjectCard.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    projects: Project[];
}>();
</script>
