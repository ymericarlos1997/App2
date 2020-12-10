<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function getID($link){
		$this->db->like("link",$link);
		$resultado = $this->db->get("menus");
		return $resultado->row();
	}

	public function getPermisos($menu,$rol){
		$this->db->where("menu_id",$menu);
		$this->db->where("rol_id",$rol);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function rowCount($tabla){
		if ($tabla != "ventas") {
			$this->db->where("estado","1");
		}
		$resultados = $this->db->get($tabla);
		return $resultados->num_rows();
	}

	public function Suma($columna,$tabla){
		$this->db->select_sum($columna);
		$resultado=$this->db->get($tabla)->row();
		return $resultado->$columna;

    }
    

	public function fetch_data($v)
    {  
        $this->db->select('producto.codigo,producto.productonombre,producto.presentacion,producto.cantidad,producto.minstock,almacenes.almacen_nombre');
		$this->db->from("producto");
		$this->db->join('almacenes','producto.almacen_id = almacenes.almacen_id');
		$this->db->where('producto.cantidad < producto.minstock');
		$result = $this->db->get();
                         $output = '';
           

                    if($result->num_rows() > 0)
                    { 
                         foreach($result->result() as $row)

                        {

                           
                              $output .='<li><a href="#"><strong>Producto: ' . $row->productonombre . ' </strong> <br /> <small><em>Presentacion: '.$row->presentacion.'</em></small>'.' <small><em>cantidad: '.$row->cantidad.'</em></small>'.' <small><em>Almacen: '.$row->almacen_nombre.'</em></small></a> </li>';


                        }
                     }

                     else
                     {                       
                        $output .= '<li><a href="#" class="text-bold text-italic"> El inventario se encuentra actualizado </a></li>'; 
//                    
                    }


             $this->db->select();
             $this->db->from("producto");
             $this->db->where("cantidad<minstock");
             $result1 = $this->db->get();
            $count=$result1->num_rows();

            $data= array('notification'=>$output,'unseen_notification'=>$count);
           
            
            return json_encode($data);
            
    }
    public function estado(){
        $this->db->set('estado', '1');
        $this->db->where('cantidad<minstock');
        return $this->db->update('producto');
    }
    public function datoscorreo(){
        $this->db->select('producto.codigo,producto.productonombre,producto.presentacion,producto.cantidad,producto.minstock,almacenes.almacen_nombre');
		$this->db->from("producto");
		$this->db->join('almacenes','producto.almacen_id = almacenes.almacen_id');
		$this->db->where('producto.estado',1);
		$resultados = $this->db->get();
		return $resultados->result();
    }

    public function activar(){
        $this->db->select();
        $this->db->from("producto");
        $this->db->where("estado=1");
        $this->db->order_by("producto_id", "DESC");
        $info = $this->db->get();
        return $info->num_rows();
    }

    public function actualizar(){
        $this->db->set("estado", "0");
        $this->db->where("estado","1");
        return $this->db->update("producto");
    }
	
}
