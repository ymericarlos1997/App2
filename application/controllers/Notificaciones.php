<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificaciones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Backend_model');
        
    }
    public function notificaciones()
    {    
          $v=$this->input->post('view');
        echo  $op= $this->Backend_model->fetch_data($v);
          return $op;
    
    }
}