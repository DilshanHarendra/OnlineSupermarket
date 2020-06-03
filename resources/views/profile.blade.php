<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vegefoods | home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">



    <style>
        .image{
            width: 75%;
            padding: 10px;
            height: 350px;
            margin-left: 11%;

        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        #updateProf{
            padding: 20px;
            text-align: center;
            display: none;
            margin-top: 20px;
        }
        #rpass{
            padding: 20px;
            text-align: center;
            display: none;
            margin-top: 20px;
        }


        .btncontainor
        {
            display:none;
            position:absolute;
            top:150px ;
            left:95px;
            width: 200px;
            height: 50px;
        }
        .imgUploadCont:hover .btncontainor{
            display: block;
        }
        .imgUploadCont:hover .image{
            filter: blur(5px);
        }

        .filepond--drop-label {
            color: #4c4e53;
        }

        .filepond--label-action {
            text-decoration-color: #babdc0;
        }

        .filepond--panel-root {
            border-radius: 2em;
            background-color: #edf0f4;
            height: 1em;
        }

        .filepond--item-panel {
            background-color: #595e68;
        }

        .filepond--drip-blob {
            background-color: #7f8a9a;
        }


    </style>
</head>

<body class="goto-here">
@include('inc/header')
<br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">

                    <div class="imgUploadCont">

                        <img class="image" src="/uploads/ProfilePicture/{{$data->profilePicture}} " alt="">
                        <div class="btncontainor">
                            <button class="btn btn-primary" id="update" data-toggle="modal" data-target="#updatePPicture">Update Profile Picture </button>

                        </div>
                    </div>



                <div class="card-body">
                    <h5 class="card-title">Personal Details</h5>
                    <p>Full name : {{$data->fullName}}  </p>
                    <p>Address :  {{$data->address}} </p>
                    <p>Email :  {{$data->email}} </p>
                    <p>Telephone :  {{$data->telephone}} </p>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <button class="btn badge-info"  data-toggle="modal" data-target="#updateProfile">Update Profile </button>

                        <button class="btn badge-warning"   data-toggle="modal" data-target="#updatePassword">Reset Passowrd </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card" style="overflow: scroll;height: 750px;">
                <div class="card-header">
                    <h5 class="card-title">Orders</h5>
                </div>
                <div class="card-body">
                    <table>
                        <tr>

                            <th>Title</th>
                            <th>Addess</th>
                            <th style="width:5%;">Quantity</th>
                            <th style="width:5%;">Total</th>
                            <th style="width:5%;">Order Date</th>
                            <th style="width:5%;">Status</th>
                        </tr>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>Centro comercial Moctezuma</td>
                            <td>Francisco Chang</td>
                            <td>Mexico</td>
                        </tr>
                        <tr>
                            <td>Ernst Handel</td>
                            <td>Roland Mendel</td>
                            <td>Austria</td>
                        </tr>
                        <tr>
                            <td>Island Trading</td>
                            <td>Helen Bennett</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <td>Laughing Bacchus Winecellars</td>
                            <td>Yoshi Tannamuri</td>
                            <td>Canada</td>
                        </tr>
                        <tr>
                            <td>Magazzini Alimentari Riuniti</td>
                            <td>Giovanni Rovelli</td>
                            <td>Italy</td>
                        </tr>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>Centro comercial Moctezuma</td>
                            <td>Francisco Chang</td>
                            <td>Mexico</td>
                        </tr>
                        <tr>
                            <td>Ernst Handel</td>
                            <td>Roland Mendel</td>
                            <td>Austria</td>
                        </tr>
                        <tr>
                            <td>Island Trading</td>
                            <td>Helen Bennett</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <td>Laughing Bacchus Winecellars</td>
                            <td>Yoshi Tannamuri</td>
                            <td>Canada</td>
                        </tr>
                        <tr>
                            <td>Magazzini Alimentari Riuniti</td>
                            <td>Giovanni Rovelli</td>
                            <td>Italy</td>
                        </tr>
                        <tr>
                            <td>Alfreds Futterkiste</td>
                            <td>Maria Anders</td>
                            <td>Germany</td>
                        </tr>
                        <tr>
                            <td>Centro comercial Moctezuma</td>
                            <td>Francisco Chang</td>
                            <td>Mexico</td>
                        </tr>
                        <tr>
                            <td>Ernst Handel</td>
                            <td>Roland Mendel</td>
                            <td>Austria</td>
                        </tr>
                        <tr>
                            <td>Island Trading</td>
                            <td>Helen Bennett</td>
                            <td>UK</td>
                        </tr>
                        <tr>
                            <td>Laughing Bacchus Winecellars</td>
                            <td>Yoshi Tannamuri</td>
                            <td>Canada</td>
                        </tr>
                        <tr>
                            <td>Magazzini Alimentari Riuniti</td>
                            <td>Giovanni Rovelli</td>
                            <td>Italy</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>


        <div class="modal fade" id="updatePPicture" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Profile Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{action('UserController@updatePicture') }}" method="post">
                            {{csrf_field()}}
                            <input type="file"
                                   class="filepond"
                                   name="Pimage"
                                   data-max-file-size="3MB"
                                   data-max-files="1"
                                   id="upload"
                                   allowFileTypeValidation="true"
                                   acceptedFileTypes="image/*"

                                   required
                            /><br>
                            <div class="d-flex justify-content-around">
                                <button style="width: 30%;" class="btn btn-primary" name="updateDetails" value="">Save</button>

                                <div style="width: 30%;" class="btn btn-danger" id="updateprocancel" name="updateDetails" data-dismiss="modal">Cancel</div>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>






        <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Update Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate>
                            <lable>Full Name</lable><br>
                            <input type="text"  class="form-control" name="fullname" id="fullname" maxlength="100" value="" required>
                            <div class="invalid-feedback">
                                Enter Full Name.
                            </div><br>
                            <lable>Address</lable><br>
                            <input type="text" class="form-control"  name="address" id="address" maxlength="100" value="" required>
                            <div class="invalid-feedback">
                                Enter Address.
                            </div><br>
                            <lable>Telephone</lable><br>
                            <input type="tel" class="form-control"  name="telephone" id="telephone" maxlength="50" value="" required>
                            <div class="invalid-feedback">
                                Enter Telephone.
                            </div><br>
                            <lable>Email</lable><br>
                            <input type="email" class="form-control"  name="mail" id="mail" maxlength="50" value="" required>
                            <div class="invalid-feedback">
                                Enter Email.
                            </div><br>

                            <div class="d-flex justify-content-around">
                                <button style="width: 30%;" class="btn btn-primary" name="updateDetails" value="">Update Profile</button>

                                <div style="width: 30%;" class="btn btn-danger" id="updateprocancel" name="updateDetails" data-dismiss="modal">Cancel</div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>







                    <div class="modal fade" id="updatePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Reset Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="profile.php" onSubmit="return submitPassword()" method="post" class="needs-validation" novalidate>
                                        <lable>Enter Current Password</lable><br>
                                        <input class="form-control" name="cpass" id="cpass"  type="password">
                                        <div class="invalid-feedback">
                                            Enter Current Password.
                                        </div><br>
                                        <lable>Enter New Password</lable><br>
                                        <input class="form-control" type="password" name="npass1" id="npass1">
                                        <div class="invalid-feedback">
                                            Enter New Password.
                                        </div><br>
                                        <lable>Re-Enter New Password</lable><br>
                                        <input class="form-control" type="password" name="npass2" id="npass2">
                                        <div class="invalid-feedback">
                                            Re-Enter New Password.
                                        </div><br>
                                        <div class="d-flex justify-content-around">
                                            <button  style="width: 40%;" class="btn btn-primary" name="updatePass" value="" >Reset Password</button>

                                            <div style="width: 40%;" class="btn btn-danger" id="resetpasscancel" name="updateDetails" value="">Cancel</div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>





            </div>
        </div>



<br>
<hr>



<script >
    document.getElementById('profile').setAttribute('class','nav-link active');
</script>
<script >

    FilePond.registerPlugin(

        // encodes the file as base64 data
        FilePondPluginFileEncode,

        // validates the size of the file
        FilePondPluginFileValidateSize,

        // corrects mobile image orientation
        FilePondPluginImageExifOrientation,

        // previews dropped images
        FilePondPluginImagePreview,

        FilePondPluginFileValidateType,

        FilePondPluginImageResize
    );

    // Select the file input and use create() to turn it into a pond
    FilePond.create(
        document.getElementById('upload')
    );

    FilePond.setOptions({

        imageResizeTargetWidth:450,
        imageResizeTargetHeight:350

    });

    function submitPassword() {
        if(document.getElementById('npass1').value!=document.getElementById('npass2').value){
            alert("new password does not match");
            return false;
    }
    }




</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
@include('inc/footer')
</html>
