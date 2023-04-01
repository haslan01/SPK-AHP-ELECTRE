<?php require_once('includes/init.php'); ?>

<?php
$errors = array();
$sukses = false;

$ada_error = false;
$result = '';

$id_kriteria = (isset($_GET['id'])) ? trim($_GET['id']) : '';

if(!$id_kriteria) {
	$ada_error = 'Maaf, data tidak dapat diproses.';
} else {
	$query = $pdo->prepare('SELECT * FROM kriteria WHERE kriteria.id_kriteria = :id_kriteria');
	$query->execute(array('id_kriteria' => $id_kriteria));
	$result = $query->fetch();
	
	if(empty($result)) {
		$ada_error = 'Maaf, data tidak dapat diproses.';
	}

	$id_kriteria = (isset($result['id_kriteria'])) ? trim($result['id_kriteria']) : '';
	$kode = (isset($result['kode'])) ? trim($result['kode']) : '';
	$nama_kriteria = (isset($result['nama_kriteria'])) ? trim($result['nama_kriteria']) : '';
	$bobot = (isset($result['bobot'])) ? trim($result['bobot']) : '';
	$jenis_nilai = (isset($result['ada_pilihan'])) ? $result['ada_pilihan'] : 0;
	$urutan_order = (isset($result['urutan_order'])) ? trim($result['urutan_order']) : 0;	
}

if(isset($_POST['submit'])):	
	
	$kode = (isset($_POST['kode'])) ? trim($_POST['kode']) : '';
	$nama_kriteria = (isset($_POST['nama_kriteria'])) ? trim($_POST['nama_kriteria']) : '';
	$bobot = (isset($_POST['bobot'])) ? trim($_POST['bobot']) : '';
	$pilihan = (isset($_POST['pilihan'])) ? $_POST['pilihan'] : '';
	$jenis_nilai = (isset($_POST['jenis_nilai'])) ? trim($_POST['jenis_nilai']) : 0;
	$urutan_order = (isset($_POST['urutan_order'])) ? trim($_POST['urutan_order']) : 0;	
	
	// Validasi Nama Kriteria
	if(!$kode) {
		$errors[] = 'Kode kriteria tidak boleh kosong';
	}		
	// Validasi Tipe
	if(!$nama_kriteria) {
		$errors[] = 'Nama kriteria tidak boleh kosong';
	}
	// Validasi Bobot
	if(!$bobot) {
		$errors[] = 'Bobot kriteria tidak boleh kosong';
	}
	
	// Jika lolos validasi lakukan hal di bawah ini
	if(empty($errors)):
		
		$prepare_query = 'UPDATE kriteria SET kode = :kode, nama_kriteria = :nama_kriteria, bobot = :bobot, urutan_order = :urutan_order, ada_pilihan = :jenis_nilai WHERE id_kriteria = :id_kriteria';
		$data = array(
			'kode' => $kode,
			'nama_kriteria' => $nama_kriteria,
			'bobot' => $bobot,
			'urutan_order' => $urutan_order,
			'id_kriteria' => $id_kriteria,
			'jenis_nilai' => $jenis_nilai			
		);		
		$handle = $pdo->prepare($prepare_query);		
		$sukses = $handle->execute($data);
		
		
		// Simpan Pilihan Kriteria / Variabel
		$ids_pilihan = array();
		if(!empty($pilihan)): foreach($pilihan as $pil):
			
			$nama = (isset($pil['nama'])) ? trim($pil['nama']) : '';
			$nilai = (isset($pil['nilai'])) ? floatval(trim($pil['nilai'])) : '';
			$id_pil_kriteria = (isset($pil['id'])) ? trim($pil['id']) : '';
			$urutan_order = (isset($pil['urutan']) && $pil['urutan']) ? (int) trim($pil['urutan']) : 0;

			echo $nilai;
			if($id_pil_kriteria && $nama != '' && ($nilai >= 0)):				
				// Update jika pilihan telah ada di database				
				$prepare_query = 'UPDATE pilihan_kriteria SET nama = :nama, id_kriteria = :id_kriteria, nilai = :nilai, urutan_order = :urutan_order WHERE id_pil_kriteria = :id_pil_kriteria';
				$data = array(
					'nama' => $nama,
					'id_kriteria' => $id_kriteria,
					'nilai' => $nilai,
					'urutan_order' => $urutan_order,
					'id_pil_kriteria' => $id_pil_kriteria		
				);		
				$handle = $pdo->prepare($prepare_query);		
				$sukses = $handle->execute($data);
				if($sukses):
					$ids_pilihan[] = $id_pil_kriteria;
				endif;					
				
			elseif(($nama != '') && ($nilai >= 0)):
				// Insert jika pilihan belum ada di database
				$prepare_query = 'INSERT INTO pilihan_kriteria (nama, id_kriteria, nilai, urutan_order) VALUES  (:nama, :id_kriteria, :nilai, :urutan_order)';
				$data = array(
					'nama' => $nama,
					'id_kriteria' => $id_kriteria,
					'nilai' => $nilai,
					'urutan_order' => $urutan_order	
				);		
				$handle = $pdo->prepare($prepare_query);		
				$sukses = $handle->execute($data);				
				if($sukses):
					$last_id = $pdo->lastInsertId();
					$ids_pilihan[] = $last_id;
				endif;
				
			endif;
			
		endforeach; endif; // end if(!empty($pilihan))
			
		// Bersihkan pilihan
		if(!empty($ids_pilihan)):
			$prepare_query = 'DELETE FROM pilihan_kriteria WHERE id_pil_kriteria = ids_pilihan';
			$handle = $pdo->prepare($prepare_query);	
			$handle->execute();
		else:
		 	$prepare_query = 'DELETE FROM pilihan_kriteria WHERE id_kriteria = :id_kriteria';
		 	$handle = $pdo->prepare($prepare_query);	
			$handle->execute(array('id_kriteria' => $id_kriteria));
		 endif;
		
		redirect_to('list-kriteria.php?status=sukses-edit');
		
	
	endif;

