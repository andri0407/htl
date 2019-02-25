<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->view('_header');
$this->view('_menu');
?>
<link rel="stylesheet" href="<?php echo base_theme ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title?>
        <small><?php echo $info?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $breadcrumb ?></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section id="content" class="content">
       <?php echo $content ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->view('_footer');?>
  <script src="<?php echo base_url() ?>assets/js/dashboard.js?v=<?php echo time()?>"></script>


 
