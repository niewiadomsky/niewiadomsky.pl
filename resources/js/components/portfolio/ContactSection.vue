<template>
    <section class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-4xl font-bold text-white" v-html="trans('portfolio.contact_me')"></h2>
            <div class="mx-auto h-1 w-16 rounded-full bg-gradient-to-r from-blue-400 to-purple-500"></div>
        </div>
        <div class="mx-auto max-w-2xl">
            <p class="mb-10 text-center text-lg text-gray-300">{{ trans('portfolio.contact_prompt') }}</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a
                    href="mailto:niewiadomski.szymon@gmail.com"
                    class="group flex items-center space-x-2 rounded-xl border border-gray-700/50 bg-gray-800/50 px-4 py-3 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-600/50 hover:bg-gray-800/70"
                    data-umami-event="Click into Email"
                >
                    <div class="rounded-lg bg-gray-700/50 p-2 transition-colors duration-300 group-hover:bg-blue-600">
                        <svg class="h-4 w-4 text-gray-300 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                            />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-300 group-hover:text-white">{{ trans('portfolio.email') }}</span>
                </a>
                <a
                    href="https://github.com/niewiadomsky"
                    target="_blank"
                    class="group flex items-center space-x-2 rounded-xl border border-gray-700/50 bg-gray-800/50 px-4 py-3 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-600/50 hover:bg-gray-800/70"
                    data-umami-event="Click into GitHub"
                >
                    <div class="rounded-lg bg-gray-700/50 p-2 transition-colors duration-300 group-hover:bg-purple-600">
                        <svg class="h-4 w-4 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"
                            />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-300 group-hover:text-white">{{ trans('portfolio.github') }}</span>
                </a>
                <a
                    href="https://linkedin.com/in/niewiadomsky"
                    target="_blank"
                    class="group flex items-center space-x-2 rounded-xl border border-gray-700/50 bg-gray-800/50 px-4 py-3 backdrop-blur-sm transition-all duration-300 hover:scale-105 hover:border-gray-600/50 hover:bg-gray-800/70"
                    data-umami-event="Click into LinkedIn"
                >
                    <div class="rounded-lg bg-gray-700/50 p-2 transition-colors duration-300 group-hover:bg-blue-600">
                        <svg class="h-4 w-4 text-gray-300 group-hover:text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                            />
                        </svg>
                    </div>
                    <span class="font-medium text-gray-300 group-hover:text-white">{{ trans('portfolio.linkedin') }}</span>
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <ResumeButton :resume="resume" class="mt-8" />
        </div>
    </section>
</template>

<script setup lang="ts">
import ResumeButton from '@/components/portfolio/ResumeButton.vue';
import { Resume } from '@/types';

const props = defineProps<{
    resume: Resume | undefined;
}>();
</script>
