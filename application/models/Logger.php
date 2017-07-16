<?php

class Logger extends CI_Model{
    
    public function getCliente($username){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('username',$username);
        return $this->db->get();
    }
    
    public function getPermisos($rut){
        $this->db->select('*');
        $this->db->from('permisos');
        $this->db->where('id_cliente',$rut);
        return $this->db->get();
    }

    public function validarLogin($user, $pass){
        $data = $this->db->get_where('cliente',array('username'=>$user,'password'=>$pass));
        return count($data->result())>0;
    }
}
