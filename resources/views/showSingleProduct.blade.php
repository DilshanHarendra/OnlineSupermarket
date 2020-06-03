<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $product->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .card{text-align: center; border: none; border-radius: 5px;-webkit-box-shadow: 12px 14px 22px 2px rgba(0,0,0,0.75);
            -moz-box-shadow: 12px 14px 22px 2px rgba(0,0,0,0.75);
            box-shadow: 12px 14px 22px 2px rgba(0,0,0,0.75);
            margin-bottom: 100px;
        }
        .border{
            border: 1px solid rgba(0,0,0,0.5)
        }
   </style>
</head>

<body>
@include('inc/header')












<div class="container mt-5">
    <div class="row">
        <div class="col-md-12"> {{$product->category}}</div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border" >
                    <div class="carousel-item active"> <img class="d-block w-100" src="/images/product-1.jpg" alt="First slide"> </div>
                    <div class="carousel-item"> <img class="d-block w-100" src="/images/product-2.jpg" alt="Second slide"> </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <button class="btn btn-dark">< </button>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">

                    <button class="btn btn-dark">> </button>
                </a>
            </div>
        </div>


        <div class="col-md-6" style="padding-left: 50px">
            <div class="row">

                <div class="border" style="padding: 50px;">
                    <h4 style="text-align: center;" >Admin Pannel</h4>
                    <div class="d-flex justify-content-around">
                        <a href="../updateproduct/{{$product->id}}"><button class="btn btn-success" name="update" value="" >Update</button></a>
                        <button class="btn btn-danger" onclick="confirmDelete()" name="delete"  value="">Delete</button>
                    </div>

                </div>

            </div>
            <div class="row">
                <h2>{{$product->title}}</h2>
            </div>
            <div class="row">
                @if($product->discount==0)
                    <h1><i aria-hidden="true">LKR</i> {{$product->price}}</h1>

                @else
                    <h1><i aria-hidden="true">LKR</i> {{$product->price-(($product->price*$product->discount)/100)}}</h1>
                    &nbsp; &nbsp;
                    <h3><del>{{$product->price}}</del></h3>
                    &nbsp; &nbsp;
                    <h2 class="text-success">{{$product->discount}}% off</h2>
                @endif

            </div>

            <div class="row">
                <p>{{$product->discription}}</p>

            </div>
            <div class="row mt-4">

                <p style="font-size: 20px"> &nbsp; Fast Delevery | &nbsp; <span class="text-success">FREE</span> </p>
            </div>
            <div class="d-flex justify-content-lg-start">
                <h4>Quantity : &nbsp; &nbsp;</h4>
                <input type="number" style="width: 100px" class="form-control">

            </div>
            <button class="btn btn-primary">Buy Now</button>




        </div>
    </div>
</div>
<hr>
<br><br>




<script>

    function confirmDelete() {
        var r = confirm("Are you sure You want to delete this Product");
        if (r == true) {
            location.replace("../deletproduct/{{$product->id}}");
        }
    }


</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@include('inc.footer')
</body>
</html>
