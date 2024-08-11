<?php
session_start();
require("connection.php");
require("functions.php");
?>
<?php
$id = $_GET['id'];


deleteLawyer($conn, $id);
