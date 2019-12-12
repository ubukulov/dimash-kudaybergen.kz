<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('comments.id', 'DESC')
                ->select('users.*', 'comments.*')
                ->join('users', 'users.id', '=', 'comments.user_id')
                ->get();
        return view('admin.comment.index', compact('comments'));
    }

    public function active($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment) {
            $comment->status = '1';
            $comment->save();
            return redirect()->route('admin.comment.index');
        }
    }

    public function noActive($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment) {
            $comment->status = '0';
            $comment->save();
            return redirect()->route('admin.comment.index');
        }
    }
}
