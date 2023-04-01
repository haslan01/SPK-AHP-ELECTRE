<?php 

include 'koneksi.php';
$tes = $_POST['bob_tes'];
$inter = $_POST['bob_inter'];
$obser = $_POST['bob_obser'];

mysqli_query($conn,"UPDATE tb_kriteria SET Bobot = '$tes' WHERE Nama_Kriteria = 'TES' ");
mysqli_query($conn,"UPDATE tb_kriteria SET Bobot = '$inter' WHERE Nama_Kriteria = 'INTERVIEW' ");
mysqli_query($conn,"UPDATE tb_kriteria SET Bobot = '$obser' WHERE Nama_Kriteria = 'OBSERVASI' ");

?>