<?php
include_once('include/fungsi.php');
include_once('include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );

$id_berita=anti_injection($_GET['id']);
$qdetail="select *,(select nama from tbl_user where username=tbl_berita.berita_username limit 1) as nama from tbl_berita where md5(berita_id)='$id_berita' limit 1";
$rdetail=mysqli_query($konek,$qdetail);
$row_detail=mysqli_fetch_array($rdetail);
$id=$row_detail['berita_id'];

//baca berita
$qbaca="update tbl_berita set berita_counter=berita_counter+1 where berita_id=$id";
$rbaca=mysqli_query($konek,$qbaca);

//hits
$ip=getenv("REMOTE_ADDR");
$tanggal=date('Y-m-d');

$qcount="select * from  tbl_counter where tanggal='$tanggal'";
$rcount=mysqli_query($konek,$qcount);
$num=mysqli_num_rows($rcount);

if ($num<=0){
	$qhits="insert into tbl_counter(ip,tanggal,hits)values('$ip','$tanggal','1')";
	$rhits=mysqli_query($konek,$qhits);
}else{
	$qhits="update tbl_counter set hits=(hits+1),ip='$ip' where tanggal='$tanggal'";
	$rhits=mysqli_query($konek,$qhits);	
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title><?php echo $title;?></title>

    <!-- CSS -->
    <link href="resources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="resources/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="resources/css/style.css" rel="stylesheet" />


    <!-- Javascript for animation -->

    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/expand.js"></script>
    <script type="text/javascript" src="resources/js/common.js"></script>
</head>

<body>

<!-- MAIN WEBSITE BEGIN -->
<div id="main">

    <!-- HEADER WEBSITE BEGIN -->
	<?php include_once('header.php');?>

    <!-- CONTENT WEBSITE BEGIN -->
    <div id="content">

        <!-- LEFT CONTENT WEBSITE BEGIN -->
        <div id="left-content">


            <h2 class="title-top"><?php echo $row_detail['berita_judul'] ;?></h2>
            <div class="artikel-page">
                <div class="date">
                    <?php echo konversi_tanggal("D, d-m-Y H:i:s",$row_detail['berita_tanggal']) ;?> By <b><?php echo $row_detail['nama'] ;?></b>
                </div>
                <div class="text">

                    <img src="<?php echo 'include/berita.php?id='.$id ;?>" height="400px" width="100%">
					<br>
					<br>
					<br>
					<br>
                   <span><?php 
				   // memecah string input berdasarkan karakter '\r\n\r\n'
					$pecah = explode("\r\n\r\n", $row_detail['berita_isi']);

					// string kosong inisialisasi
					$text = "";

					// untuk setiap substring hasil pecahan, sisipkan <p> di awal dan </p> di akhir
					// lalu menggabungnya menjadi satu string utuh $text
					for ($i=0; $i<=count($pecah)-1; $i++)
					{
					   $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
					   $text .= $part;
					}

					// menampilkan outputnya
					echo html_entity_decode($text);

				   
				   ?></span>

                </div>

            </div>

        </div>
        <!-- END OF LEFT CONTENT WEBSITE -->

        <!-- RIGHT CONTENT WEBSITE BEGIN -->
        <div id="right-content">

            <!-- ARTIKEL TERBARU -->
			<?php include_once('berita_terbaru.php');?>	
			<?php include_once('kategori.php');?>

            <!-- INFO USER -->
            <?php include_once('info_user.php');?>

        </div>
        <!-- END OF RIGHT CONTENT WEBSITE -->

        <div class="clear"></div>

    </div>
    <!-- END OF CONTENT WEBSITE -->

    <!-- FOOTER WEBSITE BEGIN -->
	<?php include_once('footer.php')?>
</div>
<!-- END OF MAIN WEBSITE -->


</body>
</html>