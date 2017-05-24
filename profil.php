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
	    <?php
		if (isset($_GET['jenis'])){
			$jenis_dok=anti_injection($_GET['jenis']);	
		}else{
			$jenis_dok='sejarah';
		}	
			$qcontent="select * from tbl_statis where jenis='$jenis_dok' limit 1";
			$rcontent=mysqli_query($konek,$qcontent);
			$row_content=mysqli_fetch_array($rcontent);
			
			// memecah string input berdasarkan karakter '\r\n\r\n'
					$pecah = explode("\r\n\r\n", $row_content['content']);

					// string kosong inisialisasi
					$text = "";

					// untuk setiap substring hasil pecahan, sisipkan <p> di awal dan </p> di akhir
					// lalu menggabungnya menjadi satu string utuh $text
					for ($i=0; $i<=count($pecah)-1; $i++)
					{
					   $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
					   $text .= $part;
					}

				
					
			
			
			if ($row_content['jenis']=='sejarah'){
				echo '
					 <h2 class="title-top">SEJARAH</h2>
					<div>
					   <p>'.html_entity_decode($text).'
					   </p>
					</div> 
					';
			}
			if ($row_content['jenis']=='letak'){
				echo '
					 <h2 class="title-top">LETAK GEOGRAFIS</h2>
					<div>
					   <p>'.html_entity_decode($text).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='wilayah'){
				echo '
					 <h2 class="title-top">WILAYAH</h2>
					<div>
					   <p>'.html_entity_decode($text).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='kondisi'){
				echo '
					 <h2 class="title-top">KONDISI ALAM</h2>
					<div>
					   <p>'.html_entity_decode($text).'
					   </p>
					</div> 
					';
			}
				if ($row_content['jenis']=='peta'){
				echo '
					 <h2 class="title-top">PETA</h2>
					<div>
					   <p>'.html_entity_decode($text).'
					   </p>
					</div> 
					';
			}
		
		?>
		

                  
				
		</div>
        <!-- END OF LEFT CONTENT WEBSITE -->

        <!-- RIGHT CONTENT WEBSITE BEGIN -->
        <div id="right-content">
		
           <?php include_once('profil_menu.php');?>

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