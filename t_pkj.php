		<?php
		$id_pkj		= isset($_GET['id']) ? $_GET['id'] : NULL;
		$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;

		if ($mod == "del") {
			$q_delete_pkj = mysql_query("DELETE FROM t_pkj WHERE id_pkj = '$id_pkj'");
			if ($q_delete_pkj) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 		= "style='display: none'"; 	//default = formnya dihidden
		$tb_act 		= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
		$p_id_pkj   	= isset($_POST['id_pkj']) ? $_POST['id_pkj'] : NULL;		//ambil variabel POST id_pkj
		$p_nama_pkj 	= isset($_POST['nama_pkj']) ? $_POST['nama_pkj'] : NULL;	//ambil variabel POST nama_pkj
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_pkj	= mysql_query("INSERT INTO t_pkj VALUES ('', '$p_nama_pkj')");
			if ($q_tambah_pkj) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_pkj	= mysql_query("UPDATE t_pkj SET pkj = '$p_nama_pkj' WHERE id_pkj = '$p_id_pkj'");
			if ($q_edit_pkj) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi Pekerjaan</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_pkj&mod=add">Tambah Data Pekerjaan</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Pekerjaan</th><th width='30%'>Control</th></tr>";
		$q_pkj 	= mysql_query("SELECT * FROM t_pkj ORDER BY id_pkj ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_pkj);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_pkj = mysql_fetch_array($q_pkj)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_pkj[1]</td>
				<td id='tengah'><a href='?p=t_pkj&mod=edit&id=$a_pkj[0]'>Edit</a> |
					<a href='?p=t_pkj&mod=del&id=$a_pkj[0]' onclick=\"return konfirmasi('Menghapus data $a_pkj[1]')\">Delete</a>
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
			$q_edit_pkj	= mysql_query("SELECT * FROM t_pkj WHERE id_pkj = '$id_pkj'");
			$a_edit_pkj	= mysql_fetch_array($q_edit_pkj);
			
			$nama_pkj = $a_edit_pkj[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_pkj = "";
			$nama_pkj = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Pekerjaan</h3></header>
		<div class="module_content">
		<form action="?p=t_pkj" method="post" id="ft_pkj">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_pkj" readonly value="<?php echo $id_pkj; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_pkj" value="<?php echo $nama_pkj; ?>"></td></tr>
			<tr><td></td><td><input type="submit" id="tombol" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
