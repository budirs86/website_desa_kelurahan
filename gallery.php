<div class="right-panel">
                <div class="top-right-panel">Gallery</div>
                <div class="bottom-right-panel">

                    <table class="table" style="margin-bottom: 0;">
                        <tbody>
                        	<?php
					$qdetail="select * from tbl_galeri order by id desc limit 1";
					$rdetail=mysqli_query($konek,$qdetail);
					while ($row_detail=mysqli_fetch_array($rdetail)){
					$id=md5($row_detail['id']);
					?>
						<tr>
                            <td style="border-top:0;"><a href="gallery_all.php"><img class="img-polaroid"  src="<?php echo 'include/gallery.php?id='.$id ;?>" width="100%" height="100px"></a></td>
							
						</tr>
					<?php }?>	
                        </tbody>
                    </table>
                </div>
            </div>