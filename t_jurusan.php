<?php
$id_jurusan	= isset($_GET['id']) ? $_GET['id'] : NULL;
$mod 		= isset($_GET['mod']) ? $_GET['mod'] : NULL;	


if ($mod == "del") {
	$q_delete_jurusan = mysql_query("DELETE FROM t_jurusan WHERE id_jur = '$id_jurusan'");
	if ($q_delete_jurusan) {
		echo "<h4 class='alert_success'>Data berhasil dihapuskan<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
}

// ================ DATA FORM ( POST ) =====================//
$display 			= "style='display: none'"; 	//default = formnya dihidden
$tb_act 			= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm
$p_id_jurusan   	= isset($_POST['id_jurusan']) ? $_POST['id_jurusan'] : NULL;		//ambil variabel POST id_jurusan
$p_nama_jurusan 	= isset($_POST['nama_jurusan']) ? $_POST['nama_jurusan'] : NULL;	//ambil variabel POST nama_jurusan

if ($tb_act == "Tambah") {
	$display = "style='display: none'";
	$q_tambah_jurusan	= mysql_query("INSERT INTO t_jurusan VALUES ('', '$p_nama_jurusan')");
	if ($q_tambah_jurusan) {
		echo "<h4 class='alert_success'>Data berhasil ditambahkan<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
} else if ($tb_act == "Edit") {
	$display = "style='display: none'";
	$q_edit_jurusan	= mysql_query("UPDATE t_jurusan SET jurusan = '$p_nama_jurusan' WHERE id_jur = '$p_id_jurusan'");
	if ($q_edit_jurusan) {
		echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
} else {	
	$display = "style='display: none'";
}
?>
<article class="module width_full">
	<header><h3>Referensi Jurusan</h3></header>
		<div class="module_content">
		<h5><a href="?p=t_jurusan&mod=add">Tambah Data Jurusan</a></h5>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='60%'>Jurusan</th><th width='30%'>Control</th></tr>";
		$q_jurusan 	= mysql_query("SELECT * FROM t_jurusan ORDER BY id_jur ASC") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_jurusan);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_jurusan = mysql_fetch_array($q_jurusan)) {
				echo "<tr><td id='tengah'>$no</td><td>$a_jurusan[1]</td>
				<td id='tengah'><a href='?p=t_jurusan&mod=edit&id=$a_jurusan[0]'>Edit</a> |
					<a href='?p=t_jurusan&mod=del&id=$a_jurusan[0]' onclick=\"return konfirmasi('Menghapus data $a_jurusan[1]')\">Delete</a>
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
			$q_edit_jurusan	= mysql_query("SELECT * FROM t_jurusan WHERE id_jur = '$id_jurusan'");
			$a_edit_jurusan	= mysql_fetch_array($q_edit_jurusan);
			
			$nama_jurusan = $a_edit_jurusan[1];
			$view = "Edit";
			
		} else if ($mod == "add") {
			$display = "";
			$id_jurusan = "";
			$nama_jurusan = "";
			$view = "Tambah";
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data jurusan</h3></header>
		<div class="module_content">
		<form action="?p=t_jurusan" method="post" id="ft_jurusan">
		<table class="tbl_form">
			<tr><td width="20%">ID</td>
			<td width="80%"><input type="text" size="3" name="id_jurusan" readonly value="<?php echo $id_jurusan; ?>"></td></tr>
			<tr><td>Nama</td>
			<td><input type="text" size="30" name="nama_jurusan" value="<?php echo $nama_jurusan; ?>"></td></tr>
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
