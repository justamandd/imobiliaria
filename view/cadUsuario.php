    <style>
        .centered{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #cadUsuario{
            width: 25vw;
            margin: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="centered">
            <!-- Form Cadastro -->
            <form action="" method="post" id="cadUsuario" name="cadUsuario">
                <!-- Card Init -->
                <div class="card text-center">

                    <!-- Card Header -->
                    <div class="card-header">
                        <h1 class="card-title">Cadastro</h1>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Login -->
                        <div class="form-group">
                            <input type="text" name="login" id="login" placeholder="Usuário" class="form-control form-control-lg" value="<?php echo isset($usuario)?$usuario->getLogin():'' ?>" required>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control form-control-lg" value="<?php echo isset($usuario)?$usuario->getSenha():'' ?>" required>
                        </div>

                        <!-- Password Confirm -->
                        <div class="form-group">
                            <input type="password" name="senhaConfirm" id="senhaConfirm" placeholder="Confirmação" class="form-control form-control-lg" required>
                        </div>

                        <!-- Select Permission -->
                        <div class="form-group">
                            <select name="permissao" id="permissao" class="form-control form-control-lg" required>
                                <option value="0" selected disabled>Selecione a Permissão</option>
                                <option value="A" <?php echo isset($usuario) && $usuario->getPermissao()=='A'?'selected':'' ?>>Administrador</option>
                                <option value="C" <?php echo isset($usuario) && $usuario->getPermissao()=='C'?'selected':'' ?>>Comúm</option>
                            </select>
                        </div>
                        <!-- <h5><a href="listUsuario">Listar Usuários</a></h5> -->
                    </div>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <!-- Input Hidden -->
                        <input type="hidden" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():'';?>">
                        <!-- Submit Button -->
                        <button type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-success">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
    //verifica se o botão submit foi acionado
    if(isset($_POST['btnEnviar'])){
        //importa o UsuarioController.php
        require_once 'controller/UsuarioController.php';
        //Chama uma função php que permite informar a classe método que será acionado 
        call_user_func(array('UsuarioController','salvar'));

        header('Location: index.php?action=listar');
    }
?>