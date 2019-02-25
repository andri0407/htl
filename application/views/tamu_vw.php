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
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
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

