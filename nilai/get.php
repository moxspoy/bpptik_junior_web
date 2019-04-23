<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    //init variabel
    $UTS = $_POST['UTS'];
    $UAS = $_POST['UAS'];
    $tugas = $_POST['Tugas'];
    $kehadiran= $_POST['Kehadiran'];
    $nilai_akhir = "";
    $keterangan = "";
    
    //main logic
    if($kehadiran < 80) {
        $keterangan = "E";
    } else {
        $nilai_akhir = (0.3 * $UTS) + (0.4 * $UAS) + (0.2 * $tugas) + (0.1 * $kehadiran);
        if ($nilai_akhir >= 85) {
            $keterangan = "A";
        } else if ($nilai_akhir >= 70) {
            $keterangan = "B";
        } else if ($nilai_akhir >= 60) {
            $keterangan = "C";
        } else if ($nilai_akhir >= 55) {
            $keterangan = "D";
        } else {
            $keterangan = "E";
        }       
    }
    
    //final result
    $result = "Nilai akhir: " . $nilai_akhir . ", Oleh karena itu setelah dikonversi ke dalam huruf menjadi " . $keterangan;
   
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Junior Web - Nilai Mahasiswa - Universitas Moxspoy</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">

	<div class="heading" style="margin-top:100px">
	<h1>PROGRAM KONVERSI NILAI MAHASISWA UNIVERISTAS MOXSPOY</h1>
	</div>
  	<form method="post" action="http://localhost/moxspoy/nilai/get.php" >
      <div class="form-group">
        <label for="InputUTS">UTS</label>
        <input type="number" class="form-control" id="UTS" name="UTS" required a placeholder="Masukan nilai UTS" min="0" max="100">
      </div>
      <div class="form-group">
        <label for="InputUAS">UAS</label>
        <input type="number" class="form-control" id="UAS" name ="UAS" required a placeholder="Masukan nilai UAS"  min="0" max="100">
      </div>
      <div class="form-group">
        <label for="Tugas">Tugas</label>
        <input type="number" class="form-control" id="Tugas" name="Tugas" required a placeholder="Masukan nilai Tugas"  min="0" max="100">
      </div>
      <div class="form-group">
        <label for="Kehadiran">Persentase Kehadiran</label>
        <input type="number" class="form-control" id="Kehadiran" name="Kehadiran" a placeholder="Masukan presentase kehadiran antara 0-100"  min="0" max="100">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    echo '<script type="text/javascript">swal("Nilai Akhir", " ' . $result . '", "success");</script>';
}
?>

</body>
</html>