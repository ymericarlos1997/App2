<!DOCTYPE html>
<html lang="es">
  <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.1/js/bootstrap-dialog.min.js"></script>

  </head>
  <body>
    <div class="col-xs-1" align="center">
  <table class="table table-striped">
  <thead>
    <tr class="bg-primary">
      <th scope="col">Producto</th>
      <th scope="col">Presentacion</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Minstock</th>
      <th scope="col">Almacen</th>
    </tr>
  </thead>
<tr>

    <?php
  
        foreach($datos as $dato):
    ?>
    <tr>
        <td><?=$dato->productonombre ?></td>
        <td><?=$dato->presentacion?></td>
        <td><?=$dato->cantidad?></td>
        <td><?=$dato->minstock?></td>
        <td><?=$dato->almacen_nombre?></td>
        
    </tr>
  
    <?php
        endforeach;
    ?>
</table>
</div>
</body>
</html>