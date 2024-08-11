<?php
session_start();
require("connection.php");
require("functions.php");


$servisAdi = $_POST['title'];
$servisAciklama = $_POST['description'];
$file = $_FILES["file"];
$uploadDirectory = "uploads/";

$targetFile = $uploadDirectory . basename($file["name"]);

$data = $_FILES["file"];
$code = $data["error"];

if ($code !== UPLOAD_ERR_OK) {
    exit("Upload failed with error code $code.");
}

$src = $data["tmp_name"];

$dest = __DIR__
    . "/uploads/"
    . $data["name"];

if (move_uploaded_file($src, $dest)) {
    $dbDest = "./api/uploads/" . $data["name"];
    $_SESSION["alert"] = "createServiceSuccess";
    createService($conn, $servisAdi, $servisAciklama, $dbDest);
} else {
    echo "Resim yükleme hatası: " . $_FILES["file"]["error"];
}
