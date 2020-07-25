<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $posts=Post::orderBy('created_at','asc')->paginate(3);

        return view('posts.index')->with('posts',$posts);
    }
    public function userIndex($id)
    {
        $user=User::find($id);
        $posts=$user->posts()->orderBy('created_at','asc')->paginate(3);
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // validation
        $validatedData=$request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        //inserting to database
        $post = new Post();
        $post->title=request('title');
        $post->subtitle=request('subtitle');
        $post->body=request('body');
        $post->user_id=Auth()->user()->id;
        $post->save();
        
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function show(Post $post)
    {
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function edit(Post $post)
    {
        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Unauthorized Page');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Post $post)
    {
        // validation
        $validatedData=$request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        
        $post->title=request('title');
        $post->subtitle=request('subtitle');
        $post->body=request('body');
        $post->save();

        return redirect('/posts/'. $post->id)->with('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
    *
    * @param  \App\Post  $post
    * @return \Illuminate\Http\Response
    */
    public function destroy(Post $post)
    {
        $post->delete();//   ?!
        return redirect('/posts')->with('success','post deleted');
    }
}
