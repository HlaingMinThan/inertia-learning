<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, key) in links">
                <div
                    v-if="link.url === null"
                    :key="key"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label"
                />
                <inertia-link
                    v-else
                    :key="key"
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:border-blue-500  focus:border-indigo-500 focus:text-indigo-500"
                    :class="{ 'bg-blue-500 text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script>
export default {
    props: ["links"]

    /* 
    watch paginated posts exists or not if not exists,reduce page minus 1
    if user delete all paginated posts on current page,dynamically reduce page page minus 1

     props: ["links", "postsExists", "current_page"],
     watch: {
         postsExists() {
             if (this.current_page !== 1) {
                 this.$inertia.get("posts?page=" + (this.current_page - 1));
             }
         }
     }*/
};
</script>
