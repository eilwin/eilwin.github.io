<?php

class Clientes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cliente');
    }
    
    public function index(){
        if ($this->session->permisos != 'Cliente') {
            $data = $this->atencion->getTAtenciones();
            
            $this->load->view('fragments/header');
            $this->load->view('atenciones/atenciones',array('atenciones'=>$data->result()));
            $this->load->view('fragments/footer');
        }
        else {
            $data = $this->atencion->getAtenciones($this->session->rut);
            
            $this->load->view('fragments/header');
            $this->load->view('atenciones/atenciones',array('atenciones'=>$data->result()));
            $this->load->view('fragments/footer');
        }
    }
    
    public function cliente($action='',$id=''){
        if ($action=='add'){
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('accion'=>'Agregar'));
            $this->load->view('fragments/footer');
        }
        if ($action=='view' || $action=='edit') {
            $data = $this->cliente->getCliente($rut)->result();
            ($accion=='view')?'Ver':'Editar';
            $atencion = array(
                'fecha_atencion'=> $data[0]->fecha_atencion,
                'cliente'       => $data[0]->cliente,
                'abogado'       => $data[0]->abogado,
                'estado'        => $data[0]->estado,
                'id'            => $id,
                'action'        => $action,
                'accion'        => $accion
            );
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('cliente'=>$atencion));
            $this->load->view('fragments/footer');
        }
    }
    
    public function guardar(){
        
    }
}