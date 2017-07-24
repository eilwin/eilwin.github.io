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
        
    }
}