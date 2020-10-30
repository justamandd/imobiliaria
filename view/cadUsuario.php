<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .centered{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .column{
            justify-content: column;
        }
        .center{
            text-align: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="centered">
            <div>
                    <h1 class="center">Cadastro</h1>
                <form action="" method="post" id="cadUsuario" name="cadUsuario" class="column center">
                    <div class="form-group row">
                        <input type="text" name="login" id="login" placeholder="Usuário" class="form-control form-control-lg" required></br>
                    </div>
                    <div class="form-group row">
                        <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control form-control-lg" required></br>
                    </div>

                    <div class="form-group row">
                        <select name="permissao" id="permissao" class="form-control form-control-lg" required>
                            <option value="0" selected disabled>Selecione a Permissão</option>
                            <option value="A">Administrador</option>
                            <option value="C">Comúm</option>
                        </select>
                    </div>

                    <button type="submit" name="btnSalvar" id="btnSalvar" class="btn btn-success">Salvar</button>

                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['btnSalvar'])){
        require_once '../controller/UsuarioController.php';
        call_user_func(array('UsuarioController','salvar'));
    }
?>