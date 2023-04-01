
<!DOCTYPE html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- My CSS -->
    <style>
      .card-kriteria:hover,
      .card-karyawan:hover,
      .card-laporan:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
      }
    </style>

	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta charset="UTF-8" />
	<title><?php
		if(isset($judul_page)) {
			echo $judul_page;
		}
	?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<link rel="stylesheet" href="stylesheets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>	
	<script type="text/javascript" src="js/superfish.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>	
</head>
<body>

	<?php include "koneksi.php";

	 ?>
	<div id="page">
	
	<header id="header">
		<div class="container clearfix">
			<div id="logo-wrap">
				<h1 id="logo"><a href="index.php"><img width="200px" src="images/logo-app.png" alt="" ></a></h1>
			</div>
			
			<div id="header-content" class="clearfix" >
				<nav id="nav">
					<ul class="sf-menu">
							<li><a href="index.php">Home</a>
						<?php $user_role = get_role(); ?>
						<?php if($user_role == 'admin'): ?>	
					        <li><a href="list-user.php">User</a>
								<ul>
									<li><a href="list-user.php">List User</a></li>
									<li><a href="tambah-user.php">Tambah User</a></li>
								</ul>
							</li>	
							<li><a href="kriteria.php">Kriteria</a>
								<ul>
									<li><a href="kriteria.php">Kriteria</a></li>
									<li><a href="bobot_kriteria.php">Analisa Kriteria</a></li>
								</ul>
							</li>
						<?php endif; ?>
						<?php if($user_role == 'admin' || $user_role == 'petugas'): ?>
							<li><a href="list-alternatif.php">Program Studi</a>
								<ul>
									<li><a href="list-alternatif.php">List Prodi</a></li>
									<li><a href="tambah-alternatif.php">Tambah Prodi</a></li>
								</ul>
							</li>
						<?php endif; ?>
							<li><a href="ranking-electre.php">Perhitungan</a>
								<!-- <ul>
									<li><a href="list-kriteria.php">Input Nilai</a></li>
									<li><a href="ranking-electre.php">Perhitungan</a></li>
								</ul> -->
							</li>						
					</ul>
				</nav>
				
				<div id="header-right">
					<?php if(isset($_SESSION['user_id'])): ?>
						<a href="logout.php" class="button">Log Out</a>
					<?php else: ?>
						<a href="login.php" class="button">Log In</a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	
	<div id="main">