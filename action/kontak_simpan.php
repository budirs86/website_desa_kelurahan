
<?php 
include_once('../include/fungsi.php');
include_once('../include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'../firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'../firewall/firewall.php' );


$nama=anti_injection($_POST['name']);
$email=anti_injection($_POST['email']);
$url=anti_injection($_POST['website']);
$isi=anti_injection($_POST['comment']);
$tgl=date('Y-m-d H:i:s');

$qisi="insert into tbl_kontak(nama,email,website,isi,tanggal)values('$nama','$email','$url','$isi','$tgl')";
$risi=mysqli_query($konek,$qisi);
if (!$risi){
	echo '<script>alert("Tidak dapat mengirim pesan...");window.history.back()</script>';
}else{
	header('location:../index.php');
}

?>
