<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->view('_header');
$this->view('_menu');

?>
<link rel="stylesheet" href="<?php echo base_theme ?>bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_theme ?>bower_components/select2/dist/css/select2.min.css">
<style>
  .checkUpForm{
    display: none;
  }

  .icon .ion{
    font-size: 50px;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag small"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      
      <div class="row">
          <!-- <div class="col-sm-6" id="wrapper-formTamu">
              <?php echo $formTamu;?>                                                                                           
          </div> -->
          <div class="col-sm-12" id="wrapper-listTamu">
              <?php echo $listTamu;?>                                                                                                 
          </div>         
      </div>

      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->view('_footer');?>
<!--   <script src="<?php echo base_theme ?>bower_components/select2/dist/js/select2.full.min.js"></script>
 -->  <script src="<?php echo base_url() ?>assets/js/tamu.js?v=<?php echo time()?>"></script>

