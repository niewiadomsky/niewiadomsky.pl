<template>
    <div>
        <h1>Skills</h1>
        <ul>
            <li v-for="skill in skills.data" :key="skill.id">
                <img :src="skill.image" :alt="skill.name" class="w-10 h-10" />
                <h2>{{ skill.name }}</h2>
                <p>{{ skill.description }}</p>
            </li>
        </ul>
        
    </div>
</template>

<script setup lang="ts">
import { Paginated, Project, Skill } from '@/types';

const props = defineProps<{
    skills: Paginated<Skill>;
    projects: Paginated<Project>;
}>();
</script>

<style scoped>

</style>