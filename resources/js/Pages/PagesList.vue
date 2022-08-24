<template>
    <SecondaryButton @click="onNewPage" class="m-10">New Page</SecondaryButton>
    <PagesListItem v-for="page in pages" v-bind:key="page.id" :page="page" class="mx-10 my-3"/>
</template>

<script>
import PagesListItem from "../CustomComponent/PagesListItem.vue"
import SecondaryButton from "../Components/SecondaryButton.vue";
export default {
    name: "PagesList",
    props: {
        pages: Array,
    },
    components: {
        SecondaryButton,
        PagesListItem,
    },
    methods: {
        onNewPage(){
            this.$inertia.get('/page/create');
        }
    }
}
</script>

