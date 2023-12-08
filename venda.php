<?php
require_once 'classes/r.class.php';
require_once 'classes/util.class.php';
require_once 'classes/vendaservices.class.php';
require_once 'classes/usuarioservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] != 3 && $_SESSION['perfil'] != 1) // somente caixa e ADM
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <style>
        main {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .card-body {
            line-height: 1.5;
        }
    </style>
    <style>
        <?php
        if (isset($_GET['alert'])) {
            switch ($_GET['alert']) {
                case 1:
                    ?>
                    #alert1 {
                        display: contents !important;
                    }

                    <?php
                    break;
            }
        }
        ?>
    </style>
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <?php
        $cliente = UsuarioServices::buscarPorId($_POST['cliente']);
        ?>
        <h1>Vendas para o cliente <?= $cliente->nome ?></h1>

        <div id="alert1" style="display: none;">
            <div class="alert alert-success" role="alert">
                Divida paga com sucesso.
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $vendas = VendaServices::buscarTodosPorCliente($cliente->id);

            foreach ($vendas as $venda) {
                $vendedor = UsuarioServices::buscarPorId($venda->vendedor);
                $cliente = UsuarioServices::buscarPorId($venda->cliente);
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">
                                Venda número
                                <?= $venda->id ?>
                            </h3>
                            <p class="card-text">Vendido por
                                <?= $vendedor->nome ?> para
                                <?= $cliente->nome ?> em
                                <?= $venda->data_venda ?>
                            </p>
                            <a href="processos/quitar.php?id=<?= $venda->id ?>" class="btn btn-primary"
                                <?= ($venda->data_pagamento != 0) ? "hidden" : '' ?>>Quitar pagamento em aberto</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>
<?php R::close(); ?>