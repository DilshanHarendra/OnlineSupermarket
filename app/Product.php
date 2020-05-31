<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public static function getProductByid($id){
        if ($id=="all"){
            $result=DB::table('products')->get();
            $count=count($result);
            return [$result,$count];
        }else{
            $result=DB::table('products')->where('id',$id)->first();

            return $result;
        }

    }

    public static function getProductByCategory($id,$pg){
        $limit=4;
        if ($pg==1){
            $skip=1;
        }else{
            $skip=($pg-1)*$limit;
        }
        if ($id==-1){
            $result=DB::table('products')->skip($skip)->take($limit)->get();
            $count=DB::table('products')->count();

        }else{

            $result=DB::table('products')->where('category',$id)->skip($skip)->take($limit)->get();
            $count=DB::table('products')->where('category',$id)->count();

        }
        return [$result,$count,$limit];
    }

    public static function getLatestProduct(){
        $result=DB::table('products')->orderByDesc('updated_at')->limit(8)->get();
        return $result;
    }

    public static  function inserData($data){
        DB::table('products')->insert($data);
    }

    public static function updatData($id,$data){
        DB::table('products')->where('id',$id)->update($data);
    }

    public  static function deleteData($id){
        DB::table('products')->where('id','=',$id)->delete();
    }
}

