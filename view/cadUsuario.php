<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <form action="" method="post" id="cadUsuario" name="cadUsuario">
    
        Login: <input type="text" name="login" id="login"></br>
        Senha: <input type="password" name="senha" id="senha"></br>
        Confirmação da Senha: <input type="password" name="senha2" id="senha2">
        <select name="permissao" id="permissao">
            <option value="0" selected></option>
            <option value="A">Administrador</option>
            <option value="C">Comum</option>
        </select>
        <button type="submit" name="btnSalvar" id="btnSalvar">Salvar</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['btnSalvar'])){
        require_once '../controller/UsuarioController.php';
        call_user_func(array('UsuarioController','salvar'));
    }
?>