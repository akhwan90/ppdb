<?php
$tombol		= isset($_POST['tombol']) ? $_POST['tombol'] : NULL;
$mod		= isset($_GET['mod']) ? $_GET['mod'] : NULL;

if ($tombol == "Proses") {
	mysql_query("TRUNCATE TABLE admin");
	mysql_query("TRUNCATE TABLE master");
	mysql_query("TRUNCATE TABLE t_agama");
	mysql_query("TRUNCATE TABLE t_jurusan");
	mysql_query("TRUNCATE TABLE t_penddk");
	mysql_query("TRUNCATE TABLE t_pkj");
	mysql_query("TRUNCATE TABLE t_prestasi");
	mysql_query("TRUNCATE TABLE t_sekolah");
	mysql_query("TRUNCATE TABLE t_skolah");

	$fileName 	= $_FILES['restore']['name']; //get the file name
	$fileSize 	= $_FILES['restore']['size']; //get the size
	$fileError 	= $_FILES['restore']['error'];
	$fileType 	= $_FILES['restore']['type'];

	$tipeFile	= getEkstensiFile($fileName);

	if ($tipeFile == "sql") {
		$move = move_uploaded_file($_FILES['restore']['tmp_name'], 'temp/'.$fileName);
		$rest = restore("temp/".$fileName);
		
		unlink("temp/".$fileName);
		
		if (!$rest) {
			echo "<h4 class='alert_success'>Berhasil Restore<span id='close'>[<a href='#'>X</a>]</span></h4>";	
		} else {
			echo "<h4 class='alert_error'>Gagal Restore ".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
		}
		
	} else {
	
		echo "<h4 class='alert_error'>Bukan File SQL. Tipe file Anda  : <b>$fileType</b><span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
	
} else if ($mod == "backup") {
	$bck = backup_tables("*");
	echo "<meta http-equiv='refresh' content='0; url= donload.php?filename=$bck'>";
	if ($bck) {
		echo "<h4 class='alert_success'>Berhasil Backup<span id='close'>[<a href='#'>X</a>]</span></h4>";	
	} else {
		echo "<h4 class='alert_error'>Backup gagal<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
} 
?>

<article class="module width_full">
	<header><h3>Backup dan Restore Database</h3></header>
		<div class="module_content">
		<h3>Backup Database</h3>
		<br>
		<div style="padding: 10px; font-weight: bold; cursor: pointer; width: 65px; display: inline; background: #C6E28B; border-radius: 8px;">
		<a href="?p=bnr&mod=backup">Klik Disini</a></div> untuk mulai backup Database<br><br><br><br>
		
		<h3>Restore Database</h3>
		<form action="?p=bnr&mod=restore" method="POST" enctype="multipart/form-data">
		Pilih Filenya <input type="file" name="restore">
		<input type="submit" name="tombol" value="Proses" id="tombol" onclick="return konfirmasi('Restore Data. Data Lama akan TERHAPUS dan tidak BISA KEMBALI. Lakukan BACKUP dulu...!!!')">
		<br><br><br>
		</form>
		</div>
</article>