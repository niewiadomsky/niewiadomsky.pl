<template>
    <div
        class="group transform rounded-xl border border-gray-700/50 bg-gray-800/50 p-4 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-600/50 hover:bg-gray-800/70"
    >
        <div class="flex items-center space-x-3">
            <div class="flex-shrink-0 rounded-lg bg-gray-700/50 p-2 transition-colors duration-300 group-hover:bg-gray-700">
                <img :src="skill.image" :alt="skill.name" class="h-6 w-6 object-contain" />
            </div>
            <h3 class="truncate text-lg font-semibold text-white">{{ skill.name }}</h3>
            <div class="flex space-x-1 ml-auto">
                <div
                    v-for="dot in 5"
                    :key="dot"
                    class="h-3 w-3 rounded-full transition-colors duration-300"
                    :class="dot <= skill.level ? getSkillLevelColor(skill.level) : 'bg-gray-500'"
                ></div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Skill } from '@/types';

defineProps<{
    skill: Skill;
}>();

function getSkillLevelColor(level: number): string {
    switch (level) {
        case 5:
            return 'bg-green-500';
        case 4:
            return 'bg-blue-500';
        case 3:
            return 'bg-yellow-500';
        case 2:
            return 'bg-orange-500';
        case 1:
            return 'bg-red-500';
        case 0:
            return 'bg-gray-500';
        default:
            return 'bg-gray-500';
    }
}
</script>
