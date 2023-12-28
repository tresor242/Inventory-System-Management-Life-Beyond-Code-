<?php 

$servername = 'localhost';
$username = 'root';
$password = '';

//Connectinf to databse

try {
    $conn = new PDO("mysql:host=$servername;dbname=lifebeyondcodeinventory",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   $error_message =  $e->getMessage();
}


?>