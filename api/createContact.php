<?php
session_start();
require("connection.php");
require("functions.php");



$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];


$_SESSION["alert"] = "createContactSuccess";
$createContact = createContact($conn, $name, $email, $message);
