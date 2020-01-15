<?php

class Contato extends CI_controller{
    public function __construct(){
        parent::__construct();
        // carregar o model de contato
        $this->load->model("contato_model");
        $this->load->model("usuario_model");
    }

    //salvar contatos
    public function novo_contato(){
        // validação
        $this->form_validation->set_rules("nome", "Nome", "required", array(
            "required" => "Digite o Nome do seu contato"
        ));
        // numero do contato obrigatorio
        $this->form_validation->set_rules("contato", "Contato", "required|min_length[9]|max_length[10]", array(
            "required" => "Informe o numero do Contato",
            // contato precisa ter 9 digitos
            "min_length" => "O Contato deve ter minimo 9 digitos",
            // ou no maximo 10 digitos
            "max_length" => "O Contato deve ter no maximo 10 digitos"
        ));
        // mostrar a mensagem de erro caso ocorra erros de validação
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div><br>");
        
        // se o formulario não foi submetido ou houve erros de validação
        if($this->form_validation->run() == false){
            // salvar a sessão na variavel usuario, para ser usada como paramêtro no model 
            $usuario = $this->session->userdata("usuario_logado");
            // info do usuario
            $data['dados'] = $this->usuario_model->get_usuario($usuario);
            $this->load->view("templates/header", $data);
            $this->load->view("contato/novo_contato");
        }
        // se não houve erros de validação
        else{
            // array para pegar os dados dos inputs
            $contato = array(
                "nome" => $this->input->post("nome"),
                "contato" => $this->input->post("contato"),
                "email" => $this->input->post("email"),
                "Id_usuario" => $this->input->post("id_user"),
                "dt_registro" => date("Y.m.d")
            );
            // passar os dados do contato para o model
            $this->contato_model->salvar($contato);
            // mensagem de sucesso 
            $this->session->set_flashdata("sucesso", "Contato salvo com sucesso");
            redirect("/contato/novo");
        }
    }

    // editar um contato
    public function editar(){
        // recuperar o id do contato que foi passado pela URL no parametro do segmento 3
        $data = $this->uri->segment(3);
        // sessao do usuario
        $usuario = $this->session->userdata("usuario_logado");        
        // armazena o resultado na variavel
        $contato['resultado'] = $this->contato_model->get_contato($data, $usuario);

        // validação de edição
        // nome do contato obrigatório
        $this->form_validation->set_rules("nome", "Nome", "required", array(
                "required" => "Digite o Nome do Contato"
        ));
        
        // Contato obrigatório, com no minimo 9 digitos numéricos e no maximo 10
        $this->form_validation->set_rules("contato", "Contato", "required|min_length[9]|max_length[10]", array(
            "required" => "O Contato é obrigatório",
            "min_length" => "O Contato deve ter minimo 9 digitos",
            "max_length" => "O Contato deve ter no maximo 10 digitos"
        ));
        // mostrar os erros de validação
        $this->form_validation->set_error_delimiters("<div class='error'>", "</div><br>");
        
        // se houver erros de validação ou o fomulário nao foi submetido 
        if($this->form_validation->run() == false){
            // data_n pq a variavel data ja foi usada nessa função
            $data_n['dados'] = $this->usuario_model->get_usuario($usuario);
             // carregar o template do header
            $this->load->view("templates/header", $data_n);
            // carregar view de edição
            $this->load->view("contato/editar", $contato);
        }
        // se nao teve erros de validação
        else{
            // pegue as informações
            $contato = array(
                "nome" => $this->input->post("nome"),
                "contato" => $this->input->post("contato"),
                "email" => $this->input->post("email")
            );
            // chamar o model de atualização
            $this->contato_model->update_contato($data, $contato);
            redirect("/");
        }
    }

    // deletar um contato
    public function delete_contato(){
        // pegar o id do contato passado pela URL
        $data = $this->uri->segment(3);
        // pegar a sessão do usuario
        $usuario = $this->session->userdata("usuario_logado");
        // passar o id do contato e o id do usuario que o cadastrou
        $this->contato_model->delete($data, $usuario);
        // redirecionar para home page
        redirect("/");
    }
}


?>