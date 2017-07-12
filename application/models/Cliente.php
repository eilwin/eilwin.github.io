<?php

class Atencion extends CI_Model{
    
    public function getTAtenciones(){
        $this->db->select('a.id,a.fecha_atencion,b.nombre as nombre_abogado,a.estado');
        $this->db->from('atencion a');
        $this->db->join('abogado b','a.id_abogado=b.rut','left');
        $this->db->join('cliente c','a.id_cliente=c.rut','left');
        return $this->db->get();
    }
    
    public function getAtenciones($rut){
        $this->db->select('a.id,a.fecha_atencion,b.nombre as nombre_abogado,a.estado');
        $this->db->from('atencion a');
        $this->db->join('abogado b','a.id_abogado=b.rut','left');
        $this->db->where('a.id_cliente',$rut);
        return $this->db->get();
    }
    
    public function getAtencion($id){
        $this->db->select('a.id,a.fecha_atencion,b.nombre,a.estado');
        $this->db->from('atencion a');
        $this->db->join('abogado b','a.id_abogado=b.rut','left');
        $this->db->where('a.id',$id);
        return$this->db->get();
    }
    
    public function setAtencion($atencion){
        
    }
    
    public function updateAtencion($atencion){
        
    }
}
