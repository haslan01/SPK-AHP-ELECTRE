<?php
session_start();
unset($_SESSION['hasil']);
unset($_SESSION['normal']);
unset($_SESSION['ahir']);

?>
<?php include'koneksi.php';?>
<?php include'header.php';?>
<?php 	
$b_tes = mysqli_fetch_array(mysqli_query($conn,"SELECT `Bobot` FROM `kriteria` WHERE Nama_Kriteria = 'TES'"));
$b_int = mysqli_fetch_array(mysqli_query($conn,"SELECT `Bobot` FROM `kriteria` WHERE Nama_Kriteria = 'INTERVIEW'"));
$b_ob = mysqli_fetch_array(mysqli_query($conn,"SELECT `Bobot` FROM `kriteria` WHERE Nama_Kriteria = 'OBSERVASI' "));

if (isset($_POST['submit'])) {
	$tes = $_POST['kps'];
	$interview = $_POST['pkh'];
	$observasi = $_POST['pa'];
	$nama = $_POST['namasiswa'];
	
	
	$get = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`tes`) AS `tes`, SUM(`interview`) AS `interview`, SUM(`observasi`) AS `observasi` FROM `pegawai`"));
	$tot_tes = $get['tes'];
	$tot_inter = $get['interview'];
	$tot_obser = $get['observasi'];


	$_SESSION['hasil'] = array(
		'tot_tes' => $tot_tes,
		'tot_inter' => $tot_inter,
		'tot_obser' => $tot_obser,
		'tes' => $tes / $tot_tes,
		'interview' => $interview / $tot_inter,
		'observasi' => $observasi / $tot_obser
	 );
	$_SESSION['normal'] = array(
		'tes' => $_SESSION['hasil']['tes'] * $b_tes['Bobot'],
		'interview' => $_SESSION['hasil']['interview'] * $b_int['Bobot'],
		'observasi' => $_SESSION['hasil']['observasi'] * $b_ob['Bobot']
	 );
	$_SESSION['ahir'] = $_SESSION['normal']['tes'] + $_SESSION['normal']['interview'] + $_SESSION['normal']['observasi'];

	$h_tes = $_SESSION['hasil']['tes'];
	$h_interview = $_SESSION['hasil']['interview'];
	$h_observasi = $_SESSION['hasil']['observasi'];
	$h_ahir = $_SESSION['ahir']; 
	mysqli_query($conn,"INSERT INTO laporan VALUES('','$nama', '$h_tes', '$h_interview', '$h_observasi', '$h_ahir')");
}

?>
	<div id="content-rangking">
	<?php include'sidebar.php';?>
	<div id="artikel-rangking"><h1>Proses</h1><br>


	<form method="post" action="">
	<table>
    <tr>
        <td>NAMA PEGAWAI</td>
        <td>
        <select name="namasiswa" style="width:100%;" id="nama">
			<option value="0"></option>
			<?php
			$query = "select * from pegawai";
			$hasil = mysqli_query($conn,$query);
			while ($qtabel = mysqli_fetch_assoc($hasil))
			{
				echo '<option value="'.$qtabel['Nama'].'">'.$qtabel['Nama'].'</option>';				
			}
			?>
		</select> 
        </td>
    </tr>
    <tr>
        <td>TES</td>
        <td>	
		 <input type="text" name="kps" id="tes">
        </td>
    </tr>
    <tr>
        <td> INTERVIEW</td>
        <td>
        	<input type="text" name="pkh" id="interview">
        </td>
    </tr>
    <tr>
        <td > OBSERVASI</td>
        <td>
        	<input type="text" name="pa" id="observasi">
        </td>
    </tr>
</table>

<div id="form">
		<input type="submit" value="Simpan" name="submit">
		<input type="reset" value="Batal">
	</div>

</form>
<?php if(isset($_SESSION['hasil'])) :?>
<table width="100%" style="font-weight: bold; font-size: 15px;" cellpadding="25px" cellspacing="25px">
		<tr>
			<td>Kriteria</td>
			<td>Nilai</td>
			<td>Bobot Kriteria</td>
			<td>Hasil normalisasi</td>
		</tr>
		<tr>
			<td>Tes</td>
			<td><?=$_SESSION['hasil']['tes'];?></td>
			<td><?=$b_tes['Bobot'];?></td>
			<td><?=$_SESSION['normal']['tes'];?></td>
		</tr>
		<tr>
			<td>Interview</td>
			<td><?=$_SESSION['hasil']['interview'];?></td>
			<td><?=$b_int['Bobot'];?></td>
			<td><?=$_SESSION['normal']['interview'];?></td>
		</tr>
		<tr>
			<td>Observasi</td>
			<td><?=$_SESSION['hasil']['observasi'];?></td>
			<td><?=$b_ob['Bobot'];?></td>
			<td><?=$_SESSION['normal']['observasi'];?></td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;">Hasil Ahir</td>
			<td><?=$_SESSION['ahir'];?></td>
		</tr>
	</table>
	<br>
	<h4>Total Nilai Semua Data</h4>
	<table width="100%" style="font-weight: bold; font-size: 15px;" cellspacing="25px" cellspacing="25px">
		<tr>
			<td>Tes</td>
			<td>Interview</td>
			<td>Observasi</td>
		</tr>
		<tr>
			<td><?=$_SESSION['hasil']['tot_tes'];?></td>
			<td><?=$_SESSION['hasil']['tot_inter'];?></td>
			<td><?=$_SESSION['hasil']['tot_obser'];?></td>
		</tr>
	</table>
<?php endif;?>
	</div>
	</div>
<script src="css/jquery.js"></script>

<script>
	$(function(){
		$('#nama').on('change', function(event) {
			/* Act on the event */
			const nama = $(this).val();
			$.ajax({
				url: 'get_pegawai.php',
				type: 'POST',
				dataType: 'json',
				data: {nama: nama},
			})
			.done(function(hasil) {
				// console.log("success");
				$('#tes').val(hasil.tes);
				$('#interview').val(hasil.interview);
				$('#observasi').val(hasil.observasi);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
		});
	})
</script>
<?php include'footer.php';?>