<?php 
include "config.php";
include "fungsi.php";
$id_berita=anti_injection($_GET['id']);
$qkepala=mysqli_query($konek,"SELECT * FROM tbl_berita where berita_id='$id_berita' limit 1");
$ketemu=mysqli_num_rows($qkepala);
$r=mysqli_fetch_array($qkepala);
$content = $r['berita_image'];
$type ="image/png";    //$data[1];
header("Content-type: $type");   // parsing ke mime tipe
echo $content;
?>