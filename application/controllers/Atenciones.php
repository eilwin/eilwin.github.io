<?php

class Atenciones extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('atencion');
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
    
    public function atencion($action='',$id=''){
        if ($action=='add'){
            $this->load->view('fragments/header');
            $this->load->view('atenciones/atencion',array('accion'=>'Agregar'));
            $this->load->view('fragments/footer');
        }
        if ($action=='view' || $action=='edit') {
            $data = $this->atencion->getAtencion($id)->result();
            if($action=='view'){
                $accion = 'Ver';
            } else {
                $accion = 'Editar';
            }
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
            $this->load->view('atenciones/atencion',array('atencion'=>$atencion));
            $this->load->view('fragments/footer');
        }
    }
    
    public function guardar(){
        
    }
}