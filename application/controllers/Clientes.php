<?php

class Clientes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cliente');
    }
    
    public function index(){
        $data = $this->cliente->getTClientes();

        $this->load->view('fragments/header');
        $this->load->view('clientes/clientes',array('clientes'=>$data->result()));
        $this->load->view('fragments/footer');
    }
    
    public function cliente($action='',$id='',$error=''){
        if ($action=='add'){
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('accion'=>'Agregar','action'=>'add','error'=>$error));
            $this->load->view('fragments/footer');
        }
        if ($action=='view' || $action=='edit') {
            $data = $this->cliente->getCliente($rut)->result();
            if($action=='view'){
                $accion = 'Ver';
            } else {
                $accion = 'Editar';
            }
            $cliente = array(
                'rut'                   => $data[0]->rut,
                'nombre'                => $data[0]->nombre,
                'fecha_incorporacion'   => $data[0]->fecha_incorporacion,
                'tipo_persona'          => $data[0]->tipo_persona,
                'direccion'             => $data[0]->direccion,
                'telefono'              => $data[0]->telefono,
                'accion'                => $accion,
                'action'                => $action
            );
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('cliente'=>$atencion,'error'=>$error));
            $this->load->view('fragments/footer');
        }
    }
    
    public function guardar(){
        $data = array(
            'rut'                   => $this->input->post('rut'),
            'nombre'                => $this->input->post('nombre'),
            'fecha_incorporacion'   => $this->input->post('fecha_incorporacion'),
            'tipo_persona'          => $this->input->post('tipo_persona'),
            'direccion'             => $this->input->post('direccion'),
            'telefono'              => $this->input->post('telefono')
        );
        if ($action=='add') {
            
            $data['username'] = $this->input->post('username');
            $data['password'] = sha1($this->input->post('password'));
            if(count($this->cliente->getCliente($data['rut'])->result())==0){
                $this->cliente->setCliente($data);
            } else {
                
            }
        }
        if ($action=='edit') {
            $this->cliente->updateCliente($data);
        }
    }
}