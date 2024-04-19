<?php
$_SESSION_start();
$targetDirectory = "img/ads/";
$uploadFileName = uniqid() . "_" . basename($_FILES["fileToUpload"]["name"]);
$targetFile = $targetDirectory . $uploadFileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "A fájl egy kép - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "A fájl nem egy kép.";
        $uploadOk = 0;
    }
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sajnálom, csak JPG, JPEG, PNG & GIF fájlokat lehet feltölteni.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sajnálom, a fájl nem lett feltöltve.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "A fájl ". basename( $_FILES["fileToUpload"]["name"]). " sikeresen feltöltve.";
    } else {
        echo "Sajnálom, hiba történt a fájl feltöltésekor.";
    }
}
?>
