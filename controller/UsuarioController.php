<?php 
require_once '../model/Usuario.php';
class UsuarioController{
    public function salvar(){

        $usuario = new Usuario();

        $usuario->setLogin($_POST['login']);
        $usuario->setSenha($_POST['senha']);
        $usuario->setPermissao($_POST['permissao']);

        $usuario->save();
    }
    public function listar(){
        $usuarios = new Usuario();
        return $usuarios->listAll();
    }
}
?>