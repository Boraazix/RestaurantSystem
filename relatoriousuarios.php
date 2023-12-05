<?php
require_once 'classes/util.class.php';
require_once 'classes/usuarioservices.class.php';
require_once 'classes/perfilservices.class.php';
if(!Util::logged())
{
    header('Location:login.php');
} 
if($_SESSION['perfil']>2) // ADM e Gerente podem
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
    <title>Sistema do Restaurante</title>
</head>

<body>
    <header>
        <?php include 'templates/header.inc.php' ?>
    </header>

    <main>
        <h1>Relatório de Usuários</h1>

        <table>
            <thead>
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
        
    </main>

    <footer>
        <?php include 'templates/footer.inc.php' ?>
    </footer>
</body>

</html>