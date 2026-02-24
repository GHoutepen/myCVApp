<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { filterForTitle } from '@/utils/color';

const props = defineProps<{
    blog: {
        id: number;
        title: string;
        content: string;
        image_path: string;
        user: {
            id: number;
            name: string;
        };
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Blogs',
        href: '/blogs',
    },
];
</script>

<template>
    <Head title="Blogs" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="mx-auto max-w-3xl px-6 py-10">
            <h1
                class="mb-6 flex items-center gap-2 text-3xl font-bold tracking-tight"
            >
                <span :style="{ filter: filterForTitle(props.blog.title) }"
                    >💎</span
                >
                {{ props.blog.title }}
            </h1>

            <div class="mb-8 leading-relaxed whitespace-pre-line text-gray-700">
                {{ props.blog.content }}
            </div>

            <div v-if="props.blog.image_path" class="mt-6">
                <img
                    :src="`/storage/${props.blog.image_path}`"
                    alt="Blog image"
                    class="max-w-full rounded-lg shadow-md"
                />
            </div>

            <div class="mt-10 text-sm text-gray-500">
                Written by {{ props.blog.user.name }}
            </div>
        </div>
    </AppLayout>
</template>
