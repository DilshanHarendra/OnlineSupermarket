<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
            return   back()->with('errmess', 'Something went wrong ');
        }else{
            $data=[
                'profilePicture'=>$img
            ];
            User::updateUser($id,$data);
           return back()->with('mess', 'Profile Updated');
        }

       





    }

}
