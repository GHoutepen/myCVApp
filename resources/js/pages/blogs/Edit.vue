<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { edit, update } from '@/actions/App/Http/Controllers/BlogController';
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const props = defineProps<{
    blog: {
        id: number;
        title: string;
        content: string;
        image_path: string;
    };
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit a Blog',
        href: edit(props.blog.id).url,
    },
];

const form = useForm({
    title: props.blog.title,
    content: props.blog.content,
    image: null as File | null,
});

const handleSubmit = () => {
    form.post(update(props.blog.id).url,{
        forceFormData: true,
    })
}

</script>

<template>
    <Head title="Edit your blog post!" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="handleSubmit" class="space-p-4 w-8/12">
                <div class="space-y-2">
                    <label for="title">Title</label>
                    <Input
                        v-model="form.title"
                        type="text"
                        placeholder="Title"
                    />
                    <div type="text-sm text-red-600" v-if="form.errors.title">
                        {{ form.errors.title }}
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="Content">Content</label>
                    <Input
                        v-model="form.content"
                        type="text"
                        placeholder="content"
                    />
                    <div type="text-sm text-red-600" v-if="form.errors.content">
                        {{ form.errors.content }}
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="Image">Image</label>
                    <Input
                        type="file"
                        accept="image/*"
                        @change="form.image = $event.target.files[0]"
                    />
                    <div type="text-sm text-red-600" v-if="form.errors.image">
                        {{ form.errors.image }}
                    </div>
                </div>

                <Button type="submit" :disabled="form.processing">Edit Blog</Button>
            </form>
        </div>
    </AppLayout>
</template>
