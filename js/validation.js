function valid() {
	var form = document.form_daftar;
	var jk = form.jk.value;
	
	if (form.nama.value == "") {
		alert("Nama Masih Kosong "+jk);
		form.nama.focus();
		return false;
	} else if (form.jk.value == "") {
		alert("Jenis Kelamin Masih Kosong");
		form.jk.focus();
		return false;
	} else if (form.agama.value == "") {
		alert("Agama Masih Kosong "+jk);
		form.agama.focus();
		return false;
	} else if (form.tmp_lahir.value == "") {
		alert("Tempat Lahir Masih Kosong "+jk);
		form.tmp_lahir.focus();
		return false;
	} else if (form.tgl_lahir.value == "") {
		alert("Tanggal Lahir Masih Kosong "+jk);
		form.tgl_lahir.focus();
		return false;
	} else if (form.bln_lahir.value == "") {
		alert("Bulan Lahir Masih Kosong "+jk);
		form.bln_lahir.focus();
		return false;
	} else if (form.thn_lahir.value == "") {
		alert("Tahun Lahir Masih Kosong "+jk);
		form.thn_lahir.focus();
		return false;
	} else if (form.alamat.value == "") {
		alert("Alamat Masih Kosong "+jk);
		form.alamat.focus();
		return false;
	} else if (form.stat_anak.value == "") {
		alert("Status Anak Masih Kosong "+jk);
		form.stat_anak.focus();
		return false;
	} else if (form.anak_ke.value == "") {
		alert("Anak Ke Masih Kosong "+jk);
		form.anak_ke.focus();
		return false;
	} else if (form.jum_sdr.value == "") {
		alert("Jumlah Saudara Masih Kosong "+jk);
		form.jum_sdr.focus();
		return false;
	} else if (form.nama_ay.value == "") {
		alert("Nama Ayah Masih Kosong "+jk);
		form.nama_ay.focus();
		return false;
	} else if (form.nama_ib.value == "") {
		alert("Nama Ibu Masih Kosong "+jk);
		form.nama_ib.focus();
		return false;
	} else if (form.pend_ay.value == "") {
		alert("Pendidikan Ayah Masih Kosong "+jk);
		form.pend_ay.focus();
		return false;
	} else if (form.pend_ib.value == "") {
		alert("Pendidikan Ibu Masih Kosong "+jk);
		form.pend_ib.focus();
		return false;
	} else if (form.pkj_ay.value == "") {
		alert("Pekerjaan Ayah Masih Kosong "+jk);
		form.pkj_ay.focus();
		return false;
	} else if (form.pkj_ib.value == "") {
		alert("Pekerjaan Ayah Masih Kosong "+jk);
		form.pkj_ib.focus();
		return false;
	} else if (form.asal_skl.value == "") {
		alert("Sekolah Asal Masih Kosong "+jk);
		form.asal_skl.focus();
		return false;
	} else if (form.stat_skl.value == "") {
		alert("Status Sekolah Masih Kosong "+jk);
		form.stat_skl.focus();
		return false;
	} else if (form.sc_alamat.value == "") {
		alert("Alamat Sekolah Asal Masih Kosong "+jk);
		form.sc_alamat.focus();
		return false;
	} else if (form.kepsek.value == "") {
		alert("Kepala Sekolah Asal Masih Kosong "+jk);
		form.kepsek.focus();
		return false;
	} else if (form.thn_lulus.value == "") {
		alert("Tahun Lulus Masih Kosong "+jk);
		form.thn_lulus.focus();
		return false;
	} else if (form.no_ijazah.value == "") {
		alert("Nomor Ijazah Masih Kosong "+jk);
		form.no_ijazah.focus();
		return false;
	} else if (form.agama.value == "") {
		alert("Agama Masih Kosong "+jk);
		form.agama.focus();
		return false;
	}  else if (form.bind.value == "") {
		alert("Nilai Bahasa Indonesia Masih Kosong "+jk);
		form.bind.focus();
		return false;
	} else if (form.bing.value == "") {
		alert("Nilai Bahasa Inggris Masih Kosong "+jk);
		form.bing.focus();
		return false;
	} else if (form.mtk.value == "") {
		alert("Nilai Matematika Masih Kosong "+jk);
		form.mtk.focus();
		return false;
	} else if (form.ipa.value == "") {
		alert("Nilai IPA Masih Kosong "+jk);
		form.ipa.focus();
		return false;
	} else {
		return true;
	}
}