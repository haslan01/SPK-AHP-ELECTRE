<?php
	include('config.php');
	include('fungsi.php');

	$jenis = $_GET['c'];

	include('header.php');
?>
<div class="container">
	<h2 class="ui header">Perbandingan Alternatif &rarr; <?php echo getKriteriaNama($jenis-1) ?></h2>
	<?php showTabelPerbandingan($jenis,'alternatif'); ?>
</div>

<?php include('footer.php'); ?>