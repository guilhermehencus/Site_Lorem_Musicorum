<?php
session_start();
?>
<?php
include("connection.php");
?>
<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width" />
    <title> Cadastro </title>
    <link rel="stylesheet" href="../../css/header_c.css" />
    <link rel="stylesheet" href="../../css/footer.css" />
    <link rel="stylesheet" href="../../css/signin_c.css" />
</head>

<body>
    <header>
        <h1>
            <div id="fig-logo">
                <img id="logo" src="../../img/Logo_Musica3.png" alt="Logo do Site" />
            </div>
            <a id="login" href="login.php">Entre ou Cadastre-se</a>
        </h1>
        <!-- -->
        <nav>
            <ul>
                <li id="index"><a href="../inicio.php">Página Inicial</a></li>
                <li id="faq"><a href="../faq.php">FAQ</a></li>
                <li id="aboutus"><a href="../sobre.php">Sobre Nós</a></li>
                <li id="help"><a href="../ajuda.php">Ajuda</a></li>
                <li><input type="search" value="Pesquisar" />
                    <button type="submit" value="Buscar">Buscar</button>
                </li>
            </ul>
        </nav>
        <!-- -->
    </header>
    <?php
    if (isset($_SESSION['usuario_existe'])) :
    ?>
        <div class="insucesso">
            <p> Desculpe, mas esse usuário já cadastrou-se </p>
        </div>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
    <?php
    if (isset($_SESSION['status_cadastro'])) :
    ?>
        <div id="sucesso">
            <p> Cadastro efetuado com sucesso <br> Agora faça o seu <a href="Login.php" class="botao">login </a> no link !!!!</p>

        </div>
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>
    <?php
    if (isset($_SESSION['data_hoje'])) :
    ?>
        <div class="insucesso">
            <p> Você não pode cadastar-se com a data de hoje!!</p>
        </div>
    <?php
    endif;
    unset($_SESSION['data_hoje']);
    ?>
    <?php
    if (isset($_SESSION['data_futuro'])) :
    ?>
        <div class="insucesso">
            <p> Você não pode cadastar-se com uma data futura!!</p>
        </div>
    <?php
    endif;
    unset($_SESSION['data_futuro']);
    ?>
    <?php
    if (isset($_SESSION['idade_nao_suficiente'])) :
    ?>
        <div class="insucesso">
            <p> Você precisa ter uma idade minima para se inscrever</p>
        </div>
    <?php
    endif;
    unset($_SESSION['idade_nao_suficiente']);
    ?>
    <?php
    if (isset($_SESSION['data_passado'])) :
    ?>
        <div class="insucesso">
            <p> Você não pode cadastar-se com uma data de nascimento exagerada</p>
        </div>
    <?php
    endif;
    unset($_SESSION['data_passado']);
    ?>
    <section>
        <form action="cadastrar.php" method="POST" class="Cadastro" autocomplete="off">
            <h1> Cadastro </h1>
            <input name="nome" type="text" placeholder="Nome">
            <input name="usuario" type="text" placeholder="Usuário">
            <input name="email" type="email" placeholder="Email">
            <input name="senha" type="password" placeholder="Senha">
            <input name="data_nascimento" type="date">
            <br>



            <select name="tipo_usuario">
                <option> Selecione</option>
                <?php
                $result_tipo_usuario = "SELECT* from login where nome='Aluno' or nome='Professor'";
                $resultado_tipo_usuario = mysqli_query($conexao, $result_tipo_usuario);
                while ($row_tipo_usuario = mysqli_fetch_assoc($resultado_tipo_usuario)) { ?>
                    <option value="<?php echo $row_tipo_usuario['id_tipo_usuario']; ?>"><?php echo $row_tipo_usuario['nome']; ?></option> <?php
                                                                                                                                        }
                                                                                                                                            ?>
            </select><br><br>
            <input type="submit" value="Continuar">
        </form>
    </section>
    <footer id="rodape">
        <h1><img src="../../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Guilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>