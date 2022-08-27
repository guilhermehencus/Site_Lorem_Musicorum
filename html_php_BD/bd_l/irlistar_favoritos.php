<?php
session_start();
include("connection.php");
$id = $_SESSION['ID'];
$usuario = $_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
$_SESSION['usuarioFoto'];

if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
    header("Location: login.php");
    exit;
} else {
}
?>
<?php
include("connection.php");
?>
<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title> Favoritos </title>
    <link rel="stylesheet" href="../../css/header_c.css" />
    <link rel="stylesheet" href="../../css/footer.css" />
    <link rel="stylesheet" href="../../css/header_favoritos.css" />
</head>

<body>
    <header>

        <h1>
            <div id="fig-logo">
                <img id="logo" src="../../img/Logo_Musica3.png" alt="Logo do Site" />
            </div>
            <?php
            include("connection.php");
            $sql = mysqli_query($conexao, "SELECT foto FROM usuario WHERE id='$id'");

            // Exibe as informações de cada usuário
            while ($imagem = mysqli_fetch_object($sql)) {

                // Exibimos a foto
                echo " <div class='menu'> <li> <a href='perfil.php'> <img id='Logo_Click' src='../../img/" . $imagem->foto . "'/> </a> <ul> <li> <a id='botao_seleciona' href='sair.php'> Sair </a> </li> </ul> </li> </div>";
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

        <!-- -->
    </header>
    <div class="container">
        <h2> Seus Links Salvos </h2>
        <span id="conteudo"></span>
    </div>
    <script type="text/javascript">
        var id = <?php echo $id ?>;
        var quantidade_pg = 4;
        var pagina = 1;
        $(document).ready(function() {
            pagina_favorito(pagina, quantidade_pg)
        });
        /*  função para gerar a página */
        /* declarar função */
        function pagina_favorito(pagina, quantidade_pg) {
            var dados = {
                pagina: pagina,
                quantidade_pg: quantidade_pg,
                id: id
            }

            $.post('favoritos_listar.php', dados, function(retorna) {
                $("#conteudo").html(retorna);
            });
        }
    </script>
    <a href="perfil.php" class="volta"> Voltar</a>


    <br>
    <br>
    <BR>
    <BR>


    <footer>
        <h1><img src="../../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Guilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>