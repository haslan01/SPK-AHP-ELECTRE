
<?php include 'koneksi.php';?>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/tabel.css">

</head>
<body style="text-align: center;">
<h2>  &nbsp; &nbsp; HASIL PENILAIAN PEGAWAI</h2>
<h3>  &nbsp; &nbsp; Madrasah Ibtidaiyah 45 Kalen </h3>
<div style="margin: auto;">
<table width="100%" border="1">
    <tr>
      <th>  No</th>
        <th>Nama Pegawai</th>
        <th>Tes</th>
        <th>Interview</th>
        <th>Observasi</th>
		<th>Nilai Akhir</th>
		<th>Ranking</th>
    	<th>Keterangan</th>
    </tr>
	<?php 
	
	
	$query=mysqli_query($conn,"SET @rank=0;");
	$query=mysqli_query($conn,"SELECT @rank:=@rank+1 AS rank, nama_siswa, jumlah_akhir, tes, interview, observasi from laporan order by jumlah_akhir desc;");
	
	
	
	$no = 1;
	while ($data = mysqli_fetch_array($query)) {
	?>
    <tr>
          <td>  <?=$no++;;?></td>
        <td><?php echo $data['nama_siswa']; ?></td>
        <td><?php echo $data['tes']; ?></td>
        <td><?php echo $data['interview']; ?></td>
        <td><?php echo $data['observasi']; ?></td>
        <td><?php echo $data['jumlah_akhir']; ?></td>
        <td><?php echo $data['rank']; ?></td>
        <td>  <?php if($data['rank'] < 6 ){ echo "Diterima"; }else{ echo "Tidak diterima";}?></td>
    </tr>
     <?php 
		$no++;
	} 
	?>
</table>
</div>

</body>
</html>