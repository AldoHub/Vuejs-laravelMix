<template>
<div>
  
    <h1>{{post.title}}</h1>
    <div>
        {{post.content}}
    </div>
    <hr />
    <div>
       <button @click="deletePost">Delete Post</button> 
      <form @submit="createPost" method="post">
            <div class="form-control">
                <label for="title">Title</label>
                <input type="text" name="postTitle" v-model="postTitle" />    
            </div>
            <div class="form-control">
                <label for="content">Content</label>
                <textarea name="postContent" v-model="postContent"></textarea>    
            </div>      
            <input type="submit" value="send" />
        </form>
    </div>
</div>
</template>

<script>
export default {
    data(){
        return {
            post: "",
            postTitle: "",
            postContent: ""
        }
    },
    methods:{
           createPost: function(e){
             e.preventDefault();
              let self = this;
            
              axios.put(`/api/post/${self.$route.params.id}`, {
                title: self.postTitle,
                content: self.postContent
             })
             .then(response => {
                 console.log(response);
                 self.postTitle="";
                 self.postContent="";
              self.post = response.data.editedPost
             })
             .catch(err => console.log(err));
            },
            deletePost: function(){
                
                axios.delete(`/api/post/${this.$route.params.id}`)
                .then(response =>{
                    console.log(response);
                    this.$router.push('/');
                })
                .catch(err => console.log(err));
            }
    },
    mounted(){
       
        axios.get(`/api/post/${this.$route.params.id}`)
        .then(response =>{
           
            this.post = response.data.post
        })
        .catch(err => console.log(err));
    }
}

</script>