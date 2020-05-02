<template>
   <div>
       <h2>Posts Component</h2>
        <div class="postsContainer">
            <div v-for="post in posts" v-bind:key="post.id">
                <div class="post">
                    <h3>{{post.title}}</h3>
                    <div>{{post.content}}</div>
                    <div>
                        <router-link :to="{ name: 'post', params: { id: post.id }}">Read More</router-link>
                    </div>
                </div>
            </div>
        </div>
   </div>
</template>

<script>

    export default {
        data(){
            return {
                posts: ""
            }
        },
        mounted() {
            axios.get("/api/posts/")
            .then(response => {
                this.posts = response.data.data;
                console.log(this.posts);
            })
            .catch(err => console.log(err));
        }
    }
</script>
