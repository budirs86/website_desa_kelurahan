<?php 
include "config.php";
include "fungsi.php";
$qkepala=mysqli_query($konek,"SELECT * FROM tbl_config limit 1");
$ketemu=mysqli_num_rows($qkepala);
$r=mysqli_fetch_array($qkepala);
$content = $r['foto_kepala'];
$type ="image/png";    //$data[1];
header("Content-type: $type");   // parsing ke mime tipe
echo $content;
echo $r['kepala'];
 
?>