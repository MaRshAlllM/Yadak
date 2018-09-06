<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {
        $comm = $comment->get();
        return view('admin.list_comments')->with('comments',$comm);
    }
}
