<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {

        $allPosts = Post::orderBy('created_at')->paginate(2); 
        //dd($allPosts);    
        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postSlug)
    {
        
        $post = Post::where('slug', $postSlug)->first();
       
        $id = $post->user_id;       
        $user = User::find($id);

        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(StorePostRequest $request) 
    {
        
    
        $requestData = $request->all();
        Post::create($requestData);
        return redirect()->route('posts.index');
    }






    public function edit($postSlug){
        $post = Post::where('slug', $postSlug)->first();
      
        
       
        return view('posts.edit' , [
            'post' => $post,
            'users' => User::all()
        ]);
   
        
    }

    public function update(Post $post , UpdatePostRequest $request){
          
        $requestData = $request->all();   
       
        
        $post->update($requestData);
        return redirect()->route('posts.index');
    }


    public function destroy(Post $post){

        

        $post->delete();
        
       
        return redirect()->route('posts.index');
    }
}
