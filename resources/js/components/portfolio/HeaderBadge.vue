<template>
    <div class="hanging-sign-container">
        <!-- Left rope -->
        <div class="rope rope-left"></div>
        <!-- Right rope -->
        <div class="rope rope-right"></div>
        <!-- Sign -->
        <div class="neon-badge relative overflow-hidden rounded-lg border-2 border-gray-600 bg-gray-800 px-8 py-6 shadow-lg">
            <!-- Rope attachment holes -->
            <div class="rope-hole rope-hole-left"></div>
            <div class="rope-hole rope-hole-right"></div>
            <h2 class="neon-text relative z-10 text-center text-4xl leading-none font-extrabold tracking-tight text-green-400">
                {{ trans('portfolio.open_to_work') }}
            </h2>
        </div>
    </div>
</template>

<script setup lang="ts"></script>

<style scoped>
.hanging-sign-container {
    position: relative;
    display: flex;
    justify-content: center;
    padding-top: 60px;
    animation: gentle-sway 6s ease-in-out infinite;
}

.rope {
    position: absolute;
    top: 0;
    width: 4px;
    height: 70px;
    background: linear-gradient(to bottom, #8b4513 0%, #a0522d 50%, #8b4513 100%);
    border-radius: 2px;
    box-shadow: inset 1px 0 0 rgba(160, 82, 45, 0.3);
    z-index: 1;
}

.rope::before {
    content: '';
    position: absolute;
    top: -8px;
    left: 50%;
    transform: translateX(-50%);
    width: 8px;
    height: 8px;
    background: #654321;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.rope-left {
    left: calc(50% - 180px);
    transform: rotate(-1deg);
}

.rope-right {
    right: calc(50% - 180px);
    transform: rotate(1deg);
}

.neon-badge {
    box-shadow:
        0 4px 8px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(107, 114, 128, 0.2);
    transition: transform 0.3s ease;
    position: relative;
}

.neon-badge:hover {
    transform: translateY(-2px);
}

.rope-hole {
    position: absolute;
    top: 8px;
    width: 6px;
    height: 6px;
    background: #4a5568;
    border-radius: 50%;
    box-shadow:
        inset 0 1px 2px rgba(0, 0, 0, 0.8),
        0 1px 1px rgba(255, 255, 255, 0.1);
    z-index: 2;
}

.rope-hole-left {
    left: 12px;
}

.rope-hole-right {
    right: 12px;
}

.neon-text {
    text-shadow:
        0 0 10px rgba(34, 197, 94, 0.6),
        0 0 20px rgba(34, 197, 94, 0.4),
        0 0 30px rgba(34, 197, 94, 0.2);
    animation: gentle-glow 3s ease-in-out infinite alternate;
}

@keyframes gentle-sway {
    0%,
    100% {
        transform: rotate(0deg);
    }
    25% {
        transform: rotate(0.5deg);
    }
    75% {
        transform: rotate(-0.5deg);
    }
}

@keyframes gentle-glow {
    from {
        text-shadow:
            0 0 10px rgba(34, 197, 94, 0.6),
            0 0 20px rgba(34, 197, 94, 0.4),
            0 0 30px rgba(34, 197, 94, 0.2);
    }
    to {
        text-shadow:
            0 0 15px rgba(34, 197, 94, 0.8),
            0 0 25px rgba(34, 197, 94, 0.5),
            0 0 35px rgba(34, 197, 94, 0.3);
    }
}
</style>
