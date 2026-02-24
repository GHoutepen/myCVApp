<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3'; // used for handleDelete / url bits
import {
    create,
    show,
    edit,
    destroy,
} from '@/actions/App/Http/Controllers/BlogController';
import { Alert, AlertDescription, AlertTitle } from '@/components/ui/alert';
import Button from '@/components/ui/button/Button.vue';
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { filterForTitle } from '@/utils/color';

type Blog = {
    id: number;
    title: string;
    user_id: number;
};

const props = defineProps<{
    blogs: {
        data: Blog[];
        meta: {
            current_page: number;
            last_page: number;
            per_page: number;
            total: number;
        };
        links: any;
    };
}>();

const page = usePage();

const handleDelete = (blog: Blog) => {
    if (confirm(`Do you want to delete blog: ${blog.title}`)) {
        console.log(`blog: ${blog.title} deleted.`);
        router.delete(destroy(blog.id).url);
    }
};

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
        <div class="relative overflow-hidden">
            <!-- Animated Gem Layer -->
            <div class="pointer-events-none absolute inset-0 snowflakes">
                <span
                    v-for="blog in blogs.data"
                    :key="`gem-${blog.id}`"
                    class="snowflake"
                    :style="{

                        filter: filterForTitle(blog.title)
                    }"
                >
                    💎
                </span>
            </div>
            <div class="relative z-10">
                <div class="p-4">
                    <div v-if="page.props.flash?.success" class="mb-4">
                        <Alert class="bg-orange-900">
                            <AlertTitle>Blog created!</AlertTitle>
                            <AlertDescription>
                                {{ page.props.flash?.success }}
                            </AlertDescription>
                        </Alert>
                    </div>

                    <div class="flex justify-center gap-6">
                        <div class="flex items-center gap-2">
                            <a
                                v-if="blogs.prev_page_url"
                                :href="blogs.prev_page_url"
                                class="rounded border px-3 py-1"
                            >
                                Prev
                            </a>

                            <a
                                v-for="i in blogs.last_page"
                                :key="i"
                                :href="`${blogs.path}?page=${i}`"
                                class="rounded border px-3 py-1"
                                :class="{
                                    'bg-black text-white':
                                        i === blogs.current_page,
                                }"
                            >
                                {{ i }}
                            </a>

                            <a
                                v-if="blogs.next_page_url"
                                :href="blogs.next_page_url"
                                class="rounded border px-3 py-1"
                            >
                                Next
                            </a>
                        </div>
                    </div>

                    <div>
                        <Table>
                            <TableCaption
                                >Real gems, in blog format.</TableCaption
                            >
                            <TableHeader>
                                <TableRow>
                                    <TableHead class="w-[10px]"> </TableHead>
                                    <TableHead>Title</TableHead>
                                    <TableHead class="text-right">
                                        Actions
                                    </TableHead>
                                </TableRow>
                            </TableHeader>
                            <TableBody>
                                <TableRow
                                    v-for="blog in props.blogs.data"
                                    :key="blog.id"
                                >
                                    <TableCell class="text-lg font-medium">
                                        <span
                                            :style="{
                                                filter: filterForTitle(
                                                    blog.title,
                                                ),
                                            }"
                                            >💎</span
                                        >
                                    </TableCell>
                                    <Link :href="show(blog)">
                                        <TableCell>{{ blog.title }}</TableCell>
                                    </Link>
                                    <TableCell
                                        class="text-right"
                                        v-if="
                                            page.props.auth.user?.id ==
                                            blog.user_id
                                        "
                                    >
                                        <Link :href="edit(blog)">
                                            <Button class="mr-2 bg-gray-400"
                                                >✏️</Button
                                            >
                                        </Link>
                                        <Button
                                            class="bg-red-400"
                                            @click="handleDelete(blog)"
                                            >🗑️</Button
                                        >
                                    </TableCell>
                                </TableRow>
                            </TableBody>
                        </Table>
                    </div>

                    <Link v-if="page.props.auth.user != null" :href="create()"
                        ><Button>Create a blog</Button>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* customizable snowflake styling */
.snowflake {
    color: #fff;
    font-size: 1em;
    text-shadow: 0 0 1px #000;
}
@-webkit-keyframes snowflakes-fall {
    0% { top: -10%; }
    100% { top: 100%; }
}

@-webkit-keyframes snowflakes-shake {
    0% { -webkit-transform: translateX(0px); transform: translateX(0px); }
    50% { -webkit-transform: translateX(80px); transform: translateX(80px); }
    100% { -webkit-transform: translateX(0px); transform: translateX(0px); }
}

@keyframes snowflakes-fall {
    0% { top: -10%; }
    100% { top: 100%; }
}

@keyframes snowflakes-shake {
    0% { transform: translateX(0px); }
    50% { transform: translateX(80px); }
    100% { transform: translateX(0px); }
}

.snowflake {
    position: fixed;
    top: -10%;
    z-index: 9999;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    cursor: default;
    -webkit-animation-name: snowflakes-fall, snowflakes-shake;
    -webkit-animation-duration: 10s, 3s;
    -webkit-animation-timing-function: linear, ease-in-out;
    -webkit-animation-iteration-count: infinite, infinite;
    -webkit-animation-play-state: running, running;
    animation-name: snowflakes-fall, snowflakes-shake;
    animation-duration: 10s, 3s;
    animation-timing-function: linear, ease-in-out;
    animation-iteration-count: infinite, infinite;
    animation-play-state: running, running;
}

.snowflake:nth-of-type(0) { left: 1%; animation-delay: 0s, 0s; }
.snowflake:nth-of-type(1) { left: 10%; animation-delay: 1s, 1s; }
.snowflake:nth-of-type(2) { left: 20%; animation-delay: 6s, 0.5s; }
.snowflake:nth-of-type(3) { left: 30%; animation-delay: 4s, 2s; }
.snowflake:nth-of-type(4) { left: 40%; animation-delay: 2s, 2s; }
.snowflake:nth-of-type(5) { left: 50%; animation-delay: 8s, 3s; }
.snowflake:nth-of-type(6) { left: 60%; animation-delay: 6s, 2s; }
.snowflake:nth-of-type(7) { left: 70%; animation-delay: 2.5s, 1s; }
.snowflake:nth-of-type(8) { left: 80%; animation-delay: 1s, 0s; }
.snowflake:nth-of-type(9) { left: 90%; animation-delay: 3s, 1.5s; }

</style>
