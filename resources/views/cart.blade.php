
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Supermartket| cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body class="goto-here">
@include('inc/header')


<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">


                        <?php if(Session::has('cart')){
                            $cart = new \App\Cart(Session::get('cart'));
                            if ($cart->totalQty!=0){
                                ?>
                            <div class="cart-list">
                                <table class="table">
                                    <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Product name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                <?php
                            foreach($cart->items as $item){
                            $imgNames =explode("~", $item['item']->images);
                            ?>

                            <tr class="text-center">
                                <td class="product-remove"><a href="/removeFromCart/{{$item['item']->id}}"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod"><a href="showProduct/{{$item['item']->id}}"> <div class="img" style="background-image:url('/uploads/Products/{{$imgNames[0]}}');"></div></a></td>

                                <td class="product-name">
                                    <a href="showProduct/{{$item['item']->id}}"> <h3>{{$item['item']->title}}</h3>
                                        <p>{{$item['item']->discription}}</p>
                                    </a>
                                </td>

                                <td class="price">LKR {{$item['item']->price}}</td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="number" style="width: 20px!important;height: 40px!important;" class="form-control" min="0" max="{{$item['item']->restqty/1}}" value="{{$item['qty']}}">
                                            &nbsp;Kg &nbsp;
                                    </div>
                                </td>
                                <td>
                                    {{$item['item']->discount}}%

                                </td>
                                <td class="total">LKR {{$item['price']}}</td>
                            </tr>


                        <?php } ?>
                                </tbody>
                            </table>
                            </div>
            </div>
        </div>
                            <div class="row justify-content-end">

            <div class="col-lg-4 mt-5 cart-wrap ">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>

                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>LKR {{$cart->totalPrice}}</span>
        </p>
    </div>
    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    </div>
    </div>

    <?php
                        }else{
                            echo "<h1>Empty...</h1>";
                        }
                        }else{
                           echo "<h1>Empty...</h1>";
                        }
                        ?>
















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

@include('inc/footer')

<script>
    $(document).ready(function(){

        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>

</body>
</html>
