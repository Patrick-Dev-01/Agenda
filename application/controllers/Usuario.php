<?php

class Usuario extends CI_controller{

    public function __construct(){
        parent::__construct();
        // carregar o model de usuario
        $this->load->model("usuario_model");
    }

    // pagina de cadastro
    public function view_cadastro(){
        // Validação dos dados
        // nome
        $this->form_validation->set_rules("nome", "Nome", "required", array(
            // obrigatório
            "required" => "O campo Nome é obrigatório"
        ));
        // sobrenome
        $this->form_validation->set_rules("sobrenome", "Sobrenome", "required", array(
            "required" => "O campo Sobrenome é obrigatório"
        ));
        // senha
        $this->form_validation->set_rules("senha", "Senha", "required", array(
            "required" => "O campo Senha é obrigatório"
        ));
        // email
        $this->form_validation->set_rules("email", "Email", "required|is_unique[usuarios.email]", array(
            "required" => "O campo Email é obrigatório",
            // verificar se o Email ja esta cadastrado
            "is_unique" => "Esse Email ja está cadastrado"
        ));
        // aplicar um estilo nos erros de validação
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div><br>");

        // se o formulario ainda nao foi submetido ou houve erros de validação
        if($this->form_validation->run() == false){
            // mostre a view de cadastro
            $this->load->view("usuario/cadastro");
        }
        // se não houver erros de validação
        else{
            // Array de dados que será passado para o model de usuario
            $usuario = array(
                "nome" => $this->input->post("nome"),
                "sobrenome" => $this->input->post("sobrenome"),
                // gerar o hash da senha
                "senha" => password_hash($this->input->post("senha"), PASSWORD_DEFAULT),
                "email" => $this->input->post("email")
            );
            // passar os dados para o model
            $this->usuario_model->set_usuario($usuario);
            // apos o cadastro, redirecionar para a tela de login
            redirect("/login");
        }
    }

    // view da tela de login
    public function view_login(){
        // carregar view de login
        $this->load->view("usuario/login");
        // variavel para armazenar o email 
        $email = $this->input->post("email");
        // variavel para armazenar o senha
        $senha = $this->input->post("senha");
        // passar os dados para autenticar o usuario
        $usuario = $this->usuario_model->autenticar($email, $senha);
        // se o usuario existir 
        if($usuario){
            // inicie a sessão
            $this->session->set_userdata("usuario_logado", $usuario);
            // redirecione para a index
            redirect("/");  
        }
        // se houver erro de autenticação, mostre a mensagem
        else{
            return $this->session->set_flashdata("erro_autenticacao", "Email ou Senha Inválidos");
        }
    }
    // logout de usuario
    public function logout(){
        // esvaziar a sessão de usuario
        $this->session->unset_userdata("usuario_logado");
        // e redirecione para tela de login
        redirect("login");
    }
}

?>