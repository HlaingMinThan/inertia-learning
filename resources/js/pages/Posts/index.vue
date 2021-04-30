<template>
    <div>
        <flash />
        <input
            type="search"
            class="border border-gray-400 p-2 w-full"
            v-model="search"
            @keyup="searchPosts"
            placeholder="filter posts"
        />
        <!-- create post button -->
        <div class="my-8">
            <inertia-link
                :href="$route('posts.create')"
                class="p-2 rounded text-white  bg-green-500"
                >Create Post
            </inertia-link>
        </div>

        <!-- all posts -->
        <div v-for="post in posts.data" :key="post.id">
            <post :post="post" />
        </div>

        <pagination :links="posts.links" />

        <!-- dynamically reduce page component -->
        <!-- <pagination
            :links="posts.links"
            :postsExists="!!posts.data.length"
            :current_page="posts.current_page"
        /> -->
    </div>
</template>

<script>
import flash from "../shared/flash.vue";
import post from "../shared/post.vue";
import pagination from "../shared/pagination.vue";
export default {
    props: ["posts", "filter"],
    components: { flash, post, pagination },
    data() {
        return {
            search: this.filter //remember  filter after rerendering
        };
    },
    methods: {
        searchPosts() {
            this.$inertia.get(
                "/posts",
                { search: this.search },
                { preserveState: true }
            );
        }
    }
};
</script>
