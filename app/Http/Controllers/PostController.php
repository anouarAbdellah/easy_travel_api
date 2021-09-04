<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function get_posts()
    {
        $posts = Post::all();
        return response($posts, 200);
    }
    public function saveComment(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'content' => 'required'
        ]);
        $comment = new Comment();
        $comment->name = $request->input('name');
        $comment->content = $request->input('content');
        $comment->post_id = $id;
        $comment->save();
        return response($comment, 200);
    }
    public function posts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        return view('posts.posts')->with('posts', $posts);
    }
    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect(route('posts'))->with('message', 'Supprimé avec succès');
    }
    public function add_post()
    {
        return view('posts.add_post');
    }
    public function save_post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::user()->id;
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $post->image = asset('uploads/' . $filename);
        }
        $post->save();
        return redirect(route('posts'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
    public function edit_post($id)
    {
        $post = Post::find($id);
        return view('posts.edit_post')->with(['post' => $post]);
    }
    public function update_post(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$extension;
            $file->move('uploads/', $filename);
            $post->image = asset('uploads/' . $filename);
        }
        $post->save();
        return redirect(route('posts'))->with('message', 'Enregistrement a été effectué avec succès.');
    }
}
