 <!-- encabezado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/template/dist/img/logo21.png" >
    <title>Atlantica Agricola</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/Ionicons/css/ionicons.min.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables-export/css/buttons.dataTables.min.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">    
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   
    
    <style>
     .count {
  color: white;
  background-color: red;
     }
 </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
   
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
       
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">menu de navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                    <li class="dropdown">
                        
                        <a id="notifi" href="#" class="dropdown-toggle sample" data-toggle="dropdown">
                            <span class="label label-pill  count" style="border-radius:10px;">
                                
                            </span> 
                            <span class="glyphicon glyphicon-bell" style="font-size:18px;">
                                
                            </span></a>

                        <ul id="notifi2" class="dropdown-menu" ></ul>

                        </li>
                        <li class="dropdown user user-menu">
                            <a  href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/template/dist/img/user.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata("nombre")?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a class="dropdown-item"3 href="<?php echo base_url(); ?>auth/logout"> Cerrar Sesión</a>
                                        </div>
                                    </div>
                                
                                </li>
                            </ul>
                        </li>
                  </ul>
                </div>
            </nav>
        </header>
        

        <script>
 
$(document).ready(function(){
 
 //updating the view with notifications using ajax



function load_unseen_notification(view = '')
 
{

 $.ajax({
 
  url:"<?php echo base_url();?>Notificaciones/notificaciones",
  method:"POST",
  data:{"view":view},
  dataType:"json",
  success:function(data)
 
  {
     
   $('#notifi2').html(data.notification);
   $('.count').show();
   if(data.unseen_notification > 0)
   {
       
    $('.count').html(data.unseen_notification);
   }  else if(data.unseen_notification == ''){

       $('.count').hide();

   }
 
  }
 
 });
 
}
 
load_unseen_notification();
 
$(document).on('click', '#notifi', function(){
 
 $('.count').html('');
 
 load_unseen_notification('yes');
 
});


setInterval(function(){
 
 load_unseen_notification();;

 
}, 5000);
 
});

</script>


