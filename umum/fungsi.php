<?php
function getKonfigurasi() {
	$config_file = "../config.cfg";

	$fp = fopen($config_file, "r");

	while (!feof($fp)) {
		$line = trim(fgets($fp));
		$pieces = explode("=", $line);
		$option = trim($pieces[0]);
		$value = trim($pieces[1]);
		$config_values[$option] = $value;
	}
	fclose($fp);
	return $config_values;
}

$konfig = getKonfigurasi();


$h	= $konfig['HOST'];
$u	= $konfig['USER'];
$p	= $konfig['PASS'];
$d 	= $konfig['DB'];

mysql_connect($h, $u, $p) or die (mysql_error());
mysql_select_db($d);

function getSekolah() {
	$q = mysql_query("SELECT * FROM t_sekolah WHERE flag = '1'");
	$a = mysql_fetch_array($q);
	
	$dataSekolah = array();
	$dataSekolah[0] = $a[0];
	$dataSekolah[1] = $a[1];
	$dataSekolah[2] = $a[2];
	$dataSekolah[3] = $a[3];
	$dataSekolah[4] = $a[4];
	$dataSekolah[5] = $a[5];
	
	return $dataSekolah;
}
function cmbDB($name, $tabel, $f_value, $f_view, $selected) {
	echo "<select name='$name'><option value=''>--</option>";
	$q = mysql_query("SELECT $f_value, $f_view FROM $tabel ORDER BY $f_value ASC");
	while ($a = mysql_fetch_array($q)) {
		if ($a[0] == $selected) {
			echo "<option value='$a[0]' selected>$a[1]</option>";
		} else {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
	}
	echo "</select>";
}
function cInput($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td colspan=\"3\"><input type=\"text\" name=\"$name\" size=\"$size\" value=\"$value\" class=\"required\"></td></tr>";
}
function cInput2($label, $name, $size, $value) {
	$pc_label = explode("|", $label);
	$pc_name  = explode("|", $name);
	$pc_size  = explode("|", $size);
	$pc_value = explode("|", $value);
	
	$label1 = $pc_label[0]; $label2 = $pc_label[1];
	$name1 = $pc_name[0]; $name2 = $pc_name[1];
	$size1 = $pc_size[0]; $size2 = $pc_size[1];
	$value1 = $pc_value[0]; $value2 = $pc_value[1];
	
	echo "
	<tr>
	<td width=\"20%\">$label1</td><td width=\"30%\"><input type=\"text\" name=\"$name1\" size=\"$size1\" value=\"$value1\" class=\"required\"></td>
	<td width=\"20%\">$label2</td><td width=\"30%\"><input type=\"text\" name=\"$name2\" size=\"$size2\" value=\"$value2\" class=\"required\"></td>
	</tr>";
}
function cCmbTglLahir($tmp_lhr_value, $d, $m, $y) {
	echo "<tr><td width=\"20%\">Tempat Lahir</td>
	<td colspan=\"3\"><input type=\"text\" name=\"tmp_lahir\" size=\"30\" value=\"$tmp_lhr_value\"> , 
	Tgl. Lahir ";
	
	echo "<select name='tgl_lahir'><option value=''>--</option>";
	for ($tg =1; $tg <=31; $tg++) {
		if ($tg == $d) {
			echo "<option value='$tg' selected>$tg</option>";		
		} else {
			echo "<option value='$tg'>$tg</option>";		
		}
	}	
	echo "</select> - <select name='bln_lahir'><option value=''>--</option>";
	for ($bl =1; $bl <=12; $bl++) {
		if ($bl == $m) {
			echo "<option value='$bl' selected>$bl</option>";		
		} else {
			echo "<option value='$bl'>$bl</option>";		
		}
	}	
	echo "</select> - <select name='thn_lahir'><option value=''>--</option>";
	for ($th = 2012; $th >=1990; $th--) {
		if ($th == $y) {
			echo "<option value='$th' selected>$th</option>";		
		} else {
			echo "<option value='$th'>$th</option>";		
		}
	}
	echo "</td></tr>";
}


function cCmbPekerjaan($val1, $val2) {
	echo "<td width=\"20%\">Pekerjaan Ayah</td><td width=\"30%\"><select name='pkj_ay'><option value=''>--</option>";
	$q = mysql_query("SELECT * FROM t_pkj ORDER BY pkj ASC");
	while ($a = mysql_fetch_array($q)) {
		if ($a[0] == $val1) {
			echo "<option value='$a[0]' selected>$a[1]</option>";
		} else {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
	}
	echo "</select></td><td width=\"20%\">Pekerjaan Ibu</td><td width=\"30%\"><select name='pkj_ib'><option value=''>--</option>";
	$r = mysql_query("SELECT * FROM t_pkj ORDER BY pkj ASC");
	while ($b = mysql_fetch_array($r)) {
		if ($b[0] == $val2) {
			echo "<option value='$b[0]' selected>$b[1]</option>";
		} else {
			echo "<option value='$b[0]'>$b[1]</option>";
		}
	}
	echo "</select></td></tr>";
}

function cCmbPendidikan($val1, $val2) {
	echo "<td width=\"20%\">Pendidikan Ayah</td><td width=\"30%\"><select name='pend_ay'><option value=''>--</option>";
	$q = mysql_query("SELECT * FROM t_penddk ORDER BY id_penddk ASC");
	while ($a = mysql_fetch_array($q)) {
		if ($a[0] == $val1) {
			echo "<option value='$a[0]' selected>$a[1]</option>";
		} else {
			echo "<option value='$a[0]'>$a[1]</option>";
		}
	}
	echo "</select></td><td width=\"20%\">Pendidikan Ibu</td><td width=\"30%\"><select name='pend_ib'><option value=''>--</option>";
	$r = mysql_query("SELECT * FROM t_penddk ORDER BY id_penddk ASC");
	while ($b = mysql_fetch_array($r)) {
		if ($b[0] == $val2) {
			echo "<option value='$b[0]' selected>$b[1]</option>";
		} else {
			echo "<option value='$b[0]'>$b[1]</option>";
		}
	}
	echo "</select></td></tr>";
}

function cRadio($label1, $name, $label, $value, $isi) {
	$pc_label = explode("|", $label);
	$pc_value = explode("|", $value);
	$j_radio = count($pc_label);
	
	echo "\r<tr>\r<td width=\"20%\">$label1</td>\r<td colspan=\"3\">";
	for ($i = 0; $i < $j_radio; $i++) {
		if ($pc_value[$i] == $isi) {
			echo "\r<input type='radio' name='$name' value='$pc_value[$i]' checked>&nbsp;<label>$pc_label[$i]</label>&nbsp;";
		} else {
			echo "\r<input type='radio' name='$name' value='$pc_value[$i]'>&nbsp;<label>$pc_label[$i]</label>&nbsp;";
		}
	}
	echo "</td>\r</tr>";
}

function cPrestasi($val_nama, $val_tkt) {
	$pc_val_nama 	= explode("|", $val_nama);
	$pc_val_tkt		= explode("|", $val_tkt);
	
	for ($i=1; $i<=3; $i++) {
		$idx = $i-1;
		echo "<tr><td width=\"20%\">Prestasi $i</td><td colspan=\"3\">
		<input type='text' size='50' name='namapres$i' value='$pc_val_nama[$idx]'>&nbsp;&nbsp;&nbsp;
		Tingkat <select name='tgkt$i'><option value=''>--</option>";
		$q = mysql_query("SELECT * FROM t_prestasi ORDER BY id_prestasi ASC");
		while ($b = mysql_fetch_array($q)) {
			if ($pc_val_tkt[$idx] == $b[0]) {
				echo "<option value='$b[0]' selected>$b[1]</option>";
			} else {
				echo "<option value='$b[0]'>$b[1]</option>";		
			}
		}
		echo "</select></td></tr>";
	}
}

function cPilihanJurusan($val) {
	$pc_value = explode("|", $val);
	
	echo "<tr>";
	for ($i=1; $i<=2; $i++) {
		echo "<td width=\"20%\">Pilihan $i</td><td width='30%'><select name='jur$i'><option value=''>--</option>";
		$q = mysql_query("SELECT * FROM t_jurusan ORDER BY id_jur ASC");
		while ($a = mysql_fetch_array($q)) {
			$idx = $i-1;
			if ($pc_value[$idx] == $a[0]) {
				echo "<option value='$a[0]' selected>$a[1]</option>";	
			} else {
				echo "<option value='$a[0]'>$a[1]</option>";		
			}
		}
		echo "</td>";
	}
	echo "</tr>";
}

function getNilaiPrestasi($tkt) {
	if ($tkt == 1) { $nilai = 1; } 
	elseif ($tkt == 2) { $nilai = 2; } 
	elseif ($tkt == 3) { $nilai = 3; } 
	elseif ($tkt == 4) { $nilai = 4; } 
	else {$nilai = 0; }
	
	return $nilai;
}

function getAgama($id_agama) {
	$q = mysql_query("SELECT * FROM t_agama WHERE id_agama='$id_agama'");
	$a = mysql_fetch_array($q);
	return $a[1];
}
function getPendidikan($id_pddk) {
	$q = mysql_query("SELECT * FROM t_penddk WHERE id_penddk='$id_pddk'");
	$a = mysql_fetch_array($q);
	return $a[1];
}
function getPekerjaan($id_pkj) {
	$q = mysql_query("SELECT * FROM t_pkj WHERE id_pkj='$id_pkj'");
	$a = mysql_fetch_array($q);
	return $a[1];
}
function getJK($jk) {
	if ($jk == 1) {
		return "Laki-Laki";
	} else if ($jk == 2) {
		return "Perempuan";
	} else {
		return "Undefined";
	}
}

function cCmb($val, $label, $sel) {
	$pc_val = explode("|", $val);
	$pc_lab = explode("|", $label);
	$j_opt  = count($pc_val);
	echo "<option value=''>--</option>";
	for ($i = 1; $i <= $j_opt; $i++) {
		$idx = $i-1;
		if ($pc_val[$idx] == $sel) {
			echo $sel;
			echo "<option value='?p=data_statistik&by=$pc_val[$idx]' selected>$pc_lab[$idx]</option>";	
		} else  {
			echo "<option value='?p=data_statistik&by=$pc_val[$idx]'>$pc_lab[$idx]</option>";
		}
	}
}

function getValue($tabel, $field, $fk, $id) {
	$pc_fk 		= explode("|", $fk);
	$pc_id 		= explode("|", $id);
	$j_syarat 	= count($pc_fk);
	
	if ($j_syarat > 1) {
		$where = "WHERE $pc_fk[0] = '$pc_id[0]' AND $pc_fk[1] = '$pc_id[1]' LIMIT 1";
	} else {
		$where = "WHERE $fk = '$id' LIMIT 1";
	}	
	$q = mysql_query("SELECT $field FROM $tabel $where");
	$a = mysql_fetch_array($q);
	return $a[0];
}

function getEkstensiFile($file) {
	$pc = explode(".", $file);
	$jA = count($pc);
	$letakEx = $jA-1;
	$ekstensi = $pc[$letakEx];
	return $ekstensi;	
}


///backup restore
//fungsi BACKUP OK @ 14 JUni 2012
function backup_tables($tables) {
	//get all of the tables
	if($tables == '*') {
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result)) {
			$tables[] = $row[0];
		}

	} else {
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	$return.= "-- database : ppdb\n\n";
		//cycle through
	foreach($tables as $table) {
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);

		//$return.= 'DROP TABLE '.$table.';';
		//$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		//$return.= "\n\n".$row2[1].";\n\n";
		
		
		for ($i = 0; $i < $num_fields; $i++) {
			while($row = mysql_fetch_row($result)) {
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) {	
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	$date=date('d-m-Y-g-i-s');
	$file="psb@".$date.".sql";

	//save file
	$handle = fopen("bck/".$file,'w+');
	fwrite($handle,$return);
	fclose($handle);
	return $file;
}


function restore($filename) {
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	
	//$ID_file_backup = strstr($line, 14, 4);
	
	//if ($ID_file_backup == "ppdb") {
	
	foreach ($lines as $line) {
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
		continue;

		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';') {
			// Perform the query
			mysql_query($templine);
			// Reset temp variable to empty
		$templine = '';
		}
	}
	//return 0;
	//} else {
	//return $ID_file_backup;
	//}
}

// or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />')
function cFDfield($label, $data) {
	echo "<tr><td>$label</td><td>: $data</td></tr>";
}

function acakHuruf() {
	$panjangacak = 5;
	$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
	$max=strlen($base)-1;
	$acak='';
	mt_srand((double)microtime()*1000000);
	
	while (strlen($acak)<$panjangacak) {
		$acak.=$base{mt_rand(0,$max)};
	}
	return $acak;
}
?>