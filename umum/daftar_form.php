<?php

$n_sek_baru	= "";
$mode_form	= isset($_GET['mod']) ? $_GET['mod'] : "";
$id_daftar	= isset($_GET['id']) ? $_GET['id'] : "";

$p_tombol	= isset($_POST['kirim_daftar']) ? $_POST['kirim_daftar'] : "";

//variabel POST

$p_id_daftar = isset($_POST['id_daftar']) ? $_POST['id_daftar'] : "";

$p_nama 		= isset($_POST['nama']) ? strtoupper($_POST['nama']) : "";		
$p_jk			= isset($_POST['jk']) ? $_POST['jk'] : "";
$p_agama		= isset($_POST['agama']) ? $_POST['agama'] : "";			$p_tmp_lahir	= isset($_POST['tmp_lahir']) ? $_POST['tmp_lahir'] : "";
$p_thn_lahir	= isset($_POST['thn_lahir']) ? $_POST['thn_lahir'] : "";	$p_bln_lahir	= isset($_POST['bln_lahir']) ? $_POST['bln_lahir'] : "";
$p_tgl_lahir	= isset($_POST['tgl_lahir']) ? $_POST['tgl_lahir'] : "";	
$p_alamat		= isset($_POST['alamat']) ? $_POST['alamat'] : "";			$p_stat_anak	= isset($_POST['stat_anak']) ? $_POST['stat_anak'] : "";
$p_anak_ke		= isset($_POST['anak_ke']) ? $_POST['anak_ke'] : "";		$p_jum_sdr		= isset($_POST['jum_sdr']) ? $_POST['jum_sdr'] : "";
$p_hp		= isset($_POST['hp']) ? $_POST['hp'] : "";
$p_nama_ay		= isset($_POST['nama_ay']) ? $_POST['nama_ay'] : ""; 		$p_nama_ib 		= isset($_POST['nama_ib']) ? $_POST['nama_ib'] : "";
$p_pend_ay		= isset($_POST['pend_ay']) ? $_POST['pend_ay'] : ""; 		$p_pend_ib 		= isset($_POST['pend_ib']) ? $_POST['pend_ib'] : "";
$p_pkj_ay  		= isset($_POST['pkj_ay']) ? $_POST['pkj_ay'] : "";  		$p_pkj_ib  		= isset($_POST['pkj_ib']) ? $_POST['pkj_ib'] : "";

$p_asal_skl		= isset($_POST['asal_skl']) ? $_POST['asal_skl'] : "";		$p_stat_skl		= isset($_POST['stat_skl']) ? $_POST['stat_skl'] : "";
$p_sc_alamat	= isset($_POST['sc_alamat']) ? $_POST['sc_alamat'] : "";	$p_kepsek		= isset($_POST['kepsek']) ? $_POST['kepsek'] : "";
$p_thn_lulus	= isset($_POST['thn_lulus']) ? $_POST['thn_lulus'] : "";	$p_no_ijazah	= isset($_POST['no_ijazah']) ? $_POST['no_ijazah'] : "";

$p_bing			= isset($_POST['bing']) ? $_POST['bing'] : "";				$p_bind			= isset($_POST['bind']) ? $_POST['bind'] : "";
$p_mtk			= isset($_POST['mtk']) ? $_POST['mtk'] : "";				$p_ipa			= isset($_POST['ipa']) ? $_POST['ipa'] : "";
$p_jur1			= isset($_POST['jur1']) ? $_POST['jur1'] : "";				$p_jur2			= isset($_POST['jur2']) ? $_POST['jur2'] : "";

$p_namapres1	= isset($_POST['namapres1']) ? $_POST['namapres1'] : "";	$p_tgkt1		= isset($_POST['tgkt1']) ? $_POST['tgkt1'] : "";
$p_namapres2	= isset($_POST['namapres2']) ? $_POST['namapres2'] : "";	$p_tgkt2		= isset($_POST['tgkt2']) ? $_POST['tgkt2'] : "";
$p_namapres3	= isset($_POST['namapres3']) ? $_POST['namapres3'] : "";	$p_tgkt3		= isset($_POST['tgkt3']) ? $_POST['tgkt3'] : "";

