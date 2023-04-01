<?php 
	include('config.php');
	include('fungsi.php');

	// menjalankan perintah edit
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=kriteria&id='.$id);
		exit();
	}

	// menjalankan perintah delete
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteKriteria($id);
	}

	// menjalankan perintah tambah
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('kriteria',$nama);
	}

require_once('includes/init.php');
$judul_page = 'Home';
require_once('template-parts/header.php');
?>


<div class="container">
	<h2>Kriteria (Penilaian)</h2>
	
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Kriteria</th>
				<!-- <th>Aksi</th> -->
			</tr>
		</thead>
		<tbody>

				<?php
					// Menampilkan list kriteria
					$query = "SELECT id,nama FROM tb_kriteria ORDER BY id";
					$result	= mysqli_query($koneksi, $query);

					$i = 0;
					while ($row = mysqli_fetch_array($result)) {
						$i++;
				?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['nama'] ?></td>
				<!-- <td>
					<form method="post" action="kriteria.php">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<button type="submit" name="edit" class="btn btn-warning">EDIT</button>
						<button type="submit" name="delete" class="btn btn-danger">DELETE</button>
					</form>
				</td>
			</tr> -->
		

	<?php } ?>


		</tbody>
		
			<!-- <tr>
				<th>
					<a href="tambah.php?jenis=kriteria">
						<div class="btn btn-success">Tambah
					</div>
					</a>
				</th>
			</tr>
 -->
	</table>
	</form>
	</div>
			

</section>

<br>
<?php
require_once('template-parts/footer.php');