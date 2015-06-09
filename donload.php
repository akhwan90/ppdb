<?php
$_file_name = $_GET['filename'];

header("Content-Disposition: attachment; filename=$_file_name");
header("content-type: text/xml" );
include ("bck/$_file_name");
?>