<template>
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-4xl font-bold text-white">Umiejętności techniczne</h2>
            <div class="mx-auto h-1 w-16 rounded-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
        </div>
        <div class="space-y-12">
            <div v-for="(categorySkills, categoryId) in groupedSkills" :key="categoryId" class="space-y-6">
                <h3 class="text-center text-2xl font-semibold text-white">
                    {{ categorySkills[0].category.name }}
                </h3>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <SkillCard v-for="skill in categorySkills" :key="skill.id" :skill="skill" />
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Paginated, Skill } from '@/types';
import { computed } from 'vue';
import SkillCard from './SkillCard.vue';

const props = defineProps<{
    skills: Paginated<Skill>;
}>();

const groupedSkills = computed(() => {
    return props.skills.data.reduce((acc: Record<string, Skill[]>, skill) => {
        acc[skill.category.id] = acc[skill.category.id] || [];
        acc[skill.category.id].push(skill);
        return acc;
    }, {});
});
</script>
