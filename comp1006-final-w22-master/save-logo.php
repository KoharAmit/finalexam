<?php
$fupload = $_POST['fupload'];

$allowedTypes = array("image/png");
$detectedType = exif_imagetype($_FILES['fupload']['tmp_name']);
$error = !in_array($detectedType, $allowedTypes);
if(!$error){
    $link = $_POST['Uploaded_img'];
    $destdir = 'img/';
    $img=file_get_contents($link);
    file_put_contents($destdir.substr($link, strrpos($link,'/')), $img);
}

?>