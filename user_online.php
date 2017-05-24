<?php
session_start();
include_once('include/fungsi.php');
include_once('include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );

$session=session_id();
$time=time();
$time_check=$time-600; //pengaturan waktu 10 menit
 

$sql="SELECT * FROM tbl_online WHERE sesi='$session'";
$result=mysqli_query($konek,$sql);
$count=mysqli_num_rows($result);
if($count<=0){
$sql1="INSERT INTO tbl_online(sesi,time)VALUES('$session', '$time')";
$result1=mysqli_query($konek,$sql1);
}
 
else {
$sql2="UPDATE tbl_online SET time='$time' WHERE sesi= '$session'";
$result2=mysqli_query($konek,$sql2);
}
 
$sql3="SELECT * FROM tbl_online";
$result3=mysqli_query($konek,$sql3);
$count_user_online=mysqli_num_rows($result3);
echo $count_user_online;
 
// jika lebih dari 10 menit, hapus session
$sql4="DELETE FROM tbl_online WHERE time<$time_check";
$result4=mysqli_query($konek,$sql4);

?>