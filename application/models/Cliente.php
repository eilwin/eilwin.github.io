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
    
    public function getClienteN($opcion,$palabra){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->like($opcion,$palabra);
        return $this->db->get();
    }

    public function setCliente($cliente){
        $this->db->insert('cliente',$cliente);
    }
    
    public function setPermiso($permiso){
        $this->db->insert('permisos',$permiso);
    }
    
    public function updateCliente($rut,$data){
        $this->db->update('cliente',$data,array('rut'=>$rut));
    }
    
    public function deleteCliente($rut){
        $this->db->delete('cliente',array('rut'=>$rut));
        $this->db->delete('permisos',array('id_cliente'=>$rut));
        $this->db->delete('atencion',array('id_cliente'=>$rut));
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
