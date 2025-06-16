import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export interface SkillCategory {
    id: number;
    name: string;
    order: number;
}

export interface Skill {
    id: number;
    name: string;
    description: string | null;
    level: number;
    image: string;
    order: number;
    category: SkillCategory;
}

export interface Project {
    id: number;
    name: string;
    description: string | null;
    live_url: string | null;
    iframe_url: string | null;
    order: number;
    images: string[];
    technologies?: string[];
    github_url?: string | null;
    created_at?: string;
    updated_at?: string;
    skills?: Skill[];
}

export interface Paginated<T> {
    data: T[];
    links: {
        first: string;
        last: string;
    };
}

export interface Experience {
    id: number;
    position: string;
    company: string;
    location: string;
    started_at: string;
    ended_at: string | null;
    entries: ExperienceEntry[];
    technologies?: string[];
}

export interface ExperienceEntry {
    id: number;
    description: string;
    order: number;
}
