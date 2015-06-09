<article class="module width_full">
	<header><h3>Prosedur Pendaftaran</h3></header>
		<div class="module_content">
		<?php
		$q_prosedur = mysql_query("SELECT * FROM t_sekolah WHERE flag = '1'");
		$a_prosedur = mysql_fetch_array($q_prosedur);
		
		echo "<p align='justify'>$a_prosedur[7]</p>";
		?>
		
		</div>
</article>