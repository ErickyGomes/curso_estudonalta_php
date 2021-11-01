<header>
    <?php
        if (empty($_SESSION['user'])) {
            echo "<a href='user-login.php'>ENTRAR</a>";            
        } else {
            echo "Olá, <strong>" . $_SESSION['nome']."</strong> | ";
            echo "Sair";
        }
    ?>
</header>