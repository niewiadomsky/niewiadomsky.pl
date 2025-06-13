<template>
    <div class="min-h-screen bg-gray-900">
        <HeaderBadge />
        <!-- <div class="flex justify-center py-4">
            <LanguageSwitcher />
        </div> -->
        <AboutSection />
        <HeroSection />
        <SkillsSection :skills="skills" />
        <ProjectsSection :projects="projects" />
        <ExperienceTimeline />
        <ContactSection />
        <FooterSection />
    </div>
</template>

<script setup lang="ts">
import AboutSection from '@/components/portfolio/AboutSection.vue';
import ContactSection from '@/components/portfolio/ContactSection.vue';
import ExperienceTimeline from '@/components/portfolio/ExperienceTimeline.vue';
import FooterSection from '@/components/portfolio/FooterSection.vue';
import HeaderBadge from '@/components/portfolio/HeaderBadge.vue';
import HeroSection from '@/components/portfolio/HeroSection.vue';
import LanguageSwitcher from '@/components/portfolio/LanguageSwitcher.vue';
import ProjectsSection from '@/components/portfolio/ProjectsSection.vue';
import SkillsSection from '@/components/portfolio/SkillsSection.vue';
import { Paginated, Project, Skill } from '@/types';

const props = defineProps<{
    skills: Skill[];
    projects: Project[];
}>();
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>
