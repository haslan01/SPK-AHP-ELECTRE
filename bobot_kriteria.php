<?php
	include('config.php');
	include('fungsi.php');


require_once('includes/init.php');
$judul_page = 'Home';
require_once('template-parts/header.php');

?>
<div class="container">
	<h2>Matrik Perbandingan Berpasangan</h2>
	<h4>(Matrik Pairwise Comparison)</h4>
	<?php showTabelPerbandingan('kriteria','kriteria'); ?>
</div>

<br>
<?php
require_once('template-parts/footer.php');