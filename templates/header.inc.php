<h2>DevWeb2023</h2>

<?php
    require_once dirname(__DIR__) . '/classes/util.class.php';

    if(Util::logged()){
        switch($_SESSION['perfil']){
            case 1:
                ?>
                <details>
                    <summary>Cadastros</summary>
                    <a href="#">Cadastro de Usuários</a><br>
                    <a href="#">Cadastro de Perfis</a><br>
                    <a href="#">Cadastro de Notícias</a>
                </details>

                <details>
                    <summary>Relatórios</summary>
                    <a href="#">Relatório de Usuários</a>
                    <a href="#">Relatório de Perfis</a>
                </details>
                <?php
        }
    }
    else {
        ?>
        <a href="login.php">Fazer Login</a>
        <?php
    }
?>