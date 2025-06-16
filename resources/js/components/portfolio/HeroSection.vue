<template>
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div ref="containerRef" class="relative h-48 overflow-hidden rounded-lg md:h-96">
            <!-- Bottom image (background) -->
            <img :src="HorseImage" :alt="trans('portfolio.hero_background')" class="absolute top-0 left-0 h-full w-full object-cover" />

            <!-- Top image (foreground) -->
            <img
                :src="HomeImage"
                :alt="trans('portfolio.hero_foreground')"
                class="absolute top-0 left-0 h-full w-full object-cover transition-all duration-75 ease-out"
                :style="{ clipPath: clipPathValue }"
            />

            <!-- Draggable reveal line -->
            <div
                class="absolute top-0 bottom-0 z-10 w-0.5 transform cursor-ew-resize touch-none bg-white/60 select-none"
                :style="{
                    left: `${linePosition}%`,
                    transform: `rotate(${rotation}deg)`,
                    transformOrigin: 'center center',
                }"
                @mousedown="startDrag"
                @touchstart.prevent="startDrag"
            >
                <!-- Larger touch area for mobile -->
                <div
                    class="absolute top-1/2 left-1/2 flex h-16 w-8 -translate-x-1/2 -translate-y-1/2 transform touch-none items-center justify-center rounded-full bg-white/80 shadow-sm transition-transform duration-75 hover:scale-110 active:scale-110 md:h-12 md:w-6"
                >
                    <div class="h-8 w-0.5 rounded-full bg-gray-500 md:h-6"></div>
                </div>
                <!-- Extended touch area for easier mobile interaction -->
                <div
                    class="absolute top-0 -right-4 bottom-0 -left-4 touch-none md:-right-2 md:-left-2"
                    @mousedown="startDrag"
                    @touchstart.prevent="startDrag"
                ></div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import HomeImage from '@/../assets/images/home.webp';
import HorseImage from '@/../assets/images/horses.webp';

import { computed, onMounted, onUnmounted, ref } from 'vue';

const rotation = 35; // degrees
const revealPercentage = ref(58); // Start at 50%
const isDragging = ref(false);
let animationFrameId: number | null = null;
const containerRef = ref<HTMLElement | null>(null);
const aspectRatio = ref(1); // width / height

// Update aspect ratio on mount and resize
const updateAspectRatio = () => {
    if (containerRef.value) {
        const rect = containerRef.value.getBoundingClientRect();
        aspectRatio.value = rect.width / rect.height;
        if (rect.width > 600) {
            revealPercentage.value = 58;
        } else {
            revealPercentage.value = 62;
        }
    }
};
onMounted(() => {
    updateAspectRatio();
    window.addEventListener('resize', updateAspectRatio);
    // Cleanup listeners on unmount
});
onUnmounted(() => {
    window.removeEventListener('resize', updateAspectRatio);
    // Ensure any lingering drag listeners are removed
    stopDrag();
    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }
});

// Calculate the diagonal offset for the clip-path
const diagonalOffset = computed(() => {
    // For a line rotated by θ degrees at position x%,
    // the bottom intersection is at: x% - (height/width) * tan(θ) * 100%
    const thetaRad = (rotation * Math.PI) / 180;
    const tanTheta = Math.tan(thetaRad);
    // Convert aspect ratio to height/width ratio and scale by 100 for percentage
    const heightOverWidth = 1 / aspectRatio.value;
    return heightOverWidth * tanTheta * 100;
});

const clipPathValue = computed(() => {
    const offset = diagonalOffset.value;
    const topRight = revealPercentage.value;
    const bottomRight = Math.max(0, revealPercentage.value - offset);
    return `polygon(0 0, ${topRight}% 0, ${bottomRight}% 100%, 0 100%)`;
});

// Calculate the line position to be centered on the diagonal cut
const linePosition = computed(() => {
    const offset = diagonalOffset.value;
    const topRight = revealPercentage.value;
    const bottomRight = Math.max(0, revealPercentage.value - offset);

    // Calculate the center of the diagonal line
    // For a diagonal from (topRight, 0) to (bottomRight, 100)
    // The center point x-coordinate is the average
    const centerX = (topRight + bottomRight) / 2;

    return centerX;
});

// Drag handling
const startDrag = (event: MouseEvent | TouchEvent) => {
    isDragging.value = true;
    // Prevent text selection and other default behaviors
    event.preventDefault();

    // Add listeners to the window to capture dragging anywhere on the page
    window.addEventListener('mousemove', handleDrag);
    window.addEventListener('touchmove', handleDrag, { passive: false }); // passive: false to allow preventDefault
    window.addEventListener('mouseup', stopDrag);
    window.addEventListener('touchend', stopDrag);
};

const handleDrag = (event: MouseEvent | TouchEvent) => {
    if (!isDragging.value || !containerRef.value) return;

    // Prevent page scrolling during drag on touch devices
    if (event.cancelable) {
        event.preventDefault();
    }

    window.umami?.track('Drag the line', {
        percentage: revealPercentage.value,
    });

    // Get clientX from mouse or touch event
    const clientX = event instanceof MouseEvent ? event.clientX : event.touches[0].clientX;

    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }

    animationFrameId = requestAnimationFrame(() => {
        if (!containerRef.value) return;
        const rect = containerRef.value.getBoundingClientRect();
        const cursorPercentage = ((clientX - rect.left) / rect.width) * 100;

        // To keep the line under the cursor, we must solve for revealPercentage:
        // linePosition = revealPercentage - diagonalOffset / 2
        // We want linePosition to be at cursorPercentage, so:
        // cursorPercentage = revealPercentage - diagonalOffset / 2
        // revealPercentage = cursorPercentage + diagonalOffset / 2
        const newRevealPercentage = cursorPercentage + diagonalOffset.value / 2;

        // Clamp the revealPercentage to keep the clip-path within bounds (0% to 100%)
        // and ensure the line doesn't go off-screen.
        const minReveal = diagonalOffset.value; // Ensures bottom point is >= 0
        const maxReveal = 100; // Ensures top point is <= 100
        revealPercentage.value = Math.max(minReveal, Math.min(maxReveal, newRevealPercentage));
    });
};

const stopDrag = () => {
    if (!isDragging.value) return; // Prevent running if not dragging
    isDragging.value = false;

    // Remove the global listeners
    window.removeEventListener('mousemove', handleDrag);
    window.removeEventListener('touchmove', handleDrag);
    window.removeEventListener('mouseup', stopDrag);
    window.removeEventListener('touchend', stopDrag);

    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
        animationFrameId = null;
    }
};
</script>

<style scoped>
/* Prevent text selection during drag */
.select-none {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
</style>
