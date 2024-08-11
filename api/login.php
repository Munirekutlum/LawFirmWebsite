<?php
session_start();
require("connection.php");
require("functions.php");

$username = $_POST["username"];
$password = $_POST["password"];

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

$loginData = getLogin($conn, $username);



if (password_verify($password, $loginData["password"])) {
    $_SESSION["id"] = $loginData["id"];
    $_SESSION["role"] = $loginData["role"];
    $_SESSION["fullname"] = $loginData["fullname"];
    $_SESSION["username"] = $username;
    $_SESSION["alert"] = "passwordSuccess";

    header("Location:../anasayfa");
} else {
    $_SESSION["alert"] = "loginError";
    header("Location:../giris");
}