$p_nisn			= isset($_POST['nisn']) ? $_POST['nisn'] : "";		
$p_s_hp			= isset($_POST['s_hp']) ? $_POST['s_hp'] : "";		
$p_penghasilan	= isset($_POST['penghasilan']) ? $_POST['penghasilan'] : "";		
$p_hobi			= isset($_POST['hobi']) ? $_POST['hobi'] : "";		
$p_o_hp			= isset($_POST['o_hp']) ? $_POST['o_hp'] : "";		

$ip 			= $_SERVER['REMOTE_ADDR'];

$p_submit		= "DAFTAR";


if ($mode_form == "add") {

	/// ELSE IF "EDIT"
} else if ($mode_form == "edit") {

	if ($_SESSION['umum'] != NULL) {
		$id_daftar = getValue("master", "id_daftar", "u", ($_SESSION['umum']));
	} else {
		echo "<meta http-equiv='refresh' content='0; url=umum/index.php'>";
	}


	$q_data_edit	= mysql_query("SELECT * FROM master WHERE id_daftar = '$id_daftar'");
	$a_data_edit	= mysql_fetch_array($q_data_edit);
	$pc_tgl_lahir	= explode("-", $a_data_edit[5]);
	$tgl_1		= $pc_tgl_lahir[0]; 	$tgl_2		= $pc_tgl_lahir[1];	
	$tgl_3		= $pc_tgl_lahir[2];

	$id_daftar	= $a_data_edit[0];
	$p_nama 	= $a_data_edit[1];		$p_jk		= $a_data_edit[2];
	$p_agama	= $a_data_edit[3];		$p_tmp_lahir= $a_data_edit[4];
	$p_thn_lahir= $tgl_1;				$p_bln_lahir= $tgl_2;
	$p_tgl_lahir= $tgl_3;	
	$p_alamat	= $a_data_edit[6];		$p_stat_anak= $a_data_edit[7];
	$p_anak_ke	= $a_data_edit[8];		$p_jum_sdr	= $a_data_edit[9];
	
	$p_nama_ay	= $a_data_edit[10];		$p_nama_ib 	= $a_data_edit[13];
	$p_pend_ay	= $a_data_edit[11]; 	$p_pend_ib 	= $a_data_edit[14];
	$p_pkj_ay  	= $a_data_edit[12];  	$p_pkj_ib  	= $a_data_edit[15];

	$p_asal_skl	= $a_data_edit[18];		$p_stat_skl	= $a_data_edit[19];
	$p_sc_alamat= $a_data_edit[20];		$p_kepsek	= $a_data_edit[21];
	$p_thn_lulus= $a_data_edit[16];		$p_no_ijazah= $a_data_edit[17];

	$p_bing		= $a_data_edit[22];		$p_bind		= $a_data_edit[23];
	$p_mtk		= $a_data_edit[24];		$p_ipa		= $a_data_edit[25];
	$p_jur1		= $a_data_edit[36];		$p_jur2		= $a_data_edit[37];

	$p_namapres1= $a_data_edit[26];		$p_tgkt1	= $a_data_edit[27];
	$p_namapres2= $a_data_edit[29];		$p_tgkt2	= $a_data_edit[30];
	$p_namapres3= $a_data_edit[32];		$p_tgkt3	= $a_data_edit[33];

	$p_nisn		= $a_data_edit[43];
	$p_s_hp		= $a_data_edit[44];
	$p_hobi		= $a_data_edit[45];
	$p_penghasilan= $a_data_edit[46];
	$p_o_hp		= $a_data_edit[47];
	$p_submit	= "EDIT";	
}



/*-------- VARIABEL TAMBAHAN ------------*/
$nil_pres1	= getNilaiPrestasi($p_tgkt1);
$nil_pres2	= getNilaiPrestasi($p_tgkt2);
$nil_pres3	= getNilaiPrestasi($p_tgkt3);

$pj_bln_lahir = strlen($p_bln_lahir);
$pj_tgl_lahir = strlen($p_tgl_lahir);


if ($pj_bln_lahir < 2) { 
	$p_bln_lahir = "0".$p_bln_lahir;
} 
if ($pj_tgl_lahir < 2) {
	$p_tgl_lahir = "0".$p_tgl_lahir;
}

$ttl_gabung = $p_thn_lahir."-".$p_bln_lahir."-".$p_tgl_lahir;

$jumlah_nilai	= $p_bing + $p_bind + $p_mtk + $p_ipa + $nil_pres1 + $nil_pres2 + $nil_pres3;



