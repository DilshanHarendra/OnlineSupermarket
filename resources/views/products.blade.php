<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop|Supermarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>

<style>
.span{
    background-color: greenyellow !important;
    color: white !important;
    font-weight: bold;
}


</style>

<body class="goto-here">
@include('inc.header')




<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    @if(app('request')->input('id')==null)
                        <li><a href="shop?id=0&pg=1"  class="active">All</a></li>
                    @else
                        <li><a href="shop?id=0&pg=1" id="L0" >All</a></li>
                    @endif
                    @for($i=0;$i<count($category); $i++)

                        <li><a href="shop?id={{$i+1}}&pg=1"  id="L{{$i+1}}" >{{$category[$i]}}</a></li>
                    @endfor



                </ul>
            </div>
        </div>
        <div class="row">
            @if($count!=0)
            @foreach($products as  $product)
                <?php

                    $imgNames =explode("~", $product->images);

                    ?>
                    <h2 style="text-align: center;color: red">
                        @if($count==0)
                            {{"No Products"}}
                        @endif
                    </h2>


                    <div class="col-md-6 col-lg-3 ">
                        <div class="product">
                            <a href="showProduct/{{$product->id}}" class="img-prod"><img class="img-fluid" src="/uploads/{{$imgNames[0]}}" alt="Colorlib Template">
                                @if($product->discount!=0)
                                <span class="status">{{$product->discount}}%</span>
                                @endif
                                    <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="#">{{$product->title}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        @if($product->discount!=0)
                                            <p class="price"><span class="mr-2 price-dc">{{$product->price}} LKR</span>
                                                <span class="price-sale">{{ round($product->price-(($product->price*$product->discount)/100),2)}} LKR</span></p>
                                        @else
                                            <p class="price"><span class="price-sale">{{round($product->price)}} LKR</span></p>
                                        @endif

                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">

                                        <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @endforeach
            @else
            <h1>No results</h1>

            @endif


















        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>

                        <?php
                        if(app('request')->input('pg')-1 >= 1){
                        $pg=app('request')->input('pg')-1;
                        ?>
                            <li><a href="shop?pg={{$pg}}&id={{app('request')->input('id')}}">&lt;</a></li>
                        <?php  } ?>
                        @for($x=1;$x<(($count/$limit)+1);$x++)

                            @if(app('request')->input('id')==null)

                                @if(app('request')->input('pg')==$x)
                                    <li><a href="shop?pg={{$x}}"><span class="span" >{{$x}}</span></a></li>
                                @else
                                    <li><a href="shop?pg={{$x}}">{{$x}}</a></li>
                                @endif

                            @else
                                @if(app('request')->input('pg')==$x)
                                    <li><a href="shop?id={{app('request')->input('id')}}&pg={{$x}}"><span class="span" >{{$x}}</span></a></li>
                                @else
                                    <li><a href="shop?id={{app('request')->input('id')}}&pg={{$x}}">{{$x}}</a></li>
                                @endif

                            @endif


                        @endfor
                        <?php
                        if(app('request')->input('pg')+1<(($count/$limit)+1)){
                            $pg=app('request')->input('pg')+1;
                        ?>
                        <li><a href="shop?pg={{$pg}}&id={{app('request')->input('id')}}">&gt;</a></li>
                       <?php  } ?>



                    </ul>



                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>




@include('inc.footer')
<script >
    document.getElementById('shop').setAttribute('class','nav-link active');
    try{
        var x= parseInt('<?php echo(app('request')->input('id')); ?>'.toString().trim());


        if (x!=null){

            document.getElementById('L'+x).setAttribute('class','active');
        }
    }catch (e) {

    }



</script>


</body>
</html>
