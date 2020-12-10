
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Listado</small>
        </h1>
        <h1>Almacen: 
        <?php
          foreach($almacen as $almacenactual):
        ?>
        <small><?=$almacenactual->almacen_nombre?></small>
       
        <?php
          endforeach;
        ?>
         </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>mantenimiento/productos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Productos</a>                    
                        
                        <ul class="nav navbar-nav">
                    <li id="theme_selector" class="dropdown">
                        <a href="#" class="btn btn-primary btn-flat dropdown-toggle" type="button" data-toggle="dropdown">Almacenes<b class="caret"></b></a>
                        <ul id="theme" class="dropdown-menu" role="menu">
                            <?php
                                foreach($almacenes as $almacen):
                            ?>
                            <li><a href="<?php echo base_url()?>mantenimiento/productos/almacen/<?php echo $almacen->almacen_id;?>"><?=$almacen->almacen_nombre?></a></li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </li>
                </ul>
                
                    </div>
                   
                </div>
                
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Presentacion</th>
                                    <th>Cantidad</th>
                                    <th>Mistock</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>
                                    <?php foreach($productos as $producto):?>
                                        <tr>
                                            <td><?php echo $producto->productonombre;?></td>
                                            <td><?php echo $producto->presentacion;?></td>
                                            <td><?php echo $producto->cantidad;?></td>
                                            <td><?php echo $producto->minstock;?></td>
                                            <?php $dataproducto = $producto->productonombre."*".$producto->presentacion."*".$producto->cantidad."*";?>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproducto;?>">
                                                        <span class="fa fa-search"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/productos/edit/<?php echo $producto->producto_id ;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
