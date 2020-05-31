<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard | Supermarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<style>
    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: calc(100vh - 70px);
        width: 0;
        background-color: #111;
        overflow-x: scroll;
        transition: 0.5s;
        padding-top: 30px;
        top: 0;

    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav {
        font-size: 36px;

    }
    .closebtn{
        margin-right: 20px;
    }

    #main {
        transition: margin-left .5s;

    }

    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
            min-width:300px;
        }
        .sidenav a {font-size: 18px;}
    }

    .header{
        background-image: linear-gradient(135deg, #0061f2 0%, rgba(105, 0, 199, 0.8) 100%);
        padding: 20px;
        color: white;
        width: 100%;
    }
    .button{
        margin-left: 30px;
        width: 50px;
        height: 50px;
        font-size: 20px;
        color: white;
        background-color: transparent;
        border: none;
        outline: none;
        margin: 10px;
        border-radius: 30px;
    }
    .button:hover{
        border: 1px solid white;
    }
    .button:focus{
        outline: none;
        border: 1px solid white;
    }
    .Topic{
        color: white;
        margin-top: 10px;
    }
    .active{
        color: white;
    }
</style>

<body >



@include('inc.header')

<div class="d-flex">
    <div id="mySidenav" class="sidenav">
        <div class="d-flex justify-content-between" >
            <a href="#">Dashboard</a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        </div>

        <a href="#">Users</a>
        <a href="#">Products</a>
        <a href="#">Orders</a>

    </div>
    <div id="main" class="container-fluid dbord">


        <div class="row">
            <div class="header d-flex  justify-content-center" >
                <h2 class="Topic">Dasboard</h2>
                <button class="button"  onclick="openNav()" >&#9776;</button>
            </div>
        </div>

    </div>

</div>






<script >
    document.getElementById('shop').setAttribute('class','nav-link active');

    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";

    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";

    }


</script>


</body>
</html>
