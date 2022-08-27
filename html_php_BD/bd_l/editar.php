<?php
session_start();
include("connection.php");
$id = $_POST["id"];
$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$tipo_usuario = $_POST["tipo_usuario"];
$sql = "select count(*) as total from usuario where nome_usuario = '$usuario' and nome= '$nome' and email='$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1) {
	header('Location: perfil.php');
	exit;
}
$result_usuario = "update usuario set nome='$nome'  where id='$id'";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
if ($resultado_usuario == true) {
	$result_usuario_2 = "update usuario set nome_usuario='$usuario' where id='$id'";
	$resultado_usuario_2 = mysqli_query($conexao, $result_usuario_2);
	if ($resultado_usuario_2 == true) {
		$result_usuario_3 = "update usuario set email='$email' where id='$id'";
		$resultado_usuario_3 = mysqli_query($conexao, $result_usuario_3);
		if ($resultado_usuario_3 == true) {
			$_SESSION['alterado'] = true;
			header('Location: perfil.php');
			exit;
		}
	}
} else {
	header('Location: perfil.php');
	exit;
}
