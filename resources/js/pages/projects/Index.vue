<template>
    <div class="min-h-screen bg-gray-900">
        <!-- Header Section -->
        <div class="bg-gradient-to-b from-gray-800 to-gray-900 py-16">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="mb-4 bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-4xl font-bold text-transparent sm:text-5xl">
                        Moje Projekty
                    </h1>
                    <p class="mx-auto max-w-2xl text-lg text-gray-300">
                        Oto kolekcja projektów, nad którymi pracowałem. Każdy z nich prezentuje różne technologie i rozwiązania.
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
                    Powrót do strony głównej
                </Link>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <div v-if="filteredProjects.length > 0" class="space-y-6">
                <div
                    v-for="(project, index) in filteredProjects"
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
                    <h3 class="mt-4 text-lg font-medium text-gray-300">Brak projektów</h3>
                    <p class="mt-2 text-gray-500">Nie znaleziono projektów spełniających kryteria wyszukiwania.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import ProjectListItem from '@/components/portfolio/ProjectListItem.vue';
import { Paginated, Project, Skill } from '@/types';
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface Props {
    projects: Paginated<Project>;
}

const props = defineProps<Props>();

// Reactive state
const searchQuery = ref('');
const selectedSkill = ref<string | null>(null);

// Computed properties
const allSkills = computed(() => {
    const skills = new Set<string>();
    props.projects.data.forEach((project) => {
        if (project.skills) {
            project.skills.forEach((skill: Skill) => {
                skills.add(skill.name);
            });
        }
    });
    return Array.from(skills).sort();
});

const filteredProjects = computed(() => {
    let filtered = props.projects.data;

    // Filter by search query
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase().trim();
        filtered = filtered.filter(
            (project) =>
                project.name.toLowerCase().includes(query) ||
                (project.description && project.description.toLowerCase().includes(query)) ||
                (project.skills && project.skills.some((skill) => skill.name.toLowerCase().includes(query))),
        );
    }

    // Filter by selected skill
    if (selectedSkill.value) {
        filtered = filtered.filter((project) => project.skills && project.skills.some((skill) => skill.name === selectedSkill.value));
    }

    return filtered;
});
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
