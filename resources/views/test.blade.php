<?php
$id="i1";
$cart=array($id=>array("details",1));

$cart[$id]=array("details2",1);
$cart["i2"]=array("details3",1);


$qty=$cart[$id][1]+1;
echo $qty;

$cart[$id]=array("details",$qty);

dd($cart);



    ?>



