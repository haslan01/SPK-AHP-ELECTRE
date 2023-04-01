<?php include ('koneksi.php');

//tangkap data dari form tambah siswa
$nis = $_POST['Nomor'];
$nama = $_POST['Nama_Kriteria'];
$bobot = $_POST['Bobot'];


//simpan data ke database
$query = mysqli_query($conn,"update kriteria set Nama_Kriteria='$nama',Bobot='$bobot'  where Nomor='$nis'") or die(mysql_error());

if ($query) {
	header('location:lihat_kriteria.php?message=success');
}
?>



