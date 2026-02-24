<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);
</script>

<template>
    <Head title="Gem" />
    <AppLayout>
        <div class="snowflakes">
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
            <div class="snowflake">💎</div>
        </div>
        <div class="p-6 text-xl font-bold text-red-600">
            🚨 GEM ALARM 🚨 💎💎💎💎
        </div>
    </AppLayout>
</template>
