<?php 

$host = "localhost";
$user = "root";
$pwd = "";
$db = "mydb";

$conn = new mysqli($host, $user, $pwd, $db);

if ($conn->connect_error) {
    echo "<br>Connection Failed<br>";
    echo "Error Message : ".$conn->connect_error."<br>";
    die();
}
?>