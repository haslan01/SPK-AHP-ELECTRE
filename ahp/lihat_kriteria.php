<?php 
require_once('includes/init.php');
$judul_page = 'Home';
require_once('template-parts/header.php');
include'koneksi.php';?>
	<div id="content">
	<div id="artikel"><h1>Data Kriteria</h1><br>
	<!-- <a href="data_kriteria.php" class="excel">Tambah</a><br><br> -->
<table>
    <tr>
        <th>Kode Kriteria</th>
        <th width="300">Nama Kriteria</th>
		 <th width="80"> Bobot</th>
        <th width="80"> Aksi</th>
       
    </tr>
	<?php 
	$query = mysqli_query($conn,"select * from kriteria ORDER BY Nomor");
	
	$no = 1;
	while ($data = mysqli_fetch_array($query)) {
	?>
    <tr>
	
        <td><?php echo $data['Nomor']; ?></td>
        <td><?php echo $data['Nama_Kriteria']; ?></td>
        <td><?php echo $data['Bobot']; ?></td>
		<td><div id="edithapus">
            <a  href="edit-kriteria.php?id=<?php echo $data['Nomor'];?>"class="edit" ></a>
            <a href="delete-kriteria.php?id=<?php echo $data['Nomor']; ?>" class="hapus" onclick="return confirm('Yakin akan menghapus data ?')"></a>
			</div>
		</td>
    </tr>
     <?php 
		$no++;
	} 
	?>
</table>
<?php include'footer.php';?>