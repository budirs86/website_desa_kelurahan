<?php 
include "config.php";
include "fungsi.php";

$qlogo=mysqli_query($konek,"SELECT * FROM tbl_config limit 1");
$ketemu=mysqli_num_rows($qlogo);
$r=mysqli_fetch_array($qlogo);
$content = $r['header'];
$type ="image/png";    //$data[1];
header("Content-type: $type");   // parsing ke mime tipe
echo $content;
?>