
<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content">
	<?php include'sidebar.php';?>
	<div id="artikel"><h1>Data Pegawai</h1><br>
	<a href="tambah_siswa.php" class="excel">Tambah</a>
	<table>
    <tr>
        <th width="150" >No</th>
        <th width="200"> Nama pegawai</th>
        <th width="200">Alamat</th>
		<th width="80">Jenis Kelamin</th>
		<th width="100">Aksi</th>
    </tr>
	<?php 
	$query = mysqli_query($conn,"select * from pegawai ORDER BY Nama");
	
	$no = 1;
	while ($data = mysqli_fetch_array($query)) {
	?>
    <tr>
        <td><?php echo $data['NIS']; ?></td>
        <td><?php echo $data['Nama']; ?></td>
        <td><?php echo $data['Alamat']; ?></td>
        <td><?php echo $data['Jenis_Kelamin']; ?></td>
		
		<td>
			<div id="edithapus">
            <a  href="edit-siswa.php?id=<?php echo $data['NIS'];?>"class="edit" ></a>
            <a href="delete-siswa.php?id=<?php echo $data['NIS']; ?>" class="hapus" onclick="return confirm('Yaki akan menghapus data ?')"></a>
			</div>
        </td>
    </tr>
     <?php 
		$no++;
	} 
	?>
</table>
	</div>
	</div>
<?php include'footer.php';?>

