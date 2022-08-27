<?php
session_start();
include('connection.php');
$tipo_usuario = $_POST["tipo_usuario"];
if ($_POST['tipo_usuario'] == 1 or $_POST['tipo_usuario'] == 2) {
	$sql = "SELECT* from usuario where id_usuario_login='$tipo_usuario'";
	$result = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_assoc($result);
	$_SESSION['tipousuario'] = $resultado['id_usuario_login'];
	header('Location:irlistar.php');
}
