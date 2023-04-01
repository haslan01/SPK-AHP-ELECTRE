<?php include'koneksi.php';?>
<?php include'header.php'; ?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Input Data </h1><br>
	<form method="post" action="proses_kriteria.php">
	<div class="control-group">
        <label>Kode Kriteria</label>
         <input type="text" name="Nomor" id="kd_kriteria"required>
    </div>
    <div class="control-group">
        <label>Kriteria</label>
         <input type="text" name="Nama_Kriteria" id="nama_kriteria"required>
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

