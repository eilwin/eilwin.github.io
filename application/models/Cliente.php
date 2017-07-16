<?php

class Cliente extends CI_Model{
    
    public function getTClientes(){
        $this->db->select('*');
        $this->db->from('cliente');
        return $this->db->get();
    }
    
    public function getCliente($rut){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('rut',$rut);
        return $this->db->get();
    }
    
    public function getClienteN(){
        
    }

    public function setCliente($cliente){
        $this->db->insert('cliente',$cliente);
    }
    
    public function updateCliente($rut,$data){
        
    }
    
    public $validate = array(
        array('field'=>'rut','label'=>'RUT','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'nombre','label'=>'Nombre','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'fecha_incorporacion','label'=>'Fecha Incorporacion','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'direccion','label'=>'Direccion','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'telefono','label'=>'Telefono','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'username','label'=>'Usuario','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s')),
        array('field'=>'password','label'=>'Contraseña','rules'=>'trim|required','errors'=>array('required'=>'Indique su %s'))
    );
    
    public function validar($data){
        if(!empty($this->validate)){
            foreach ($data as $key=>$value){
                $_POST[$key] = $value;
            }
            $this->form_validation->set_rules($this->validate);
            return $this->form_validation->run();
        } else {
            return TRUE;
        }
    }
}
