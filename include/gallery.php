<?php 
include "config.php";
include "fungsi.php";
$id_gal=anti_injection($_GET['id']);
$qkepala=mysqli_query($konek,"SELECT * FROM tbl_galeri where md5(id)='$id_gal' limit 1");
$ketemu=mysqli_num_rows($qkepala);
$r=mysqli_fetch_array($qkepala);
$content = $r['foto'];
$type ="image/png";    //$data[1];
header("Content-type: $type");   // parsing ke mime tipe
echo $content;
?>
<title><?php echo $title;?></title>