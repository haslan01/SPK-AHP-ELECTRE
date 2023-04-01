<?php include ('koneksi.php');

$nis = $_POST['nisn'];
$nama = $_POST['NamaSiswa'];
$jk = $_POST['jk'];
$tgl = $_POST['tgl'];
$nama_wali = $_POST['nama_wali'];
$alamat = $_POST['alamat'];

//simpan data ke database
$query = mysqli_query($conn,"update pegawai set Nama='$nama', Jenis_Kelamin='$jk', TTL='$tgl', Nama_Wali='$nama_wali',Alamat='$alamat'  where NIS='$nis'") or die(mysqli_error());

if ($query) {
	header('location:data_siswa.php?message=success');
}
?>



