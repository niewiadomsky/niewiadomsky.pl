<template>
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <figure class="diff h-48 overflow-hidden rounded-lg md:h-96">
            <div class="diff-item-1">
                <img :src="HomeImage" :alt="trans('portfolio.hero_foreground')" />
            </div>
            <div class="diff-item-2">
                <img :src="HorseImage" :alt="trans('portfolio.hero_background')" />
            </div>
            <div class="diff-resizer"></div>
        </figure>
    </section>
</template>

<script setup lang="ts">
import HomeImage from '@/../assets/images/home.webp';
import HorseImage from '@/../assets/images/horses.webp';
</script>

<style scoped></style>
