<?php

class Form extends CI_Model{
    
    public function getAlumnos(){
        $this->db->select("id,rut,nombre");
        $this->db->from('alumno');
        return $this->db->get();
    }
    
    public function getAlumno($id){
        $this->db->select("rut,nombre");
        $this->db->from("alumno");
        $this->db->where("id",$id);
        return $this->db->get();
    }
}

