<?php
session_start();
include("connection.php");
if (!isset($_POST["senha"]) or !isset($_POST["senha_confirma"]) or isset($_POST["id"]) ) {
header('Location: perfil.php');
exit;
}
$id=$_POST["id"];
$senha=md5($_POST["senha"]);
$senha_confirmar=md5($_POST["senha_confirma"]);
if ($senha!=$senha_confirmar) {
	$_SESSION['senha_diferente'] = true;
	header('Location: perfil.php');
}
$result_usuario="update usuario set senha='$senha' where id='$id'";
$resultado_usuario=mysqli_query($conexao, $result_usuario);
if (mysqli_affected_rows($conexao)) {
	$_SESSION['senha_alterado'] = true;
	header('Location: perfil.php');
	exit;
}
