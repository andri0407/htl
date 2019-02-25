            <style type="text/css">
            	.form-group{
            		margin-bottom: 5px;
            	}

            	.form-control{
            		height: inherit;
            	}

            	#myRooms{
            		font-size: 12px;
            	}

          	 	#myRooms input, #myRooms select, #myRooms textarea{
          	 		font-size: 12px;
          	 		padding : 2px 2px;
          	 	}

            </style>


            <div class="panel panel-default panel-accent-gold">
                <div class="panel-body">
                        <form role="form" style="font-weight: bold;" id='formGuest'>
                          <input type='hidden' value="<?php echo $transaksi[0]['id_tamu']?>" id="id_tamu">
                          <input type='hidden' value="<?php echo $transaksi[0]['notransaksi']?>" id="notransaksi">
                          <div class="box-body">

                          	<div class="form-group">
                              <label">Tanggal Check In</label>
                              <div class="input-group pull-right">
                                <input  id="check_in"  type="hidden" value="<?php echo $transaksi[0]['check_in']?>" />
                                <?php echo date("d M Y H:i:s",strtotime($transaksi[0]['check_in']));?>
                              </div>
                            </div>

                             <?php echo $form_profil?>

			                <div class="form-group row">
			                  <label  class="col-sm-4 control-label">Kendaraan</label>

			                  	<div class="col-sm-8">
				                  <div class="input-group">
				                  	<?php 
				                  	$kendaraan  = array(1=>"Mobil",2=>"Sepeda Motor");
				                  	$i_kendaraan= array(1=>"fa-car", 2=>"fa-motorcycle");
				                  	foreach($kendaraan as $i=>$kdr){
				                  		$checked="";
				                  		if($i == trim($transaksi[0]['kendaraan'])){$checked="checked";}
	                               		echo '<input type="radio" name="kendaraan" '.$checked.'  value="1" class="col-sm-1"><i class="fa '.$i_kendaraan[$i].' col-sm-3"></i>';
				                  	}
				                  	?>
	                                 <input type="radio" name="kendaraan" value="3" class="col-sm-1"><span class="col-sm-3">Lainnya</span>
	                                <input placeholder="Plat Kendaraan" type="text" class="form-control pull-right" id="noKendaraan" value="<?php echo $transaksi[0]['no_kendaraan']?>">
	                              </div>
			                  	</div>
			                </div>

			                <div class="form-group row">
			                  <label  class="col-sm-4 control-label">Keterangan </label>

			                  	<div class="col-sm-8">
				                  <div class="input-group">
	                                <textarea class="form-control pull-right" id="keterangan" value="<?php echo $transaksi[0]['keterangan']?>"><?php echo $transaksi[0]['keterangan']?></textarea>
	                              </div>
			                  	</div>
			                </div>

			                <div class="form-group row">
			                  	<div class="col-sm-12" style="font-weight: normal;">
			                  	 <table class="table table-bordered" id="myRooms">
					                <thead>
						                <tr>
						                  <th style="width:90px">Kamar</th>
						                  <th style="width:50px">Jml. Orang</th>
						                  <th style="width:50px">Jml. Hari</th>
						                  <th style="width:130px">Jenis Tarif</th>
						                  <th style="width:250px">Check Out</th>
						                  <th style="width:100px">Tarif</th>
						                  <th style="width:50px"><span class="btn btn-success" onclick="addRoom()"><i class="fa fa-plus-square"></i></span></th>
						                </tr>
						            </thead>

						            <tbody>

						                <?php
						                	
						                	


						                	foreach($transaksi as $trx){
						                    	$bts_check_out = date("d-m-Y / H:i:s",strtotime($transaksi[0]["bts_check_out"]));

						                    	$jnsTarif = array("d"=>"1 day","h"=>"day rate");
							                	foreach($jnsTarif as $v=>$j){
							                		$selected="";
							                		if($v==$trx['jenis_tarif']){$selected="selected";}
							                		$optionJnsTarif .="<option ".$selected." value='".$v."' >".$j."</option>";
							                	}

							                	foreach($dataKamar as $d=>$kmr){
							                		$selected="";
							                		if($kmr['id_kamar']==$trx['id_kamar']){
							                			$selected="selected";
							                		}

							                		$optionKamar.= "<option value='".$kmr['id_kamar']."' ".$selected.">".$kmr['kamar']."</option>";
							                	}


						                		echo '<tr style="text-align:center">
										                  <td>
										                  		<select class="form-control pull-right  arrayInput" name="id_kamar">
										                       		'.$optionKamar.'
										                       	</select>
										                  </td>

										                  <td>
										                       <input type="text" class="form-control pull-right arrayInput" name="jlh_org" value="'.$trx['jlh_org'].'">
										                  </td>

										                  <td> <input type="text" class="form-control pull-right  arrayInput" name="jlh_hari" value="'.$trx['jlh_hari'].'">
										                  </td>

										                  
										                  <td>
										                       <select class="form-control pull-right arrayInput" name="jns_tarif" onchange="getPrice(this)">
										                       		'.$optionJnsTarif.'
										                       </select>
										                  </td>

										                   <td> <input type="text" disabled class="form-control pull-right  arrayInput" name="bts_check_out" value="'.$bts_check_out.'">
										                  </td>

										                  <td>
										                  		<input type="text" disabled class="form-control pull-right  arrayInput" name="tarif" value="'.$trx["tarif"].'">
										                  </td>
										                  <td>
										                  	<span class="btn btn-danger" onclick="deleteRoom(this)"><i class="fa fa-minus-square"></i></span>
										                  </td>
										                </tr>';
						                	}
						                ?>
						                   
					              	</tbody>
					              </table>
			                  	</div>
			                </div>

			           </div>

                            



                          </div>
                          <!-- /.box-body -->

                          <div class="box-footer">
                          	<?php 
                          		if($action=="add"){
                          			echo '<a href="javascript:void(0)" class="btn btn-primary pull-right" onclick="checkIn()">Check In</a>';
                          		}else{
                          		   echo '<a href="javascript:void(0)" class="btn btn-primary pull-right" onclick="checkOut(this)" value="'.$transaksi[0]['notransaksi'].'">Check Out</a>';
                          		   echo '<a href="javascript:void(0)" class="btn btn-success pull-left" onclick="edit(this)" value="'.$transaksi[0]['notransaksi'].'">Edit</a>';
                                   echo '<a href="javascript:void(0)" class="btn btn-danger pull-left" onclick="batal(this)" value="'.$transaksi[0]['notransaksi'].'">Batal</a>';
                          		}
                          	?>
                          </div>
                        </form>
                </div>
               
            </div>