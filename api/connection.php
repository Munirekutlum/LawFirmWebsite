<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=yesildere-hukuk;charset=utf8", "root", "root");
} catch (Exception $e) {
    echo $e->getMessage();
}
