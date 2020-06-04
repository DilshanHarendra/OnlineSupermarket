<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
<link rel="stylesheet" href="/css/animate.css">

<link rel="stylesheet" href="/css/owl.carousel.min.css">
<link rel="stylesheet" href="/css/owl.theme.default.min.css">
<link rel="stylesheet" href="/css/magnific-popup.css">




<link rel="stylesheet" href="/css/ionicons.min.css">

<link rel="stylesheet" href="/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="/css/jquery.timepicker.css">


<link rel="stylesheet" href="/css/flaticon.css">
<link rel="stylesheet" href="/css/icomoon.css">
<link rel="stylesheet" href="/css/style.css">


<style>
    .nav-link{
        font-size: 15px !important;
    }
.active{
    font-weight: bold !important;
}
    .nav-link:hover{
        color: red !important;
    }
    .img-fluid{
        width: 100%;
        height: 350px;
    }
    .profileImg{
        width: 50px;
        height: 50px;
        border-radius: 30px;
    }
    .navbar{
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
</style>


<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/home">Vegefoods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/" id="home" class="nav-link">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop?pg=1&id=0" id="shop" >Shop</a>
                </li>
                <li class="nav-item"><a href="/aboutus" id="aboutus" class="nav-link">About</a></li>
                <li class="nav-item"><a href="/admindahsboard" class="nav-link">Admin Dashboard</a></li>
                <li class="nav-item"><a href="/contactus" id="contactus" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="/cart" id="cart" class="nav-link">Cart
                        <?php if(Session::has('cart')){
                            $cart = new \App\Cart(Session::get('cart'));
                            echo " [".$cart->totalPrice."]";
                        }else
                        {
                            echo " [0]";
                        }
                        ?>
                        </a></li>




                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <li class="nav-item">
                        <a class="nav-link" id="addProduct" href="/addProduct"> Add Product </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile" href="/profile/{{Auth::user()->id}}"> Profile </a>
                    </li>
                    <li class="nav-item cta cta-colored"><a href="cart.html" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="profileImg" src="/uploads/ProfilePicture/{{Auth::user()->profilePicture}}" alt="">

                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>




<script>
    var links = document.getElementsByClassName('nav-link');

    for (var i=0;i<links.length;i++){
        links[i].setAttribute('class','nav-link');
    }


</script>
