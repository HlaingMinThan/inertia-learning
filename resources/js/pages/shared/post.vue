<template>
    <div>
        <div class="flex mb-2">
            <h1 class="text-2xl text-blue-500 mr-4">
                {{ post.title }}
            </h1>
            <div class="flex text-sm items-center">
                <inertia-link
                    :href="$route('posts.edit', post.id)"
                    class="text-green-500 ml-5"
                    >edit
                </inertia-link>
                <button @click="destroy(post.id)" class="text-red-400 ml-5">
                    Delete
                </button>
            </div>
        </div>
        <div class="mt-5">
            <p class="my-3 text-gray-500">
                {{ post.body }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["post"],
    methods: {
        destroy(id) {
            this.$inertia.form().delete(this.$route("posts.destroy", id), {
                preserveScroll: true //use when redirect same page to remember scroll position
            });
        }
    }
};
</script>

<style></style>
