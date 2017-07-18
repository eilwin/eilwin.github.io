<?php

class Abogados extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('abogado');
    }
    
    public function abogado($action='',$rut='',$error='',$data=''){
        if ($action=='add'){
            $this->load->view('fragments/header');
            $this->load->view('abogados/abogado',array('accion'=>'Agregar','action'=>'add','error'=>$error,'abogado'=>$data));
            $this->load->view('fragments/footer');
        }
        if ($action=='view' || $action=='edit') {
            $data = $this->abogado->getAbogado($rut)->result();
            if($action=='view'){
                $accion = 'Ver';
            } else {
                $accion = 'Editar';
            }
            $abogado = array(
                'rut'                   => $data[0]->rut,
                'dv'                    => $this->abogado->calcularDV($data[0]->rut),
                'nombre'                => $data[0]->nombre,
                'fecha_contratacion'    => $data[0]->fecha_contratacion,
                'especialidad'          => $data[0]->especialidad,
                'valor_hora'            => $data[0]->valor_hora
            );
            $this->load->view('fragments/header');
            $this->load->view('abogados/abogado',array('accion'=>$accion,'action'=>$action,'abogado'=>$abogado,'error'=>$error));
            $this->load->view('fragments/footer');
        }
    }
    
    public function guardar(){
        $action = $this->input->post('action');
        $fecha = DateTime::createFromFormat('d/m/Y H:i',$this->input->post('fecha_contratacion'));
        $fecha_contratacion = date_format($fecha,'Y-m-d H:i');
        $data = array(
            'rut'                   => $this->input->post('rut'),
            'dv'                    => $this->input->post('dv'),
            'nombre'                => $this->input->post('nombre'),
            'fecha_contratacion'    => $fecha_contratacion,
            'especialidad'          => $this->input->post('especialidad'),
            'valor_hora'            => $this->input->post('valor_hora')
        );
        if ($action=='add') {
            $dv = $data['dv'];
            if($dv=='k'){$dv='K';}
            if($dv == $this->abogado->calcularDV($data['rut'])){
                if(count($this->abogado->getAbogado($data['rut'])->result())==0){
                    unset($data['dv']);
                    $this->abogado->setAbogado($data);
                    $this->load->view('fragments/header');
                    $this->load->view('inicio',array('msg'=>'Abogado agregado exitosamente'));
                    $this->load->view('fragments/footer');
                } else {
                    $this->abogado($action,$data['rut'],'RUT ya registrado en el sistema',$data);
                }
            }else{
                $this->abogado($action,$data['rut'],'Digito verificador invalido',$data);
            }
        }
        if ($action=='edit') {
            unset($data['dv']);
            $this->abogado->updateAbogado($data['rut'],$data);
            $this->ver('Abogado actualizado correctamente');
        }
    }
    
    public function ver($msg=''){
        $data = $this->abogado->getTAbogados()->result();
        $dv = array();
        $i=0;
        foreach ($data as $abogado){
            array_push($dv,$this->abogado->calcularDV($abogado->rut));
        };
        $this->load->view('fragments/header');
        $this->load->view('abogados/abogados',array('abogados'=>$data,'dig'=>$dv,'msg'=>$msg));
        $this->load->view('fragments/footer');
    }
    
    public function buscar(){
        $opcion = $this->input->post('opcion');
        $palabra = $this->input->post('palabra');
        $data = '';
        $msg = '';
        $dig = array();
        if(strlen($palabra)>0){
            $data = $this->abogado->getAbogadoN($opcion,$palabra)->result();
            if(count($data)>0){
                foreach ($data as $abogado){
                    array_push($dig,$this->abogado->calcularDV($abogado->rut));
                }
                $msg = 'success';
            }else{
                $msg = 'failed';
            }
        }
        $arr = array(
            'abogados'  => $data,
            'dv'        => $dig,
            'msg'       => $msg
        );
        $this->load->view('fragments/header');
        $this->load->view('abogados/buscar',$arr);
        $this->load->view('fragments/footer');
    }
    
    public function borrar($rut = ''){
        $this->cliente->deleteAbogado($rut);
        $this->ver('Abogado eliminado satisfactoriamente');
    }
}