<!-- Conexão Start -->
<?php
session_start();

$id = $_SESSION['ID'];
$usuario = $_SESSION["usuarioNome"];
$_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
    header("Location: bd_l/login.php");
    exit;
} else {
}
?>

<!-- Conexão -->

<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width" />
    <title> Formulário de Ajuda </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/header_c.css" />
    <link rel="stylesheet" href="../css/corpo_c.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="icon" href="../img/Logo_Musica4.png" />
</head>

<body>
    <header>
        <h1>
            <div id="fig-logo">
                <img id="logo" src="../img/Logo_Musica3.png" alt="Logo do Site" />
            </div>
            <?php
            include("bd_l/connection.php");
            $sql = mysqli_query($conexao, "SELECT foto FROM usuario WHERE id='$id'");

            // Exibe as informações de cada usuário
            while ($imagem = mysqli_fetch_object($sql)) {

                // Exibimos a foto
                echo " <div class='menu'> <li> <a href='bd_l/perfil.php'> <img id='Logo_Click' src='../img/" . $imagem->foto . "'/> </a> <ul> <li> <a id='botao_seleciona' href='bd_l/sair.php'> Sair </a> </li> </ul> </li> </div>";
            }
            ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#botao_seleciona").mouseenter(function(e) {
                        $("#Logo_Click").css('opacity', '0.1');
                    });
                    $("#botao_seleciona").mouseleave(function(e) {
                        $("#Logo_Click").mouseenter(function(e) {
                            $("#Logo_Click").css('opacity', '0.1');
                        });
                        $("#Logo_Click").mouseleave(function(e) {
                            $("#Logo_Click").css('opacity', '1');
                        });

                    });
                });
            </script>
        </h1>
        <nav>
            <ul>
                <li id="index"><a href="inicio.php">Página Inicial</a></li>
                <li id="faq"><a href="faq.php">FAQ</a></li>
                <li id="aboutus"><a href="sobre.php">Sobre Nós</a></li>
                <li id="help"><a href="ajuda.php">Ajuda</a></li>
                <li>
                    <input type="search" value="Pesquisar" />
                    <button type="submit" value="Buscar">Buscar</button>
                </li>
            </ul>
        </nav>
    </header>

    <section class="formulario">
        <div>
            <input type="text" name="e-mail" value="e-mail" />
            <hr />
            <textarea value="questao">

            </textarea>
            <button type="submit" value="Enviar">Enviar Questão</button>
        </div>
    </section>

    <footer>
        <h1><img src="../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Ghuilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>