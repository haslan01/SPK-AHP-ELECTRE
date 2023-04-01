
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Tambah Data Siswa</h1><br>
	<form method="post" action="proses.php">
	<div class="control-group">
        <label>NIS</label>
         <input type="text" name="nisn" id="nisn"required>
    </div>
    <div class="control-group">
        <label>Nama Siswa</label>
         <input type="text" name="NamaSiswa" id="namasiswa"required>
    </div>
    <div class="control-group">
        <label>Tanggal Lahir</label>
         <input type="date" name="tgl" id="tgl">
    </div>
    <div class="control-group">
        <label>Ayah</label>
         <input type="text" name="ayah" id="nohp"required>
    </div>
	<div class="control-group">
        <label>Ibu</label>
         <input type="text" name="ibu" id="nohp"required>
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

