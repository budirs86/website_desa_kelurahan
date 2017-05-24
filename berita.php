<?php 
include_once('include/fungsi.php');
include_once('include/config.php');
define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'firewall/firewall.php' ) )
include_once( @dirname(__FILE__).'firewall/firewall.php' );
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
    <!-- END OF TOP MENU WEBSITE -->

    <!-- END OF SLIDER WEBSITE -->

    <!-- CONTENT WEBSITE BEGIN -->
    <div id="content">

        <!-- LEFT CONTENT WEBSITE BEGIN -->
        <div id="left-content">

            <h2 class="title-top">Berita Terbaru</h2>

            <!-- INFORMASI TERBARU -->
            <div class="middle-panel">
                <div class="bottom-middle-panel">
                    <ul>
						<?php 
						$qberita="select *,(select kategori from tbl_kategori where id=tbl_berita.berita_kategori limit 1) as kat,(select nama from tbl_user where username=tbl_berita.berita_username) as nama from tbl_berita order by berita_id desc limit 100";
						$rberita=mysqli_query($konek,$qberita);
						while ($berita=mysqli_fetch_row($rberita)){
						$id=$berita[0];	
						?>
                        <li>
                            <div class="date"><?php echo konversi_tanggal("D, d-m-Y",$berita[6]).'/ '.$berita[13];?></div>
							<div class="title"><a href="detail_artikel?action=detail&id=<?php echo md5($berita[0]);?>"><?php echo $berita[1];?></a></div>
                            <div class="text">
							<img src="<?php echo 'include/berita.php?id='.$id ;?>" width="150px" height="90px"><br>	
							<p><?php echo html_entity_decode($berita[3]).'...<label><i><a href="detail_artikel?action=detail&id='.md5($id).'">Baca selanjutnya...</i></a></label>';?></p></div>
							 <div class="link">
								<label class="btn btn-success btn-xs" href="#artikel">Dibaca <?php echo $berita[9];?> Kali</label>
								<label class="btn btn-warning btn-xs" href="#artikel">Penulis : <?php echo $berita[14];?></label>
							 </div>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>        </div>
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
	<?php include_once('footer.php');?>
</div>
<!-- END OF MAIN WEBSITE -->


</body>
</html>