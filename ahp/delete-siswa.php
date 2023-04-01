<?php include('koneksi.php');?>
<?php 


$kodemp = $_GET['id'];

$query = mysqli_query($conn,"delete from pegawai where NIS='$kodemp'") or die(mysql_error());

if ($query) {
	header('location:data_siswa.php?message=delete');
}
?>