<?php
$total_results 	= mysql_result(mysql_query("SELECT COUNT(*) FROM master"),0);

//DELETE ROWS
$mod 			= isset($_GET['mod']) ? $_GET['mod'] : NULL;
$id_del 		= isset($_GET['id']) ? $_GET['id'] : NULL;

if ($mod == "del") {
	$q_del = mysql_query("DELETE FROM master WHERE id_daftar = '$id_del'");

	if ($q_del) {
		echo "<h4 class='alert_success'>Data berhasil Dihapus. <span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
}
		
?>

<article class="module width_full">
	<header><h3>Data Pendaftar (<?php echo $total_results; ?> pendaftar) | <a href="?p=daftar_form&mod=add"> Tambah Data</a></h3></header>
		<div class="module_content">
		
		<?php			
		// PAGING ============ //
		$hal = isset($_GET['hal']) ? $_GET['hal'] : NULL;
		if(!isset($hal)){ $page = 1; $hal = 1;} else { $page = $_GET['hal']; $hal = $_GET['hal'];}
		$max = 20;
		$from = (($page*$max)-$max);
		
		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'>
		<tr><th width='5%'>ID</th>
		<th width='35%'>Nama</th>
		<th width='27%'>Sekolah Asal</th>
		<th width='10%'>Jumlah Nilai</th>
		<th width='23%'>Control</th></tr>";
		$q_daftar 	= mysql_query("SELECT * FROM master ORDER BY id_daftar ASC LIMIT $from, $max") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_daftar);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='5'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_daftar = mysql_fetch_array($q_daftar)) {
				echo "<tr>
				<td id='tengah'>$a_daftar[0]</td>
				<td>$a_daftar[1]</td>
				<td>$a_daftar[18]</td>
				<td id='tengah'>$a_daftar[35]</td>
				<td id='tengah'><a href='?p=daftar_form&mod=edit&id=$a_daftar[0]'>Edit</a> |
					<a href='?p=daftar_data&mod=del&id=$a_daftar[0]' onclick=\"return konfirmasi('Menghapus data $a_daftar[1]')\">Delete</a> |
					<a href='#' onclick=\"buka('formulir_daftar.php?id_daftar=$a_daftar[0]')\">Cetak</a>
				</tr>";
				$no++;
			}
		}
		echo "</table><br><br>";
		
		$total_pages = ceil($total_results / $max);

		echo "<center>";

		if($hal > 1){
		$prev = ($page-1);
		echo "<a class='paging' href=$_SERVER[PHP_SELF]?p=daftar_data&hal=$prev><< Prev</a>";
		}

		for($i = 1; $i <= $total_pages; $i++){
		if(($hal) == $i){
		echo "<span class='aktif'>$i</span>";
		} else {
		echo "<a class='paging' href=$_SERVER[PHP_SELF]?p=daftar_data&hal=$i>$i</a>";
		}
		}


		if($hal < $total_pages){
		$next = ($page + 1);
		echo "<a class='paging' href=$_SERVER[PHP_SELF]?p=daftar_data&hal=$next>Next >></a>";
		}
		echo "</center>";
		?>

		</div>
</article>