<?php

session_start();
require("connection.php");
require("functions.php");
$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$fullName = $_POST["fullName"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$role = "member";

if ($password !== $confirmPassword) {
    $_SESSION["alert"] = "passwordNotMatch";
    header("Location:../kayit");
    exit();
}
if (strlen($password) < 5) {
    $_SESSION["alert"] = "passwordLengthError";
    header("Location:../kayit");
    exit();
}

$_SESSION["alert"] = "registerSuccess";

registerUser($conn, $username, $password, $confirmPassword, $fullName, $email, $phoneNumber, $role);
