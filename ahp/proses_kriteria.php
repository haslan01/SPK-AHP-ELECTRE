<?php include ('koneksi.php');

//tangkap data dari form tambah siswa
$kd_kriteria = $_POST['Nomor'];
$nama_kriteria = $_POST['Nama_Kriteria'];



//simpan data ke database
$query = mysqli_query($conn,"insert into kriteria values('$kd_kriteria', '$nama_kriteria', '$bobot')") or die(mysql_error());

if ($query) {
	header('location:lihat_kriteria.php?message=success');
}
?>



