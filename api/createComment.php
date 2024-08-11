<?php
session_start();
require("connection.php");
require("functions.php");

if (!isset($_SESSION["id"])) {
    header("Location: anasayfa");
}
$url = $_SERVER['REQUEST_URI'];
$id = $_SESSION["id"];
$content = $_POST["content"];
$service_id = $_POST["service_id"];

print("Url" . $url);

createComment($conn, $id, $service_id, $content);
