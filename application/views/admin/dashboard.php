
   

      
        <div class="content-wrapper">
          
            <section class="content-header">
            <img src="<?php echo base_url()?>assets/template/dist/img/logo21.png">
            </section>
            
            <section class="content">
                <div class="row">
                  
                    
                    <div class="col-lg-3 col-xs-6">
                        
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $cantStock;?></h3>

                                <p>Productos</p>
                            </div>
                            
                            <a href="<?php echo base_url();?>mantenimiento/productos" class="small-box-footer">Ver Productos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $cantClientes;?></h3>

                                <p>Clientes</p>
                            </div>
                           
                            <a href="<?php echo base_url();?>mantenimiento/clientes" class="small-box-footer">Ver Clientes <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $cantVentas;?></h3>

                                <p>Ventas</p>
                            </div>
                            
                            <a href="<?php echo base_url();?>movimientos/ventas" class="small-box-footer">Ver Ventas <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-xs-6">
                        
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $cantUsuarios;?></h3>

                                <p>Usuarios</p>
                            </div>
                           
                            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer">Ver Usuarios <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                   
                    
                   
                    
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Grafica de estadistica</h3>

                                <div class="box-tools pull-right">
                                    <select name="year" id="year" class="form-control">
                                        <?php foreach($years as $year):?>
                                            <option value="<?php echo $year->year;?>"><?php echo $year->year;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <script>
$(document).ready(function () {
    var base_url= "<?php echo base_url();?>";
    var year = (new Date).getFullYear();
    datagrafico(base_url,year);
    $("#year").on("change",function(){
        yearselect = $(this).val();
        datagrafico(base_url,yearselect);
    });
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){
                
                window.location.href = base_url + resp;
            }
        });
    });
    $(".btn-view-producto").on("click", function(){
        var producto = $(this).val(); 
        
        var infoproducto = producto.split("*");
        html = "<p><strong>Codigo:</strong>"+infoproducto[1]+"</p>"
        html += "<p><strong>Nombre:</strong>"+infoproducto[2]+"</p>"
        html += "<p><strong>Descripcion:</strong>"+infoproducto[3]+"</p>"
        html += "<p><strong>Precio:</strong>"+infoproducto[4]+"</p>"
        html += "<p><strong>Stock:</strong>"+infoproducto[5]+"</p>"
        html += "<p><strong>Categoria:</strong>"+infoproducto[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });
  
    $(".btn-view-cliente").on("click", function(){
        var cliente = $(this).val(); 
        
        var infocliente = cliente.split("*");
        html = "<p><strong>Nombre:</strong>"+infocliente[1]+"</p>"
        html += "<p><strong>Tipo de Cliente:</strong>"+infocliente[2]+"</p>"
        html += "<p><strong>Tipo de Documento:</strong>"+infocliente[3]+"</p>"
        html += "<p><strong>Numero  de Documento:</strong>"+infocliente[4]+"</p>"
        html += "<p><strong>Telefono:</strong>"+infocliente[5]+"</p>"
        html += "<p><strong>Direccion:</strong>"+infocliente[6]+"</p>"
        $("#modal-default .modal-body").html(html);
    });
    $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "mantenimiento/categorias/view/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
               
            }

        });

    });
    $(".btn-view-usuario").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: base_url + "administrador/usuarios/view",
            type:"POST",
            data:{idusuario:id},
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                
            }

        });

    });
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5 ]
                },
            },
            {
                extend: 'pdfHtml5',
                title: "Listado de Ventas",
                exportOptions: {
                    columns: [ 0, 1,2, 3, 4, 5 ]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
 
 

	$('.sidebar-menu').tree();

    $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#idcomprobante").val(infocomprobante[0]);
            $("#igv").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#idcomprobante").val(null);
            $("#igv").val(null);
            $("#serie").val(null);
            $("#numero").val(null);
        }
        sumar();
    })

    $(document).on("click",".btn-check",function(){
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#idcliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#modal-default").modal("hide");
    });
    $("#producto").autocomplete({
        source:function(request, response){
            $.ajax({
                url: base_url+"movimientos/ventas/getproductos",
                type: "POST",
                dataType:"json",
                data:{ valor: request.term},
                success:function(data){
                    response(data);
                }
            });
        },
        minLength:2,
        select:function(event, ui){
            data = ui.item.id + "*"+ ui.item.codigo+ "*"+ ui.item.label+ "*"+ ui.item.precio+ "*"+ ui.item.stock;
            $("#btn-agregar").val(data);
        },
    });
    $("#btn-agregar").on("click",function(){
        data = $(this).val();
        if (data !='') {
            infoproducto = data.split("*");
            html = "<tr>";
            html += "<td><input type='hidden' name='idproductos[]' value='"+infoproducto[0]+"'>"+infoproducto[1]+"</td>";
            html += "<td>"+infoproducto[2]+"</td>";
            html += "<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
            html += "<td>"+infoproducto[4]+"</td>";
            html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
            html += "<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
            html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
            html += "</tr>";
            $("#tbventas tbody").append(html);
            sumar();
            $("#btn-agregar").val(null);
            $("#producto").val(null);
        }else{
            alert("seleccione un producto...");
        }
    });

    $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
    });
    $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        precio = $(this).closest("tr").find("td:eq(2)").text();
        importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
        sumar();
    });
    $(document).on("click",".btn-view-venta",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimientos/ventas/view",
            type:"POST",
            dataType:"html",
            data:{id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });

    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Comprobante de Venta"
        });
    });
})

function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}



function sumar(){
    subtotal = 0;
    $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
    });
    $("input[name=subtotal]").val(subtotal.toFixed(2));
    porcentaje = $("#igv").val();
    igv = subtotal * (porcentaje/100);
    $("input[name=igv]").val(igv.toFixed(2));
    descuento = $("input[name=descuento]").val();
    total = subtotal + igv - descuento;
    $("input[name=total]").val(total.toFixed(2));

}
function datagrafico(base_url,year){
    namesMonth= ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Set","Oct","Nov","Dic"];
    $.ajax({
        url: base_url + "dashboard/getData",
        type:"POST",
        data:{year: year},
        dataType:"json",
        success:function(data){
            var meses = new Array();
            var montos = new Array();
            $.each(data,function(key, value){
                meses.push(namesMonth[value.mes - 1]);
                valor = Number(value.monto);
                montos.push(valor);
            });
            graficar(meses,montos,year);
        }
    });
}

function graficar(meses,montos,year){
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: ' ventas de los meses'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto Acumulado (Quetzales)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
            '<td style="padding:0"><b>{point.y:.2f} Quetzales</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }

            }
        }
    },
    series: [{
        name: 'Meses',
        data: montos

    }]
});
}
</script>
                           
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div id="grafico" style="min-width: 310px; height: 400px;margin: 0 auto"></div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                        </div>
                      
                    </div>
                   
                </div>
                
            </section>
        
        </div>
      
