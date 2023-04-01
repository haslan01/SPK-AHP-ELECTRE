<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis'])) {
		$jenis	= $_GET['jenis'];
	}

	if (isset($_POST['tambah'])) {
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];

		tambahData($jenis,$nama);

		header('Location: '.$jenis.'.php');
	}

	include('header.php');
?>

<div class="container">
	<h2>Tambah <?php echo $jenis?></h2>

	<form method="post" action="tambah.php">
		<div class="form-group">
			<label>Nama <?php echo $jenis ?></label>
			<input type="text" class="form-control" name="nama" placeholder="<?php echo $jenis?> baru">
			<input type="hidden" name="jenis" value="<?php echo $jenis?>">
		</div>
		<input class="btn btn-success" type="submit" name="tambah" value="SIMPAN">
	</form>
</section>

<?php include('footer.php'); ?>