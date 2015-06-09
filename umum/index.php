<?php
include "../lib/fungsi.php";
$nav				= "";
$ambil				= "home.php";
$sesi_umum			= isset($_SESSION['umum']) ? $_SESSION['umum'] : NULL;

$identitas_sekolah 	= getSekolah();

if (!empty($sesi_umum)) {
	$id_daftar 		= getValue("master", "id_daftar", "u", ($_SESSION['umum']));
}

$p 					= isset($_GET['p']) ? $_GET['p'] : "";
if ($p == "") {
	$nav 	= "Depan";
	$ambil 	= "home.php";
} elseif ($p == "daftar_form") {
	$nav 	= "Pendaftaran";
	$ambil 	= "daftar_form.php";
} elseif ($p == "daftar_data") {
	$nav 	= "Data Pendaftar";
	$ambil 	= "$p.php";
} elseif ($p == "daftar_prosedur") {
	$nav 	= "Prosedur Pendaftaran";
	$ambil 	= "$p.php";
} elseif ($p == "data_statistik") {
	$nav 	= "Statistik Pendaftar";
	$ambil 	= "$p.php";

} else if ($p == "logout") {
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
// kecuali di atas...
} else {
	$nav 	= "Depan";
	$ambil 	= "home.php";
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>PPDB Online MTs N Sidoharjo, Tahun Ajaran 2015/2016</title>
	<meta content='Website Penerimaan Peserta Didik Baru (PPDB Online) MTs Negeri Sidoharjo, Samigaluh, Kulonprogo Tahun Ajaran 2015/2016'/>
	
	<meta content='ppdb online, psb online, ppdb kulonprogo, mts kulonprogo' name='KEYWORDS'/>

	<link rel="stylesheet" href="../css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="../js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="../js/hideshow.js" type="text/javascript"></script>
	<script src="../js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="../js/jquery.equalHeight.js"></script>
	<script type="text/javascript" src="../js/validation.js"></script>
	<script type="text/javascript">
	function konfirmasi(apa) {
		tanya = confirm('Anda yakin ingin  : \r\r --- '+ apa + ' --- \r\r?');
		if (tanya == true) return true;
		else return false;
	}
	
	function buka(file) {
		window.open(file);
	}
	
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php">@PPDB_Online </a></h1>
			<h2 class="section_title"><?php echo $identitas_sekolah[0]; ?>, Tahun Ajaran <?php echo $identitas_sekolah[2]; ?></h2>
			<h6 class="alamat">Alamat Sekolah : <?php echo $identitas_sekolah[1]; ?></h6>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
		<?php
			if ($sesi_umum != NULL) {
			$user  	= "<span style=\"font-weight: normal; text-decoration:none\">Log As : \"</span>".$_SESSION['umum']."\"";
			} else {	
			$user 	= "<span style=\"font-weight: normal; text-decoration:none\"><b><a href=\"login.php\">Login Pendaftar</a></b>&nbsp;|&nbsp; <b><a href=\"../login.php\">Login Admin</a></b>";
			}
			?>
			<p><?php echo $user; ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Aplikasi PSB</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $nav; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
				
		<h3>Pendaftaran</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="?p=index.php">Beranda</a></li>
			<?php
			if ($sesi_umum != NULL) {
				echo "<li class=\"icn_new_article\"><a href=\"?p=daftar_form&mod=edit&id=$id_daftar\">Edit Data </a></li>";
			} else {
				echo "<li class=\"icn_new_article\"><a href=\"?p=daftar_form&mod=add\">Daftar Baru</a></li>";
			}
			?>
			<li class="icn_new_article"><a href="?p=daftar_prosedur">Prosedur Pendaftaran</a></li>
		</ul>
	
		<h3>Data</h3>
		<ul class="toggle">
			<li class="icn_edit_article"><a href="?p=daftar_data">Lihat Data Pendaftar</a></li>
			<?php
			if ($sesi_umum != NULL) {
			?>
			<li class="icn_edit_article"><a href="#" onclick="buka('../formulir_daftar.php?id_daftar=<?php echo $id_daftar; ?>')">Cetak Formulir</a></li>
			<?php
			}
			?>
			<li class="icn_edit_article"><a href="?p=data_statistik">Statistik Pendaftar</a></li>
		</ul>
		<?php
		if ($sesi_umum != NULL) {
		?>
		<h3>User</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="?p=logout" onclick="return konfirmasi('LOG OUT');">Logout</a></li>
		</ul>
		<?php } ?>
		<footer>
			<hr />
			<p><strong>Aplikasi PSB &copy; <a href="http://nur-akhwan.blogspot.com/p/akhwansoft-buat-website.html" target="_blank" title="Jasa pembuatan website sekolah, instansi, dll. Sistem Informasi Sekolah, dll">Nur Akhwan</a></strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
 		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<?php include $ambil; ?>
		<div class="spacer"></div>
	</section>
	<script type="text/javascript">
	$('#close').click(function() {
		$('.alert_success').slideUp("fast");
		$('.alert_error').slideUp("fast");
	});
	</script>

</body>

</html>