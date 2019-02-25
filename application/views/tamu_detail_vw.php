            <div class="panel panel-default panel-accent-gold">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-user-md"></i>&nbsp;Tamu
                        <div class="pull-right">
                          <a href="#" class="btn btn-default bg-color-gold btn-xs">
                            <?php echo $tamu['notransaksi']?>
                          </a>
                        </div>
                    </h3>
                </div>
                <div class="panel-body">
                        <form role="form" style="font-weight: bold;" id='formTamu'>
                          <input type='hidden' value="<?php echo $tamu['notransaksi']?>" id="noTransaksi">
                          <div class="box-body">
                            	<table width="400">
                            		<tr>
                            			<td>No. Transaksi<td>:<td colspan=3><?php echo $tamu['notransaksi']?>
                            		</tr>
                            		<tr>
                            			<td>No. Kamar<td>:<td colspan=3><?php echo $tamu['nokamar']?>
                            		</tr>
                            		<tr>
                            			<td>Nama<td>:<td colspan=3><?php echo $tamu['nama']?>
                            		</tr>
                            		<tr>
                            			<td>Tanggal Lahir<td>:<td colspan=3><?php echo convertTgl($tamu['tgl_lahir'])?>
                            		</tr>
                            		<tr>
                            			<td>Jenis Kelamin<td>:<td colspan=3><?php echo ($tamu['kelamin']=="L")?"Laki-Laki":"Perempuan"?>
                            		</tr>
                                    <tr>
                                        <td>No. HP<td>:<td colspan=3><?php echo $tamu['hp']?>
                                    </tr>
                            		<tr>
                            			<td>Dokter<td>:<td colspan=3><?php echo $tamu['dokter']?>
                            		</tr>
                            		
                            		<tr>
                            			<td>Keluhan<td>:<td colspan=3><?php echo $tamu['keluhan']?>
                            		</tr>
                            		<tr>
                            			<td>Diagnosa<td>:<td colspan=3><?php echo $tamu['diagnosa']?>
                            		</tr>
                            		<tr>
                            			<td>Tindakan<td>:<td colspan=3><?php echo $tamu['tindakan']?>
                            		</tr>
                            		<tr style="vertical-align: top">
                            			<td rowspan="<?php echo count($trxObat)+1?>">Obat<td rowspan="<?php echo count($trxObat)+1?>">:<td>
                            		</tr>
                            		<?php
                            		$totalObat=0;
                            		foreach($trxObat as $o){
                            			echo "<tr>";
                            				echo "
                            				<td>".$o['nm_obat']."<td align='center'>[".$o['jumlah']."]<td>".showRupiah($o['harga']*$o['jumlah'])."<td>";
                            			echo "</tr>";
                            			$totalObat+=$o['harga']*$o['jumlah'];
                            		}
                            		?>
                            		
                            		<tr>
                            			<td colspan="5" style="background: black; height: 2px">
                            		</tr>
                            		<tr>
                            			<td>Biaya Obat<td>:<td colspan=3><?php echo showRupiah($totalObat)?>
                            		</tr>
                            		<tr>
                            			<td>Biaya Checkup<td>:<td colspan=3><?php echo showRupiah($tamu['biaya_checkup'])?>
                            		</tr>
                            		
                            		<tr>
                            			<td>Ppn<td>:<td colspan=3><?php echo showRupiah($tamu['biaya_ppn'])?>
                            		</tr>
                            		<tr>
                            			<td colspan="5" style="background: black; height: 2px">
                            		</tr>
                            		<tr>
                            			<td>Total<td>:<td colspan=3><?php echo showRupiah($tamu['biaya_checkup']+$totalObat+$tamu['biaya_ppn'])?>
                            		</tr>
                                    <tr>
                                        <td>Jenis Pembayaran<td>:<td colspan=3><?php echo $tamu['jenis_bayar']."<br>".$tamu['no_jenis_bayar']?>
                                    </tr>
                            		
                            	</table>



                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                          	<?php 
                          			echo '<a href="javascript:void(0)" class="btn btn-primary" onclick="revisiTamu()">Revisi</a>
                          			<a href="javascript:void(0)" class="btn btn-default" onclick="showForm()">Close</a>';
                          	?>
                          </div>
                        </form>
                </div>
                <div class="panel-footer">
                  
                </div>
            </div>
            <script>
            		$("#formTamu").data("tamu",<?php echo json_encode($tamu)?>);
            </script>