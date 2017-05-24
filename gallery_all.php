<?php
include_once('include/fungsi.php');
include_once('include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );




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
<style>
	.foto {
    -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: ;
}
</style>
    <!-- Javascript for animation -->

    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/expand.js"></script>
    <script type="text/javascript" src="resources/js/common.js"></script>
	<script type="text/javascript" src="resources/js/jquery.fancybox-1.3.4.pack.js"></script>
	<!--menambahkan css fancybox-->
	<link href="css/jquery.fancybox-1.3.4" type="text/css" rel="stylesheet"/>
	<script type="text/javascript">$(document).ready(function() {
  /*
   *  Simple image gallery. Uses default settings
   */     
$('.fancybox').fancybox();
      });
</script>
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


            <h2 class="title-top">Gallery Kegiatan</h2>
            <div class="artikel-page">

                <div class="text">
					<div class="foto">
						<table>
						<?php
						$qdetail="select * from tbl_galeri order by id limit 50";
						$rdetail=mysqli_query($konek,$qdetail);
						while ($row_detail=mysqli_fetch_array($rdetail)){
						$id=md5($row_detail['id']);
						?>
						
						<div><?php echo $row_detail['judul'];?><br><a class="fancybox" href="<?php echo 'include/gallery.php?id='.$id ;?>" data-fancybox-group="gallery" target="_blank"> <img class="img-polaroid"  src="<?php echo 'include/gallery.php?id='.$id ;?>" width="100%" height="100%" alt="" /></a><br><b><?php echo $row_detail['keterangan'];?></b></div>
						
						
						<?php }?>
						</table>
				 

					</div>
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