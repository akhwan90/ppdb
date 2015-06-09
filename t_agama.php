<?php
$id_agama	= isset($_GET['id']) ? $_GET['id'] : NULL;
$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;	

		if ($mod == "del") {
			$q_delete_agama = mysql_query("DELETE FROM t_agama WHERE id_agama = '$id_agama'");
			if ($q_delete_agama) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 		= "style='display: none'"; 	//default = formnya dihidden
		$tb_act 		= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
		$p_id_agama   	= isset($_POST['id_agama']) ? $_POST['id_agama'] : NULL;			//ambil variabel POST id_agama
		$p_nama_agama 	= isset($_POST['nama_agama']) ? $_POST['nama_agama'] : NULL;		//ambil variabel POST nama_agama
		
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_agama	= mysql_query("INSERT INTO t_agama VALUES ('', '$p_nama_agama')");
			if ($q_tambah_agama) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_agama	= mysql_query("UPDATE t_agama SET agama = '$p_nama_agama' WHERE id_agama = '$p_id_agama'");
			if ($q_edit_agama) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
?>
<article class="module width_full">
	<header><h3>Referensi Agama</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_agama&mod=add">Tambah Data Agama</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Agama</th><th width='30%'>Control</th></tr>";
		$q_agama 	= mysql_query("SELECT * FROM t_agama ORDER BY id_agama ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_agama);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_agama = mysql_fetch_array($q_agama)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_agama[1]</td>
				<td id='tengah'><a href='?p=t_agama&mod=edit&id=$a_agama[0]'>Edit</a> |
					<a href='?p=t_agama&mod=del&id=$a_agama[0]' onclick=\"return konfirmasi('Menghapus data $a_agama[1]')\">Delete</a>
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
			$q_edit_agm	= mysql_query("SELECT * FROM t_agama WHERE id_agama = '$id_agama'");
			$a_edit_agm	= mysql_fetch_array($q_edit_agm);
			
			$nama_agama = $a_edit_agm[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_agama = "";
			$nama_agama = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Agama</h3></header>
		<div class="module_content">
		<form action="?p=t_agama" method="post" id="ft_agama">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_agama" readonly value="<?php echo $id_agama; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_agama" value="<?php echo $nama_agama; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
