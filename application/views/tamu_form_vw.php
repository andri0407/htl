            <?php
            	if(!isset($tamu)){
            		$tamu=array("notransaksi"=>"",
            					  "nokamar"=>"",
            					  "nama"=>"",
            					  "tglLahir"=>"",
            					  "blnLahir"=>"",
            					  "thnLahir"=>"1990",
            					  "kelamin"=>"",
                        "hp"=>"",
            					  "dokter"=>"",
            					  "keluhan"=>"",
            					  "diagnosa"=>"",
            					  "tindakan"=>"",
                        "jenis_bayar"=>"",
            					  "no_jenis_bayar"=>"",
            					  "biaya_checkup"=>"",
            					  "obat"=>array()
            					 );
            	}else{
            		$tglLahir=explode("-",$tamu['tgl_lahir']);
            		$tamu  =array_merge($tamu,array('tglLahir'=>$tglLahir[2],
            					                              'blnLahir'=>$tglLahir[1],
            					                              'thnLahir'=>$tglLahir[0]
                                                  )
            					    );

            	}
            ?>
            <div class="panel panel-default panel-accent-gold">
                <div class="panel-body">
                        <form role="form" style="font-weight: bold;" id='formTamu'>
                          <input type='hidden' value="<?php echo $tamu['notransaksi']?>" id="noTransaksi">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama Lengkap</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="nama" value="<?php echo $tamu['nama']?>">
                              </div>
                            </div>

                            <div class="form-group">
                              <label>Tanggal Lahir:</label>

                              <div class="input-group" >
                                <div class="col-xs-1">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <div class="col-xs-3">
                                  <select class="form-control" id="tglLahir">
                                  <?php 
                                  for($i=1;$i<=31;$i++){
                                    $t=sprintf("%02d", $i);
                                    $selected="";
                                    if($tamu['tglLahir']==$t)$selected="selected";
                                    echo '<option '.$selected.' value="'.$t.'">'.$t.'</option>';
                                  }
                                  ?>
                                  </select>
                                </div>
                                <div class="col-xs-4">
                                  <select class="form-control" id="blnLahir">
                                    <?php 
                                      $bulan=namaBulan();
                                      for($i=1;$i<=12;$i++){
                                        $m=sprintf("%02d", $i);
                                        if($tamu['blnLahir']==$m)$selected="selected";
                                        echo '<option '.$selected.' value="'.$m.'">'.$bulan[$m].'</option>';
                                      }
                                      ?>
                                  </select>
                                </div>
                                <div class="col-xs-3">
                                  <input type="number" class="form-control pull-right" id="thnLahir" maxlength="4" placeholder="Thn" value="<?php echo $tamu['thnLahir']?>">
                                </div>
                              </div>
                              <!-- /.input group -->
                            </div>

                            <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-transgender"></i>
                                </div>
                                <select class="form-control" id="kelamin">
                                	<?php
                                		$kelamin=array("L"=>"Laki-Laki","P"=>"Perempuan");
                                		foreach($kelamin as $k => $v){
                                			$selected="";
                                			if($tamu['kelamin']==$k)$selected="selected";
                                  			echo '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
                                		}
                                	?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="exampleInputEmail1">No. HP</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-mobile"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="hp" value="<?php echo $tamu['hp']?>">
                              </div>
                            </div>

                            <div class="form-group  checkUpForm">
                              <label>Dokter</label>
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-user-md"></i>
                                </div>
                                <select class="form-control" id="dokter">
                                	<option></option>
                                  <?php
                                    foreach($dokter as $dok){
                                      $selected="";
                                	  if($tamu['dokter']==$dok['nama'])$selected="selected";
                                      echo "<option ".$selected." value='".$dok['nama']."'>".$dok['nama']."</option>";
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group checkUpForm">
                              <label>Keluhan</label>
                              <textarea class="form-control" rows="3" placeholder="" id="keluhan"><?php echo $tamu['keluhan']?></textarea>
                            </div>

                            <div class="form-group checkUpForm">
                              <label>Diagnosa</label>
                              <input type="text" class="form-control" placeholder="" value="<?php echo $tamu['diagnosa']?>" id="diagnosa">
                            </div>

                            <div class="form-group checkUpForm">
                              <label>Tindakan</label>
                              <textarea class="form-control" rows="3" placeholder="" id="tindakan"><?php echo $tamu['tindakan']?></textarea>
                            </div>

                            <?php
                            if($tamu['notransaksi']!=""){
                              echo '<div class="form-group checkUpForm">
                                        <label>Obat : </label>
                                        <table class="table table-hover table-bordered">';
                              echo '
                                <tr>
                                  <td align=center>Nama Obat
                                  <td align=center>Jumlah
                                  <td align=center>Harga
                                  <td align=center>Total
                                </tr>';
                              foreach($obatOption as $obt){
                                 $dataObat[$obt['id_obat']]=$obt;
                              }

                            	foreach($trxObat as $trx_o){
                                echo '
                                <tr>
                                  <td align=center>'.$dataObat[$trx_o['id_obat']]['nm_obat'].'
                                  <td align=right>'.$trx_o['jumlah'].'
                                  <td align=right>'.showNumber($trx_o['harga']).'
                                  <td align=right>'.showRupiah($trx_o['harga']*$trx_o['jumlah']).'
                                </tr>';
                                
                            		/*echo '<div class="form-group checkUpForm inputObat">
				                              <div class="col-xs-8">
				                              <label>Obat</label>
				                                  <div class="input-group">
				                                      <span class="input-group-addon"><span class="fa fa-medkit"></span></span>
				                                      <input type=hidden value='.json_encode($trx_o).' class="arrayInput" name="tempObat">
				                                      <select class="form-control itemObat arrayInput" name="obat">
				                                         <option></option>';
				                                            foreach($obatOption as $obt){
				                                              $selected='';
				                                              if($obt['id_obat']==$trx_o['id_obat'])$selected='selected';
				                                              echo "<option ".$selected." value='".$obt['id_obat']."'>".$obt['nm_obat']."</option>";
				                                            }

				                    echo '           </select>
				                                  </div>
				                              </div>
				                              <div class="col-xs-3">
				                                  <label>Jumlah</label>
				                                  <div class="input-group">
				                                      <input type="number" class="form-control arrayInput" name="jlhObat" placeholder="0" value="'.$trx_o['jumlah'].'">
				                                  </div>
				                              </div>
				                              <div class="col-xs-1">
				                                  <label></label>
				                                  <a href="javascript:void(0)" onclick="clearInputObat(this)" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i></a>
				                              </div>
				                            </div>';*/
                            	}
                              echo "</table></div>";
                            }
                            	

                            ?>
                            <!-- <div class="form-group checkUpForm lastInputObat inputObat">
                              <div class="col-xs-8">
                              <label>Obat</label>
                                  <div class="input-group">
                                      <span class="input-group-addon"><span class="fa fa-medkit"></span></span>
                                      <select class="form-control itemObat arrayInput" name="obat">
                                         <option></option>
                                         <?php
                                            foreach($obatOption as $obt){
                                              echo "<option value='".$obt['id_obat']."'>".$obt['nm_obat']." [".$obt['satuan']."]</option>";
                                            }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-xs-3">
                                  <label>Jumlah</label>
                                  <div class="input-group">
                                      <input type="number" class="form-control arrayInput" name="jlhObat" placeholder="0">
                                  </div>
                              </div>
                              <div class="col-xs-1">
                                  <label></label>
                                  <a href="javascript:void(0)" onclick="addInputObat(this)" class="btn btn-xs btn-success"><i class="fa fa-plus"></i></a>
                              </div>
                            </div> -->


                            <div class="form-group checkUpForm">
                              <label>Biaya Check Up</label>
                              <div class="input-group">
                                <span class="input-group-addon">Rp.</span>
                                <input type="number" class="form-control" placeholder="" value="<?php echo $tamu['biaya_checkup']?>" id="biayaCheckup">
                              </div>
                            </div>

                            <div class="form-group checkUpForm">
                              <label>Jenis Pembayaran</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                <select class="form-control" id="jenis_bayar" name="jenis_bayar">
                                   <?php                                      
                                        foreach($jenis_bayar as $jns){
                                          $selected="";
                                          if($tamu['jenis_bayar']==$jns){
                                            $selected="selected";
                                          }
                                          echo "<option ".$selected." value='".$jns."'>".$jns."</option>";
                                        }
                                     
                                   // }
                                    ?>
                                  

                                </select>
                                <input type="number" class="form-control" placeholder="" value="<?php echo $tamu['no_jenis_bayar']?>" id="no_jenis_bayar">
                              </div>
                            </div>

                            <div class="form-group">
                              <a href="javascript:void(0)" class="btn btn-link" onclick="showCheckUp()">Check Up</a>
                            </div>



                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                          	<?php 
                          		if($tamu['notransaksi']==""){
                          			echo '<a href="javascript:void(0)" class="btn btn-primary" onclick="saveTamu()">Simpan</a>';
                          		}else{
                          			echo '<a href="javascript:void(0)" class="btn btn-success" onclick="saveTamu()">Ubah</a>';
                                echo '<a href="javascript:void(0)" class="btn btn-danger" onclick="deleteTamu()">Hapus</a>';
                          			echo '<a href="javascript:void(0)" class="btn btn-default pull-right" onclick="showForm()">Close</a>';
                          		}
                          	?>
                          </div>
                        </form>
                </div>
                <div class="panel-footer">
                  
                </div>
            </div>