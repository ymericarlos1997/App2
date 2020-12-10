<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Productos_model");
		$this->load->model("Categorias_model");
		$this->load->model("Backend_model");
	}

	public function index()
	{
		$data  = array(
			'productos' => $this->Productos_model->getProductos(1), 
			'almacen'=>$this->Productos_model->getAlmacen(1),
			'almacenes' => $this->Productos_model->getAlmacenes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");

	}
	public function almacen($id){
		$data  = array(
			'productos' => $this->Productos_model->getProductos($id),
			'almacen'=>$this->Productos_model->getAlmacen($id), 
			'almacenes' => $this->Productos_model->getAlmacenes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add(){
		$data =array( 
			"categorias" => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){ 
		$codigo = $this->input->post("codigo");
		$nombre = utf8_decode($this->input->post("nombre"));
		$descripcion = $this->input->post("descripcion");
		$precio = $this->input->post("precio");
		$stock = $this->input->post("stock");
		$categoria = $this->input->post("categoria");

		$this->form_validation->set_rules("codigo","Codigo","required|is_unique[productos.codigo]");
		$this->form_validation->set_rules("nombre","Nombre","required");
		$this->form_validation->set_rules("precio","Precio","required");
		$this->form_validation->set_rules("stock","Stock","required");

		if ($this->form_validation->run()) {
			$data  = array(
				'productonombre' => $producto, 
				'presentacion' => $presentacion,
				'cantidad' => $cantidad,
				'minstock' => $minstock,
			);

			if ($this->Productos_model->save($data)) {
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/add");
			}
		}
		else{
			$this->add();
		}

		
	}

	public function edit($id){
		$data =array( 
			"producto" => $this->Productos_model->getProducto($id),
			"categorias" => $this->Categorias_model->getCategorias()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idproducto = $this->input->post("idproducto");
		$nombre = $this->input->post("nombre");
		$cantidad = $this->input->post("cantidad");
		$minstock = $this->input->post("minstock");
		$categoria = $this->input->post("categoria");

		$productoActual = $this->Productos_model->getProducto($idproducto);

		if ($idproducto == $productoActual->codigo) {
			$is_unique = '';
		}
		else{
			$is_unique = '|is_unique[productos.codigo]';
		}

		$this->form_validation->set_rules("codigo","Codigo","required".$is_unique);
		$this->form_validation->set_rules("nombre","Nombre","required");
		$this->form_validation->set_rules("cantidad","Cantidad","required");
		$this->form_validation->set_rules("minstock","Mintock","required");


		if ($this->form_validation->run()) {
			$data  = array( 
				'cantidad' => $cantidad,
				'minstock' => $minstock,

			);
			if ($this->Productos_model->update($idproducto,$data)) {
				if($cantidad<$minstock){
					$this->Backend_model->estado();
				}else{
					$this->Backend_model->actualizar();
				}			
				redirect(base_url()."mantenimiento/productos");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/productos/edit/".$idproducto);
			}
		}else{
			$this->edit($idproducto);
		}
		
		
	}
	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Productos_model->update($id,$data);
		echo "mantenimiento/productos";
	}

	public function test(){
		$datos=$this->Productos_model->getProductos();
		print_r($datos);
	}

}