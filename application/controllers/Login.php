<?php

class Login extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('logger');
    }

    public function index(){
        $this->load->view('fragments/header');
        $this->load->view('inicio');
        $this->load->view('fragments/footer');
    }
    
    public function login(){
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        if($this->logger->validarLogin($username,$password)){
            $cliente = $this->logger->getCliente($username)->result();
            $arr = array(
                'rut'                   => $cliente[0]->rut,
                'nombre'                => $cliente[0]->nombre,
                'fecha_incorporacion'   => $cliente[0]->fecha_incorporacion,
                'tipo_persona'          => $cliente[0]->tipo_persona,
                'direccion'             => $cliente[0]->direccion,
                'telefono'              => $cliente[0]->telefono,
                'username'              => $cliente[0]->username
            );
            $this->session->set_userdata($arr);
            $permisos = $this->logger->getPermisos($cliente[0]->rut)->result();
            $this->session->set_userdata('permisos',$permisos[0]->permiso);

            $this->load->view('fragments/header');
            $this->load->view('inicio',array('msg'=>'Inicio de Sesion exitoso'));
            $this->load->view('fragments/footer');
        }
        else{
            $this->load->view('fragments/header');
            $this->load->view('login',array('error'=>'Credenciales Incorrectas'));
            $this->load->view('fragments/footer');
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        
        redirect('');
    }
}
