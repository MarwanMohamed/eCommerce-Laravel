<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Item;
use Image;

class UsersController extends Controller
{
    public function index()
    {   
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.show', compact('users'))->withTitle('Users');
    }

    public function create()
    {
        //
    }

    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->active = 1;
        $photo = $request->photo;

        if ($photo) {
            $path = 'img/uploades';
            $name = date('Y_m_d') .'_'. time() .'_' . $photo->getClientOriginalName();
            $user->photo = $name;
            $photo->move($path, $name);
            $img = Image::make($path.'/'.$name)->fit(30)->save($path.'/thumb/'.'tn_'.$name);
            $user->thum_photo = 'tn_' .$name;

        }else {
            $user->photo = 'nophoto.jpg';
            $user->thum_photo = 'tn_nophoto.jpg';
        }

        $user->save();
        \Session::flash('message', 'User Added Successfully');
        return redirect('admin/users');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'))->withTitle('Edit');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'password' => 'min:6|confirmed',
            'image' => 'mimes:jpg,jpeg,png',
            'permission' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->isAdmin = $request->permission;
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
        \Session::flash('message', 'User Edited Successfully');
        return redirect('admin/users');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(file_exists('img/uploades/'.$user->photo) && file_exists('img/uploades/thumb/'.$user->thum_photo)) {
            unlink('img/uploades/'.$user->photo);
            unlink('img/uploades/thumb/'.$user->thum_photo);
        } 

        $user->delete();
        \Session::flash('message', 'User Deleted Successfully');
        return redirect('admin/users');
    }

    public function active($id)
    {
        $user = User::findOrFail($id);
        $user->active = 1;
        $user->save();
        return redirect('admin/users');
    }

    public function ads($id){
        $ads = Item::where('user_id', $id)->paginate(10);
        $user = User::findOrFail($id);
        return view('admin.users.ads', compact('ads', 'user'))->withTitle('User Ads');
    }
}
