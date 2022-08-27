<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width" />
    <title> Login </title>
    <link rel="stylesheet" href="../../css/header_c.css" />
    <link rel="stylesheet" href="../../css/footer.css" />
    <link rel="stylesheet" href="../../css/login.css" />
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

        <?php
        if (isset($_SESSION['nao_registrado'])) :
        ?>
            <div id="erro">
                <p> Erro, usuário errado ou senha errado</p>
            </div>
        <?php
        endif;
        unset($_SESSION['nao_registrado']);
        ?>
        <?php
        if (isset($_SESSION['nao_selecionado'])) :
        ?>
            <div id="erro_selecionado">
                <p> Erro, selecione o tipo de usuário corretamente ou preencha o campo!!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['nao_selecionado']);
        ?>

        <!-- -->
    </header>
    <section>
        <form action="login_connection.php" method="POST" class="Login" autocomplete="off">
            <h1> Login </h1>
            <input type="text" name="usuario" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <br>
            <select name="tipo_usuario">
                <option> Selecione</option>
                <?php
                $result_tipo_usuario = "SELECT * FROM login";
                $resultado_tipo_usuario = mysqli_query($conexao, $result_tipo_usuario);
                while ($row_tipo_usuario = mysqli_fetch_assoc($resultado_tipo_usuario)) { ?>
                    <option value="<?php echo $row_tipo_usuario['id_tipo_usuario']; ?>"><?php echo $row_tipo_usuario['nome']; ?></option> <?php
                                                                                                                                        }
                                                                                                                                            ?>
            </select><br><br>
            <input type="submit" value="Login"> <a id="cadastro" href="cadastro.php">Cadastra-se</a>
        </form>
    </section>
    <footer id="rodape">
        <h1><img src="../../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Guilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>