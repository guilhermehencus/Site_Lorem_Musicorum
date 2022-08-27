<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
session_start();
include("bd_l/connection.php");
$id = $_SESSION['ID'];
$usuario = $_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
$_SESSION['usuarioFoto'];
if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
    header("Location: bd_l/login.php");
    exit;
} else {

?>

    <!DOCTYPE html>

    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="../js/javascript_busca.js"></script>

        <title> In�cio </title>
        <link rel="stylesheet" href="../css/header.css" />
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

                // Exibe as informa��es de cada usu�rio
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
            <!-- -->
            <nav>
                <ul>
                    <li id="index"><a href="inicio.php">P�gina Inicial</a></li>
                    <li id="faq"><a href="faq.php">FAQ</a></li>
                    <li id="aboutus"><a href="sobre.php">Sobre N�s</a></li>
                    <li id="help"><a href="ajuda.php">Ajuda</a></li>
                    <form method="POST" id="pesquisar_curso" autocomplete="off" action="bd_l/valida_busca.php">
                        <li><input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar">
                            <button type="submit" value="Buscar" class="botao_pesquisa">Buscar</button>
                        </li>
                    </form>
                    <ul class="resultado_pesquisa">

                    </ul>

                </ul>
            </nav>
            <!-- -->
        </header>

        <!-- Corpo -->
        <section class="corpo">
            <h2> Clique em um de nossos bot�es abaixo para come�ar.</h2>
            <!-- Menu Lateral -->
            <div class="lateral">
                <h2>Pesquisa R�pida</h2>
                <ul class="menu-lateral">
                    <li>
                        Curso de M�sica: O B�sico
                        <ul>
                            <li><a href="curso.html#o-que-e">O que � M�sica?</a></li>
                            <li><a href="curso.html#como-surgiu">Como Surgiram as Notas Que Conhecemos Hoje?</a></li>
                            <li><a href="curso.html#xx-xxi">S�c. XX e XXI</a></li>
                            <li><a href="curso.html#nocoes">No��es B�sicas</a></li>
                            <li><a href="curso.html#leitura">Come�ando a Leitura</a></li>
                            <li><a href="curso.html#exercitando">Exercitando a Leitura</a></li>
                        </ul>
                    </li>
                    <li><a href="./cuso/video/video.html">Videoaulas</a></li>
                    <li><a href="radio.html">R�dio Online</a></li>
                </ul>
            </div>
            <!-- End Menu Lateral -->
            <!-- Conteudo -->
            <div class="conteudo">
                <ul class="botoes">
                    <li>
                        <figure>
                            <a href="curso.html">
                                <img src="../img/botao-curso.jpg" alt="Curso de M�sica" /></a>
                            <figcaption>Curso de M�sica</figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <a href="radio.html">
                                <img src="../img/botao-radio.jpg" alt="R�dio Online" /></a>
                            <figcaption>R�dio Online</figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <a href="./cuso/video/video.html">
                                <img src="../img/botao-videoaula.jpg" alt="Videoaulas" /></a>
                            <figcaption>Videoaulas</figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure>
                            <a href="share.html">
                                <img src="../img/botao-share.jpg" alt="Compartilhe Suas Cria��es" /></a>
                            <figcaption>Compartilhe Suas Cria��es</figcaption>
                        </figure>
                    </li>
                </ul>
            </div>
            <!-- End Conteudo -->
        </section>
        <!-- End Corpo -->

        <footer>
            <h1><img src="../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
            &copy; Andr� Haine Santos & Ghuilherme Henrique Guimar�es Cust�dio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
        </footer>
    </body>

    </html>
<?php } ?>