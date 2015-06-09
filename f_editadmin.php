<?php
$id_agama		= isset($_GET['id']) ? $_GET['id'] : NULL;
$mod 			= isset($_GET['mod']) ? $_GET['mod'] : NULL;	

				
// ================ DATA FORM ( POST ) =====================//
$display 		= "style='display: none'"; 	//default = formnya dihidden
$tb_act 		= isset($_POST['tb_act']) ? $_POST['tb_act'] : NULL;				//ambil variabel POST value Tombol FOrm

//===================
$p_nama	   		= isset($_POST['nama']) ? $_POST['nama'] : NULL;		//ambil variabel POST id_agama
$p_user 		= isset($_POST['user']) ? $_POST['user'] : NULL;	
$p_pass 		= isset($_POST['pass']) ? $_POST['pass'] : NULL;	
$p_alamat 		= isset($_POST['alamat']) ? $_POST['alamat'] : NULL;	//ambil variabel POST nama_agama
$p_ta	 		= isset($_POST['ta']) ? $_POST['ta'] : NULL;
$p_kepsek		= isset($_POST['kepsek']) ? $_POST['kepsek'] : NULL;
$p_beranda		= isset($_POST['beranda']) ? $_POST['beranda'] : NULL;
$p_prosedur		= isset($_POST['prosedur']) ? $_POST['prosedur'] : NULL;
//===================
$logoName 		= isset($_FILES['logo']['name']) ? $_FILES['logo']['name'] : NULL; //get the file name
$logoSize 		= isset($_FILES['logo']['size']) ? $_FILES['logo']['size'] : NULL; //get the size
$logoError 		= isset($_FILES['logo']['error']) ? $_FILES['logo']['error'] : NULL;
$logoType 		= isset($_FILES['logo']['type']) ? $_FILES['logo']['type'] : NULL;
//============================


if ($tb_act == "Edit") {
	$display = "style='display: none'";
	
	if ($logoName != "" && $logoSize != 0) {
		$upload = $move = move_uploaded_file($_FILES['logo']['tmp_name'], 'images/logo/'.$logoName);
		$logo = ", logo = '$logoName'";
	} else {
		$logo = "";
	}
	
	if ($p_pass != "") {
		$u_pass = mysql_query("UPDATE admin SET p = '$p_pass' WHERE u = '$p_user'");
	}
	
	if ($p_nama != "" && $p_alamat != "" && $p_ta != "" && $p_kepsek != "") {
		$q_edit_sekolah	= mysql_query("UPDATE t_sekolah SET 
								nama_sekolah = '$p_nama',
								alamat = '$p_alamat',
								tahun_ajaran = '$p_ta',
								kepsek = '$p_kepsek' $logo,
								beranda = '$p_beranda',
								prosedur = '$p_prosedur'								
								WHERE admin = '$p_user'");
		
		if ($q_edit_sekolah) {
			echo "<h4 class='alert_success'>Data berhasil diupdate<span id='close'>[<a href='#'>X</a>]</span></h4>";
		} else {
			echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
		}
	} else {
		echo "<h4 class='alert_error'>Lengkapi Isian<span id='close'>[<a href='#'>X</a>]</span></h4>";
	}
	
} else {	
	$display = "style='display: none'";
}
?>
<article class="module width_full">
	<header><h3>Data Sekolah Pengguna</h3></header>
		<div class="module_content">
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>ID</th><th width='40%'>Nama Sekolah</th><th width='20%'>Username</th><th width='30%'>Control</th></tr>";
		$q_sekolah 	= mysql_query("SELECT * FROM t_sekolah") or die (mysql_error());
		$j_data 	= mysql_num_rows($q_sekolah);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_sekolah = mysql_fetch_array($q_sekolah)) {
				echo "<tr>
				<td id='tengah'>$no</td>
				<td>$a_sekolah[0]</td>
				<td id='tengah'>".$_SESSION['username']."</td>
				<td id='tengah'><a href='?p=f_editadmin&mod=edit&id=$a_sekolah[0]'>Edit</a>
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
			
			$q_edit_sekolah	= mysql_query("SELECT * FROM t_sekolah WHERE admin = '".$_SESSION['username']."' AND flag = '1'");
			
			$a_edit_sekolah	= mysql_fetch_array($q_edit_sekolah);
			
			$sekolah_0 = $a_edit_sekolah[0];
			$sekolah_1 = $a_edit_sekolah[1];
			$sekolah_2 = $a_edit_sekolah[2];
			$sekolah_3 = $a_edit_sekolah[3];
			$sekolah_4 = $a_edit_sekolah[4];
			$sekolah_5 = $a_edit_sekolah[5];
			$sekolah_6 = $a_edit_sekolah[6];
			$sekolah_7 = $a_edit_sekolah[7];
			$sekolah_8 = $a_edit_sekolah[8];
			
			$view = "Edit";
			
		} else {
			$display = "style='display: none'";
		}

		?>

<article class="module width_full" <?php echo $display;?>>
	<header><h3><?php echo $view;?> Data Sekolah</h3></header>
		<div class="module_content">
		<form action="?p=f_editadmin" method="post" id="ft_sekolah" enctype="multipart/form-data">
		<table class="tbl_form">
			<?php
			cInput("Nama Sekolah", "nama", "30", $sekolah_0);
			?>
			<tr><td>Username</td><td><input type="text" name="user" readonly value="<?php echo $sekolah_8; ?>"></td></tr>
			<tr><td>Ganti Passwod Jadi</td><td><input type="password" name="pass" value=""></td></tr>
			<?php
			cInput("Alamat", "alamat", "60", $sekolah_1);
			cInput("Tahun Ajaran", "ta", "20", $sekolah_2);
			cInput("Nama Kepala Sekolah", "kepsek", "30", $sekolah_3);
			?>
			<tr><td>File Logo</td><td><input type="file" name="logo"></td></tr>
			<tr>
			<td>Prosedur Pendaftaran</td>
			<td>
			<textarea id="prosedur" name="prosedur" style="height: 150px; width: 500px;">
			<?php echo $sekolah_7;?>
			</textarea>
			</td>
			</tr>
			
			<tr>
			<td>Tampilan Halaman Depan</td>
			<td>
			<textarea id="beranda" name="beranda" style="height: 150px; width: 500px;">
			<?php echo $sekolah_6;?>
			</textarea>
			</td>
			</tr>
			
			
			<tr><td></td><td><input type="submit" name="tb_act" value="<?php echo $view; ?>"></td></tr>
		</table>
		</div>
</article>
