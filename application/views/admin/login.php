<!DOCTYPE html>
<html> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/template/dist/img/logo21.png" >
  <title>Aplicacion</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
 

  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">

  
  <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
           
            <img src="<?php echo base_url()?>assets/template/dist/img/logo21.png" >
        </div>
        
        <div class="login-box-body">
            <p class="login-box-msg">Introduzca sus datos Para ingresar</p>
            <?php if($this->session->flashdata("error")):?>
              <div class="alert alert-danger">
                <p><?php echo $this->session->flashdata("error")?></p>
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url();?>auth/login" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Usuario" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                    
                </div>
            </form>

        </div>
        
    </div>
   


<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>

<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
