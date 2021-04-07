<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
include "functions.php"

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jonathans JS Demo</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Containern har max bredd 800px -->
    <div id="container">

        <?php include "navbar.php" ?>

        <article>
            <h2>Uppg 7</h2>
             <form action="upload.php" method="POST" enctype="multipart/form-data">
            Select image to upload:
         <input type="file" name="fileToUpload" id="fileToUpload" />
         <input type="submit" value="Upload Image" />
      </form>
        </article>


       
        <?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Filen du försöker ladda upp är inte en bild";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Filen finns redan";
  $uploadOk = 0;
}

// Check file size
else if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Tyvärr är din fil för stor";
  $uploadOk = 0;
}

// Allow certain file formats
else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Tyvärr , bara JPG, JPEG, PNG & GIF filer är tillåtna";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
else if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " har blivit uppladdad";
  } else {
    echo "Tyvärr det skedde en error";
  }
}

$dir_path = "uploads/";
$extensions_array = array('jpg','png','jpeg');

if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] !='.' && $files[$i] !='..')
        {
            // get file name
            echo "<br>File Name -> $files[$i]<br>";
            
            // get file extension
            $file = pathinfo($files[$i]);
            $extension = $file['extension'];
            echo "File Extension-> $extension<br>";
            
           // check file extension
            if(in_array($extension, $extensions_array))
            {
            // show image
            echo "<img src='$dir_path$files[$i]' style='width:auto;height:300px;'><br>";
            }
        }
    }
}

print("<br><br><a href = 'index.php'> Tillbaka </a>");

?>

    </div>
</body>

<script src="script.js"></script>

</html>