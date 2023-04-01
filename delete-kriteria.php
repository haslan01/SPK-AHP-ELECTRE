<?php include('koneksi.php');?>
<?php 


$kodemp = $_GET['id'];

$query = mysqli_query($conn,"delete from tb_kriteria where Nomor='$kodemp'") or die(mysql_error());

if ($query) {
	header('location:lihat_kriteria.php?message=delete');
}
?>