<?php
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if(count(get_included_files())==1)
{
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}

//Identitas
$desa="0"; //0=desa, 1=Kelurahan
$title="Desa Pentadio Barat | Selamat Datang";
$logo_title="DESA PENTADIO BARAT";
$tagline="Smart Village Community";
$url="http://localhost/simaya_desa/web";
//API 
$url_api="";
$API_KEY="";

$kode_prop="";
$kode_kabupatenkota="";
$kode_kecamatan="";
$kode_kelurahan="";

// definisikan koneksi ke database
$server = "localhost";
$username = "root";
$password = "usbw";
$database = "simdes2016";

$konek = mysqli_connect($server,$username,$password,$database);


?>