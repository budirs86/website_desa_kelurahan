   <?php 
include_once('include/fungsi.php');
include_once('include/config.php');

?>
   <div id="slider-website">

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php 
					//$qslide="select * from tbl_berita where slide='Y' order by berita_id desc limit 3";
					//$rslide=mysqli_query($konek,$qslide);
					//$no=0;
					//while ($slide=mysqli_fetch_array($rslide)){ 
					//$id_berita=$slide['berita_id'];
					 
					?><?php //if ($no==0){ echo 'item active';}else{ echo 'item';}?>
					<div class="item active">
						<img src="include/slide.php?urut=0" height="100%" width="100%">
                    </div>
					<div class="item">
						<img src="include/slide.php?urut=1" height="100%" width="100%">
                    </div>
					<div class="item">
						<img src="include/slide.php?urut=2" height="100%" width="100%">
                    </div>
					<?php 
					//$no++;
					//}?>
             
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>