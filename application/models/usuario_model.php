<?php 

class usuario_model extends CI_model{

    public function __construct(){
        parent::__construct();
        // carregar o banco de dados
        $this->load->database();
    }
    // cadastrar usuario
    public function set_usuario($usuario){
        $this->db->insert("usuarios", $usuario);
    }
    // autenticar o usuario
    public function autenticar($e, $s){
        // busque na tabela de usuario, que tenha esse email
        $this->db->where("email", $e);
        // executar a query
        $query = $this->db->get("usuarios");
        // se existir um usuario com este email
        if($query->result() > 0){
            // para cada dado do usuario
            foreach($query->result() as $row){
                // armazene a senha na variavel "senha_db"
                $senha_db = $row->senha;
                // compare o hash da senha do banco dados com a senha informada no formulario 
                if(password_verify($s, $senha_db)){
                    // se os hash batem, retorne alguns dados do usuario
                    $id = $row->id_usuario;
                    return $id;
                }
                // se os hash não batem
                else{
                    // retorne falso
                    return false;
                }
            }
        }
        // se nâo existir o usuario com este email
        else{
            // retorne false
            return false;
        }
    }

    public function get_usuario($usuario){
        // pegar o nome e sobrenome do usuario
        $this->db->select("nome, sobrenome"); 
        // de acordo com o id dele 
        $this->db->where("id_usuario", $usuario);
        $query = $this->db->get("usuarios");
        // retorne os dados
        return $query->result_array();
    }
}

?>