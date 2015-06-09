<article class="module width_full">
	<header><h3>Referensi Agama</h3></header>
		<div class="module_content">
		<center>
		<center>Statistik Berdasarkan 
		<select onChange="document.location.href=this.options[this.selectedIndex].value;">
		<?php
		$_by = $_GET['by'];
		if ($_by == "") { $_by = "s_jk"; }
		
		cCmb("s_agama|s_jk|s_alamat|k_pend_ay|k_pkj_ay|sc_asal_skl|umur", 
		"Agama|Jenis Kelamin|Alamat Siswa|Pendidikan Orang Tua|Pekerjaan Orang Tua|Sekolah Asal|Umur", $_by);
		?>
		</select><br><br>
		
		<?php		
		// ================ TAMPILKAN DATANYA =====================//
		echo "<table border='1' class='data'><tr><th width='10%'>No</th><th width='60%'>Items</th><th width='30%'>Jumlah</th></tr>";
		if ($_by == "umur") {
			$str_sql = "SELECT FLOOR(DATEDIFF(NOW(), 
						s_tgl_lahir)/366) AS umur, COUNT(*) AS 
						jumlah FROM master GROUP BY umur";
		} else {
			$str_sql = "SELECT $_by, COUNT($_by) AS 'jumlah' FROM master GROUP BY $_by";
		}
		
		$q_stat 	= mysql_query($str_sql);
		$j_data 	= mysql_num_rows($q_stat);

		if ($j_data == 0) {
			echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
		} else {
			$no = 1;
			while ($a_stat = mysql_fetch_array($q_stat)) {
				echo "<tr>
				<td id='tengah'>$no</td>
				<td>";
			if ($_by == "s_agama") {
				echo getAgama($a_stat[0]);
			} else if ($_by == "s_jk") {
				echo getJK($a_stat[0]);
			} else if ($_by == "k_pend_ay") {
				echo getPendidikan($a_stat[0]);
			} else if ($_by == "k_pkj_ay") {
				echo getPekerjaan($a_stat[0]);
			} else if ($_by == "umur") {
				echo $a_stat[0]." tahun";
			} else {
				echo $a_stat[0];
			}
			
			echo "</td>
				<td id='tengah'>$a_stat[1]</td>
				</tr>";
				$no++;
			}
		}
		echo "</table>";
		?>

		</div>
</article>