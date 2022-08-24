<template>
    <header class="w-full text-center text-red-600 text-6xl border-b border-gray-300 bg-green-200">HEADER</header>
    <div class="w-full flex flex-col items-center">
            <h1 class="w-full max-w-6xl mb-6 text-5xl text-gray-700">{{page?.title}}</h1>
            <main v-html="page?.content" class="ck-content max-w-6xl w-full"/>
    </div>
    <footer class="w-full text-center text-red-900 text-6xl border-t border-gray-300 bg-green-50">FOOTER</footer>
</template>

<script>
export default {
    name: "Page",
    props: {
        page: Object,
    },
}
</script>
