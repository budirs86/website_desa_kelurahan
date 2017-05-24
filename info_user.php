<div class="right-panel">
                <div class="top-right-panel">Info User</div>
                <div class="bottom-right-panel">

                    <table class="table" style="margin-bottom: 0;">
                        <tbody>
                        <tr>
                            <td style="border-top:0;">IP User</td>
                            <td style="border-top:0;">:</td>
                            <td style="border-top:0;">
                                <b>
                                    <?php 
									$ip = getenv("REMOTE_ADDR") ;
									echo $ip;
									?>                               </b>

                            </td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>
                                <b>
                                    <?php echo date("H:i:s");?>                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>
                                <b>
									
                                    <?php $tgl=date("Y-m-d");
											echo konversi_tanggal("D, d-m-Y",$tgl);?>                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Browser</td>
                            <td>:</td>
                            <td>
                                <b>
                                      <?php
									echo $_SERVER['HTTP_USER_AGENT']
									?> </b>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>