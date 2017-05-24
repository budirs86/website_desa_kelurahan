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


    <!-- Javascript for animation -->
	<script language="javascript" src="resources/js/jquery.ticker.js"></script>
	<script language="javascript" src="resources/js/site.js"></script>
	<script type="text/javascript" src="resources/js/jquery.jcarousel.min.js" ></script>
	<script src="resources/js/redactor/jquery-1.7.min.js" type="text/javascript"></script>


		
	<script type="text/javascript" src="resources/js/jquery.jcarousel.min.js" ></script>
    <script type="text/javascript" src="resources/js/jquery.min.js"></script>
    <script type="text/javascript" src="resources/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="resources/js/expand.js"></script>
    <script type="text/javascript" src="resources/js/common.js"></script>
	<script type="text/javascript" src="resources/js/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
			$(document).ready(function() {
				$("a[rel=galeri]").fancybox({
					"transitionIn"		: "fade',
					"transitionOut"		: "fade',
					"overlayColor"		: '#000',
					"overlayOpacity"	: 0.9
				});});
	</script>
</head>

<body>

<!-- MAIN WEBSITE BEGIN -->
<div id="main">
	<?php include_once('header.php');?>
    <!-- SLIDER WEBSITE BEGIN -->
	<?php include_once('slide.php');?>
    <!-- END OF SLIDER WEBSITE -->

    <!-- CONTENT WEBSITE BEGIN -->
    <div id="content">
	
		<div id="right-content">
		   	<div class="right-panel">
                <div class="top-right-panel">Pimpinan Daerah</div>
                <div class="bottom-right-panel">
                  <center><img src="<?php echo 'include/kepala.php'; ?>" style="width:200px;height:200px;" /></center>
					<p style="text-align:center; margin:0px; padding:0px;">
					<?php 
					$qkepala="select * from tbl_config";
					$rkepala=mysqli_query($konek,$qkepala);
					$kepala=mysqli_fetch_array($rkepala);
					echo $kepala['kepala'].'<br>';
					echo $kepala['nip'];
					?>
					</p>
                </div>
            </div>
		</div>
        <!-- LEFT CONTENT WEBSITE BEGIN -->
        <div id="left-content">
		    <!-- INFORMASI TERBARU -->
            <div class="middle-panel">
                <div class="top-middle-panel">Berita Terbaru</div>
                <div class="bottom-middle-panel">
                    <ul>
						<?php 
						$qberita="select *,(select kategori from tbl_kategori where id=tbl_berita.berita_kategori limit 1) kat,(select nama from tbl_user where username=tbl_berita.berita_username) as nama from tbl_berita order by berita_id desc limit 10";
						$rberita=mysqli_query($konek,$qberita);
						while ($berita=mysqli_fetch_row($rberita)){
						$id=$berita[0];	
						?>
                        <li>
                            <div class="date"><?php echo konversi_tanggal("D, d-m-Y H:i:s",$berita[6]).', Ditulis oleh : <label><i> '.$berita[15].'</i></label>';?></div>
							<div class="title"><a href="detail_artikel?action=detail&id=<?php echo md5($id);?>"><?php echo html_entity_decode($berita[1]);?></a></div>
                            <div class="text">
							<img src="<?php echo 'include/berita.php?id='.$id ;?>" width="150px" height="90px">
							<?php echo html_entity_decode($berita[3]).'...<label><i><a href="detail_artikel?action=detail&id='.md5($id).'">Baca selanjutnya...</i></a></label>';?></div>
							 <div class="link">
								<label class="btn btn-success btn-xs" href="#artikel">Dibaca <?php echo $berita[9];?> Kali</label>
								<label class="btn btn-warning btn-xs" href="#artikel">Kategori : <?php echo $berita[14];?></label>
							 </div>
                        </li><br>
                        <?php }?>
                    </ul>
					
                </div>

                <div class="link">
                    <a class="btn btn-primary" href="berita.php">Tampilkan Semua Berita</a>
                </div>
            </div>        </div>
        <!-- END OF LEFT CONTENT WEBSITE -->

        <!-- RIGHT CONTENT WEBSITE BEGIN -->
        <div id="right-content">

            <!-- MODUL TERBARU -->
			<?php include_once('berita_terbaru.php');?>	
			<?php include_once('kategori.php');?>
			<?php include_once('gallery.php');?>
			<?php include_once('info_user.php');?>
            <?php include_once('statistik_pengunjung.php');?>

        </div>
        <!-- END OF RIGHT CONTENT WEBSITE -->

        <div class="clear"></div>

    </div>
    <!-- END OF CONTENT WEBSITE -->

    <!-- FOOTER WEBSITE BEGIN -->
   <?php 
   include_once('footer.php');
   ?>
</div>
<!-- END OF MAIN WEBSITE -->


</body>
</html>