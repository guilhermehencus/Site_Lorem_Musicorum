<?php
session_start();
$_SESSION['tipousuario'];
if (!isset($_SESSION['tipousuario'])) {
    header("Location: login.php");
    exit;
} elseif ($_SESSION['tipousuario'] == 1) {
    # code...


?>
    <!DOCTYPE html>
    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <html>

    <head>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h2> Listagem de Usuário do Site "" </h2>
            <span id="conteudo"></span>
        </div>
        <script type="text/javascript">
            var quantidade_pg = 8;
            var pagina = 1;
            $(document).ready(function() {
                pagina_aluno(pagina, quantidade_pg)
            });
            /*  função para gerar a página */
            /* declarar função */
            function pagina_aluno(pagina, quantidade_pg) {
                var dados = {
                    pagina: pagina,
                    quantidade_pg: quantidade_pg
                }
                $.post('aluno_listar.php', dados, function(retorna) {
                    $("#conteudo").html(retorna);
                });
            }
        </script>



    </body>

    </html>
<?php } ?>
<?php $_SESSION['tipousuario'];
if (!isset($_SESSION['tipousuario'])) {
    header("Location: login.php");
    exit;
} elseif ($_SESSION['tipousuario'] == 2) {



?>
    <!DOCTYPE html>
    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <html>

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <h2> Listagem de Usuário do Site "" </h2>
            <span id="conteudo"></span>
        </div>
        <script type="text/javascript">
            var quantidade_pg = 8;
            var pagina = 1;
            $(document).ready(function() {
                pagina_professor(pagina, quantidade_pg)
            });
            /*  função para gerar a página */
            /* declarar função */
            function pagina_professor(pagina, quantidade_pg) {
                var dados = {
                    pagina: pagina,
                    quantidade_pg: quantidade_pg
                }
                $.post('professor_listar.php', dados, function(retorna) {
                    $("#conteudo").html(retorna);
                });
            }
        </script>



    </body>

    </html>

<?php }
