<article class="module width_full">
	<header><h3>Selamat Datang di PPDB Online MTs Negeri Sidoharjo</h3></header>
		<div class="module_content">
			<p>
			<?php
			$q_beranda = mysql_query("SELECT * FROM t_sekolah WHERE flag = '1'");
			$a_beranda = mysql_fetch_array($q_beranda);
		
			echo "<p align='justify'>$a_beranda[7]</p>";
			?>
			</p>
		</div>
</article><!-- end of styles article -->