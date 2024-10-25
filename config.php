<?php

$servername = "localhost";
$username = "gacilo";
$password = "@Gacilogn3";
$dbname = "productsdb";


$conn = new mysqli ($servername, $username, $password, $dbname);


if ($conn->connect_error){
    die ("COnnection Failed: ". $conn->connect_error);
}
?>