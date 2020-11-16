    <style>
        .centered{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
    </style>
<div class="container">
    <div class="centered">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Usuários</h1>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Login</th>
                                <th>Permissão</th>
                                <th><a href="index.php">Novo</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once 'controller/UsuarioController.php';
                            $usuarios = call_user_func(array('UsuarioController','listar'));
                            if(isset($usuarios) && !empty($usuarios)){
                                foreach($usuarios as $usuario){
                            ?>
                            <tr>
                                <td><?php echo $usuario->getLogin(); ?></td>
                                <td><?php echo $usuario->getPermissao(); ?></td>
                                <td>
                                    <a href="index.php?action=editar&id=<?php echo $usuario->getId();?>" class="btn btn-primary">Editar</a>
                                    <a href="index.php?action=excluir&id=<?php echo $usuario->getId();?>" class="btn btn-danger">Excluir</a>
                                </td>
                            </tr>
                            <?php
                            }}else{
                                ?>
                                <tr>
                                    <td colspan="5"><h6>Nenhum registro encontrado</h6></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>