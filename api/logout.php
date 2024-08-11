<?php
session_start();
unset($_SESSION["role"]);
unset($_SESSION["id"]);
unset($_SESSION["fullname"]);
unset($_SESSION["username"]);
unset($_SESSION["alert"]);

header("Location:../anasayfa");