/*-------- ACTION --------------*/
if ($p_tombol == "DAFTAR") {
	/* PENGECEKAN INPUTAN KOSONG YANG ke-2 sekaligus akses LANGSUNG lewat $_GET */
	//echo $p_tgl_lahir
	$pass = acakHuruf();
	if ($p_nama == "" || $p_jk == "" || $p_agama == "" || $p_tmp_lahir == "" 
		|| $p_tgl_lahir == 0 || $p_bln_lahir == 0 || $p_thn_lahir == 0 || $p_alamat == ""
		|| $p_stat_anak == "" || $p_anak_ke == "" || $p_jum_sdr == "" || $p_nama_ay == ""
		|| $p_nama_ib == "" || $p_pend_ay == "" || $p_pend_ib == "" || $p_pkj_ay == ""
		|| $p_pkj_ib == "" || $p_asal_skl == "" || $p_stat_skl == "" || $p_sc_alamat == ""
		|| $p_kepsek == "" || $p_thn_lulus == "" || $p_no_ijazah == "" || $p_bing == ""
		|| $p_bind == "" || $p_mtk == "" || $p_ipa == "") {
		
		echo "<h4 class='alert_error'>Kesalahan pada pengisian form (Masih kosong)<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else if ($konfigurasi['pengguna'] == "smk" && ($p_jur1 == "" || $p_jur2 == "")) {
		echo "<h4 class='alert_error'>Jurusan Pilihan 1 dan 2 masih KOSONG<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
		
			/* PENGECEKAN Simpan Sekolah Asal jika BELUM ADA */
			$q_cek_sek_asal = mysql_query("SELECT * FROM t_skolah WHERE skolah = '$p_asal_skl' AND status = '$p_stat_skl'");
			$j_cek_sek_asal = mysql_num_rows($q_cek_sek_asal);
			
			//INSERT DATA Sekolah Asal Otomatis jika belum ada */
			if ($j_cek_sek_asal < 1) {
				$q_sek_baru = mysql_query("INSERT INTO t_skolah VALUES ('', '$p_asal_skl', '$p_stat_skl', '$p_sc_alamat', '$p_kepsek')");
				$n_sek_baru = "Penambahan Sekolah Baru OK";
			}
			
			//pengecekan data GANDA - jika pengguna gak sengaja merefresh form//
			$q_cek_ganda = mysql_query("SELECT * FROM master WHERE s_nama = '$p_nama' AND ip = '$ip'");
			$j_cek_ganda = mysql_fetch_array($q_cek_ganda);
			
			if ($j_cek_ganda > 0) {
				echo "<h4 class='alert_error'>Data Ganda Gara2 Auto Refresh<span id='close'>[<a href='#'>X</a>]</span></h4>";
			} else {
				//INTINYA... INSERT Data Pendaftar ke tabel "master" */
				$q_daftar	= mysql_query("INSERT INTO master VALUES 
							('', '$p_nama', '$p_jk', '$p_agama', '$p_tmp_lahir', '$ttl_gabung',
							 '$p_alamat', '$p_stat_anak', '$p_anak_ke', '$p_jum_sdr', '$p_nama_ay',
							 '$p_pend_ay', '$p_pkj_ay', '$p_nama_ib', '$p_pend_ib', '$p_pkj_ib',
							 '$p_thn_lulus', '$p_no_ijazah', '$p_asal_skl', '$p_stat_skl', '$p_sc_alamat',
							 '$p_kepsek', '$p_bing', '$p_bind', '$p_mtk', '$p_ipa', 
							 '$p_namapres1', '$p_tgkt1', '$nil_pres1',
							 '$p_namapres2', '$p_tgkt2', '$nil_pres2',
							 '$p_namapres3', '$p_tgkt3', '$nil_pres3', 
							 '$jumlah_nilai', '$p_jur1', '$p_jur2',
							 '0', NOW(), '$ip', '$p_nisn', '$pass', '$p_nisn',
							 '$p_s_hp', '$p_hobi', '$p_penghasilan', '$p_o_hp')");
				if ($q_daftar) {
					echo "<h4 class='alert_success'>Data berhasil ditambahkan. $n_sek_baru. <a href='../formulir_daftar.php?dari=umum&nisn=$p_nisn' target='_blank'>Cetak Formulir</a><span id='close'>[<a href='#'>X</a>]</span></h4>";
				} else {
					echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
				}
			}
	}
} else if ($p_tombol == "EDIT") {
	if ($p_nama == "" || $p_jk == "" || $p_agama == "" || $p_tmp_lahir == "" 
		|| $p_tgl_lahir == 0 || $p_bln_lahir == 0 || $p_thn_lahir == 0 || $p_alamat == ""
		|| $p_stat_anak == "" || $p_anak_ke == "" || $p_jum_sdr == "" || $p_nama_ay == ""
		|| $p_nama_ib == "" || $p_pend_ay == "" || $p_pend_ib == "" || $p_pkj_ay == ""
		|| $p_pkj_ib == "" || $p_asal_skl == "" || $p_stat_skl == "" || $p_sc_alamat == ""
		|| $p_kepsek == "" || $p_thn_lulus == "" || $p_no_ijazah == "" || $p_bing == ""
		|| $p_bind == "" || $p_mtk == "" || $p_ipa == "" ) {
		
		echo "<h4 class='alert_error'>Kesalahan pada pengisian form (Masih kosong)<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else if ($konfigurasi['pengguna'] == "smk" && ($p_jur1 == "" || $p_jur2 == "")) {
		echo "<h4 class='alert_error'>Jurusan Pilihan 1 dan 2 masih KOSONG<span id='close'>[<a href='#'>X</a>]</span></h4>";
	} else {
	
		/* PENGECEKAN Simpan Sekolah Asal jika BELUM ADA */
		$q_cek_sek_asal = mysql_query("SELECT * FROM t_skolah WHERE skolah = '$p_asal_skl' AND status = '$p_stat_skl' AND alamat = '$p_sc_alamat' AND kepsek = '$p_kepsek'");
		$j_cek_sek_asal = mysql_num_rows($q_cek_sek_asal);
	
		//INSERT DATA Sekolah Asal Otomatis jika belum ada */
		if ($j_cek_sek_asal < 1) {
			$q_sek_baru 	= mysql_query("INSERT INTO t_skolah VALUES ('', '$p_asal_skl', '$p_stat_skl', '$p_sc_alamat', '$p_kepsek')");
			$n_sek_baru 	= "Penambahan Sekolah Baru OK";
		}
	
		//INTINYA... INSERT Data Pendaftar ke tabel "master" */
		$q_daftar	= mysql_query("UPDATE master SET 
				 s_nama = '$p_nama', s_jk = '$p_jk', s_agama = '$p_agama', 
				 s_tmp_lahir = '$p_tmp_lahir', s_tgl_lahir = '$ttl_gabung',
				 s_alamat = '$p_alamat', s_stat_anak = '$p_stat_anak', s_anak_ke = '$p_anak_ke', s_hp = '$p_hp',
				 s_jum_sdr = '$p_jum_sdr', k_nama_ay = '$p_nama_ay',
				 k_pend_ay = '$p_pend_ay', k_pkj_ay = '$p_pkj_ay', 
				 k_nama_ib = '$p_nama_ib', k_pend_ib = '$p_pend_ib', 
				 k_pkj_ib = '$p_pkj_ib', thn_lulus = '$p_thn_lulus', 
				 no_ijazah = '$p_no_ijazah', sc_asal_skl = '$p_asal_skl',
				 sc_status = '$p_stat_skl', sc_alamat = '$p_sc_alamat',
				 sc_kepsek = '$p_kepsek', nil_1_bing = '$p_bing', 
				 nil_2_bind = '$p_bind', nil_3_mtk = '$p_mtk', 
				 nil_4_ipa = '$p_ipa', 
				 nil_pres1_nama = '$p_namapres1', nil_pres1_tkt = '$p_tgkt1', nil_pres1 = '$nil_pres1',
				 nil_pres2_nama = '$p_namapres2', nil_pres2_tkt = '$p_tgkt2', nil_pres2 = '$nil_pres2',
				 nil_pres3_nama = '$p_namapres3', nil_pres3_tkt = '$p_tgkt3', nil_pres3 = '$nil_pres3',
				 nil_seleksi = '$jumlah_nilai', jrsn_pil1 = '$p_jur1', jrsn_pil2 = '$p_jur2', 
				 s_hp = '$p_s_hp', hobi = '$p_hobi', penghasilan = '$p_penghasilan' 
				 WHERE id_daftar = '$p_id_daftar'");
		if ($q_daftar) {
			echo "<h4 class='alert_success'>Data berhasil diperbaharui. $n_sek_baru<span id='close'>[<a href='#'>X</a>]</span></h4>";
		} else {
			echo "<h4 class='alert_error'>".mysql_error()."<span id='close'>[<a href='#'>X</a>]</span></h4>";
		}
	}
}

?>


<article class="module width_full">
	<header><h3>Data Siswa</h3></header>
	<div class="module_content">
	<form action="?p=daftar_form&mod=add" method="post" name="form_daftar">
	<input type="hidden" name="id_daftar" value="<?php echo $id_daftar; ?>">
	<table class="tbl_form">
		<?php
		cInput("NISN", "nisn", "20", $p_nisn);
		cInput("Nama", "nama", "40", $p_nama);
		cRadio("Jenis Kelamin", "jk", "Laki-Laki|Perempuan", "1|2", $p_jk);
		echo "<tr><td>Agama</td><td>";
		cmbDB("agama", "t_agama", "id_agama", "agama", $p_agama);
		echo "</td></tr>";
		cCmbTglLahir($p_tmp_lahir, $p_tgl_lahir, $p_bln_lahir, $p_thn_lahir);
		cInput("Alamat", "alamat", "70", $p_alamat);
		cRadio("Status Anak", "stat_anak", "Anak Kandung|Anak Tiri", "1|2", $p_stat_anak);
		cInput2("Anak Ke|Jumlah Saudara", "anak_ke|jum_sdr", "3|3", $p_anak_ke."|".$p_jum_sdr);
		cInput2("Nomor Handphone|Hobi", "s_hp|hobi", "20|20", $p_s_hp."|".$p_hobi);
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Data Orang Tua</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput2("Nama Ayah|Nama Ibu", "nama_ay|nama_ib", "30|30", $p_nama_ay."|".$p_nama_ib);
		cCmbPendidikan($p_pend_ay, $p_pend_ib);
		cCmbPekerjaan($p_pkj_ay, $p_pkj_ib);
		cInput2("Penghasilan|Nomor Handphone", "penghasilan|o_hp", "20|20", $p_penghasilan."|".$p_o_hp);
		//cInput("Nomor Handphone", "o_hp", "20", $p_o_hp);
		//cInput("Alamat", "alamat", "70", $p_alamat);
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Sekolah Asal</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput("Nama Sekolah", "asal_skl", "40", $p_asal_skl);
		cRadio("Status Sekolah", "stat_skl", "Negeri|Swasta", "1|2", $p_stat_skl);
		cInput("Alamat", "sc_alamat", "60", $p_sc_alamat);
		cInput("Kepala Sekolah", "kepsek", "60", $p_kepsek);
		cInput2("Tahun Lulus|No. Ijazah", "thn_lulus|no_ijazah", "10|20", $p_thn_lulus."|".$p_no_ijazah);
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Data Nilai & Pilihan Jurusan</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cInput2("Bahasa Inggris|Bahasa Indonesia", "bing|bind", "10|10", $p_bing."|".$p_bind);
		cInput2("Matematika|I P A", "mtk|ipa", "10|10", $p_mtk."|".$p_ipa);
		if ($konfigurasi['pengguna'] == NULL) {
			echo "";
		} else if ($konfigurasi['pengguna'] == "smk") {
			cPilihanJurusan($p_jur1."|".$p_jur2);
		} else {
			echo "";
		}
		?>
	</table>
	</div>
</article>
	
<article class="module width_full">
	<header><h3>Prestasi Yang Pernah Diraih</h3></header>
	<div class="module_content">
	<table class="tbl_form">
		<?php
		cPrestasi($p_namapres1."|".$p_namapres2."|".$p_namapres3, $p_tgkt1."|".$p_tgkt2."|".$p_tgkt3)
		?>
	</table>
	</div>
</article>

<article class="module width_full">
	<header><h3>Konfirmasi Data Pendaftar</h3></header>
	<div class="module_content">
	<table class="tbl_form"><tr><td>
	<input type="checkbox" name="data_ok"> <label for="data_ok">Dengan ini saya menyatakan bahwa, Data yang saya isikan di Formulir 
	ini adalah Benar adanya sesuai dengan bukti-bukti yang ada</label><br><br>
	<center><input type="submit" name="kirim_daftar" value="<?php echo $p_submit; ?>" id="tombol"></center>
	</td></tr></table>
	</form>
	</div>
</article>
