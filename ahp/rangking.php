<?php include'koneksi.php';?>
<?php include'header.php';?>
	<div id="content-analisa">
	<?php include'sidebar.php';?>
	<div id="artikel-analisa"><h1>Proses</h1><br>


	<form method="post" action="proses.php">
	<table>
    <tr>
        <th>Nama Siswa</th>
        <th width="300">KPS</th>
        <th width="150"> PKH</th>
        <th width="150"> Panti Asuhan</th>
        <th width="150"> Korban Bencana</th>
        <th width="150"> SKTM</th>
        <th width="150"> Kesulitan Biaya</th>
        <th width="150"> Yatim Piatu</th>
        <th width="150"> Pengahasilan Ortu</th>
        <th width="150"> Jumlah Saudara</th>
        <th width="150"> Prestai</th>
        <th width="150"> Rata-Rata Raport</th>
        <th width="150"> Kelainan Fisik</th>
        <th width="150"> Kelas</th>
        <th width="150"> Pekerjaan Ortu</th>
        <th width="150"> SKKB</th>
    </tr>
	<tr>
	<?php 
	$query = mysql_query("select * from siswa ORDER BY nama_siswa");
	
	$no = 1;
	while ($data = mysql_fetch_array($query)) {
	?>
    <tr>
        <td><input disabled width="100"value="<?php echo $data['nama_siswa']; ?>" id="bobot"required ></td>
        <td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
        <td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
		<td><select>
			<option value="0">--</option>
			<option value="Laki-Laki">Ada</option>
			<option value="Perempuan">Tidak Ada</option>
			</select>
		</td>
    </tr>
     <?php 
		$no++;
	} 
	?>
	</tr>
	
</table>
<div id="form">
		<input type="submit" value="Simpan">
		<input type="reset" value="Batal">
	</div>

</form>
<iframe align="left" frameborder="0" src="http://unique-r1-8.blogspot.com/" width="500" height="300" scrolling="yes"> </iframe>
	</div>
	</div>
<?php include'footer.php';?>