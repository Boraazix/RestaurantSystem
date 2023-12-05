<?php
    require_once dirname(__DIR__) . '/classes/util.class.php';

    if(Util::logged()){
        ?>
        <details <?php if($_SESSION['perfil']>3) echo"hidden";?>>
            <summary>Cadastros</summary>
            <a href="cadastrousuario.php" <?php if($_SESSION['perfil']>2) echo"hidden";?>>Cadastro de Usuários <br></a>
            <a href="cadastroperfil.php" <?php if($_SESSION['perfil']!=1) echo"hidden";?>>Cadastro de Perfis <br></a>
            <a href="cadastronoticia.php" <?php if($_SESSION['perfil']>2) echo"hidden";?>>Cadastro de Notícias <br></a>
            <a href="cadastroproduto.php" <?php if($_SESSION['perfil']>2) echo"hidden";?>>Cadastro de Produtos <br></a>
            <a href="cadastrovenda.php" <?php if($_SESSION['perfil']!=3) echo"hidden";?>>Cadastro de Vendas</a>
        </details>

        <details>
            <summary>Relatórios</summary>
            <a href="relatorioprodutos.php">Relatório de Produtos <br></a>
            <a href="relatoriousuarios.php" <?php if($_SESSION['perfil']>2) echo"hidden";?>>Relatório de Usuários <br></a>
            <a href="relatorioperfis.php" <?php if($_SESSION['perfil']>2) echo"hidden";?>>Relatório de Perfis <br></a>
            <a href="relatoriodebitos.php" <?php if($_SESSION['perfil']!=3) echo"hidden";?>>Relatório de Débitos</a>
        </details>
        
        <a href="logout.php">Logout</a>
        <?php
    }
    else {
        ?>
        <details>
            <summary>Menu</summary>
            <a href="relatorioprodutos.php">Nossos produtos</a>
        </details>
        <a href="login.php">Fazer Login</a>
        <?php
    }
?>