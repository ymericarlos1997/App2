<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function getProductos($id){
		$this->db->select('producto.producto_id,producto.codigo,producto.productonombre,producto.presentacion,producto.cantidad,producto.minstock');
		$this->db->from("producto");
		$this->db->join('almacenes','producto.almacen_id = almacenes.almacen_id');
		$this->db->where('almacenes.almacen_id',$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getProducto($id){
		$this->db->where("producto_id",$id);
		$resultado = $this->db->get("producto");
		return $resultado->row();
	}
	public function save($data){
		return $this->db->insert("producto",$data);
	}

	public function update($id,$data){
		$this->db->where("producto_id",$id);
		return $this->db->update("producto",$data);
	}
	public function getAlmacenes(){
		$this->db->select();
		$this->db->from("almacenes");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getAlmacen($id){
		$this->db->select();
		$this->db->from("almacenes");
		$this->db->where("almacen_id",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

}