endif;
?>

<?php
$judul_page = 'Tambah Alternatif';
require_once('template-parts/header.php');
?>

	<div class="main-content-row">
	<div class="container clearfix">
	
		<?php include_once('template-parts/sidebar-alternatif.php'); ?>
	
		<div class="main-content the-content">
			<h1>Inputkan Nilai Anda</h1>
			
			<?php if(!empty($errors)): ?>
			
				<div class="msg-box warning-box">
					<p><strong>Error:</strong></p>
					<ul>
						<?php foreach($errors as $error): ?>
							<li><?php echo $error; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				
			<?php endif; ?>			
			
			
				<form action="input_nilai.php" method="post">
					<?php
					$query = $pdo->prepare('SELECT id_kriteria, kode, nama_kriteria, ada_pilihan FROM kriteria ORDER BY urutan_order ASC');			
					$query->execute();
					// menampilkan berupa nama field
					$query->setFetchMode(PDO::FETCH_ASSOC);
					
					if($query->rowCount() > 0):
					
						while($kriteria = $query->fetch()):							
						?>
						
							<div class="field-wrap clearfix">					
								<label><?php echo $kriteria['nama_kriteria']; ?></label>
								<input type="number" step="1" name="kriteria[<?php echo $kriteria['id_kriteria']; ?>]">							
							</div>	
						
						<?php
						endwhile;
						
					else:					
						echo '<p>Kriteria masih kosong.</p>';						
					endif;
					?>
					
					<div class="field-wrap clearfix">
						<button type="submit" name="submit" value="submit" class="button">Simpan</button>
					</div>
				</form>
					
			
		</div>
	
	</div><!-- .container -->
	</div><!-- .main-content-row -->


<?php
require_once('template-parts/footer.php');