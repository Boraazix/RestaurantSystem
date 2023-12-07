<?php
require_once dirname(__DIR__) . '/classes/util.class.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<header class="p-3 m-0 border-0 bd-example m-0 border-0">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Restaurante</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" <?= (Util::logged()) ? "hidden" : '' ?>>Fazer Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="relatorioprodutos.php">Nossos produtos</a>
                    </li>

                    <?php
                    if (Util::logged()){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cadastrousuario.php" <?php if ($_SESSION['perfil'] > 2)
                                echo "hidden"; ?>>Cadastro de Usuários</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cadastroperfil.php" <?php if ($_SESSION['perfil'] != 1)
                                echo "hidden"; ?>>Cadastro de Perfis</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cadastronoticia.php" <?php if ($_SESSION['perfil'] > 2)
                                echo "hidden"; ?>>Cadastro de Notícias</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cadastroproduto.php" <?php if ($_SESSION['perfil'] > 2)
                                echo "hidden"; ?>>Cadastro de Produtos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cadastrovenda.php" <?php if ($_SESSION['perfil'] > 3)
                                echo "hidden"; ?>>Cadastro de Vendas</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-be-toggle="dropdown"
                                aria-expanded="false">Relatorios</a>
                            <ul>
                                <li><a class="dropdown-item" href="relatorioprodutos.php">Relatório de Produtos <br></a>
                                </li>

                                <li> <a class="dropdown-item" href="relatoriousuarios.php" <?php if ($_SESSION['perfil'] > 2)
                                    echo "hidden"; ?>>Relatório de Usuários <br></a>
                                </li>

                                <li><a class="dropdown-item" href="relatorioperfis.php" <?php if ($_SESSION['perfil'] > 2)
                                    echo "hidden"; ?>>Relatório de Perfis <br></a>
                                </li>

                                <li><a class="dropdown-item" href="relatoriodebitos.php" <?php if ($_SESSION['perfil'] > 3)
                                    echo "hidden"; ?>>Relatório de Vendas</a>></li>
                            </ul>
                        </li>

                        <a href="logout.php" class="nav-link">Logout</a>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

</html>