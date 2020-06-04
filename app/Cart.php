<?php


namespace App;


class Cart
{
 public $items=array();
 public $totalQty=0;
 public $totalPrice=0;

 public function __construct($oldcart)
 {
     if ($oldcart!=null){
         $this->items=$oldcart->items;
         $this->totalQty=$oldcart->totalQty;
         $this->totalPrice=$oldcart->totalPrice;
     }

 }

 public function addItem($item,$id,$qty){
   $storedItems=['qty'=>0,'price'=>0,'item'=>$item];


       if (array_key_exists($id,$this->items)){
           $storedItems=$this->items[$id];
       }else{
         $this->totalQty++;
     }
   $storedItems['qty']=$storedItems['qty']+$qty;
       $tot=$item->price*$qty;
       $ftot=round( $tot-(($tot*$item->discount)/100),2);
   $storedItems['price']+=$ftot;
   $this->items[$id]=$storedItems;

   $this->totalPrice+=$ftot;

 }

public function removeItem($id){
     if (count($this->items)!=1){
         if (array_key_exists($id,$this->items)){

             $this->totalQty--;
             $this->totalPrice=$this->totalPrice-($this->items[$id]['price']);
             unset($this->items[$id]);
         }
     }else{
         if (array_key_exists($id,$this->items)){
             $this->items=array();
             $this->totalQty=0;
             $this->totalPrice=0;
         }
     }

}


}
