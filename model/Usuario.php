<?php
require_once 'Banco.php'; 
require_once '../Conexao.php';
class Usuario extends Banco{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId(){
        return $this->id;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getPermissao(){
        return $this->permissao;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function save(){
        $result = false;

        $conexao = new Conexao();

        $query = "Insert into usuario (id,login,senha,permissao) values (null,:login,:senha,:permissao)";

        if($conn = $conexao->getConnection()){
            
            $stmt = $conn->prepare($query);

            if($stmt->execute(array(':login'=>$this->login, ':senha'=>$this->senha, ':permissao'=>$this->permissao))){
                $result = $stmt->rowCount();
            }
        }
        return $result;
    }

    public function remove($id){
    }

    public function find($id){
    }

    public function count(){
    }
    
    public function listAll(){
        $conexao = new Conexao();

        $conn = $conexao->getConnection();

        $querry = "Select * from usuario";

        $stmt = $conn->prepare($query);

        $result = array();

        if($stmt->execute()){

            while($rs = $stmt->fetchObject(Usuario::class)){

                $result[] = $rs;
            }

        }else{

            $result = false;

        }

        return $result;
    }

}
?>