<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\Comment;
use App\Item;
use App\User;
use Image;

class SiteController extends Controller
{

	public function index() {
		$items = Item::where('approve', 1)->orderBy('id', 'Acs')->paginate(12);
    	return view('site.index', compact('items'));
	}

    public function adding() {
    	$categories = Category::where('visibility', 1)->get();
		return view('site.addItem', compact('categories'))->withTitle('Add Advertising');
    }

    public function item($id) {
    	$item = Item::findOrFail($id);
    	$comments = Comment::where('item_id', $id)->orderBy('id', 'ACS')->get();
    	return view('site.item', compact('item', 'comments'))->withTitle('Add Advertising');
    }

    public function addComment(Request $request) {
    	$this->validate($request, ['comment' => 'required']);
    	$comment = new Comment;
    	$comment->comment = $request->comment;
    	$comment->user_id = $request->user_id;
    	$comment->item_id = $request->item_id;
    	$comment->save();
    	return back();
    }

    public function user($id) {
    	$user = User::findOrFail($id);
    	return view('site.user', compact('user'))->withTitle('Settings');
    }

    public function updateUser(Request $request, $id) {
    	$this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
         if ($request->password === '') {
            $user->password = $user->password;
        }else{
            $user->password = bcrypt($request->password);
        }
        $photo = $request->photo;

        if($photo !== null)  {
            if(file_exists('img/uploades/'.$user->photo) && file_exists('img/uploades/thumb/'.$user->thum_photo)) {
                unlink('img/uploades/'.$user->photo);
                unlink('img/uploades/thumb/'.$user->thum_photo);
            }   
            $path = 'img/uploades';
            $name = date('Y_m_d') .'_'. time() .'_' . $photo->getClientOriginalName();
            $user->photo = $name;
            $photo->move($path, $name);
            $img = Image::make($path.'/'.$name)->fit(30)->save($path.'/thumb/'.'tn_'.$name);
            $user->thum_photo = 'tn_' .$name;
        }
        $user->save();
        \Session::flash('message', 'Edited Successfully');
        return back();
    }
}
