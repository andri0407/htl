<div class="panel panel-default panel-accent-blue">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="pull-right">
                          <div class="input-group input-group-sm" style="width: 250px; margin-top:-5px">
                               <input type="text" name="table_search" class="form-control pull-right" id="searchInput" placeholder="Pencarian...">
                                <div class="input-group-btn">
                                  <button class="btn btn-default btn-sm" onclick="load_search()"><i class="fa fa-search"></i></button>
                                </div>
                          </div>
                        </div>
                        <i class="fa fa-users"></i>&nbsp;TAMU
                   </h3>
                </div>
                <div class="panel-body" style="font-size: 11px">
                    	
                        <table class="table table-hover table-bordered">
                          <thead  style="text-align:center; font-weight: bold;">
                            <tr>
                              <td>Kamar</th>
                              <td>Nama</th>
                              <td>Jumlah Org</th>
                              <td>Check-in</th>
                              <td>Check-out</th>
                              <td>Batas Check-out</th>
                              <td>Durasi</th>
                              <td>Jenis</th>
                              <td>Tarif</th>
                              <td>Biaya</th>
                              <td>Catatan</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          		$label[0]='label-success';
                          		$label[1]='label-primary';
                          		$label[2]='label-warning';
                          		$label[3]='label-default';

                              foreach($transaksi as $t){
                                $trx[$t['id_kamar']]=$t;
                              }

                              foreach($kamar as $k){
                                echo '<tr class="clickable" onclick="showForm(this)" value="'.$k['id_kamar'].'" style="text-align:center">
                                    <td class="kamar">'.$k['kamar'].'</td>
                                    <td align="left">'.$trx[$k['id_kamar']]['nama'].'</td>
                                    <td>'.$trx[$k['id_kamar']]['jlh_org'].'</td>
                                    <td>'.$trx[$k['id_kamar']]['check_in'].'</td>
                                    <td>'.$trx[$k['id_kamar']]['check_out'].'</td>
                                    <td>'.$trx[$k['id_kamar']]['bts_check_out'].'</td>
                                    <td id=durasi_"'.$k['id_kamar'].'"></td>
                                    <td></td>
                                    <td><span class="label '.$label[$p['status']].'">'.$status[$p['status']].'</span></td>
                                  </tr>';
                              }
                              
                          		/*foreach($tamu as $p){
                                $editable='';
                                if($p['status']<3){//belum bayar
                                  $editable='class="clickable" onclick="showFormEdit(\''.$p['notransaksi'].'\')"';
                                }else{
                                  $editable='class="clickable" onclick="showDetail(\''.$p['notransaksi'].'\')"';
                                }
                          			echo '<tr '.$editable.' >
				                            <td>'.$p['nokamar'].'</td>
				                            <td>'.$p['nama'].'</td>
				                            <td>'.convertTgl($p['tgl_in']).'</td>
				                            <td>'.$p['dokter'].'</td>
				                            <td><span class="label '.$label[$p['status']].'">'.$status[$p['status']].'</span></td>
				                          </tr>';
                          		}*/
                          ?>
                          
                        </tbody></table>
                </div>
                <div class="panel-footer clearfix">
                 
                	<div class="pull-right">
                    <a href="#" class="btn btn-default bg-color-gold btn-xs">
                        <i class="fa fa-list-alt"></i> Total Data : <?php echo $totalRow?>
                    </a>
                		<?php 
		                  $category='all';
		                  //echo ($start).'-'.$end.' (total : '.$totalRow.')';
		                  echo ' [ Halaman : '.$page.' ]';
		                ?>
		                <div class="btn-group">
		                  <?php if($page>1){?>
		                      <button type="button" class="btn btn-default btn-sm" onclick="load_page(<?php echo $category.','.($page-1);?>)"><i class="fa fa-chevron-left"></i></button>
		                  <?php } ?>

		                  <?php if($end<$totalRow){?>
		                     <button type="button" class="btn btn-default btn-sm" onclick="load_page(<?php echo $category.','.($page+1);?>)"><i class="fa fa-chevron-right"></i></button>
		                  <?php } ?>
		            </div>
                </div>
            </div>  

           