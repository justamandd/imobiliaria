<?php
//Requisitando UsuarioController.php
require_once 'controller/UsuarioController.php';
?>

<?php
//Requisitando header.php
require_once 'header.php';
?>

<?php
if(isset($_GET['action'])){
    if($_GET['action'] == 'editar'){
        $usuario = call_user_func(array('UsuarioController','editar'), $_GET['id']);
        require_once 'view/cadUsuario.php'; 
    }
    if($_GET['action'] == 'listar'){
        require_once 'view/listUsuario.php';
    }
    if($_GET['action'] == 'excluir'){
        $usuario = call_user_func(array('UsuarioController','excluir'), $_GET['id']);
        require_once 'view/listUsuario.php';
    }
}else{
    require_once 'view/cadUsuario.php'; 
}
?>

<?php
//Requisitando footer.php
require_once 'footer.php';
?>