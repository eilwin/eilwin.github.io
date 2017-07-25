<?php

class Sistem extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function getClientesMeses(){
        
    }
    
    public function getClientesTipo($opcion){
        $this->db->select('*');
        $this->db->from('cliente');
        $this->db->where('tipo_persona',$opcion);
        return $this->db->get();
    }
    
    public function getClientesAtenciones(){
        $this->db->select('id_cliente,count(*) as atenciones');
        $this->db->from('atencion');
        $this->db->group_by('id_cliente');
        return $this->db->get();
    }
    
    public function getClientes(){
        $this->db->select('rut,nombre');
        $this->db->from('cliente');
        return $this->db->get();
    }
}