<template>
    <div>
        <form @submit.prevent="update">
            <div class="mb-6">
                <h1 class="text-3xl mb-6">Create Post</h1>
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="title"
                >
                    title
                </label>
                <input
                    type="text"
                    class="border border-gray-400 p-2 w-full"
                    v-model="form.title"
                />
                <p class="text-red-500 text-xs mt-2" v-if="form.errors.title">
                    {{ form.errors.title }}
                </p>
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="body"
                >
                    body
                </label>

                <textarea
                    v-model="form.body"
                    class="border border-gray-400 p-2 w-full"
                    name="body"
                    id="body"
                    required
                ></textarea>

                <p class="text-red-500 text-xs mt-2" v-if="form.errors.body">
                    {{ form.errors.body }}
                </p>
            </div>
            <div class="mb-6 flex">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-500"
                >
                    <div class="flex">
                        <div>
                            <loading v-show="form.processing" />
                        </div>
                        <div>update</div>
                    </div>
                </button>
                <inertia-link
                    :href="$route('posts.index')"
                    class="bg-gray-400 ml-5 text-white rounded  px-5 py-3 hover:bg-gray-600"
                    >Back
                </inertia-link>
            </div>
        </form>
    </div>
</template>

<script>
import loading from "../shared/loading";
export default {
    props: ["post"],
    components: { loading },
    data() {
        return {
            form: this.$inertia.form({
                title: this.post.title,
                body: this.post.body
            })
        };
    },
    methods: {
        update() {
            this.form.patch(this.$route("posts.update", this.post.id));
        }
    }
};
</script>

<style></style>
