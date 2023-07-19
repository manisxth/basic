<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
      public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
                $notification = array(

            'message'=>'log out successfully',
            'alert-type'=> 'success'
    );

        return redirect('/login')->with($notification);
    }//End method


    public function profile(){
       $id = Auth::user()->id;
       $adminData = User::find($id); 
        return view('admin.admin_profile_view',compact('adminData'));


    }//End User

    public function EditProfile(){
       $id = Auth::user()->id;
       $editData = User::find($id); 
       return view('admin.admin_edit_view',compact('editData'));


}

 public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();


        $notification = array(

            'message'=>'admin profile updated successfully',
            'alert-type'=> 'success'
    );

        return redirect()->route('admin.profile')->with($notification);

    }// End Method

  public function ChangePwd(){
  return view('admin.admin_password_change');


  }


  public function UpdatePassword(Request $request){

   $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

  $hashedPassword = Auth::user()->password;
  if(Hash::check($request->oldpassword,$hashedPassword)){
     $users = User::find(Auth::id());
     $users->password = bcrypt($request->newpassword);
       $users->save();


     session()->flash('message','password updated successfully');
     return redirect()->back();

  } else{
    session()->flash('message','old password is not match');
     return redirect()->back();


  }


  }





  }
