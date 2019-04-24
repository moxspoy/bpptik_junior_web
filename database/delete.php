<?php
include("config_db.php");

if(isset($_GET['NIM'])) {
    $NIM = $_GET['NIM'];
    $sql = "DELETE FROM mahasiswa WHERE nim='" . $NIM ."'";
    // update user data
    $result = $conn->query($sql);

    if($result) {
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
}
?>