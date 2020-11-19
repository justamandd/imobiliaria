<div class="container">
    <div class="centered">
        <form action="" method="post" id="cadLogin" name="cadLogin">
            <div class="card text-center">
                <div class="card-header">
                    <h1 class="card-title">Login</h1>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="login" id="login" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" name="senha" id="senha" placeholder="Senha">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="btnLogar" name="btnLogar" class="btn btn-success">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    if(isset($_POST['btnLogar'])){
        $_SESSION['logado'] = call_user_func(array('UsuarioController','logar'));
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php');
    }
?>