<?php
require_once 'classes/util.class.php';
require_once 'classes/usuarioservices.class.php';
require_once 'classes/perfilservices.class.php';
if (!Util::logged()) {
    header('Location:login.php');
}
if ($_SESSION['perfil'] > 2) // ADM e Gerente podem
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1 class="mt-4 mb-4">Relatório de Usuários</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nascimento</th>
                        <th>Perfil</th>
                        <th>Carteira</th>
                        <th>Ativo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios = UsuarioServices::buscarTodos();
                    foreach ($usuarios as $usuario) {
                        $str = "<tr>";

                        $str .= "<td>$usuario->id</td>";
                        $str .= "<td>$usuario->nome</td>";
                        $str .= "<td>$usuario->email</td>";
                        $str .= "<td>" . date('d/m/Y', strtotime($usuario->nascimento)) . "</td>";
                        $str .= "<td>" . PerfilServices::buscarPorId($usuario->perfil)->nome . "</td>";
                        $str .= "<td " . ($usuario->carteira ? 'style="color:green">Sim' : 'style="color:red">Não') . "</td>";
                        $str .= "<td " . ($usuario->ativo ? 'style="color:green">Sim' : 'style="color:red">Não') . "</td>";

                        echo $str . "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>