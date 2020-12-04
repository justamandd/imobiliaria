<?php
require_once 'Banco.php'; 
require_once './Conexao.php';
class Imovel extends Banco{

    private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;
    private $fotoTipo;

    public function getId(){
        return $this->id;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getFoto(){
        return $this->foto;
    }
    public function getValor(){
        return $this->valor;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getFotoTipo(){
        return $this->fotoTipo;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setFoto($foto){ // mudar
        $this->foto = $foto;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function setFotoTipo($fotoTipo){
        $this->fotoTipo = $fotoTipo;
    }

    public function save(){
        $result = false;
        //cria um objeto do tipo conexão
        $conexao = new Conexao();
        //cria conexão com banco de dados
        if($conn = $conexao->getConnection()){
            if($this->id > 0){
                //cria a query de inserção passando atributos que serão atualizados 
                $query = "UPDATE imovel SET descricao = :descricao, foto = :foto, valor = :valor where id = :id";
                //prepara query para execução
                $stmt = $conn->prepare($query);
                //executa query
                if($stmt->execute(array(':descricao'=>$this->descricao, ':foto'=>$this->foto, ':valor'=>$this->valor, ':id'=>$this->id))){
                    $result = $stmt->rowCount();
                }  
            }else{
                //cria query de inserção passando os atributos que serão armazenados
                $query = "INSERT INTO imovel (id, descricao, foto, valor, tipo, fotoTipo) values (null, :descricao, :foto, :valor, :tipo, :fotoTipo)";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':descricao'=>$this->descricao, ':foto'=>$this->foto, ':valor'=>$this->valor, ':tipo'=>$this->tipo, ':fotoTipo'=>$this->fotoTipo))){
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
        $query = "DELETE FROM imovel WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=>$id))){
            $result = true;
        }
        return $result;
    }

    public function find($id){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM imovel WHERE id = :id";
        $stmt = $conn->prepare($query);
        if($stmt->execute(array(':id'=> $id))){
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject(Imovel::class);
            }else{
                $result = false;
            }
        }
        return $result;
    }

    public function count(){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = 'SELECT count(*) FROM imovel';
        $stmt = $conn->prepare($query);
        $count = $stmt->exec(); //perguntar -----------------------------á
        if(isset($count) && !empty($count)){
            return $count;
        }
        return false;
    }
    
    public function listAll(){
        //cria um objeto do tipo conexão
        $conexao = new Conexao();
        //cria a conexão com o banco de dados
        $conn = $conexao->getConnection();
        //cria a query de seleção
        $query = "Select * from imovel";
        //cria um array para receber o resultado da seleção
        $stmt = $conn->prepare($query);
        //executa a query
        $result = array();

        if($stmt->execute()){
            //o resultado da busca será retornado como um objeto da classe
            while($rs = $stmt->fetchObject(Imovel::class)){
                //armazena esse objeto em uma posição do vetor
                $result[] = $rs;
            }
        }else{
            $result = false;
        }
        return $result;
    }

    public function listAllTipo($tipo){
        $conexao = new Conexao();
        $conn = $conexao->getConnection();
        $query = "SELECT * FROM imovel WHERE tipo = :tipo";
        $stmt = $conn->prepare($query);
        $result = array();

        if($stmt->execute(array(':tipo'=>$tipo))){
            while($rs = $stmt->fetchObject(Imovel::class)){
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }
}
?>