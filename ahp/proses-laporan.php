<?php include ('koneksi.php');

//tangkap data dari form tambah siswa
$nama= $_POST['namasiswa'];

//simpan data ke database
$query = mysql_query("insert into laporan values('$nama')") or die(mysql_error());

if ($query) {
	header('location:proses-rang.php?message=success');
}
?>

