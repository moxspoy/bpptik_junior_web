<?php


include("Student.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

//Create storage
$students = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM mahasiswa ORDER BY nama";
$result = $conn->query($sql);


function alert($message) {
    echo "<script>alert('" . $message ."')</script>";
}
?>