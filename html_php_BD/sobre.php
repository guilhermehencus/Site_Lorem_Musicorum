<!-- Conexão Start -->
<?php
session_start();
$id = $_SESSION['ID'];
$usuario = $_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
$_SESSION['usuarioFoto'];
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
    <meta charset="utf-8" name="viewport" content="width=device-width" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title> Sobre Nós </title>
    <link rel="stylesheet" href="../css/header_c.css" />
    <link rel="stylesheet" href="../css/sobre_c.css" />
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
        <!-- -->
        <nav>
            <ul>
                <li id="index"><a href="inicio.php">Página Inicial</a></li>
                <li id="faq"><a href="faq.php">FAQ</a></li>
                <li id="aboutus"><a href="sobre.php">Sobre Nós</a></li>
                <li id="help"><a href="ajuda.php">Ajuda</a></li>
                <li><input type="search" value="Pesquisar" />
                    <button type="submit" value="Buscar">Buscar</button>
                </li>
            </ul>
        </nav>
    </header>

    <div class="conteudo">
        <article>
            <h1>Sobre Nós</h1>

            <h2>Nosso Site</h2>

            <p>
                Nossa filosofia é sempre mostrar o que temos de melhor para nossos usuários, tanto em nosso curso como
                como em nossa <a href="radio.php">rádio online</a>, assim como também não iremos de maneira alguma fornecer material falso ou enganoso
                em nosso curso, videoaulas ou em nossa rádio. Muitop do que se vê na intenet pode ser considerado como bom
                material e até mesmo alguns podem ser confiáveis, mas nós não queremos que material falso ou enganoso seja
                divulgado, pois a intenet é livre e não há nenhuma fiscalização tão profunda com relação ao conteúdo didático,
                ou seja, todos podem ter acesso a material didático que não está total de acordo com a matéria ou esteja até
                mesmo totalmente errado.
            </p>
            <p>
                O <a href="./cuso/curso.php">curso de música</a> é <strong>100% gratuito</strong> e não temos a intenção
                de formar profissionais em música. Nosso curso apenas guia para que as pessoas não caiam em sites que disponibilizam
                material didático que não esteja de acordo com a matéria e para que saibam o que está certo e o que está errado
                na internet. Todo o nosso conteúdo é verificado por um profissional da área antes de ser postado no site.
            </p>
            <p>
                A rádio foi feita com o intuito de servir como rádio para exibir as músicas criadas pelos nosso usuários e
                servir como uma rádio normal, onde as pessoas podem ouvir música quando entediadas ou ouvir para relaxar e
                dormir. Muitos estudos foram feitos ao longo dos anos e foi comprovado que a música pode influênciar nosso
                sistema nervoso, o que prova que muitas pessoas quando sentem vontade de dançar ao ouvir uma música é porque
                a música provoca essa sensação na pessoa, assim como as músicas de trilhas sonoras em filmes podem trazer a
                sensação se suspence, tristeza, conforto ou outra sensação que o roteirista que causar em determinada cena.
                Baseando nesses estudos, a nossa rádio tem músicas próprias para trazer esses tipos de sensações em nossos
                ouvintes, e queremos que tenham a melhor e mais agradável experiência possível ao ouvir nossa rádio.
            </p>
            <p>
                Todas as cifras, tablaturas, partituras e videoaulas de nosso site são para usuários que buscam estudar
                determinada música ou buscam tocar a música completa de forma correta ou tocar por diversão em uma roda de amigos
                e os impressionar, aprender a tocar uma música considerada como difícil, ou até mesmo pelo simples bem estar
                em tocar sozinho no tempo de lazer. Todas as músicas que temos a cifra, tablatura ou partitura disponível em nosso
                site estão escritas de forma com que o resultado final chegue o mais próximo da obra original, e todas as
                músicas de nosso site são de domínio público ou autorizadas pelo compositor e interprete da obra.
            </p>
        </article>
    </div>

    <footer>
        <h1><img src="../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Ghuilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>