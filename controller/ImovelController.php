<?php 
require_once './model/Imovel.php';
class ImovelController{



     private $id;
    private $descricao;
    private $foto;
    private $valor;
    private $tipo;
    private $fotoTipo;
    //Método para salvar usuário submetido pelo formulário
    public function salvar(){
        //cria um objeto do tipo usuário
        $imovel = new Imovel();
        //armazena as informações do $_POST via set
        $imovel->setId($_POST['id']);
        $imovel->setDescricao($_POST['descricao']);
        $imovel->setFoto($_POST['foto']);
        $imovel->setValor($_POST['valor']);
        $imovel->setTipo($_POST['tipo']);
        

        //chama o método save para gravar as informações no banco de dados
        $imovel->save();
    }
    //Lista os usuários
    public function listar(){
        //cria uma objeto do tipo usuário
        $usuarios = new Usuario();
        //chama o método list all
        return $usuarios->listAll();
    }
    public function editar($id){
        $usuario = new Usuario();
        $usuario = $usuario->find($id);
        return $usuario;
    }
    public function excluir($id){
        $usuario = new Usuario();
        $usuario = $usuario->remove($id);
    }
    public function logar(){
        $usuario = new Usuario();
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
        return $usuario->logar();
    }
}
?>