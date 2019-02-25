<div class="form-group row">
  <label  class="col-sm-4 control-label">Nama Lengkap</label>

  	<div class="col-sm-8">
      <div class="input-group">
        <input type="text" class="form-control pull-right" id="nama" value="<?php echo $transaksi[0]['nama']?>">
        <div class="input-group-addon btn btn-primary" onclick="showFormSearch()">
          <i class="fa fa-user"></i>
        </div>
      </div>
  	</div>
</div>


<div class="form-group row">
  <label  class="col-sm-4 control-label">No. Identitas</label>

  	<div class="col-sm-8">
      <div class="input-group">
        <input type="text" class="form-control pull-right" id="noId" value="<?php echo $transaksi[0]['noId']?>">
        <div class="input-group-addon">
          <i class="fa fa-credit-card"></i>
        </div>
      </div>
  	</div>
</div>



<div class="form-group row">
  <label  class="col-sm-4 control-label">Umur</label>

  	<div class="col-sm-2">
      <div class="input-group">
        <input type="text" class="form-control pull-right" id="umur" value="<?php echo $transaksi[0]['umur']?>">
      </div>
  	</div>
</div>

<div class="form-group row">
  <label  class="col-sm-4 control-label">Telp / HP</label>

  	<div class="col-sm-8">
      <div class="input-group">
        <input type="text" class="form-control pull-right" id="hp" value="<?php echo $transaksi[0]['hp']?>">
        <div class="input-group-addon">
          <i class="fa fa-phone"></i>
        </div>
      </div>
  	</div>
</div>

 <div class="form-group row">
  <label  class="col-sm-4 control-label">Jenis Kelamin</label>

  	<div class="col-sm-8">
      <div class="input-group">
        <select class="form-control" id="kelamin">
        	<?php
        		$kelamin=array("L"=>"Laki-Laki","P"=>"Perempuan");
        		foreach($kelamin as $k => $v){
        			$selected="";
        			if($transaksi[0]['kelamin']==$k)$selected="selected";
          			echo '<option '.$selected.' value="'.$k.'">'.$v.'</option>';
        		}
        	?>
        </select>
        <div class="input-group-addon">
          <i class="fa fa-transgender"></i>
        </div>
      </div>
  	</div>
</div>


<div class="form-group row">
  <label  class="col-sm-4 control-label">Alamat </label>

  	<div class="col-sm-8">
      <div class="input-group">
        <textarea class="form-control pull-right" id="alamat" value="<?php echo $transaksi[0]['alamat']?>">
        	<?php echo $transaksi[0]['alamat']?>
        </textarea>
      </div>
  	</div>
</div>

<div class="form-group row">
  <label  class="col-sm-4 control-label">Perusahaan</label>

  	<div class="col-sm-8">
      <div class="input-group">
        <input type="text" class="form-control pull-right" id="perusahaan" value="<?php echo $transaksi[0]['perusahaan']?>">
        <div class="input-group-addon">
          <i class="fa fa-building"></i>
        </div>
      </div>
  	</div>
</div>