
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Ubah Data Siswa</h1><br>
	
	<?php 
$id = $_GET['NIS'];

$query = mysql_query("select * from pegawai where NIS='$id'") or die(mysql_error());

$data = mysql_fetch_array($query);
?>
	
	
	<form method="post" action="proses-siswa.php">
	<div class="control-group">
        <label>NIS</label>
         <input type="text" name="nisn" id="nisn"required>
    </div>
    <div class="control-group">
        <label>Nama Siswa</label>
         <input type="text" name="NamaSiswa" id="namasiswa"required>
    </div>
	<div class="control-group">
        <label>Jenis Kelamin</label>
         <select name="jk">
			<option value="0">---</option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
		</select>
    </div>
    <div class="control-group">
        <label>Tanggal Lahir</label>
         <input type="date" name="tgl" id="tgl">
    </div>
    <div class="control-group">
        <label>Nama Wali</label>
         <input type="text" name="nama_wali" id="nohp"required>
    </div>
	<div class="control-group">
        <label>Alamat</label>
         <input type="text" name="alamat" id="nohp"required>
    </div><br>
	<div id="form">
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal">
	</div>
	</div>
    </form>
	</div>
	</div>
<?php include'footer.php';?>

