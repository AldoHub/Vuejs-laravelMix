<template>
<div>
    <nav>
      <ul>
      <li><router-link to="/">Posts</router-link></li>
      <li><router-link to="/addposts">Add Post</router-link></li>
      </ul>
    </nav>
    <h1>Vue-Laravel Posts</h1>
    <router-view></router-view>
</div>
</template>

<script>
import VueRouter from 'vue-router';
import PostsComponent from "./PostsComponent";
import AddPostsComponent from "./AddPostsComponent";
import PostComponent from "./PostComponent";

//add the routes
const routes = [
     { path: '/', component: PostsComponent },
     { path: '/addposts', component: AddPostsComponent },
     { path: '/post/:id', component: PostComponent, name: "post" },
]

const router = new VueRouter({routes});

    export default {
        router,
      
    }
</script>
