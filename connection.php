<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_form";

$conn = new mysqli($servername, $username, $password, $database);

if(!$conn){
    die("Error". mysqli_error($conn));
}

?>