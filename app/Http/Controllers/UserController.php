<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('user.account', compact('user'));
    }

    public function accountUpdate(Request $request){
        $user = Auth::user();

        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => ['required', 'string', 'max:16'],
            'avatar' => ['required', 'mimes:jpeg,bmp,png'],
        ]);

        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(60, 60)->save( public_path('avatars\avatars' . $filename) );
        }
        $user->firstName = $request->firstName;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->avatar = $filename;
        $user->save();
        return redirect('profile')->with('success', 'Данные сохранены');
    }

    public function users(){
        $users = User::all();
        return view('user.users', compact('users'));
    }

    function changeRole(Request $request){
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->save();
        return 'ok';
    }

    function changeBan(Request $request){
        $user = User::find($request->id);
        $user->ban = !$user->ban;
        $user->save();
        return $user->ban ? '1' : '0';
    }
}
