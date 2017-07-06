<?php

class Formulario extends CI_Controller{
    
    public function index(){
        $this->load->model('form');
        $data = $this->form->getAlumnos();
        $data = $data->result();
        $alumnos = array();
        foreach ($data as $alumno){
            $alumnos[$alumno->id] = "(".$alumno->rut.") ".$alumno->nombre;
        }
        $this->load->view('fragments/header');
        $this->load->view('formulario/index',array('alumnos'=>$alumnos));
        $this->load->view('fragments/footer');
    }
    
    public function resultado(){
        $this->load->model('form');
        $nota = $this->input->post('nota');
        $id = $this->input->post('alumno_id');
        $alumno = $this->form->getAlumno($id)->result();
        $alumno = $alumno[0];
        $et = (4 - $nota*0.6)/0.4;
        $arr = array(
            'rut'   => $alumno->rut,
            'nombre'=> $alumno->nombre,
            'nota'  => $nota,
            'et'    => $et
        );
        
        $this->load->view('fragments/header');
        $this->load->view('formulario/resultado',$arr);
        $this->load->view('fragments/footer');
    }
}