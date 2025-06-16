<template>
    <Head>
        <title>Portfolio</title>
        <meta name="description" content="Portfolio" />
        <meta name="keywords" content="Szymon Niewiadomski, Fullstack Developer, Laravel, Vue, React, Node.js, JavaScript, TypeScript" />
    </Head>
    <div class="min-h-screen bg-gray-900 overflow-hidden">
        <HeaderBadge />
        <div class="flex justify-center py-4">
            <LanguageSwitcher />
        </div>
        <AboutSection />
        <HeroSection />
        <SkillsSection :skills="skills" />
        <ProjectsSection :projects="projects" />
        <ExperienceTimeline :experiences="experiences" />
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
import { Experience, Paginated, Project, Skill } from '@/types';
import { Head } from '@inertiajs/vue3';

const props = defineProps<{
    skills: Skill[];
    projects: Project[];
    experiences: Experience[];
}>();
</script>

<style scoped>
/* Add any custom styles here if needed */
</style>
