<template>
    <div>
        <NavLink :href="'page/'+page.slug" class="w-80">{{ page.title }}</NavLink>
        <SecondaryButton @click="onEdit" class="mx-2">Edit</SecondaryButton>
        <SecondaryButton @click="onDelite" class="mx-2">Delite</SecondaryButton>
    </div>
</template>

<script>
import SecondaryButton from "../Components/SecondaryButton.vue";
import NavLink from "../Components/NavLink.vue";
export default {
    name: "PagesListItem",
    components: {NavLink, SecondaryButton},
    props: {
        page: Object,
    },
    methods: {
        onEdit(){
            this.$inertia.get(`/page/edit/${this.page?.slug}`);
        },
        onDelite(){
            this.$inertia.delete(`/page/destroy/${this.page?.slug}`);
        }
    },
}
</script>


