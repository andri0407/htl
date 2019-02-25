<style>
  .roomBox .icon{
    font-size: 50px;
    top: 8px;
  }   

  .roomBox:hover .icon{
    font-size: 60px;
  }
</style>

<div class="row">          
<?php
    foreach($kamar as $k){
         switch($k['status_kamar']){
          case 1:
          $bg="red";
          $nama = $transaksi[$k['id_kamar']]['nama'];
          $nama = (strlen($nama) > 13) ? substr($nama,0,13).'...' : $nama;
          $status  = $nama;
          $jlh_org = '<small class="label pull-right bg-red">'.$transaksi[$k['id_kamar']]['jlh_org']." Org".'</small>';
          $label   = date("d M Y | H:i:s",strtotime($transaksi[$k['id_kamar']]['check_in']));
          //$action  = " onclick='showFormEdit(this)' value='".$transaksi[$k['id_kamar']]['id_tamu']."/". $transaksi[$k['id_kamar']]['check_in']."'";
          $action  = " onclick='showFormEdit(this)' value='".$transaksi[$k['id_kamar']]['notransaksi']."'";
          $icon="fa fa-fw fa-bed";
          break;

          case 2:
          $bg="yellow";
          $status="Cleaning";
          $action = "";
          $jlh_org = "";
          $label  = '<i class="fa fa-history"></i>';
          $icon="fa fa-fw fa-recycle";
          break;
          
          default:
          $bg="green";
          $status="Ready";
          $label  = '<i class="fa fa-check"></i>';
          $action = "onclick='showForm(this)' value='".$k['id_kamar']."'";
          $jlh_org = "";
          $icon="fa fa-fw fa-user-plus";
        }

      ?>
        <div class="col-lg-2 col-xs-6 roomBox clickable"  <?php echo $action;?>>
          <!-- small box -->
          <div class="small-box bg-<?php echo $bg;?>">
            <?php echo $jlh_org?>
            <div class="inner">
              <h4><b style="font-size: 20px" class="kamar"><?php echo $k['kamar']?></b></h4>
              <p class="status"><?php echo $status?></p>
            </div>
            <div class="icon">
              <i class="<?php echo $icon ?>"></i>
            </div>
            <a href="#" class="small-box-footer" style="font-size:12px">
               <?php echo $label ?>
            </a>
          </div>
        </div>

    <?php } ?>
</div>
<!--end row -->
 <center>
    <img style="opacity:0.1; height: 300px" src="<?php echo base_url()?>/assets/images/logo.png" />
</center>