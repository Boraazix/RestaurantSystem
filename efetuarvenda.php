<?php
require_once 'classes/r.class.php';
require_once 'classes/usuarioservices.class.php';
require_once 'classes/produtoservices.class.php';

if(!isset($_POST['cliente'])) {
    header('index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main class="container mt-4">
        <h1>Cadastro de Vendas</h1>

        <form action="processos/novavenda.php" method="post">
            <fieldset>
                <legend>Dados da Venda</legend>

                <?php
                $cliente = UsuarioServices::buscarPorId($_POST['cliente']);
                $produtos = ProdutoServices::buscarTodos();
                ?>

                <p>Venda para
                    <?= $cliente->nome ?>, por
                    <?= $_SESSION['nome'] ?>
                </p>
                <input type="hidden" name="cliente" value="<?= $_POST['cliente'] ?>">

                <h3>Produtos:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Selecionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($produtos as $produto) {
                            echo "<tr>
                            <td>{$produto['id']}</td>
                            <td>{$produto['nome']}</td>
                            <td>{$produto['descricao']}</td>
                            <td>{$produto['preco']}</td>
                            <td><input type='number' name='quantidade[{$produto['id']}]' value='1' min='1'></td>
                            <td><input type='checkbox' name='carrinho[]' value='{$produto['id']}'></td>
                        </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if($cliente->carteira)
                {
                    ?><div class="form-check mb-3"><input type="checkbox" name="avista" id="avista" checked class="form-check-input"><label for="avista" class="form-check-label">À vista</label></div><?php
                }
                else
                {
                    ?><div class="form-check mb-3"><input type="checkbox" name="avista" id="avista" checked disabled class="form-check-input"><label for="avista" class="form-check-label">À vista</label><input type="hidden" name="avista" value="on"></div><?php
                }
                ?>

                <input type="submit" value="Concluir Compra" name="concluir" class="btn btn-danger">
            </fieldset>
        </form>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>
<?php R::close(); ?>