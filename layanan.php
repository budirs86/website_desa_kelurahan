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

    <!-- CONTENT WEBSITE BEGIN -->
    <div id="content">

        <!-- LEFT CONTENT WEBSITE BEGIN -->
        <div id="left-content">
	 
		 <h2 class="title-top">Daftar Layanan Warga</h2>

            <table class="table table-stripped paging-table">

                <thead>
                <tr>
					<th>No</th>
					<th>Nama Layanan</th>
                    <th>Jam Layanan</th>
					<th>Online</th>
					<th>Link Akses</th>
                  
                </tr>
                </thead>

                <tbody>
				   <?php
					if (isset($_GET['jenis'])){
						$jenis_dok=anti_injection($_GET['jenis']);	
					}else{
						$jenis_dok='kelamin';
					}	
						$qcontent="select * from tbl_layanan";
						$rcontent=mysqli_query($konek,$qcontent);
						$no=1;
						while ($row_content=mysqli_fetch_array($rcontent)){
					?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $row_content['nama_layanan'];?></td>
							<td><?php echo $row_content['jam_layanan'];?></td>
							<td><?php echo $row_content['online'];?></td>
							<td><a href="<?php echo $row_content['link'];?>" target="_blank"><label class="btn btn-xs btn-warning">Kunjungi</a></td>
						</tr>
                <?php $no++;}?>
                </tbody>

            </table>       

                  
				
		</div>
        <!-- END OF LEFT CONTENT WEBSITE -->

        <!-- RIGHT CONTENT WEBSITE BEGIN -->
        <div id="right-content">
		


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