<?php 
include("config_db.php");
include("header.php");

$row;
$old_nim;

//Get data with specific NIM
if(isset($_GET['NIM'])) {
    $NIM = $_GET['NIM'];
    $sql = "SELECT * FROM mahasiswa WHERE nim='" . $NIM."'";
    // update user data
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $old_nim = $NIM;
}

?>

<div class="container">
    <h1>Update Data</h1>
    <form method="post" action="update_execution.php?nim=<?php echo $old_nim; ?>">

    <?php if(true) { ?>
        <div class="form-group">
            <label for="inputX">NIM</label>
            <input type="number" class="form-control"  name="NIM" required
                placeholder="Masukan NIM" value="<?php echo $row['nim']; ?>">
        </div>
        <div class="form-group">
            <label for="inputX">Nama</label>
            <input type="text" class="form-control"  name="name" required
                placeholder="Masukan Nama" value="<?php echo $row['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="inputX">Tanggal Lahir</label>
            <input type="date" class="form-control"  name="birthDate" required 
                placeholder="Masukan Tanggal Lahir>
        </div>
        <div class="form-group">
            <label for="inputX">Alamat</label>
            <input type="text" class="form-control"  name="address" required a
                placeholder="Masukan Alamat" value="<?php echo $row['alamat']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    
    <?php } ?>
    </form>
</div>

<?php
include("footer.php")
?>