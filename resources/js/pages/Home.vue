<template>
    <div class="min-h-screen bg-gray-900">
        <HeroSection />
        <AboutSection />
        <SkillsSection :skills="skills" />
        <ProjectsSection :projects="projects" />
        <ContactSection />
        <FooterSection />
    </div>
</template>

<script setup lang="ts">
import AboutSection from '@/components/portfolio/AboutSection.vue';
import ContactSection from '@/components/portfolio/ContactSection.vue';
import FooterSection from '@/components/portfolio/FooterSection.vue';
import HeroSection from '@/components/portfolio/HeroSection.vue';
import ProjectsSection from '@/components/portfolio/ProjectsSection.vue';
import SkillsSection from '@/components/portfolio/SkillsSection.vue';
import { Paginated, Project, Skill } from '@/types';

const props = defineProps<{
    skills: Paginated<Skill>;
    projects: Paginated<Project>;
}>();
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>
