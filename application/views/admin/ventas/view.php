
<div class="row">
	<div class="col-xs-12 text-center">
	<img src="<?php echo base_url()?>assets/template/dist/img/logo21.png"><br>
		Atlantica Agricola De Guatemala <br>
	
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Informacion De Cliente</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre;?> <br>
		<b>Nro Documento:</b> <?php echo $venta->documento;?><br>
		<b>Telefono:</b> <?php echo $venta->telefono;?> <br>
		<b>Direccion</b> <?php echo $venta->direccion;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>Info de Recibo/Factura</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->tipocomprobante;?><br>
		<b>Serie:</b> <?php echo $venta->serie;?><br>
		<b>Nro de Comprobante:</b><?php echo $venta->num_documento;?><br>
		<b>Fecha</b> <?php echo $venta->fecha;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Importe</th>
					<th>Precio</th>
					<th>Cantidad</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->codigo;?></td>
					<td><?php echo $detalle->nombre;?></td>
					<td><?php echo $detalle->importe;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal;?></td>
				</tr>
				
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $venta->descuento;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
