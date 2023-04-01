
<?php
session_start();

$_SESSION['namauser'] = $_POST['namasiswa'];
$_SESSION['kps'] = $_POST['kps'];
$_SESSION['pkh'] = $_POST['pkh'];
$_SESSION['pa'] = $_POST['pa'];

?>


<?php

session_start();
$_SESSION['b1'] = $_POST['b1'];
$_SESSION['b2'] = $_POST['b2'];
$_SESSION['b3'] = $_POST['b3'];

?>

<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Laporan</h1><br>
	<form method="post" action="proses-laporan-hitung.php">
	<table>
	<tr>
	<label>Nama Pegawai :</label>
	<input type="text" name="NamaSiswa" id="namasiswa"required value="<?php echo $_SESSION['namauser'];?>"><br><br></tr>
	<tr>
	<td>
	<label>TES :</label>
	<b><?php echo $_SESSION['kps']*$_SESSION['b1'];?></b>
	</td>
	<td>
	<label>INTERVIEW :</label>
	<b><?php echo $_SESSION['pkh']*$_SESSION['b2'];?></b></td>
	<td>
	<label>OBSERVASI :</label>
	<b><?php echo $_SESSION['pa']*$_SESSION['b3'];?></b></td>
	
	</table><br>
	<label>Jumlah Akhir :</label>
	<input name="hasil"color="red"type="text" value="<?php echo $_SESSION['kps']*$_SESSION['b1']+
					$_SESSION['pkh']*$_SESSION['b2']+
					$_SESSION['pa']*$_SESSION['b3'];?>"></input></color><br>
	<div id="form">
		<input type="submit" value="Simpan">
		<input href="proses-rang.php" type="reset" value="Batal">
	</div>
	</form>
	</div>
	</div>
<?php include'footer.php';?>