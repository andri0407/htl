<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_theme=base_url().'assets/sip_theme/';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Golden Eleven Hotel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $base_theme ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_theme ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $base_theme ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_theme ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $base_theme ?>plugins/iCheck/square/blue.css">
  <link rel="icon" href="<?php echo base_url()?>/assets/images/favicon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>o
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
<!--   <link rel="stylesheet" href="<?php echo base_url()?>assets/css/google.css">
 -->  <style>
    .login-page{
      background: url("assets/images/golden.jpg") center no-repeat;
    }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" style="margin-bottom: 200px">
    <br>
   <!--  <img src="<?php echo base_url(); ?>/assets/images/logo_s.png"><br><b>GOLDEN ELEVEN HOTEL</b> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <form id="formLogin">
      <div class="form-group has-feedback">
        <input id='username' type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
    </form>
      <div class="row">
        <div class="col-xs-4">
        </div>
        <div class="col-xs-4">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="act_login" onclick="general_sendFormData('login','checkLogin','formLogin',loginSuccess)" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>

        <div class="col-xs-12" id="loginInfo">
        </div>
        <!-- /.col -->
      </div>
    <hr>
    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/js/jquery/jquery.min.js"></script>
<script src="assets/js/general.js?v=<?php echo time()?>"></script>
<script src="assets/js/login.js?v=<?php echo time()?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $base_theme ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/loadingOverlay.js"></script>

</body>
</html>
