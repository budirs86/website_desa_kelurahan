 <div id="footer">
        <div class="content-footer">
            <div class="left-footer"></div>
            <div class="middle-footer">
			<?php 
			$qfoot="select * from tbl_config limit 1";
			$rfoot=mysqli_query($konek,$qfoot);
			$rowfoot=mysqli_fetch_array($rfoot);
			?>
				<?php 
				echo $rowfoot['name'].'<br>';
				echo $rowfoot['alamat'].'<br>';
				echo $rowfoot['tlp'].'<br>';
				?>
				&copy; Copyright by <?php echo $rowfoot['name'];?>. All right reserved. Supported by <a href="http://kominfo.go.id" target="_blank">Kemenkominfo RI</a>.
            </div>
            <div class="right-footer"></div>
        </div>
        <div class="clear"></div>
    </div>