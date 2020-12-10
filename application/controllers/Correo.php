<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        $this->load->model('Backend_model');
    }
    
    function enviar(){
       
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
        $mail->addReplyTo('info@example.com', 'CodexWorld');
        
    
        $mail->addAddress('ymericarlos@gmail.com');
    
        $mail->addCC('atlanticainfo@.com');
        $mail->addBCC('bcc@example.com');
        
     
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
            echo 'El mensaje ha sido enviado';
            
        }
    }

    public function test(){
        
        $filas=$this->Backend_model->datoscorreo();
        $resultado=array('datos'=>$filas);
        $this->load->view('correo_view',$resultado);
        
       
    }

    function prueba(){
       
        $filas=$this->Backend_model->datoscorreo();
        print_r ($filas);   
        
    }
}