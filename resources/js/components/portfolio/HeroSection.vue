<template>
    <section class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <div ref="containerRef" class="relative h-48 overflow-hidden rounded-lg md:h-96">
            <!-- Bottom image (background) -->
            <img :src="HorseImage" alt="Hero Background" class="absolute top-0 left-0 h-full w-full object-cover" />

            <!-- Top image (foreground) -->
            <img
                :src="HomeImage"
                alt="Hero Foreground"
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
                @touchstart.passive="false"
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
                    @touchstart.passive="false"
                    @touchstart.prevent="startDrag"
                ></div>
            </div>

            <!-- Drag overlay for better UX -->
            <div
                v-if="isDragging"
                class="fixed inset-0 z-20 cursor-ew-resize touch-none"
                @mousemove="handleDrag"
                @mouseup="stopDrag"
                @touchmove.passive="false"
                @touchmove.prevent="handleDrag"
                @touchend="stopDrag"
                @touchcancel="stopDrag"
            ></div>
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
    }
};
onMounted(() => {
    updateAspectRatio();
    window.addEventListener('resize', updateAspectRatio);
    document.addEventListener('mouseup', stopDrag);
    document.addEventListener('touchend', stopDrag);
});
onUnmounted(() => {
    window.removeEventListener('resize', updateAspectRatio);
    document.removeEventListener('mouseup', stopDrag);
    document.removeEventListener('touchend', stopDrag);
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

    // Prevent default behaviors
    if (event.cancelable) {
        event.preventDefault();
    }

    // For touch events, prevent page scrolling and zooming
    if (event instanceof TouchEvent) {
        document.body.style.overflow = 'hidden';
        document.body.style.touchAction = 'none';
        // Prevent page zoom on double tap
        document.body.style.userSelect = 'none';
    }
};

const handleDrag = (event: MouseEvent | TouchEvent) => {
    if (!isDragging.value || !containerRef.value) return;

    // Prevent default behaviors
    if (event.cancelable) {
        event.preventDefault();
    }

    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }

    animationFrameId = requestAnimationFrame(() => {
        let clientX: number;

        if (event instanceof MouseEvent) {
            clientX = event.clientX;
        } else {
            // Handle touch events - get the most recent touch point
            if (event.touches && event.touches.length > 0) {
                clientX = event.touches[0].clientX;
            } else if (event.changedTouches && event.changedTouches.length > 0) {
                clientX = event.changedTouches[0].clientX;
            } else {
                return;
            }
        }

        if (!containerRef.value) return;
        const rect = containerRef.value.getBoundingClientRect();
        const percentage = Math.max(22, Math.min(100, ((clientX - rect.left) / rect.width) * 100));
        revealPercentage.value = percentage;
    });
};

const stopDrag = () => {
    isDragging.value = false;

    // Re-enable normal touch behaviors
    document.body.style.overflow = '';
    document.body.style.touchAction = '';
    document.body.style.userSelect = '';

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
