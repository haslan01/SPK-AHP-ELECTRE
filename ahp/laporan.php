
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Laporan Hasil Akhir</h1><br>
	<a href="print.php?print=laporan-hasil.php" target="_blank" class="excel">Cetak</a><br><br>
	<table width="100%">
    <tr>
        <th>Nama Pegawai</th>
        <th>Tes</th>
        <th>Interview</th>
        <th>Observasi</th>
		<th>Nilai Akhir</th>
		<th>Rank</th>
    </tr>
	<?php 
	
	
	$query=mysqli_query($conn,"SET @rank=0;");
	$query=mysqli_query($conn,"SELECT @rank:=@rank+1 AS rank, nama_siswa, jumlah_akhir, tes, interview, observasi from laporan order by jumlah_akhir desc;");
	
	
	
	$no = 1;
	while ($data = mysqli_fetch_array($query)) {
	?>
    <tr>
        <td><?php echo $data['nama_siswa']; ?></td>
        <td><?php echo $data['tes']; ?></td>
        <td><?php echo $data['interview']; ?></td>
        <td><?php echo $data['observasi']; ?></td>
        <td><?php echo $data['jumlah_akhir']; ?></td>
        <td><?php echo $data['rank']; ?></td>
		
		
    </tr>
     <?php 
		$no++;
	} 
	?>
</table>
	
	</div>
	</div>
<?php include'footer.php';?>