<?php

class Sistema extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('sistem');
        $this->load->helper('string');
    }
    
    public function estadisticas(){
        $natural = $this->sistem->getClientesTipo('Natural')->result();
        $juridica = $this->sistem->getClientesTipo('Juridica')->result();
        $clienteTipo = array(
            array('nombre'=>'Natural','cantidad'=> count($natural)),
            array('nombre'=>'Juridica','cantidad'=> count($juridica))
        );
        $data = $this->sistem->getClientes()->result();
        $clientes = array();
        foreach ($data as $cliente){
            $clientes[$cliente->rut] = $cliente->nombre;
        }
        $data = $this->sistem->getClientesAtenciones()->result();
        $clienteAtencion = array();
        foreach ($data as $dat){
            array_push($clienteAtencion, array('nombre'=>$clientes[$dat->id_cliente],'cantidad'=>$dat->atenciones));
        }
        $this->load->view('fragments/header');
        $this->load->view('sistema/estadisticas',array('clienteTipo'=>$clienteTipo,'clienteAtencion'=>$clienteAtencion));
        $this->load->view('fragments/footer');
    }
    
    public function getClienteTipo(){
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
    
    public function getClienteAtencion(){
        $data = $this->sistem->getClientes()->result();
        $clientes = array();
        foreach ($data as $cliente){
            $clientes[$cliente->rut] = $cliente->nombre;
        }
        $data = $this->sistem->getClientesAtenciones()->result();
        $response->cols[] = array(
            "id"        => "",
            "label"     => "Cliente",
            "pattern"   => "",
            "type"      => "string"
        );
        $response->cols[] = array(
            "id"        => "",
            "label"     => "Nro Atenciones",
            "pattern"   => "",
            "type"      => "number"
        );
        foreach ($data as $cd) {
            $response->rows[]["c"] = array(
                array(
                    "v" => $clientes[$cd->id_cliente],
                    "f" => null
                ),
                array(
                    "v" => (int)$cd->atenciones,
                    "f" => null
                )
            );
        }
        echo json_encode($response);
    }
}
        