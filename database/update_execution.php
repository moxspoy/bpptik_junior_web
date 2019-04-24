<?php
include("config_db.php");

//Update data
if($_SERVER["REQUEST_METHOD"] == "POST") {

    //get old NIM
    $old_nim = $_GET['nim'];

    $NIM = $_POST['NIM'];
    $name = $_POST['name'];
    $date = $_POST['birthDate'];
    $address = $_POST['address'];

    //convert mm/dd/yyyy
    $birthDate=date("Y-m-d",strtotime($date));

    $sql = "UPDATE mahasiswa SET nim='" . $NIM . "',nama='" . $name . "',tanggal_lahir='" . $birthDate . "',alamat='" . $address. "' WHERE nim='" . $old_nim . "'";
    // update user data
    $result = $conn->query($sql);
    if($result) {
        //alert("Berhasil mengupdate data");
        alert($sql);
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }    
}
?>