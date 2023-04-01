<?php include 'koneksi.php';

//tangkap data dari form tambah siswa
$nama = $_POST['NamaSiswa'];
$jk = $_POST['jk'];
$tgl = $_POST['tgl'];
$nama_wali = $_POST['nama_wali'];
$alamat = $_POST['alamat'];
$tes = $_POST['tes'];
$interview = $_POST['interview'];
$observasi = $_POST['observasi'];


//simpan data ke database
$query = mysqli_query($conn,"insert into pegawai values('','$nama','$jk','$tgl','$nama_wali','$alamat','$tes','$interview','$observasi')");
if ($query) {
	header('Location:data_siswa.php');
}
?>
