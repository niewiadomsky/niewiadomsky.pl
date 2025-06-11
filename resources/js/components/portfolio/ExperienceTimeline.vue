<template>
    <div class="experience-timeline">
        <h2 class="timeline-title">Experience</h2>

        <div class="timeline">
            <div v-for="(experience, index) in experiences" :key="index" class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-dot"></div>
                    <div v-if="index !== experiences.length - 1" class="timeline-line"></div>
                </div>

                <div class="timeline-content">
                    <div class="timeline-header">
                        <div>
                            <h3 class="position">{{ experience.position }}</h3>
                            <div class="company-info">
                                <span class="company">{{ experience.company }}</span>
                                <span class="location">{{ experience.location }}</span>
                            </div>
                        </div>
                        <span class="period">{{ experience.period }}</span>
                    </div>

                    <ul class="responsibilities" v-if="experience.responsibilities">
                        <li v-for="(responsibility, i) in experience.responsibilities" :key="i">
                            {{ responsibility }}
                        </li>
                    </ul>

                    <div class="technologies" v-if="experience.technologies">
                        <span v-for="(tech, i) in experience.technologies" :key="i" class="tech-tag">
                            {{ tech }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';

interface Experience {
    position: string;
    period: string;
    company: string;
    location: string;
    responsibilities?: string[];
    technologies?: string[];
}

// TODO: Replace with API call in the future
const experiences = ref<Experience[]>([
    {
        position: 'Web Developer',
        period: '05.2022 - 06.2025',
        company: 'FlightScope',
        location: 'Gliwice, Poland',
        responsibilities: [
            'Development of clean PHP backend with API for mobile and web applications',
            'Maintaining and implementing new functionalities in Vue.js portal for baseball, collaborating with backend team',
            'Backend development in Laravel framework for Unity game integrating with golf radar',
            'Implementation of rotation leagues with leaderboards',
            'Asynchronous task processing using Redis queue mechanism',
            'Game economy system',
            'Cyclical rewards system',
            'Bots simulating real player gameplay',
            'Golf card collections for boundary collection',
            'WebSocket server communication for real-time game modes',
            'Discord-integrated feedback system',
            'Personal backend service development using Socket.io WebSocket connections for real-time game modes',
            'Creation and maintenance of administrative panel for user management',
            'R&D of React Native mobile application integrating with golf radar SDK and WebGL browser project',
            'DevOps tasks including custom Docker image creation for Bitbucket Pipelines',
            'Technical API documentation creation and automation using OpenAPI and JSON Schema standards',
        ],
        technologies: ['PHP', 'Laravel', 'Vue.js', 'Redis', 'WebSocket', 'Socket.io', 'React Native', 'Docker', 'Unity', 'WebGL'],
    },
    {
        position: 'Junior Backend Developer',
        period: '08.2021 - 04.2022',
        company: 'Arris Agency',
        location: 'Chorzów, Poland',
        responsibilities: [
            'Development of tools for managing car advertisements and synchronizing them between services like Allegro, Otomoto, and Gratka',
        ],
        technologies: ['PHP', 'API Integration'],
    },
    {
        position: 'Web Developer Internship',
        period: '07.2021 - 08.2021',
        company: 'Merchandising Malaga SL',
        location: 'Malaga, Spain',
        responsibilities: ['Creating wholesale product ordering forms using HTML, CSS and Alpine.js'],
        technologies: ['HTML', 'CSS', 'Alpine.js'],
    },
    {
        position: 'Web Solutions Developer',
        period: '07.2020 - 08.2020',
        company: 'Information Technology Center',
        location: 'Gliwice, Poland',
        responsibilities: ['Development of CRM project written in Laravel'],
        technologies: ['Laravel', 'PHP'],
    },
]);
</script>

<style scoped>
.experience-timeline {
    max-width: 700px;
    margin: 0 auto;
    padding: 3rem 1rem;
}

.timeline-title {
    font-size: 2rem;
    font-weight: 500;
    text-align: center;
    margin-bottom: 4rem;
    color: #0f172a;
    letter-spacing: -0.025em;
}

.timeline {
    position: relative;
}

.timeline-item {
    display: flex;
    margin-bottom: 4rem;
    position: relative;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-marker {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-right: 2rem;
    position: relative;
}

.timeline-dot {
    width: 8px;
    height: 8px;
    background: #0f172a;
    border-radius: 50%;
    position: relative;
    z-index: 2;
}

.timeline-line {
    width: 1px;
    background: #e2e8f0;
    flex-grow: 1;
    margin-top: 1rem;
}

.timeline-content {
    flex: 1;
    padding: 0;
}

.timeline-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    gap: 1rem;
}

.position {
    font-size: 1.125rem;
    font-weight: 600;
    color: #0f172a;
    margin: 0 0 0.5rem 0;
    line-height: 1.4;
}

.company-info {
    display: flex;
    gap: 0.5rem;
    align-items: center;
    flex-wrap: wrap;
}

.company {
    color: #475569;
    font-weight: 500;
    font-size: 0.875rem;
}

.location {
    color: #94a3b8;
    font-size: 0.875rem;
}

.location::before {
    content: '•';
    margin-right: 0.5rem;
    color: #cbd5e1;
}

.period {
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 500;
    white-space: nowrap;
    flex-shrink: 0;
}

.responsibilities {
    margin: 0 0 1.5rem 0;
    padding-left: 0;
    list-style: none;
}

.responsibilities li {
    margin-bottom: 0.5rem;
    line-height: 1.6;
    color: #475569;
    font-size: 0.875rem;
    position: relative;
    padding-left: 1rem;
}

.responsibilities li::before {
    content: '−';
    position: absolute;
    left: 0;
    color: #94a3b8;
    font-weight: 300;
}

.technologies {
    display: flex;
    flex-wrap: wrap;
    gap: 0.375rem;
}

.tech-tag {
    background: #f8fafc;
    color: #475569;
    padding: 0.125rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 500;
    border: 1px solid #e2e8f0;
}

/* Responsive design */
@media (max-width: 768px) {
    .experience-timeline {
        padding: 2rem 1rem;
    }

    .timeline-title {
        font-size: 1.75rem;
        margin-bottom: 3rem;
    }

    .timeline-item {
        margin-bottom: 3rem;
    }

    .timeline-marker {
        margin-right: 1.5rem;
    }

    .timeline-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.75rem;
    }

    .company-info {
        flex-direction: column;
        gap: 0.25rem;
        align-items: flex-start;
    }

    .location::before {
        display: none;
    }

    .period {
        order: -1;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .timeline-title {
        color: #f8fafc;
    }

    .timeline-dot {
        background: #f8fafc;
    }

    .timeline-line {
        background: #334155;
    }

    .position {
        color: #f8fafc;
    }

    .company {
        color: #cbd5e1;
    }

    .location {
        color: #64748b;
    }

    .period {
        color: #94a3b8;
    }

    .responsibilities li {
        color: #cbd5e1;
    }

    .responsibilities li::before {
        color: #64748b;
    }

    .tech-tag {
        background: #1e293b;
        color: #cbd5e1;
        border-color: #334155;
    }
}
</style>
