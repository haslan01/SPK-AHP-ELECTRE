
<?php include'header.php';?>
<?php include'koneksi.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Import Data Siswa</h1><br>
	
	<center><form method="post" enctype="multipart/form-data" action="import.php" align="center">
	Silakan Pilih File Excel: <input name="userfile" type="file">
	<input name="upload" type="submit" value="Import">
	</form></center>

	<?php
	// menggunakan class phpExcelReader
	include "excel_reader2.php";
	include "koneksi.php";

	// membaca file excel yang diupload
	$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);

	// membaca jumlah baris dari data excel
	$baris = $data->rowcount($sheet_index=0);

	// nilai awal counter untuk jumlah data yang sukses dan yang gagal diimport
	$sukses = 0;
	$gagal = 0;

	// import data excel mulai baris ke-2 (karena baris pertama adalah nama kolom)
	for ($i=2; $i<=$baris; $i++)
	{
	  
	$data1=$data->val($i, 1); 
	$data2=$data->val($i, 2);
	$data3=$data->val($i, 3);
	$data4=$data->val($i, 4);
	$data5=$data->val($i, 5);
	$data6=$data->val($i, 6);

	//$data39=$data->val($i, 39);    <-- DIBUANG 
	//$data40=$data->val($i, 40);    <-- DIBUANG
	// di MySQL ada 38 field sementara di excel ada 40 field jadi proses impor gagal karena jumlah kolom berbeda


	  // setelah data dibaca, sisipkan ke dalam tabel mhs
	//  $query = "INSERT INTO mhs VALUES ('$nim', '$nama', '$alamat')";

	// ERROR --> Nama tabel tidak boleh dengan angka tetapi dimulai dengan huruf, 
	//asal 001 saya ubah menjadi tbl001

	$strSQL  = "INSERT INTO siswa (
	NIS,
	Nama,
	Jenis_Kelamin,
	TTL,
	Nama_Wali,
	Alamat
	)  VALUES 
	( '$data1','$data2','$data3','$data4','$data5','$data6');"; 
	  $hasil = mysql_query($strSQL) or die(mysql_error());


	  // jika proses insert data sukses, maka counter $sukses bertambah
	  // jika gagal, maka counter $gagal yang bertambah
	  if ($hasil)
		header('');
	  else $gagal++;
	}

	// tampilan status sukses dan gagal
	// echo "<h3>Proses import data selesai.</h3>";
	//echo "<p>Jumlah data yang sukses diimport : ".$sukses."<br>";
	//echo "Jumlah data yang gagal diimport : ".$gagal."</p>";

	?>
	
	</div>
	</div>
<?php include'footer.php';?>

