<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nim, nama, tanggal_lahir, alamat FROM mahasiswa";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "nim: " . $row["nim"]. " - Nama: " . $row["nama"]. " " . $row["tanggal_lahir"] . "<br>" .  $row["alamat"] ;
    }
} else {
    echo "0 results";
}
$conn->close();
?>