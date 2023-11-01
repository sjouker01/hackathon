<?php
$servername =   "localhost";
$username   =   "root";
$password   =   "Welkom01";
$dbname     =   "new_schema";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>