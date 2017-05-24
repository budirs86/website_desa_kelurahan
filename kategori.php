        <!-- KATEGORI ARTIKEL -->
            <div class="right-panel">
                <div class="top-right-panel">Kategori Artikel</div>
                <div class="bottom-right-panel">
                    <ul>
					<?php 
					$qkategori="select *,(select count(*) from tbl_berita where berita_kategori=tbl_kategori.id) as  kat from tbl_kategori where statis='N' order by kat desc";
					$rkategori=mysqli_query($konek,$qkategori);
					while ($row_kategori=mysqli_fetch_array($rkategori)){
						echo '<li>
                            <a href="detail_kategori?action=detail&id='.md5($row_kategori[0]).'">
                                '.$row_kategori[1].' ('.$row_kategori[4].')
                            </a>
                        </li>';
					}
					?>
                  
                    </ul>
                </div>
            </div>