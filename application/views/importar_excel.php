<!DOCTYPE html>
<html>
<head>
 <title>Importar Archivo Excel</title>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap.min.css" />
 <script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
</head>

<body>
 <div class="container">
  <br />
  <h3 align="center">Seleccione un Archivo</h3>
  <form method="post" id="import_form" enctype="multipart/form-data">
   <p><label>Seleccionar archivo excel</label>
   <input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
   <br />
   <input type="submit" name="import" value="Importar" class="btn btn-info" />
  </form>
  <br />
  <div class="table-responsive" id="customer_data">

  </div>
 </div>
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>ImportExcel/fetch",
   method:"POST",
   success:function(datos){
    $('#customer_data').html(datos);
   }
  })
 }

 $('#import_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>ImportExcel/import",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   success:function(data){
    $('#file').val('');
    load_data();
    alert(data);
   }
  })
 });

});
</script>
