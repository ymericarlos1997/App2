
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Productos
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/productos/update" method="POST">
                            <input type="hidden" name="idproducto" value="<?php echo $producto->producto_id;?>">
                            <div class="form-group <?php echo !empty(form_error('codigo')) ? 'has-error':'';?>">
                                <label for="codigo">Codigo:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo !empty(form_error('codigo')) ? set_value('codigo'):$producto->codigo?>"readonly>
                                <?php echo form_error("codigo","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group ">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo !empty(form_error('nombre')) ? set_value('nombre'):$producto->productonombre?>" readonly>
                                <?php echo form_error("nombre","<span class='help-block'>","</span>");?>
                            </div>    

                            <div class="form-group <?php echo !empty(form_error('cantidad')) ? 'has-error':'';?>">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo !empty(form_error('cantidad')) ? set_value('cantidad'):$producto->cantidad?>">
                                <?php echo form_error("cantidad","<span class='help-block'>","</span>");?>
                            </div>
                           
                            <div class="form-group <?php echo !empty(form_error('minstock')) ? 'has-error':'';?>">
                                <label for="minstock">Minstock:</label>
                                <input type="number" class="form-control" id="minstock" name="minstock" value="<?php echo !empty(form_error('minstock')) ? set_value('minstock'):$producto->minstock?>">
                                <?php echo form_error("minstock","<span class='help-block'>","</span>");?>
                            </div>
                            
                            <div class="form-group">
                                <label for="categoria">Categoria:</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <?php foreach($categorias as $categoria):?>
                                        <?php if($categoria->id == $producto->categoria_id):?>
                                        <option value="<?php echo $categoria->id?>" selected><?php echo $categoria->nombre;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $categoria->id?>"><?php echo $categoria->nombre;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
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
