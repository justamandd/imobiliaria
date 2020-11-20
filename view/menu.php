<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <nav class="collapse navbar-collapse">
        <span class="nav-brand mb-0 text-light nav-item">Olá <?php echo $_SESSION['login']; ?></span>
        <ul class="navbar-nav">
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
</nav>