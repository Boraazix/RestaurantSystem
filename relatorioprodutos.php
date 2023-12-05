<?php
require_once 'classes/util.class.php';
require_once 'classes/produtoservices.class.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Relatório de Produtos</h1>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $produtos = ProdutoServices::buscarTodosCrescente();

                foreach($produtos as $produto)
                {
                    $str='<tr>';
                    $str.= "<td>$produto->id</td>";
                    $str.= "<td>$produto->nome</td>";
                    $str.= "<td>$produto->descricao</td>";
                    $str.= "<td>$produto->preco</td>";
                    echo $str . '</tr>';
                }
                ?>
            </tbody>
        </table>
        
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>