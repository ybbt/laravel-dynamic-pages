<template>
    <div class="w-full flex justify-between">
        <div class="grow bg-amber-100 pt-10 px-4">
            <NavLink :href="'/pages'" class="p-2 text-sm text-gray-700 underline bg-gray-50">
                Pages
            </NavLink>
            <h1 class="text-indigo-500 text-center my-20">Left Side Menu</h1>
        </div>
        <div class="max-w-6xl bg-gray-50">
            <ValidationErrors class="m-10" />

            <h1 class="text-red-600 w-full text-center my-5">Page editor</h1>

            <div v-if="page">
                <Label class="ml-2">Page Link</Label>
                <NavLink :href="'/page/' + page.slug" class="ml-2">{{ page.title }}</NavLink>
            </div>

            <form @submit.prevent="onSubmit">
                <div class="my-4">
                    <Label class="ml-2">Title*</Label>
                    <Input :modelValue="title" v-model="title" class="w-1/2 pl-2 m-2 border border-gray-300"/>
                </div>
                <div class="my-4">
                    <Label class="ml-2">Slug*</Label>
                    <Input :modelValue="slug" v-model="slug" class="w-1/2 pl-2 m-2 border border-gray-300"/>
                </div>
                <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                <Button type="submit">Save</Button>
            </form>
        </div>
        <div class="grow bg-amber-200 p-5">
            <Button @click="onSubmit">Save</Button>
            <h1 class="text-indigo-500 text-center my-20">Right Side Menu</h1>
        </div>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue';
import Editor from 'ckeditor5-custom-build-extra-full/build/ckeditor';
import {useForm} from "@inertiajs/inertia-vue3";
import Button from "../Components/Button.vue";
import Input from "../Components/Input.vue";
import Label from "../Components/Label.vue";
import NavLink from "../Components/NavLink.vue";
import ValidationErrors from "../Components/ValidationErrors.vue";

export default {
    name: "Editor",
    components: {
        ValidationErrors,
        NavLink,
        Label,
        Input,
        Button,
        ckeditor: CKEditor.component
    },
    data() {
        return {
            // editor: ClassicEditor,
            editor: Editor,
            editorData: this.page?.content,
            title: this.page?.title,
            slug: this.page?.slug,
            editorConfig: {
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    uploadUrl: '/image/upload',

                    // Enable the XMLHttpRequest.withCredentials property.
                    withCredentials: true,

                    // Headers sent along with the XMLHttpRequest to the upload server.
                    headers: {
                        'X-CSRF-TOKEN': this.csrf_token,
                    }
                }
            }
        };
    },
    methods: {
        onSubmit(){
            let formData = useForm({
                content: this.editorData,
                title: this.title,
                slug: this.slug,
            })
            if (!this.page){
                this.$inertia.post('/page/store', formData, );
            } else {
                this.$inertia.post(`/page/update/${this.page.slug}`, formData, );
            }
        }
    },
    props: {
        page: Object,
        csrf_token: String,
        errors: Object,
    }
}
</script>


