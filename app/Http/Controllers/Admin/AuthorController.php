<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->whereNotNull('user_id')->get();
        return view('admin.author.index', compact('posts'));
    }

    public function active($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $post->active = '1';
            $post->save();
            return redirect()->route('admin.author.index');
        }
    }

    public function noActive($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            $post->active = '0';
            $post->save();
            return redirect()->route('admin.author.index');
        }
    }
}
