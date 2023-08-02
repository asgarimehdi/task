<div x-data="setup()">
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
<script>
    function setup(){
        return{
            search:'',
            nextPageUrl:null,
            posts:[],
            init(){ // mounted vue
                this.getPost();
            },
            get searchItem(){
                if(this.search===null){
                    return this.posts;
                }
                return this.posts.filter((item)=>{
                    return item.title.toLowerCase().includes(this.search.toLowerCase());
                })
            },
            getPost (){
                const self=this;
                let url= self.nextPageUrl ?? "{{route('api.posts')}}";
                axios.get(url).then((res)=>{
                    self.posts=self.posts.concat(res.data.data);
                    self.nextPageUrl=res.data.next_page_url;
                    console.log(self.posts)
                }).catch((err)=>console.log(err))
            }
        }

    }
</script>
