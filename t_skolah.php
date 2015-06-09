		<?php
		$cekN		= NULL;
		$cekS		= NULL;
		$id_skolah	= isset($_GET['id']) ? $_GET['id'] : NULL;
		$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;	

		if ($mod == "del") {
			$q_delete_skolah = mysql_query("DELETE FROM t_skolah WHERE id_skolah = '$id_skolah'");
			if ($q_delete_skolah) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 			= "style='display: none'"; 	//default = formnya dihidden
		$tb_act 			= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
		$p_id_skolah   		= isset($_POST['id_skolah']) ? $_POST['id_skolah'] : NULL;		//ambil variabel POST id_skolah
		$p_nama_skolah 		= isset($_POST['nama_skolah']) ? $_POST['nama_skolah'] : NULL;	//ambil variabel POST nama_skolah
		$p_status_skolah 	= isset($_POST['status_skolah']) ? $_POST['status_skolah'] : NULL;
		$p_alamat_skolah 	= isset($_POST['alamat_skolah']) ? $_POST['alamat_skolah'] : NULL;
		$p_kpl_skolah 		= isset($_POST['kpl_skolah']) ? $_POST['kpl_skolah'] : NULL;
		
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_skolah	= mysql_query("INSERT INTO t_skolah VALUES ('', '$p_nama_skolah', '$p_status_skolah',
			'$p_alamat_skolah', '$p_kpl_skolah')");
			if ($q_tambah_skolah) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_skolah	= mysql_query("UPDATE t_skolah SET skolah = '$p_nama_skolah',
			status = '$p_status_skolah', alamat = '$p_alamat_skolah', kepsek = '$p_kpl_skolah'
			WHERE id_skolah = '$p_id_skolah'");
			if ($q_edit_skolah) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi Asal Sekolah</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_skolah&mod=add">Tambah Data Asal Sekolah</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Nama Sekolah Asal</th><th width='30%'>Control</th></tr>";
		$q_skolah 	= mysql_query("SELECT * FROM t_skolah ORDER BY id_skolah ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_skolah);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_skolah = mysql_fetch_array($q_skolah)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_skolah[1]</td>
				<td id='tengah'><a href='?p=t_skolah&mod=edit&id=$a_skolah[0]'>Edit</a> |
					<a href='?p=t_skolah&mod=del&id=$a_skolah[0]' onclick=\"return konfirmasi('Menghapus data $a_skolah[1]')\">Delete</a>
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
			$q_edit_skolah	= mysql_query("SELECT * FROM t_skolah WHERE id_skolah = '$id_skolah'");
			$a_edit_skolah	= mysql_fetch_array($q_edit_skolah);
			
			$nama_skolah = $a_edit_skolah[1];
			if ($a_edit_skolah[2] == "1") {
				$cekN = "checked";
			} else {
				$cekS = "checked";
			}
			$alamat_skolah = $a_edit_skolah[3];
			$kpl_skolah = $a_edit_skolah[4];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_skolah = "";
			$nama_skolah = "";
			$cekN = "";
			$cekS = "";
			$alamat_skolah = "";
			$kpl_skolah = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Asal Sekolah</h3></header>
		<div class="module_content">
		<form action="?p=t_skolah" method="post" id="ft_skolah">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_skolah" readonly value="<?php echo $id_skolah; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="40" name="nama_skolah" value="<?php echo $nama_skolah; ?>"></td></tr>
			<tr><td>Status</td>
			<td>
			<input type="radio" name="status_skolah" value="1" <?php echo $cekN; ?>><label for="status_skolah">Negeri</label>
			<input type="radio" name="status_skolah" value="2" <?php echo $cekS; ?>><label for="status_skolah">Swasta</label>
			</td></tr>
			<tr><td>Alamat Sekolah</td>
			<td><input type="text" size="50" name="alamat_skolah" value="<?php echo $alamat_skolah; ?>"></td></tr>
			<tr><td>Nama Kepala</td>
			<td><input type="text" size="30" name="kpl_skolah" value="<?php echo $kpl_skolah; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
