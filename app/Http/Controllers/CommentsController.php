<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comment;

class CommentsController extends Controller
{
    public function index()
    {
    	$comments = Comment::orderBy('id','desc')->paginate(10);
    	return view('admin.comments.show', compact('comments'))->withTitle('Comments');
    }

    public function edit($id)
    {
    	$comment = Comment::findOrFail($id);
    	return view('admin.comments.edit', compact('comment'))->withTitle('Edit Comment');
    }

     public function update(Request $request, $id)
    {
    	$this->validate($request, ['comment' => 'required|min:3']);
    	$comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;
		$comment->save();

        \Session::flash('message', 'Comment successfully edited');
        return redirect('admin/comments');
    }

    public function destroy($id)
    {
    	$comment = Comment::findOrFail($id)->delete();
		\Session::flash('message', 'Comment successfully Deleted');
        return redirect('admin/comments');    
    }
}
