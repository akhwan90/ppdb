<link href="css/print.css" media="print" rel="stylesheet" type="text/css" />
<link href="css/print.css" media="screen" rel="stylesheet" type="text/css" />

<div class="kop">
<img src="images/logo.jpg" width="90px" height="100px">
<h1>PEMERINTAH KABUPATEN KULON PROGO</h1>
<h2>SMP NEGERI 1 COBA-COBA</h2>
<h3>Alamat : Sumoroto, Sidoharjo, Samigaluh, Kulon Progo. Telp : 0274-773001</h3>
</div>
<hr>

<br><br>
<h2 align="center">DAFTAR SISWA YANG DITERIMA DI SMP NEGERI 1 COBA-COBA</H2>
<?php		
include "lib/fungsi.php";
	
// ================ TAMPILKAN DATANYA =====================//
echo "<table border='1' class='data'>
<tr><th width='5%'>ID</th>
<th width='40%'>Nama</th>
<th width='40%'>Sekolah Asal</th>
<th width='15%'>Jumlah Nilai</th></tr>";
$q_daftar 	= mysql_query("SELECT * FROM master ORDER BY id_daftar ASC") or die (mysql_error());
$j_data 	= mysql_num_rows($q_daftar);

if ($j_data == 0) {
	echo "<tr><td id='tengah' colspan='3'>-- Tidak Ada Data --</td></tr>";
} else {
	$no = 1;
	while ($a_daftar = mysql_fetch_array($q_daftar)) {
		echo "<tr>
		<td id='tengah'>$a_daftar[0]</td>
		<td>$a_daftar[1]</td>
		<td>$a_daftar[18]</td>
		<td id='tengah'>$a_daftar[41]</td>
		</tr>";
		$no++;
	}
}
echo "</table>";
?>