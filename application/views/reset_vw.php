<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->view('_header');
$this->view('_menu');
?>

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
      </ol>
    </section>

    

    <!-- Main content -->

    <section class="reset">
      <div class="col-md-3">
        <div class="form-group">
          <label>Password Lama</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-lock"></i>
            </div>
            <input type="password" class="form-control pull-right" id="oldPassword">
          </div>
          <!-- /.input group -->
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="form-group">
          <label>Password Baru</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" class="form-control pull-right" id="newPassword">
          </div>
          <!-- /.input group -->
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label>Ulangi Password Baru</label>

          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-key"></i>
            </div>
            <input type="password" class="form-control pull-right" id="repeatPassword">
            <span class="input-group-addon btn btn-primary" onclick="reset()"> RESET</span>
          </div>
          <!-- /.input group -->
        </div>
      </div>

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

  <?php $this->view('_footer');?>
  </div>
  <!-- /.content-wrapper -->
  <script src="<?php echo base_url() ?>/assets/js/reset.js?v=<?php echo time()?> "></script>
  <?php
    $this->load->view('_end');
  ?>
 
