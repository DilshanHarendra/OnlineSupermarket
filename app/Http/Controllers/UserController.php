<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    function getprofile($id)
    {
        $user = User::getuser($id);

        return view('profile', ['data' => $user]);

    }

    function updatePicture(Request $request){
        $id= Auth::user()->id;
        $path="uploads/ProfilePicture/";
        $cdata=User::getuser($id);
        $cImage=$cdata->profilePicture;
        if ($cImage!="profileAvetar.jpg"){
           unlink($path.$cImage);
        }
        $imageData= json_decode($request->Pimage, true);
        $upload_img = base64_decode($imageData['data']);
        $img = $id . "_" . $imageData['name'];
        $result=file_put_contents($path . $img, $upload_img);
        if (!$result) {
            return   back()->withErrors(['Something went wrong ']);
        }else{
            $data=[
                'profilePicture'=>$img
            ];
            User::updateUser($id,$data);
            return back()->withErrors(['Successfully Updated']);
        }

    }

    function updateProfile(Request $request){
        $id= Auth::user()->id;
            $data=[
                'fullName'=>$request->fullname,
                'email'=>$request->mail,
                'address'=>$request->address,
                'telephone'=>$request->telephone
            ];
            User::updateUser($id,$data);
            return back()->withErrors(['Successfully Updated']);

        }

    function updatePassword(Request $request){


        $validate=$request->validate([
            'cpass' => ['required', 'string', 'min:8'],
            'npass1' => ['required', 'string', 'min:8'],
        ],[
            'cpass.min' => 'Old password has 8 characters',
            'npass1.min' => 'New password field must have 8 characters',
        ]);

        $id=Auth::user()->id;
        $cpassword= User::getuser($id)->password;
        if (Hash::check($request->cpass,$cpassword)){
             User::updateUser($id,['password'=>Hash::make(trim($request->npass1))]);
           return back()->withErrors(['Successfully Updated']);
        }else{
            return back()->withErrors(['Current Passowrd is Incorrect']);
        }


    }

}
