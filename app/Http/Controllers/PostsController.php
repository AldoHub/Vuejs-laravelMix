<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\DB;

class PostsController extends Controller
{
    //get all the posts
    public function index(){
        $posts = Post::all();
        //$x = \DB::table("posts")->get(); //get all posts
        return response()->json([
            "message" => "Success",
           // "x" => $x,
            "data" => $posts
        ], 200);
    }

    public function show(Request $request, $id){
        
        $post = Post::find($id); 


        return response()->json([
            "message" => "Route Reached",
            "post" => $post
        ], 200);
    }


    public function store(Request $request){
        
        $this->validate(
            $request, [
                "title" => "required",
                "content" => "required"
            ]
        );
        
        //get the values from the Request
        $newPost = new Post();
        $newPost->title = $request->input("title");
        $newPost->content = $request->input("content");

        
        if($newPost->save()){
            return response()->json([
                "message" => "Success",
                "createdPost" => $newPost
            ], 201);
        }else{    
            return response()->json([
                "Error" => "Bad Request",
                "message" => "Post was not saved, a problem ocurred"
            ], 500);
        }



    }


    public function update(Request $request, $id){
        $this->validate(
            $request, [
                "title" => "required",
                "content" => "required"
            ]
        );
        
        //get the values from the Request
        $editedPost = Post::find($id);
        $editedPost->title = $request->input("title");
        $editedPost->content = $request->input("content");

        
        if($editedPost->save()){
            return response()->json([
                "message" => "Success",
                "editedPost" => $editedPost
            ], 200);
        }else{    
            return response()->json([
                "Error" => "Bad Request",
                "message" => "Post was not saved, a problem ocurred"
            ], 500);
        }

       
        return response()->json([
            "message" => "Route Reached",
            
        ], 200);
    }

    public function delete(Request $request, $id){
        $postToDelete = Post::find($id);
        if($postToDelete->delete()){
            return response()->json([
                "message" => "Post Deleted", 
                "postID" => $postToDelete
            ], 200);
        }else{
            return response()->json([
                "message" => "Internal Error, post was not deleted", 
                "postID" => $postToDelete
            ], 500);
        }
     
    }
}
