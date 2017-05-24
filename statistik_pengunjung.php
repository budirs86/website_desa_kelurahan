<?php
include_once('include/fungsi.php');
include_once('include/config.php');

   $ip   = $_SERVER['REMOTE_ADDR'];
   $tanggal = date("Y-m-d");
   $waktu  = time();
   $bln=date("m");
   $tgl=date("d");
   $blan=date("Y-m");
   $thn=date("Y");
   $tglk=$tgl-1;
   
   //hari ini
   $qc="select hits from tbl_counter where tanggal='$tanggal'";
   $rc=mysqli_query($konek,$qc);
   $row_c=mysqli_fetch_array($rc);
   
   //bulan ini
   $qc1="select sum(hits) as hits from tbl_counter where month(tanggal)='$bln' and year(tanggal)='$thn'";
   $rc1=mysqli_query($konek,$qc1);
   $row_c1=mysqli_fetch_array($rc1);
   
   //total
   $qc2="select sum(hits) as tot_hits from tbl_counter";
   $rc2=mysqli_query($konek,$qc2);
   $row_c2=mysqli_fetch_array($rc2);
   
   
   //user online
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
	 
	// jika lebih dari 10 menit, hapus session
	$sql4="DELETE FROM tbl_online WHERE time<$time_check";
	$result4=mysqli_query($konek,$sql4);
   
   ?>
   <div class="right-panel">
                <div class="top-right-panel">Statistik Pengunjung</div>
                <div class="bottom-right-panel">

                    <table class="table" style="margin-bottom: 0;">
                        <tbody>
                        <tr>
                            <td style="border-top:0;">Hari Ini</td>
                            <td style="border-top:0;">:</td>
                            <td style="border-top:0;">
                                <b>
                                    <?php 
									echo $row_c['hits'];
									?>                               </b>

                            </td>
                        </tr>
                        <tr>
                            <td>Bulan Ini</td>
                            <td>:</td>
                            <td>
                                <b>
                                    <?php echo $row_c1['hits'];?>                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Hits</td>
                            <td>:</td>
                            <td>
                                <b>
									
                                    <?php echo $row_c2['tot_hits'];?>                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Online</td>
                            <td>:</td>
                            <td>
                                <b>
                                      <?php
									echo $count_user_online;
									?> </b>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>