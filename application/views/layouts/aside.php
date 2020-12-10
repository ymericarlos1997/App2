        <!-- menu de opciones -->

        
        <aside class="main-sidebar">
           
            <section class="sidebar">      
             >
                <ul class="sidebar-menu" data-widget="tree">
                    
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Opciones</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           
                            <li><a href="<?php echo base_url();?>mantenimiento/clientes"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/productos"><i class="fa fa-circle-o"></i> Productos</a></li>
                           
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>movimientos/ventas"><i class="fa fa-circle-o"></i> Ventas</a></li>
                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-print"></i> <span>Reportes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           
                            <li><a href="<?php echo base_url();?>reportes/ventas"><i class="fa fa-circle-o"></i> Reporte Ventas</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-circle-o"></i> Log Out</a></li>
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                         
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>Excel">
                            <i class="fa fa-file"></i> <span>Cargar Archivo Excel</span>
                        </a>
                    </li>
                </ul>
            </section>
        
        </aside>

      
     