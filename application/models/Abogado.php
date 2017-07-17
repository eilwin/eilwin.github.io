<?php

class Abogado extends CI_Model{
    
    public function getTAbogados(){
        $this->db->select('*');
        $this->db->from('abogado');
        return $this->db->get();
    }
    
    public function getAbogado($rut){
        $this->db->select('*');
        $this->db->from('abogado');
        $this->db->where('rut',$rut);
        return $this->db->get();
    }
    
    public function getAbogadoN($opcion,$palabra){
        $this->db->select('*');
        $this->db->from('abogado');
        $this->db->like($opcion,$palabra);
        return $this->db->get();
    }

    public function setAbogado($abogado){
        $this->db->insert('abogado',$abogado);
    }
    
    public function updateAbogado($data){
        
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
    
    public function calcularDV($rut){
        $suma = 0;
        $factores = array(2,3,4,5,6,7,2,3);
        for($i= strlen($rut)-1,$f=0;$i>=0;$i--,$f++){
            $suma += ($rut[$i]*$factores[$f]);
        }
        $dv = 11-($suma%11);
        if($dv == 11){$dv = 0;}
        if($dv == 10){$dv = 'K';}
        return $dv;
    }
}