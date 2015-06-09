		<?php
		$id_prestasi= isset($_GET['id']) ? $_GET['id'] : NULL;
		$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;	

		if ($mod == "del") {
			$q_delete_prestasi = mysql_query("DELETE FROM t_prestasi WHERE id_prestasi = '$id_prestasi'");
			if ($q_delete_prestasi) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 			= "style='display: none'"; 	//default = formnya dihidden
		$tb_act 			= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
		$p_id_prestasi   	= isset($_POST['id_prestasi']) ? $_POST['id_prestasi'] : NULL;		//ambil variabel POST id_prestasi
		$p_nama_prestasi 	= isset($_POST['nama_prestasi']) ? $_POST['nama_prestasi'] : NULL;	//ambil variabel POST nama_prestasi
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_prestasi	= mysql_query("INSERT INTO t_prestasi VALUES ('', '$p_nama_prestasi')");
			if ($q_tambah_prestasi) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_prestasi	= mysql_query("UPDATE t_prestasi SET prestasi = '$p_nama_prestasi' WHERE id_prestasi = '$p_id_prestasi'");
			if ($q_edit_prestasi) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi Tingkat Prestasi</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_prestasi&mod=add">Tambah Data Tingkat Prestasi</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Prestasi</th><th width='30%'>Control</th></tr>";
		$q_prestasi 	= mysql_query("SELECT * FROM t_prestasi ORDER BY id_prestasi ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_prestasi);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_prestasi = mysql_fetch_array($q_prestasi)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_prestasi[1]</td>
				<td id='tengah'><a href='?p=t_prestasi&mod=edit&id=$a_prestasi[0]'>Edit</a> |
					<a href='?p=t_prestasi&mod=del&id=$a_prestasi[0]' onclick=\"return konfirmasi('Menghapus data $a_prestasi[1]')\">Delete</a>
				</tr>";
				$no++;
			}
		}
		echo "</table>";
		?>

		</div>
</article>

		<?php
		// ================ DATA URL "mod" ( GET ) =====================//

		if ($mod == "edit") {
			$display = "";
			$q_edit_prestasi	= mysql_query("SELECT * FROM t_prestasi WHERE id_prestasi = '$id_prestasi'");
			$a_edit_prestasi	= mysql_fetch_array($q_edit_prestasi);
			
			$nama_prestasi = $a_edit_prestasi[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_prestasi = "";
			$nama_prestasi = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Tingkat Prestasi</h3></header>
		<div class="module_content">
		<form action="?p=t_prestasi" method="post" id="ft_prestasi">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_prestasi" readonly value="<?php echo $id_prestasi; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_prestasi" value="<?php echo $nama_prestasi; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
