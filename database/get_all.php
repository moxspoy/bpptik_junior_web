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

$sql = "SELECT nim, nama, tanggal_lahir, alamat FROM mahasiswa";
$result = $conn->query($sql);

?>

<!-- Author
    * M NURILMAN BAEHAQI
    * Training and Certification for Junior Web Programming (JWP) by BPPTIK Kominfo
    * 24 April 2019, Room 112 at Main Building
-->

<!DOCTYPE html>
<html>

<head>
    <title>Junior Web - Working with PHP & My SQL</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Nomor</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
                if ($result->num_rows > 0) {
                    // output data of each row
                    $counter = 1;
                    while($row = $result->fetch_assoc()) {
                        //Init data
                        $NIM = $row["nim"];
                        $name = $row["nama"];
                        $birthDate = $row["tanggal_lahir"];
                        $address = $row["alamat"];
                        //save to array
                        $student = new Student($NIM, $name, $birthDate, $address);
                        array_push($students, $student);

                        echo "<th scope='row'>" . $counter . "</th><td>" . $NIM . "</td> <td>" 
                        . $name . " </td> <td> " . $birthDate . "</td> <td> " 
                        .  $address . "</td></tr>" ;
                        $counter++;
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();

                ?>
                </tbody></table>
            
    </div>
</body>
</html>

