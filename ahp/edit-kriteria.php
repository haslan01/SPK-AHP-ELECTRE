
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Ubah Data Siswa</h1><br>
	
	<?php 
$id = $_GET['id'];

$query = mysqli_query($conn,"select * from kriteria where Nomor='$id'") or die(mysql_error());

$data = mysqli_fetch_array($query);
?>
	
	
	<form method="post" action="update-kriteria.php">
	<div class="control-group">
        <label>Kode Kriteria</label>
         <input type="text" name="Nomor" id="nisn"required value="<?php echo $data['Nomor']; ?>">
    </div>
    <div class="control-group">
        <label>Nama Kriteria</label>
         <input type="text" name="Nama_Kriteria" id="namasiswa"required value="<?php echo $data['Nama_Kriteria']; ?>">
    </div>
	<div class="control-group">
        <label>Bobot</label>
         <input type="text" name="Bobot" id="namasiswa"required value="<?php echo $data['Bobot']; ?>">
    </div>
	<div id="form">
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal">
	</div>
	</div>
    </form>
	</div>
	</div>
<?php include'footer.php';?>

