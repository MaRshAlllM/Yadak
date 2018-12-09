<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index(Comment $comment)
    {


      $comm = $comment->with(['user','product'])->orderby('created_at','DESC')->paginate(10);


        return view('admin.list_comments')->with('comments',$comm);
    }

    public function delete(Comment $id){

        $id->delete();
        return redirect()->back()->with('message','عملیات با موفقیت انجام شد');

    }

    public function aord(Comment $id){

        $id->status = !$id->status;
        $id->save();
        return redirect()->back()->with('message','عملیات با موفقیت انجام شد');

    }
    public function show(Comment $id){

        return view('admin.edit_comment',compact('id'));

    }
    public function edit(Comment $id){
        $this->validate(request(),[

            'content' => 'required',

        ]);
        $id->content = request()->content;
        $id->save();
        return redirect()->to('/root/comments')->with('message','عملیات با موفقیت انجام شد');

    }

}
