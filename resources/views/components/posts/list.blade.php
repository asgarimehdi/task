<div>
    <h2>Posts</h2>
    <input x-model="search" placeholder="Search ... " class="my-4 p-1 px-4 rounded-tl-full rounded-br-full">
    <template x-for="post in searchItem" :key="post.id">
        <li x-text="`${post.id} - ${post.title}`">

        </li>
    </template>
    <button class="bg-blue-500 mt-3 py-1 px-4 rounded-tl-full rounded-br-full text-white disabled:bg-blue-200" @click="getPost" :disabled="nextPageUrl===null">
        Read More
    </button>
</div>
