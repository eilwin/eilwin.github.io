<?php

class Atenciones extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('atencion');
    }
    
    public function ver($msg=''){
        if ($this->session->permisos != 'Cliente') {
            $data = $this->atencion->getTAtenciones();
            
            $this->load->view('fragments/header');
            $this->load->view('atenciones/atenciones',array('atenciones'=>$data->result(),'msg'=>$msg));
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
        if ($this->session->permisos == 'Secretaria'){
            if (count($this->atencion->getClientes()->result())==0){
                $this->load->view('fragments/header');
                $this->load->view('inicio',array('error'=>'No existen Clientes registrados'));
                $this->load->view('fragments/footer');
            }elseif (count($this->atencion->getAbogados()->result())==0){
                $this->load->view('fragments/header');
                $this->load->view('inicio',array('error'=>'No existen Abogados registrados'));
                $this->load->view('fragments/footer');
            } else{
                $clientes = array();
                $abogados = array();
                $data = $this->atencion->getClientes()->result();
                foreach ($data as $cliente){
                    $clientes[$cliente->rut] = $cliente->nombre;
                }
                $data = $this->atencion->getAbogados()->result();
                foreach ($data as $abogado){
                    $abogados[$abogado->rut] = $abogado->nombre;
                }
                if ($action=='add'){    
                    $this->load->view('fragments/header');
                    $this->load->view('atenciones/atencion',array('accion'=>'Agregar','action'=>$action,'clientes'=>$clientes,'abogados'=>$abogados));
                    $this->load->view('fragments/footer');
                }
                if ($action=='edit') {
                    $data = $this->atencion->getAtencion($id)->result();
                    $atencion = array(
                        'fecha_atencion'=> $data[0]->fecha_atencion,
                        'id_cliente'    => $data[0]->id_cliente,
                        'id_abogado'    => $data[0]->id_abogado,
                        'estado'        => $data[0]->estado,
                        'id'            => $id
                    );
                    $this->load->view('fragments/header');
                    $this->load->view('atenciones/atencion',array('accion'=>'Editar','action'=>$action,'atencion'=>$atencion,'clientes'=>$clientes,'abogados'=>$abogados));
                    $this->load->view('fragments/footer');
                }
            }
        } else{
            redirect('login/error');
        }
    }
    
    public function guardar(){
        $action = $this->input->post('action');
        $fecha = DateTime::createFromFormat('d/m/Y H:i',$this->input->post('fecha_atencion'));
        $fecha_atencion = date_format($fecha,'Y-m-d H:i');
        $data = array(
            'fecha_atencion'    => $fecha_atencion,
            'id_cliente'        => $this->input->post('id_cliente'),
            'id_abogado'        => $this->input->post('id_abogado'),
            'estado'            => $this->input->post('estado')
        );
        if ($action == 'add') {
            $this->atencion->setAtencion($data);
            $this->load->view('fragments/header');
            $this->load->view('inicio',array('msg'=>'Atencion agregada exitosamente'));
            $this->load->view('fragments/footer');
        }
        if ($action == 'edit') {
            $data['id'] = $this->input->post('id');
            $this->atencion->updateAtencion($data['id'],$data);
            $this->ver('Atencion actualizada correctamente');
        }
    }
    
    public function buscar(){
        if($this->session->permisos == 'Secretaria'){
            $opcion = $this->input->post('opcion');
            $palabra = $this->input->post('palabra');
            $fechaInicio = $this->input->post('fechaDesde');
            $fechaFin = $this->input->post('fechaHasta');
            $data = '';
            $msg = '';
            $dig = array();
            if($opcion == 'cliente' || $opcion == 'abogado'){
                if(strlen($palabra)>0){
                    $data = $this->atencion->getAtencionN($opcion,$palabra)->result();
                    if(count($data)>0){
                        foreach ($data as $cliente){
                            array_push($dig,$this->cliente->calcularDV($cliente->rut));
                        }
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
            }
            if($opcion == 'fecha_atencion'){
                
            }
            $this->load->view('fragments/header');
            $this->load->view('atenciones/buscar',$arr);
            $this->load->view('fragments/footer');
        } else{
            redirect('login/error');
        }
    }
    
    public function borrar($id = ''){
        $this->atencion->deleteAtencion($id);
        $this->ver('Atencion eliminada satisfactoriamente');
    }
}