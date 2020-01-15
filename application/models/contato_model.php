<?php

class contato_model extends CI_model{

    public function __construct(){
        parent::__construct();
        // carregar o banco de dados
        $this->load->database();
    }

    // salvar um contato
    public function salvar($contato){
        $this->db->insert("contatos", $contato);
    }

    // listar todos contatos do usuario
    public function listar_contatos($id){
        // mostre todos os contatos do usuario com o "id" armazenado da sessão
        $this->db->where("Id_usuario", $id);
        // mostrar em ordem alfabética
        $this->db->order_by("nome", "asc");
        // da tabela de contatos
        $query = $this->db->get("contatos");
        // se existir contatos salvos
        if($query->result_array() > 0){
            // retorne todos os contatos
            return $query->result_array();
        }
        // se não existir 
        else{
            return false;
        }
    }

    // pegar o contato que será editado
    public function get_contato($id, $u){
        // pegar o contato com id especificado
        $this->db->where("id_contato", $id);
        // de acordo com o usuario que cadastrou o contato
        $this->db->where("Id_usuario", $u);
        // pegar da tabela de contatos
        $query = $this->db->get("contatos");
        // se houver resultado
        if($query->result_array() > 0){
            // retorne o contato
            return $query->result_array();
        }
    
        else{
            return false;
        }
    }

    // atualizar contato
    public function update_contato($id, $contato){
        // atualizar contato
        $this->db->set($contato);
        // pelo id do contato
        $this->db->where("id_contato", $id);
        // se a query executar corretamente
        if($this->db->update("contatos")){
            // retorne verdadeiro
            return $this->session->set_flashdata("success", "Contato atualizado com sucesso");
        }
        // se não, pode ter ocorrido algum erro
        else{
            return $this->session->set_flashdata("error", "Houve um erro ao atualizar o contato");
        }
    }

    public function delete($id, $id_usuario){
        // excluir o contato que o usuario cadastrou
        $this->db->where("id_contato", $id);
        $this->db->where("Id_usuario", $id_usuario);
        // se query foi executada com sucesso
        if($this->db->delete("contatos")){
            // retorne mensagem de sucesso
            return $this->session->set_flashdata("success_delete", "Contato deletado com sucesso");
        }

        // se não, retorne a mensagem de erro
        else{
            return $this->session->set_flashdata("error_delete", "Houve um erro ao tentar deletar este contato");
        }
    }
}

?>