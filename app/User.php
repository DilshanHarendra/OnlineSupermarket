<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','fullName','address','telephone','type','profilePicture', 'email', 'password','username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];

    public static function getuser($id){
        if ($id=="all"){
            $result=DB::table('users')->get();
        }else{
            $result=DB::table('users')->where('id',$id)->first();
        }

        return $result;
    }

    public static function updateUser($id,$data){
        DB::table('users')->where('id',$id)->update($data);
    }
    public static function updatePicture($id,$data){
        DB::table('users')->where('id',$id)->update($data);
    }

    public static function deleteUser($id){
        DB::table('users')->where('id','=',$id)->delete();
    }
}
