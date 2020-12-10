<?php
class ImportarDatos_model extends CI_Model{
    function select(){
        $this->db->order_by('producto_id','DES');
        $query=$this->db->get('producto');
        return $query;
    }
    function insert($datos){
        $this->db->insert_batch('producto',$datos);
    }

    function total(){
        $this->db->select('count(productonombre) as total');
        $this->db->from('producto');
        $resultado=$this->db->get();
        return $resultado->row()->total;
    }
    function consultanombrealmacen(){
        $this->db->select("almacen_nombre");
        $this->db->from("almacenes");
        $info=$this->db->get();
        return $info->result();
    }
    function insertalmacenes($datos){
        $this->db->insert_batch('almacenes',$datos);
    }
   function actualizar($datos){
    $this->db->update_batch('producto',$datos,'producto_id'); 
   }
   
   function estadoAlmacenes(){
    $this->db->select("1");
    $this->db->from("almacenes");
    $this->db->limit("1");
    $info = $this->db->get();
    return $info->num_rows();
   }

   function estadoProductos(){
    $this->db->select("1");
    $this->db->from("producto");
    $this->db->limit("1");
    $info = $this->db->get();
    return $info->num_rows();
   }

   function maxproductos(){
    $res="producto_id";
    $this->db->select_max("producto_id");
	$resultado=$this->db->get("producto")->row();
	return $resultado->$res;
   }
}