
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Ubah Data Pegawai</h1><br>
	
	<?php 
$id = $_GET['id'];

$query = mysqli_query($conn,"select * from pegawai where NIS='$id'") or die(mysqli_error());

$data = mysqli_fetch_array($query);
?>
	
	
	<form method="post" action="proses-siswa.php">
	<div class="control-group">
        <label>NO</label>
         <input type="text" name="nisn" id="nisn"required value="<?php echo $data['NIS']; ?>" readonly>
    </div>
    <div class="control-group">
        <label>Nama pegawai</label>
         <input type="text" name="NamaSiswa" id="namasiswa"required value="<?php echo $data['Nama']; ?>">
    </div>
	<div class="control-group">
        <label>Jenis Kelamin</label>
         <select name="jk" 
			<option value="<?php echo $data['Jenis_Kelamin']; ?>"></option>
			<option value="L">Laki-Laki</option>
			<option value="P">Perempuan</option>
		</select>
    </div>
    <div class="control-group">
        <label>Tanggal Lahir</label>
         <input type="date" name="tgl" id="tgl" value="<?php echo $data['TTL']; ?>">
    </div>
    <div class="control-group">
        <label>Nama Orang Tua</label>
         <input type="text" name="nama_wali" id="nohp"required value="<?php echo $data['Nama_Wali']; ?>">
    </div>
	<div class="control-group">
        <label>Alamat</label>
         <input type="text" name="alamat" id="nohp"required value="<?php echo $data['Alamat']; ?>">
    </div><br>
	<div id="form">
		<input type="submit" value="Simpan">
		<a href="data_siswa.php" class="excel">Batal</a>
	</div>
	</div>
    </form>
	</div>
	</div>
<?php include'footer.php';?>

