<template>
    <a
        v-if="resume"
        :href="resume.download_url"
        :download="resume.name"
        class="group inline-flex items-center justify-center gap-3 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 px-5 py-3 font-semibold text-white transition-all duration-300 hover:scale-105 hover:from-blue-600 hover:to-purple-700 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-gray-900 focus:outline-none"
    >
        <Download class="h-5 w-5 transition-transform duration-200 ease-in-out group-hover:scale-110" />
        <span class="text-lg">{{ trans('portfolio.download_cv') }}</span>
    </a>
</template>

<script setup lang="ts">
import { Resume } from '@/types';
import { Download } from 'lucide-vue-next';

const props = defineProps<{
    resume: Resume | undefined;
}>();
</script>

<style scoped></style>
