<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $con = new PDO("mysql:host=$servername;dbname=chatelet",$username,$password);

    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {

    echo "connection Failed :".$e->getMessage();

}