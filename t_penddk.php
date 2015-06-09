		<?php
		$id_penddk	= isset($_GET['id']) ? $_GET['id'] : NULL;
		$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;	

		if ($mod == "del") {
			$q_delete_penddk = mysql_query("DELETE FROM t_penddk WHERE id_penddk = '$id_penddk'");
			if ($q_delete_penddk) {
				echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		}
		
		// ================ DATA FORM ( POST ) =====================//
		$display 			= "style='display: none'"; 	//default = formnya dihidden
		$tb_act 			= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
		$p_id_penddk   		= isset($_POST['id_penddk']) ? $_POST['id_penddk'] : NULL;		//ambil variabel POST id_penddk
		$p_nama_penddk 		= isset($_POST['nama_penddk']) ? $_POST['nama_penddk'] : NULL;	//ambil variabel POST nama_penddk
		
		if ($tb_act == "Tambah") {
			$display = "style='display: none'";
			$q_tambah_penddk	= mysql_query("INSERT INTO t_penddk VALUES ('', '$p_nama_penddk')");
			if ($q_tambah_penddk) {
				echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else if ($tb_act == "Edit") {
			$display = "style='display: none'";
			$q_edit_penddk	= mysql_query("UPDATE t_penddk SET penddk = '$p_nama_penddk' WHERE id_penddk = '$p_id_penddk'");
			if ($q_edit_penddk) {
				echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
			}
		} else {	
			$display = "style='display: none'";
		}
		?>
<article class="module width_full">
	<header><h3>Referensi Pendidikan</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_penddk&mod=add">Tambah Data Pendidikan</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Pendidikan</th><th width='30%'>Control</th></tr>";
		$q_penddk 	= mysql_query("SELECT * FROM t_penddk ORDER BY id_penddk ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_penddk);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_penddk = mysql_fetch_array($q_penddk)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_penddk[1]</td>
				<td id='tengah'><a href='?p=t_penddk&mod=edit&id=$a_penddk[0]'>Edit</a> |
					<a href='?p=t_penddk&mod=del&id=$a_penddk[0]' onclick=\"return konfirmasi('Menghapus data $a_penddk[1]')\">Delete</a>
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
			$q_edit_penddk	= mysql_query("SELECT * FROM t_penddk WHERE id_penddk = '$id_penddk'");
			$a_edit_penddk	= mysql_fetch_array($q_edit_penddk);
			
			$nama_penddk = $a_edit_penddk[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_penddk = "";
			$nama_penddk = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Pendidikan</h3></header>
		<div class="module_content">
		<form action="?p=t_penddk" method="post" id="ft_penddk">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_penddk" readonly value="<?php echo $id_penddk; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_penddk" value="<?php echo $nama_penddk; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
