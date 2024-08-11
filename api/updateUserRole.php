<?php
session_start();
require("connection.php");
require("functions.php");
?>
<?php
$userId = $_POST["userId"];
$newRole = $_POST["newRole"];

updateUserRole($conn, $userId, $newRole);
