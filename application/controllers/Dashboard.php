<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model('Backend_model');
	}
	function correo(){
       
        $this->load->library('phpmailer_lib');
     
        $mail = $this->phpmailer_lib->load();
        
        
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reginfosistema@gmail.com';
        $mail->Password = 'adminadmin12';
        $mail->SMTPSecure = 'tsl';
        $mail->Port     = 587;
        
        $mail->setFrom('reginfosistema@gmail.com', 'Atlantica Agricola');
       
        
    
        $mail->addAddress('ymericarlos@gmail.com');
    
     
        $mail->Subject = 'Informacion sobre el estado de inventario';
        
        $filas=$this->Backend_model->datoscorreo();
        $resultado=array('datos'=>$filas);
    
        $mail->isHTML(true);
        $mailContent = $this->load->view('correo_view',$resultado,TRUE);
        $mail->Body = $mailContent;
       
        if(!$mail->send()){
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error en el correo: ' . $mail->ErrorInfo;
        }else{
		echo 'Correo enviado';
        }
	}

	public function index()
	{
		$data = array(
			"cantVentas" => $this->Backend_model->rowCount("ventas"),
			"cantUsuarios" => $this->Backend_model->rowCount("usuarios"),
			"cantClientes" => $this->Backend_model->rowCount("clientes"),
			"cantProductos" => $this->Backend_model->rowCount("productos"),
			"cantStock" => $this->Backend_model->Suma("stock","productos"),
			'years' => $this->Ventas_model->years()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");
		
		$activar=$this->Backend_model->activar();
		if($activar>0){
		   $this->correo();
		   $this->Backend_model->actualizar();
        }

	}

	
	
	public function getData(){
		$year = $this->input->post("year");
		$resultados = $this->Ventas_model->montos($year);
		echo json_encode($resultados);
	}

}

