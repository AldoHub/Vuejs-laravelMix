<template>
    <div>
        <h2>AddPosts Component</h2>
    
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



</template>

<script>

    export default {
        data(){
            return {
                postTitle: "",
                postContent: ""
            }
        },
        methods:{
          
            createPost: function(e){
             e.preventDefault();
              let self = this;
            
              axios.post("/api/posts/", {
                title: self.postTitle,
                content: self.postContent
             })
             .then(response => {
                 console.log(response);
                 self.postTitle="";
                 self.postContent="";
              
             })
             .catch(err => console.log(err));
            }
        },
        mounted() {
          console.log("AddPost Component mouted");
        }
    }
</script>
