<?php 
include "config.php";
include "fungsi.php";
$urut=$_GET['urut'];
$qlogo=mysqli_query($konek,"SELECT * FROM tbl_slide where id='$urut' limit 1");
$ketemu=mysqli_num_rows($qlogo);
$r=mysqli_fetch_array($qlogo);
$content = $r['slide'];
$tipe=$r['type'];
    //$data[1];
header("Content-type: $tipe");   // parsing ke mime tipe
echo $content;
?>