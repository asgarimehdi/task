<div x-data="setup()">
    <h2>Posts</h2>
    <template x-for="post in posts" :key="post.id">
        <li x-text="post.title">

        </li>
    </template>
</div>
<script>
    function setup(){
        return{
            search:'',
            posts:[],
            init(){ // mounted vue
                this.getPost();
            },
            getPost (){
                const self=this;
                axios.get("{{route('api.posts')}}").then((res)=>{

                    self.posts=res.data.data;
                    console.log(self.posts)
                }).catch((err)=>console.log(err))
            }
        }

    }
</script>
