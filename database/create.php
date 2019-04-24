<?php 
include("config_db.php");
include("header.php");
?>

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

                        //show to user
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

<?php
include("footer.php")
?>