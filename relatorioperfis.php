<?php
require_once 'classes/r.class.php';
require_once 'classes/util.class.php';
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
        <h1>Relatório de Perfis</h1>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $perfis = PerfilServices::buscarTodos();

                foreach($perfis as $perfil)
                {
                    $str='<tr>';
                    $str.= "<td>$perfil->id</td>";
                    $str.= "<td>$perfil->nome</td>";
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
<?php R::close(); ?>