
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Product|Supermarket</title>

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
        .topic{
            text-align: center;
            color: white;
        }
        .form{
            width: 100%;
            height: auto;
            padding: 30px;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: white;
            border-radius: 5px;
            align-items: center;
            margin-top: 10px;
            border: 1px solid black;
            margin-bottom: 30px;
        }

        .addItem{

            width: 100%;
         }

        span{
            color: red;
        }
        .err{
            color: red;
            text-align: center;
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

<body >
@include('inc.header')
<h1 class="topic">Add Product</h1>
<form action="addNew" method="post" onSubmit="return check()" enctype="multipart/form-data" class="needs-validation" novalidate>
<div class="container">
    <div class="row">

        <div class="col-md-6">
            <div class="form">

                @if($errors->any())
                    <h4 class="err">


                        {{$errors->all()[0]}}

                    </h4>
                @endif
                    <h2 class="err"><?php if (isset($mess)){
                        echo $mess;

                    } ?></h2>


                    {{csrf_field()}}
                    <lable>Title<span>*</span> </lable><br>
                    <input  type="text" class="form-control"   placeholder="Topic" name="title" id="title" maxlength="1100" required>
                    <div class="invalid-feedback">
                        Please Enter Title.
                    </div><br>
                    <lable>Category<span>*</span> </lable><br>
                    <select class="custom-select" id="inputGroupSelect01" name="category" required>
                        <option selected value="" >Choose...</option>
                        @for($i=0;$i<count($category);$i++)
                        <option value="{{$i}}">{{$category[$i]}}</option>

                        @endfor
                    </select>
                    <br><br>

                    <lable>Quantity (Kg/qty)<span>*</span></lable><br>
                    <input  type="number" class="form-control"   placeholder="1" name="qty" id="qty" required>
                    <div class="invalid-feedback">
                        Please Enter Quantity.
                    </div><br>

                    <lable>Price 1Kg/1pcs (LKR)<span>*</span></lable><br>
                    <input  type="text" class="form-control"   placeholder="100 LKR" name="price" id="price" required>
                    <div class="invalid-feedback">
                        Please Enter Price.
                    </div><br>

                    <lable>Discount (%)</lable><br>
                    <input  type="number" class="form-control"   placeholder="5%" value="0" name="discount" id="price" >
                    <br>


                    <lable>Discription</lable><br>
                    <textarea  type="text" class="form-control" placeholder="Discription..." rows="10" name="desctiption" maxlength="200" required></textarea >
                    <div class="invalid-feedback">
                        Please Enter Discription
                    </div>
                    <br>
                    <button class="btn btn-primary"  name="AddItem" value="AddItem">Add Item</button>


            </div>


        </div>
        <div class="col-md-6">
            <div class="form">
                <lable>Add Images<span>*</span></lable><br>

                <input type="file"
                       class="filepond"
                       name="image[]"
                       multiple
                       data-max-file-size="3MB"
                       data-max-files="3"
                        id="upload"
                       allowFileTypeValidation="true"
                       acceptedFileTypes="image/*"

                required
                />

            </div>

        </div>

    </div>
</div>
</form>

<hr style="margin-bottom: 50px;" >

<script>

    document.getElementById('addProduct').setAttribute('class','nav-link active');


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

        imageResizeTargetWidth:500,
        imageResizeTargetHeight:720

    });

function check() {
/*if(document.getElementById('upload').files.length==0){
    alert("Select Images");
   return false;
    }*/
//console.log(document.getElementById('upload').value);

}
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




@include('inc.footer')
</body>
</html>
