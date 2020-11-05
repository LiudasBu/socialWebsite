<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');    
    }


    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'full_text' => 'required',
        ]);


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'full_text' => $data['full_text'],
        ]);
        
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        
        return view('posts.show',compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/profile/' . $post->user->id);
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);  
        $data = request()->validate([
            'caption' => 'required',
            'full_text' => 'required',
        ]);

        $post->update($data);

        return redirect("/profile/{$post->user_id}");
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }
}
