<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
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
    public function setSenha(){
        $this->senha = md5($senha);
    }
    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function save(){
        $result = false;
        //cria um objeto do tipo conexão
        $conexao = new Conexao();
        //cria conexão com banco de dados
        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                //cria a query de inserção passando atributos que serão atualizados 
                $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao where id = :id";
                //prepara query para execução
                $stmt = $conn->prepare($query);
                //executa query
                if($stmt->execute(array(':login'=>$this->login, ':senha'=>$this->senha, ':permissao'=>$this->permissao, ':id'=>$this->id))){
                    $result = $stmt->rowCount();
                }  
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "INSERT INTO usuario (id, login, senha, permissao) values (null, :login, :senha, :permissao)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':login'=>$this->login, ':senha'=>$this->senha, ':permissao'=>$this->permissao))){
                    $result = $stmt->rowCount();
                }
            }
        }
        return $result;
    }

    public function remove($id){
        $result = false;
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "DELETE FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM usuario WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=> $id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Usuario::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function count(){
    }
    
    public function listAll(){
        //cria um objeto do tipo conexão
        $conexao = new Conexao();
        //cria a conexão com o banco de dados
        $conn = $conexao->getConnection();
        //cria a query de seleção
        $query = "Select * from usuario";
        //cria um array para receber o resultado da seleção
        $stmt = $conn->prepare($query);
        //executa a query
        $result = array();

        if($stmt->execute()){
            //o resultado da busca será retornado como um objeto da classe
            while($rs = $stmt->fetchObject(Usuario::class)){
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }

        }else{

            $result = false;

        }

        return $result;
    }

    public function logar(){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM usuario WHERE login = :login and senha = :senha";
        $stmt = $conn->prepare($query);
        if ($stmt->execute(array(':login'=>$this->login, ':senha'=>$this->senha))){
            if ($stmt->rowCount() > 0){
                $result = true;
            }else{
                $result = false;
            }
        }
        return $result;
    }
}
?>