<?php 

class Pages extends CI_controller{
    
    public function __construct(){
        parent::__construct();
        // carregar o model de contatos
        $this->load->model("contato_model");
        // carregar model de usuario
        $this->load->model("usuario_model");
    }

    // home page
    public function index(){
        // salvar a sessão na variavel usuario, para ser usada como paramêtro no model 
        $usuario = $this->session->userdata("usuario_logado");
        // variavel que irá armazenar os resultados do model de contato
        $listar['resultados'] = $this->contato_model->listar_contatos($usuario);
        // pegar alguns dados do usuario
        $data['dados'] = $this->usuario_model->get_usuario($usuario);
        // template do menu
        $this->load->view("templates/header", $data);
        // listar todos os contatos do usuario
        $this->load->view("pages/home", $listar);
    }
}

?>