<?php

class Clientes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('cliente');
    }
    
    public function cliente($action='',$rut='',$error='',$data=''){
        if ($action=='add'){
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('accion'=>'Agregar','action'=>'add','error'=>$error,'cliente'=>$data));
            $this->load->view('fragments/footer');
        }
        if ($action=='view' || $action=='edit') {
            $data = $this->cliente->getCliente($rut)->result();
            $this->load->model('logger');
            $permisos = $this->logger->getPermisos($rut)->result();
            if($action=='view'){
                $accion = 'Ver';
            } else {
                $accion = 'Editar';
            }
            $cliente = array(
                'rut'                   => $data[0]->rut,
                'dv'                    => $this->cliente->calcularDV($data[0]->rut),
                'nombre'                => $data[0]->nombre,
                'fecha_incorporacion'   => $data[0]->fecha_incorporacion,
                'tipo_persona'          => $data[0]->tipo_persona,
                'direccion'             => $data[0]->direccion,
                'telefono'              => $data[0]->telefono,
                'username'              => $data[0]->username,
                'permiso'               => $permisos[0]->permiso
            );
            $this->load->view('fragments/header');
            $this->load->view('clientes/cliente',array('accion'=>$accion,'action'=>$action,'cliente'=>$cliente,'error'=>$error));
            $this->load->view('fragments/footer');
        }
    }
    
    public function guardar(){
        $action = $this->input->post('action');
        $fecha = DateTime::createFromFormat('d/m/Y H:i',$this->input->post('fecha_incorporacion'));
        $fecha_incorporacion = date_format($fecha,'Y-m-d H:i');
        $data = array(
            'rut'                   => $this->input->post('rut'),
            'dv'                    => $this->input->post('dv'),
            'nombre'                => $this->input->post('nombre'),
            'fecha_incorporacion'   => $fecha_incorporacion,
            'tipo_persona'          => $this->input->post('tipo_persona'),
            'direccion'             => $this->input->post('direccion'),
            'telefono'              => $this->input->post('telefono'),
            'username'              => $this->input->post('username')
        );
        if ($action=='add') {
            $dv = $data['dv'];
            if($dv=='k'){$dv='K';}
            if($dv == $this->cliente->calcularDV($data['rut'])){
                $data['password'] = sha1($this->input->post('password'));
                if(count($this->cliente->getCliente($data['rut'])->result())==0){
                    unset($data['dv']);
                    $this->cliente->setCliente($data);
                    $this->cliente->setPermiso(array('id_cliente'=>$data['rut'],'permiso'=> $this->input->post('permiso')));
                    $this->load->view('fragments/header');
                    $this->load->view('inicio',array('msg'=>'Cliente agregado exitosamente '.$data["fecha_incorporacion"]));
                    $this->load->view('fragments/footer');
                } else {
                    $this->cliente($action,$data['rut'],'RUT ya registrado en el sistema',$data);
                }
            }else{
                $this->cliente($action,$data['rut'],'Digito verificador invalido',$data);
            }
        }
        if ($action=='edit') {
            unset($data['dv']);
            $this->cliente->updateCliente($data);
            $this->load->view('fragments/header');
            $this->load->view('inicio',array('msg'=>'Cambios guardados exitosamente'));
            $this->load->view('fragments/footer');
        }
    }
    
    public function ver(){
        $data = $this->cliente->getTClientes()->result();
        $dv = array();
        $i=0;
        foreach ($data as $cliente){
            array_push($dv,$this->cliente->calcularDV($cliente->rut));
        };
        $this->load->view('fragments/header');
        $this->load->view('clientes/clientes',array('clientes'=>$data,'dig'=>$dv));
        $this->load->view('fragments/footer');
    }
    
    public function buscar(){
        $opcion = $this->input->post('opcion');
        $palabra = $this->input->post('palabra');
        $data = '';
        $msg = '';
        $dig = array();
        if(strlen($palabra)>0){
            $data = $this->cliente->getClienteN($opcion,$palabra)->result();
            if(count($data)>0){
                foreach ($data as $cliente){
                    array_push($dig,$this->cliente->calcularDV($cliente->rut));
                };
                $msg = 'success';
            }else{
                $msg = 'failed';
            }
        }
        $arr = array(
            'clientes'  => $data,
            'dv'        => $dig,
            'msg'       => $msg
        );
        $this->load->view('fragments/header');
        $this->load->view('clientes/buscar',$arr);
        $this->load->view('fragments/footer');
    }
}