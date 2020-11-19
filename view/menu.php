<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <ul class="nav-bar">
        <li class="nav-item">
            <span class="nav-brand">Olá <?php echo $_SESSION['login']; ?></span>
        </li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">Cadastrar</a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Usuario</a>
                <a href="#" class="dropdown-item">Imóvel</a>
            </div>
        </li>
        <li class="nav-item right">
            <a href="sair.php" class="nav-link">Sair</a>
        </li>
    </ul>
</nav>