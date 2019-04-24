<?php 
include("config_db.php");
include("header.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $NIM = $_POST['NIM'];
    $name = $_POST['name'];
    $date = $_POST['birthDate'];
    $address = $_POST['address'];

    //convert mm/dd/yyyy
    $birthDate=date("Y-m-d",strtotime($date));

    $sql = "INSERT INTO mahasiswa (NIM,nama,tanggal_lahir,alamat) VALUES('". $NIM ."','" . $name . "','" . $birthDate . "','" . $address . "')";
    // update user data
    $result = $conn->query($sql);

    if($result) {
        alert("Berhasil menambah data");
        // Redirect to homepage to display updated user in list
        header("Location: index.php");
    }
}

?>

<div class="container">
    <h1>Tambah Data</h1>
    <form method="POST" action="tambah.php">
        <div class="form-group">
            <label for="inputX">NIM</label>
            <input type="number" class="form-control"  name="NIM" required
                placeholder="Masukan NIM">
        </div>
        <div class="form-group">
            <label for="inputX">Nama</label>
            <input type="text" class="form-control"  name="name" required
                placeholder="Masukan Nama">
        </div>
        <div class="form-group">
            <label for="inputX">Tanggal Lahir</label>
            <input type="date" class="form-control"  name="birthDate" required 
                placeholder="Masukan Tanggal Lahir">
        </div>
        <div class="form-group">
            <label for="inputX">Alamat</label>
            <input type="text" class="form-control"  name="address" required a
                placeholder="Masukan Alamat">
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>

<?php
include("footer.php")
?>