<?php

class Atencion extends CI_Model{
    
    public function getTAtenciones(){
        $this->db->select('a.id,a.fecha_atencion,c.nombre as nombre_cliente,b.nombre as nombre_abogado,a.estado');
        $this->db->from('atencion a');
        $this->db->join('abogado b','a.id_abogado=b.rut');
        $this->db->join('cliente c','a.id_cliente=c.rut');
        return $this->db->get();
    }
    
    public function getAtenciones($rut){
        $this->db->select('a.fecha_atencion,b.nombre as nombre_abogado,a.estado');
        $this->db->from('atencion a');
        $this->db->join('abogado b','a.id_abogado=b.rut');
        $this->db->where('id_cliente',$rut);
        return $this->db->get();
    }
    
    public function getAtencion($id){
        $this->db->select('*');
        $this->db->from('atencion');
        $this->db->where('id',$id);
        return $this->db->get();
    }
    
    public function getAtFecha($inicio,$termino){
        $this->db->select('a.fecha_atencion,c.nombre as nombre_cliente,b.nombre as nombre_abogado,a.estado');
        $this->db->from('atencion a');
        $this->db->join('cliente c','c.rut = a.id_cliente');
        $this->db->join('abogado b','b.rut = a.id_abogado');
        $this->db->where("a.fecha_atencion BETWEEN $inicio AND $termino");
        return $this->db->get();
    }
    
    public function setAtencion($atencion){
        $this->db->insert('atencion',$atencion);
    }
    
    public function updateAtencion($id,$atencion){
        $this->db->update('atencion',$atencion,array('id'=>$id));
    }
    
    public function getClientes(){
        $this->db->select('rut,nombre');
        $this->db->from('cliente');
        return $this->db->get();
    }
    
    public function getAbogados(){
        $this->db->select('rut,nombre');
        $this->db->from('abogado');
        return $this->db->get();
    }
    
    public function deleteAtencion($id){
        $this->db->delete('atencion',array('id'=>$id));
    }
}