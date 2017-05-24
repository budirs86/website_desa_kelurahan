	<div class="right-panel">
                <div class="top-right-panel">Artikel Terbaru</div>
                <div class="bottom-right-panel">
                    <ul>
					<?php 
					$qbaru="select * from tbl_berita order by berita_id desc limit 5";
					$rbaru=mysqli_query($konek,$qbaru);
					while ($baru=mysqli_fetch_row($rbaru)){
					?>
                        <li><a href="detail_artikel?action=detail&&id=<?php echo md5($baru[0]);?>"><?php echo $baru[1];?></a></li>
                    <?php }?>
					</ul>
					
                </div>
            </div>