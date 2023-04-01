<?php
require_once('includes/init.php');
$judul_page = 'Home';
require_once('template-parts/header.php');
?>

<div class="container">
<section class="content">
	<h3 class="ui header">Matriks Perbandingan Berpasangan</h3>
	<table class="ui collapsing celled blue table">
		<thead>
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) { 
		echo "<th>".getKriteriaNama($i)."</th>";
	}
?>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) { 
		echo "<tr>";
		echo "<td>".getKriteriaNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) { 
				echo "<td>".round($matrik[$x][$y],5)."</td>";
			}

		echo "</tr>";
	}
?>
		</tbody>
		<tfoot>
			<tr>
				<th><b>Jumlah(Culumn Sums)</b></th>
<?php
		for ($i=0; $i <= ($n-1); $i++) { 
			echo "<th>".round($jmlmpb[$i],5)."</th>";
		}
?>
			</tr>
		</tfoot>
	</table>


	<br>

	<h3 class="ui header">Normalisasi</h3>
	<table class="ui celled red table">
		<thead>
			<tr>
				<th>Kriteria</th>
<?php
	for ($i=0; $i <= ($n-1); $i++) { 
		echo "<th>".getKriteriaNama($i)."</th>";
	}
?>
				<th>Jumlah</th>
				<th>Nilai Rata-rata(Row Average)</th>
			</tr>
		</thead>
		<tbody>
<?php
	for ($x=0; $x <= ($n-1); $x++) { 
		echo "<tr>";
		echo "<td>".getKriteriaNama($x)."</td>";
			for ($y=0; $y <= ($n-1); $y++) { 
				echo "<td>".round($matrikb[$x][$y],5)."</td>";
			}

		echo "<td>".round($jmlmnk[$x],5)."</td>";
		echo "<td>".round($pv[$x],5)."</td>";

		echo "</tr>";
	}
?>
			
		</tbody>
		<tfoot>
			<tr>
				<th colspan="<?php echo ($n+2)?>"><b>Nilai Eigen Maksimum(λ maks)</b></th>
				<th><?php echo (round($eigenvektor,5))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>"><b>Indek Konsitensi atau Consistency Index(CI)</b> Rumus: (λ maks-n)/(n-1)</th>
				<th><?php echo (round($consIndex,5))?></th>
			</tr>
			<tr>
				<th colspan="<?php echo ($n+2)?>"><b>Rasio Konsitensi atau Consistency Ratio</b> Rumus: CI/RI</th>
				<!-- <th><?php echo (round(($consRatio),2))?> </th> -->
				<th><?php echo (round(($consRatio * 100),2))?> %</th>
			</tr>
		</tfoot>
	</table>

<?php
	if ($consRatio > 0.1) {
?>
		<div class="ui icon red message">
			<i class="close icon"></i>
			<i class="warning circle icon"></i>
			<div class="content">
				<div class="header">
					Nilai Consistency Ratio Terlalu Besar !!!
				</div>
				<p>Mohon input kembali tabel perbandingan...</p>
			</div>
		</div>

		<br>

		<a href='javascript:history.back()'>
			<button class="ui left labeled icon button">
				<i class="left arrow icon"></i>
				Kembali
			</button>
		</a>

<?php
	} else {

?>
	<a href="ranking-electre.php">
	<button class="ui right labeled icon button" style="float: right;">
		<i class="right arrow icon"></i>
		Lanjut
	</button>
	</a>
<?php 
	}

?>
</section>
</div>
<br><br><br>
<?php require_once('template-parts/footer.php');
?>


