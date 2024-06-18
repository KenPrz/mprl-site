<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Create Blog" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Blog</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex">
                </div>
                <div class="flex justify-end">
                    <Link class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" :href="route('admin.blog.index')">
                        Back
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <QuillEditor toolbar="essential" v-model:content="form.content" theme="snow"/>
                    </div>
                </div>
                {{ form.content.ops }}
                <div class="flex justify-end mt-4">
                    <button class="bg-main-400 px-2 py-1 rounded-md text-white hover:bg-main-500 mb-2" @click="submitBlog">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { QuillDeltaToHtmlConverter } from 'quill-delta-to-html';
    export default {
        data(){
            return {
                form: {
                    images: [],
                    title: '',
                    content: ''
                }
            }
        },
        methods: {
            submitBlog(){
                try {
                    const converter = new QuillDeltaToHtmlConverter(this.form.content.ops, {});
                    this.form.content = converter.convert();
                    this.$inertia.post(route('admin.blog.store'), this.form)
                } catch (error) {
                    console.log(error) 
                }
            },
        }
    }
</script>
