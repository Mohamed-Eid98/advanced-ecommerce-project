<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view' , compact('adminData'));
    }
    public function adminProfileEdit()
    {
        $editData = Admin::find(1);

        return view('admin.admin_profile_edit' , compact('editData'));
    }
    public function adminProfileStore(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo')){
            $file= $request->file('profile_photo');
            $fileName = date('YmdHi'). $file->getClientOriginalName();
            if($data->profile_photo_path){
                unlink(public_path('uploads/images/'.$data->profile_photo_path));
            }
            $file->move(public_path('uploads/images'),$fileName);
            $data->profile_photo_path = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => "Admin Profile has updated successfully",
            'alert-type' => "success",
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminPasswordChange()
    {
        return view('admin.admin_change_password');
    }
    public function adminPasswordStore(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        $oldHashPassword = Admin::find(1)->password;
        if(Hash::check($request->old_password, $oldHashPassword)){
            $data = Admin::find(1);
            $data->password = Hash::make($request->new_password);
            $data->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }

        else{
            return redirect()->back();
        }

    }


}
