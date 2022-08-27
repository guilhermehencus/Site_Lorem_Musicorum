<?php
header("Content-Type: text/html; charset=ISO-8859-1", true);
include("connection.php");
session_start();
$_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
    header("Location: login.php");
    exit;
} else {
}
?>

<!DOCTYPE html>
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/selecione_usuario_c.css" />
</head>

<body>
    <form method="POST" action="verificar_usuario_selecionado.php" class="editar">
        <h3> Escolha o Tipo de Cliente</h3>
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
        <input type="submit" value="Confirmar"> <a id="sair" href="sair.php"> Sair </a>
    </form>

</body>

</html>