<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Symfony\Component\Console\Input\InputArgument;


class ProductsController extends Controller
{

    public $category=[ "Vegetables","Fruits","Juice","Dried","Frozen Foods","Frozen Foods","Cleaning Supplies ","Paper Products"];
    public $curernt=array();

    public function getProductCategory(){
        return view('addNewProduct',['category'=>$this->category]);
    }

    public function getLatestProduct(){
        $produts=Product::getLatestProduct();
        $count=count($produts);

        return view('home',['products'=>$produts,'count'=>$count]);
    }

    public function showOneProduct($id){
        $product=Product::getProductByid($id);

        return view('showSingleProduct',['product'=>$product,'category'=>$this->category]);

    }

    public function getDataEdit($id){
        try {
            $product=DB::select("SELECT * FROM `products` WHERE id='$id'");
            return view('updateProduct',['products'=>$product]);
        }catch (Exception $e){
            return redirect()->back();
        }


    }

    public function deleteProduct($id){
        $product=Product::getproduct($id);
        $imgNames =explode("~", $product->images);
        for($i=0;$i<count($imgNames )-1;$i++){
            $path="uploads/".$imgNames [$i];
            unlink($path);
        }
        Product::deleteData($id);
        return Redirect::to("/products");
    }

    public function showAllProduct(Request $request){
        $pg=$request->input('pg');

        if ($request->has('id')){
            $x=$request->input('id')-1;

            $product=Product::getProductByCategory($x,$pg);
            return view('products',['products'=>$product[0],'category'=>$this->category,'limit'=>$product[2],'count'=>$product[1]]);
        }else{
            return redirect('home');
        }





    }

    public function updateProduct(Request $request){

        $id=$request->updateItem;
        $images="";
        $path="uploads/";
        $result=  Product::getproduct($id);
        $imgNames =explode("~", $result->images);
        unset($imgNames[count($imgNames)-1]);

        for ($i=0;$i<count($imgNames);$i++){
            unlink("uploads/".$imgNames[$i]);
        }

        for ($i=0;$i<count($request->image);$i++){
            $imageData= json_decode($request->image[$i], true);
            $upload_img = base64_decode($imageData['data']);
            $img = $id . "_" . $imageData['name'];
            $images .= $img . '~';
            $result=file_put_contents($path . $img, $upload_img);
            if (!$result) {
                return view('/addProduct')->with('mess', 'Something went wrong ');
            }
        }

        $data=array(
            "title"=>$request->title,
            "price"=>$request->price,
            "images"=>$images,
            "discription"=>$request->desctiption,
            "category"=> $request->category,
            "discount"=> $request->discount,
            "qty"=> $request->qty
        );

        Product::updatData($id,$data);
        $product=Product::getproduct($id);

        return view('showSingleProduct',['product'=>$product]);
    }

    public function showcart(){

        return view("cart");
    }


    public function addTocart(Request $request,$id){
       // $request->session()->forget('cart');
      //  $request->session()->flush();
        $this->addNewToCart($request,$id,1);


       // dd($request->session()->get('cart'));
        return  redirect("/cart");
    }

    private  function addNewToCart($request,$id,$qty){
        $item=Product::getProductByid($id);

        if($request->session()->has('cart')) {
            $oldcart = $request->session()->get('cart');;
        }else{
            $oldcart=null;
        }

        $cart= new Cart($oldcart);

        $cart->addItem($item,$id,$qty);
        $request->session()->put('cart',$cart);
        $request->session()->save();
    }


    public function  removeFromcart(Request $request, $id){
        if($request->session()->has('cart')) {
            $oldcart = $request->session()->get('cart');;
        }else{
            $oldcart=null;
        }
        $cart= new Cart($oldcart);

        $cart->removeItem($id);
        $request->session()->put('cart',$cart);
        $request->session()->save();
        // dd($request->session()->get('cart'));*/
        return redirect("/cart");
    }

    public function actionProduct(Request $request,$id){
        echo $id;
        echo $request->action;
        echo $request->qty;
        if ($request->action=="acart"){
            $this->addNewToCart($request,$id,$request->qty);
            return redirect("/cart");
        }else{

        }
        print_r($request->query('a'));
    }



    public  function addNewProduct(Request $request)
    {
        $id = uniqid();
        $images="";
        $path = 'uploads/';
        $product = new Product();


        for ($i=0;$i<count($request->image);$i++){
            $imageData= json_decode($request->image[$i], true);
            $upload_img = base64_decode($imageData['data']);
            $img = $id . "_" . $imageData['name'];
            $images .= $img . '~';
            $result=file_put_contents($path . $img, $upload_img);
            if (!$result) {
                return view('/addProduct')->with('mess', 'Something went wrong ');
            }
        }


        try {

            $product->id = $id;
            $product->title = $request->title;
            $product->images = $images;
            $price=(float)$request->price;
            $product->price = $price;
            $product->discription = $request->desctiption;
            $product->category= $request->category;
            $product->discount= $request->discount;
            $qty=(float)$request->qty;
            $product->qty = $qty;
            $product->restqty=$qty;



            $result2 = $product->save();
            if ($result2) {
                return redirect("showProduct/$id");
            }
        } catch (Exception $e) {
            return view('/addProduct')->with('mess', 'Something went wrong ' . $e);
        }




    }




}

