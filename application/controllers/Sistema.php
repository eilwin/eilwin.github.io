<?php

class Sistema extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('sistem');
        $this->load->helper('string');
    }
    
    public function estadisticas(){
        $this->load->view('fragments/header');
        $this->load->view('sistema/estadisticas');
        $this->load->view('fragments/footer');
    }
    
    public function getData(){
        $natural = $this->sistem->getClientesTipo('Natural')->result();
        $juridica = $this->sistem->getClientesTipo('Juridica')->result();
        $response->cols[] = array(
            "id"        => "",
            "label"     => "Tipo Persona",
            "pattern"   => "",
            "type"      => "string"
        );
        $response->cols[] = array(
            "id"        => "",
            "label"     => "Cantidad",
            "pattern"   => "",
            "type"      => "number"
        );
        $response->rows[]["c"] = array(
            array(
                "v" => "Natural",
                "f" => null
            ),
            array(
                "v" => (int) count($natural),
                "f" => null
            )
        );
        $response->rows[]["c"] = array(
            array(
                "v" => "Juridica",
                "f" => null
            ),
            array(
                "v" => (int) count($juridica),
                "f" => null
            )
        );
        echo json_encode($response);
    }
}
        