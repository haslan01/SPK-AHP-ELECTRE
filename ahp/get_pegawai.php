<?php 
include 'koneksi.php';
$nama = $_POST['nama'];
// $nama = 'endo';
$data = mysqli_query($conn,"SELECT * FROM pegawai WHERE Nama = '$nama' ");
$row = mysqli_fetch_array($data);
echo json_encode($row);
?>