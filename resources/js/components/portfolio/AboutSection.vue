<template>
    <section class="mx-auto max-w-7xl px-8 py-20 sm:px-6 lg:px-8 space-y-4">
        <article class="prose md:prose-xl text-gray-300">
            <h2 class="mb-8 font-bold text-white" v-html="trans('portfolio.hello_iam_szymon')"></h2>
            <p v-html="trans('portfolio.about_me_text')"></p>
        </article>
        <ResumeButton :resume="resume" />
    </section>
</template>

<script setup lang="ts">
import ResumeButton from './ResumeButton.vue';
import { Resume } from '@/types';

const props = defineProps<{
    resume: Resume | undefined;
}>();
</script>
