<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function userProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.user_profile', compact('user'));
    }
    public function userProfileStore(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->file('photo')){
            $file= $request->file('photo');
            $fileName = date('YmdHi'). $file->getClientOriginalName();
            if($user->profile_photo_path){
                unlink(public_path('uploads/frontend_images/'.$user->profile_photo_path));
            }
            $file->move(public_path('uploads/frontend_images/'),$fileName);
            $user->profile_photo_path = $fileName;
        }
        $user->save();

        $notification = array(
            'message' => "User Profile has updated successfully",
            'alert-type' => "success",
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function userChangePassword()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.change_password' , compact('user'));
    }
    public function userPasswordStore(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::user()->id);

        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message' => "User Profile has updated successfully",
                'alert-type' => "success",
            );
            return redirect()->route('login')->with($notification);

        }
        else{
            return redirect()->back();
        }
    }
}
