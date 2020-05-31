<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profile</title>

  <link rel="stylesheet" href="/css/profile.css">

</head>

<body class="goto-here">
@include('inc/header')
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="details">
                <h1 style="text-align: center;">Details</h1><br>
                <p>Full name : {{$data->fullName}}  </p>
                <p>Address :  {{$data->address}} </p>
                <p>Email :  {{$data->email}} </p>
                <p>Telephone :  {{$data->telephone}} </p>

            </div>
        </div>
        <div class="col-md-4">
            <div class="settings">
                <h2 style="text-align: center" >Settings</h2>
                <button class="btn badge-secondary" id="update">Update Profile </button>
                <br><br>
                <button class="btn badge-secondary" id="resetpass">Reset Passowrd </button>
            </div>
        </div>
        <div></div>
        <div class="col-md-4" >
            <div class="updateProf" id="updateProf">
                <h4>Update Profile</h4>
                <h5 style="text-align: center;">


                </h5>
                <form action="" method="post">
                    <lable>Full Name</lable><br>
                    <input type="text"  class="form-control" name="fullname" id="fullname" maxlength="100" value="" ><br><br>

                    <lable>Address</lable><br>
                    <input type="text" class="form-control"  name="address" id="address" maxlength="100" value="" ><br><br>

                    <lable>Telephone</lable><br>
                    <input type="tel" class="form-control"  name="telephone" id="telephone" maxlength="50" value="" ><br><br>

                    <lable>Email</lable><br>
                    <input type="email" class="form-control"  name="mail" id="mail" maxlength="50" value="" ><br><br>
                    <button class="btn btn-primary" name="updateDetails" value="">Update Profile</button>
                    <br><br>
                    <div style="width: 100%;" class="btn btn-danger" id="updateprocancel" name="updateDetails" value="">Cancel</div>
                </form>


            </div>
        </div>
        <div class="col-md-4">

            <div class="rpass" id="rpass" >
                <h4>Reset Password</h4>
                <h5 style="text-align: center;">



                </h5>
                <form action="profile.php" onSubmit="return submitPassword()" method="post">
                    <lable>Enter Current Password</lable><br>
                    <input class="form-control" name="cpass" id="cpass"  type="password"><br><br>
                    <lable>Enter New Password</lable><br>
                    <input class="form-control" type="password" name="npass1" id="npass1"><br><br>
                    <lable>Re-Enter New Password</lable><br>
                    <input class="form-control" type="password" name="npass2" id="npass2"><br><br>
                    <button class="btn btn-primary" name="updatePass" value="" >Reset Password</button>
                    <br><br>
                    <div style="width: 100%;" class="btn btn-danger" id="resetpasscancel" name="updateDetails" value="">Cancel</div>
                </form>

            </div>
        </div>

    </div>

</div>

<br><br><hr>
<h1 style="text-align: center;">My Orders</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table>
                <tr>
                    <th style="width:5%; " >ID</th>
                    <th>Title</th>
                    <th>Addess</th>
                    <th style="width:5%;">Quantity</th>
                    <th style="width:5%;">Total</th>
                    <th style="width:5%;">Order Date</th>
                    <th style="width:5%;">Status</th>
                </tr>




                <tr>
                    <td></td>
                    <td></td>


                </tr>





            </table>


        </div>
    </div>

</div>
@include('inc/footer')
<script >
    document.getElementById('profile').setAttribute('class','nav-link active');
</script>
<script >
    document.getElementById('Profile').setAttribute('class','nav-link active');

    var showUpdate=false;
    document.getElementById('update').addEventListener('click',function () {
        if (showUpdate){
            document.getElementById('updateProf').style.display="none";
            showUpdate=false;
        }else {
            document.getElementById('updateProf').style.display="block";
            showUpdate=true;
        }

    });
    document.getElementById('updateprocancel').addEventListener('click',function () {
        if (showUpdate){
            document.getElementById('updateProf').style.display="none";
            showUpdate=false;
        }

    });

    var showReset=false;
    document.getElementById('resetpass').addEventListener('click',function () {
        if (showReset){
            document.getElementById('rpass').style.display="none";
            showReset=false;
        }else {
            document.getElementById('rpass').style.display="block";
            showReset=true;
        }

    });
    document.getElementById('resetpasscancel').addEventListener('click',function () {
        if (showReset){
            document.getElementById('rpass').style.display="none";
            showReset=false;
        }

    });


    function submitPassword(){
        var cpass=document.getElementById('cpass').value;
        var npass1=document.getElementById('npass1').value;
        var npass2=document.getElementById('npass2').value;
        if(cpass==""){
            alert("Enter Current Password");
            return false;
        }else if(npass1==""){
            alert("Enter New Password");
            return false;
        }else if(npass2==""){
            alert("Re-Enter New Password");
            return false;
        }else if(npass1!=npass2){
            alert("New Passwords Not Matching");
            return false;
        }
    }
</script>
</body>
</html>
