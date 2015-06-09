<?php

include "lib/fungsi.php";

$sql=mysql_query("SELECT * FROM master ORDER BY id_daftar");


function xlsBOF() {
	echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
	return;
}

function xlsEOF() {
	echo pack("ss", 0x0A, 0x00);
	return;
}

function xlsBuatBaris($data, $col, $value) {
	echo pack("sssss", 0x203, 14, $data, $col, 0x0);
	echo pack("d", $value);
	return;
}

function xlsBuatLabel($data, $col, $value) {
	$L = strlen ($value);
	echo pack("ssssss", 0x204, 8 + $L, $data, $col, 0x0, $L);
	echo $value;
	return;
}
$date=date('d')."-".date('F')."-".date('Y');

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: aplication/force-download");
header("Content-Type: aplication/octet-stream");
header("Content-Type: aplication/download");
header("Content-Disposition: attachment; filename=data_psb@$date.xls");
header("Content-Transfer-Encoding: binary");

xlsBOF();

xlsBuatLabel(0, 0, 'No');
xlsBuatLabel(0, 1, 'Nama');
xlsBuatLabel(0, 2, 'JK');
xlsBuatLabel(0, 3, 'Agama');
xlsBuatLabel(0, 4, 'Tempat Lahir');
xlsBuatLabel(0, 5, 'Tanggal Lahir');
xlsBuatLabel(0, 6, 'Alamat');
xlsBuatLabel(0, 7, 'Status Anak');
xlsBuatLabel(0, 8, 'Jumlah Saudara');
xlsBuatLabel(0, 9, 'Nama Ayah');
xlsBuatLabel(0, 10, 'Penddk. Ayah');
xlsBuatLabel(0, 11, 'Pekerj. Ayah');
xlsBuatLabel(0, 12, 'Nama Ibu');
xlsBuatLabel(0, 13, 'Penddk. Ibu');
xlsBuatLabel(0, 14, 'Pekerj. Ibu');
xlsBuatLabel(0, 15, 'Tahun Lulus');
xlsBuatLabel(0, 16, 'Nomor Ijazah');
xlsBuatLabel(0, 17, 'Asal Sekolah');
xlsBuatLabel(0, 18, 'Nilai B. Inggris');
xlsBuatLabel(0, 19, 'Nilai B. Indo');
xlsBuatLabel(0, 20, 'Nilai Matematika');
xlsBuatLabel(0, 21, 'Nilai IPA');
xlsBuatLabel(0, 22, 'Prestasi 1');
xlsBuatLabel(0, 23, 'Tingkat');
xlsBuatLabel(0, 24, 'Prestasi 2');
xlsBuatLabel(0, 25, 'Tingkat');
xlsBuatLabel(0, 26, 'Prestasi 3');
xlsBuatLabel(0, 27, 'Tingkat');
xlsBuatLabel(0, 28, 'Pilihan Jurusan 1');
xlsBuatLabel(0, 29, 'Pilihan Jurusan 2');
xlsBuatLabel(0, 30, 'Tanggal Daftar');


$xlsRow = 1;

while ($data=mysql_fetch_array($sql)){
$agama = getAgama($data[3]);

	xlsBuatLabel($xlsRow,0,$data[0]); 			//no
	xlsBuatLabel($xlsRow,1,$data[1]);			//nama
	xlsBuatLabel($xlsRow,2,getJK($data[2]));	//jk
	xlsBuatLabel($xlsRow,3,$agama);				//agama
	xlsBuatLabel($xlsRow,4,$data[4]);			//tmp. lahir
	xlsBuatLabel($xlsRow,5,$data[5]);			//tgl. lahir
	xlsBuatLabel($xlsRow,6,$data[6]);			//alamat
	xlsBuatLabel($xlsRow,7,getStatusAnak($data[7]));			//status anak
	xlsBuatLabel($xlsRow,8,$data[8]);			//anak ke
	xlsBuatLabel($xlsRow,8,$data[9]);			//jum saudara
	xlsBuatLabel($xlsRow,9,$data['k_nama_ay']);			//ayah
	xlsBuatLabel($xlsRow,10,getPendidikan($data['k_pend_ay']));			//pend. ayah
	xlsBuatLabel($xlsRow,11,getPekerjaan($data['k_pkj_ay']));			//pekerj. ayah
	xlsBuatLabel($xlsRow,12,$data[13]);			//ibu
	xlsBuatLabel($xlsRow,13,getPendidikan($data[14]));			//pend. ibu
	xlsBuatLabel($xlsRow,14,getPekerjaan($data[15]));			//pekerj. ibu
	
	xlsBuatLabel($xlsRow,15,$data[16]);			//tahun lulus
	xlsBuatLabel($xlsRow,16,$data[17]);			//no. ijazah
	xlsBuatLabel($xlsRow,17,$data[18]);			//asal sekolah
	
	xlsBuatLabel($xlsRow,18,$data[22]);			//b. inggris
	xlsBuatLabel($xlsRow,19,$data[23]);			//b. indo
	xlsBuatLabel($xlsRow,20,$data[24]);			//matematika
	xlsBuatLabel($xlsRow,21,$data[25]);			//ipa
	
	xlsBuatLabel($xlsRow,22,$data[26]);						//prestasi1
	xlsBuatLabel($xlsRow,23,getTktPrestasi($data[27]));		//tingkat1
	xlsBuatLabel($xlsRow,24,$data[29]);						//prestasi2		
	xlsBuatLabel($xlsRow,25,getTktPrestasi($data[30]));		//tingkat2
	xlsBuatLabel($xlsRow,26,$data[32]);						//prestasi3		
	xlsBuatLabel($xlsRow,27,getTktPrestasi($data[33]));		//tingkat3
	
	
	xlsBuatLabel($xlsRow,28,getJurusan($data[36]));		//jurusan1		
	xlsBuatLabel($xlsRow,29,getJurusan($data[37]));						//jurusan2
	
	xlsBuatLabel($xlsRow,30,$data[39]);			//tgl. daftar	
	$xlsRow++;
}

xlsEOF();
exit();

?>
	
