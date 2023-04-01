<?php include ('koneksi.php');

//tangkap data dari form tambah siswa
$nama = $_POST['NamaSiswa'];
$hasil = $_POST['hasil'];



//simpan data ke database
$query = mysqli_query($conn,"insert into laporan values('','$nama', '$hasil')") or die(mysqli_error());

if ($query) {
	header('location:laporan.php?message=success');
}
?>



