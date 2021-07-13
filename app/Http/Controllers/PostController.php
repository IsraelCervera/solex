<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index()
    {
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.post.create');
    }


    public function store(StoreRequest $request)
    {

        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/slug"),$image_name);
        }
        $post = Post::create($request->all()+[
            'slug'=>$image_name,
        ]);

        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        //$post = Post::findOrFail($post);
        return view('admin.post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }


    public function update(UpdateRequest $request, Post $post)
    {
        if($request->hasFile('picture')){
            $file = $request->file('picture');
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/slug"),$image_name);
        }
        $post->update($request->all()+[
            'slug'=>$image_name,
        ]);

        return redirect()->route('admin.post.index');
}


    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
