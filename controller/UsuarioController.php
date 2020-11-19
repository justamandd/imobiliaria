<?php 
require_once './model/Usuario.php';
class UsuarioController{
    //Método para salvar usuário submetido pelo formulário
    public function salvar(){
        //cria um objeto do tipo usuário
        $usuario = new Usuario();
        //armazena as informações do $_POST via set
        $usuario->setId($_POST['id']);
        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setPermissao($_POST['permissao']);
        //chama o método save para gravar as informações no banco de dados
        $usuario->save();
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