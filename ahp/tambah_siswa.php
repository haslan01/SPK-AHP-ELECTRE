
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Tambah Data Pegawai</h1><br>
	<form method="post" action="proses.php">
    <div class="control-group">
        <label>Nama Pegawai</label>
         <input type="text" name="NamaSiswa" id="namasiswa"required autofocus>
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
    </div>
    <div class="control-group">
        <label>Tes</label>
         <input type="text" name="tes" id="nohp"required>
    </div>
    <div class="control-group">
        <label>Interview</label>
         <input type="text" name="interview" id="nohp"required>
    </div>
    <div class="control-group">
        <label>Observasi</label>
         <input type="text" name="observasi" id="nohp"required>
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

