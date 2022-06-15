<?php
session_start();
require('../php/database.php');
// Check of je ingelogd bent.
if (!isset($_SESSION["loggedin"])) {
    header("Location: index.php");
    exit();
}
// Check of de gebruiker wel een admin role heeft
if ($_SESSION['role'] == 0){
    require('dashboard.php');
}
//CRSF token.
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] =  $token;

//Hier krijgen we informatie van de reis die we willen bewerken.
if($stmt = $database->select("reizen", ["titel","bestemming","text","image","begindatum","einddatum","max"], ["id" => $_GET['id']])) {
    if (count($stmt) == 0) {
        header("Location: dashboard.php?error=nopost");
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../components/style.php"); ?>
    <!-- Script Tiny CME -->
    <script src="https://cdn.tiny.cloud/1/swq7hpikkqwjjze9ad6mykwgy37w7e1mlvbbslqdqokoedyw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        //Dit is bedoeld voor ons Tiny MCE script.
        tinymce.init({
            selector: '#text',
            height: '480',
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            file_picker_types: 'image',
            /* and here's our custom image picker*/
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
    <title>GLR reisbureau - Verander Reis</title>
</head>

<body>
<?php require("../components/navbar.php"); //Hieronder voegen we alle data toe van een specifieke reis. ?>
<?php foreach ($stmt as $data) { ?>
<div class="container mt-2 mb-5">
    <form method="POST" enctype="multipart/form-data" action="../php/bewerkreis.php?id=<?php echo $_GET['id']; ?>">
        <input type="hidden" style="visibility: hidden;" name="token" value="<?php echo $token;?>">
        <div class="form-group">
            <label for="titel">Titel</label>
            <input name="title" id="titel" class="form-control" placeholder="Titel" type="text" value="<?php echo $data["titel"];?>" required>
        </div>
        <div class="form-group">
            <label for="best">Bestemming</label>
            <input name="best" id="best" class="form-control" value="<?php echo $data["bestemming"];?>" placeholder="Parijs" type="text" required>
        </div>
        <div class="form-group">
            <label for="text">Beschrijving</label>
            <textarea name="text" id="text"><?php echo $data["text"];?></textarea required>
        </div>
        <div class="form-group">
            <label for="Huidige_Afbeelding">Huidige Achtergrond Foto</label><br>
            <input hidden="1" readonly="1" name="Huidige_Afbeelding" value="<?php echo $data["image"];?>"><img src="../<?php echo "" . $data["image"] . "";?>" width="120" height="110">
        </div>
        <div class="form-group">
            <label for="foto">Achtergrond Foto</label>
            <input name="image" type="file">
        </div>
        <div class="form-group">
            <label for="begin">Begin datum</label>
            <input class="form-control" value="<?php echo $data["begindatum"];?>" name="begin" type="date" required>
        </div>
        <div class="form-group">
            <label for="eind">Eind datum</label>
            <input class="form-control" value="<?php echo $data["einddatum"];?>" name="eind" type="date" required>
        </div>
        <div class="form-group">
            <label for="max">Maximum Aantal studenten</label>
            <input class="form-control" value="<?php echo $data["max"];?>" name="max" type="number" required>
        </div>
        <?php } ?>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-dark">
        </div>
        <?php
        if (isset($_GET['error=mysql'])) {
            echo "<span style='color: rgb(0,185,255);'>The post wasn't send correctly.</span>";
        }
        if (isset($_GET['error=fields'])) {
            echo "<span style='color: rgb(0,185,255);'>The post wasn't send correctly.</span>";
        }
        ?>
    </form>
</div>
<?php require("../components/footer.php"); ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<?php require("../components/scripts.php"); ?>
</body>
</html>