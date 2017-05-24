  <!-- HEADER WEBSITE BEGIN -->
  <?php 
		$qsoc="select * from tbl_config limit 1";
		$rsoc=mysqli_query($konek,$qsoc);
		$rowsoc=mysqli_fetch_array($rsoc);
		?>
    <div id="header">
        <!-- LOGO WEBSITE -->
        <div id="logo">
            <h1><?php echo $rowsoc['name'];?></h1>
            <h2><?php echo $rowsoc['tagline'];?></h2>
        </div>

        <!-- SOCIAL MEDIA -->
		
        <div class="social">
            <ul>
                <li><a href="<?php echo $rowsoc[11]; ?>"><img src="resources/images/Facebook.png" alt="facebook"></a></li>
                <li><a href="<?php echo $rowsoc[12]; ?>"><img src="resources/images/instagram.png" alt="twitter"></a></li>
				
            </ul>
        </div>

        <div class="clear"></div>
    </div>
    <!-- END OF HEADER WEBSITE -->

    <!-- TOP MENU WEBSITE BEGIN -->
	<?php include_once('top_nav.php');?>
    <!-- END OF TOP MENU WEBSITE -->