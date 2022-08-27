<?php
session_start();
include('connection.php');
if (empty($_POST['usuario']) and empty($_POST['senha']) and $_POST['tipo_usuario'] == 0) {
	header('Location: login.php');
	exit;
}
if ($_POST['tipo_usuario'] == 0) {
	$_SESSION['nao_selecionado'] = true;
	header('Location: loginForm.php');
	exit;
}
if (empty($_POST['usuario']) or empty($_POST['senha'])) {
	$_SESSION['nao_selecionado'] = true;
	header('Location: loginForm.php');
	exit;
}
if (isset($_POST['usuario']) and isset($_POST['senha']) and $_POST['tipo_usuario'] == 0) {
	$_SESSION['nao_selecionado'] = true;
	header('Location: loginForm.php');
	exit;
}
if ($_POST['tipo_usuario'] == 1) {
	$usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senha = md5($_POST['senha']);
	$tipo_usuario = $_POST["tipo_usuario"];
	$sql = "select A.id, A.nome_usuario, A.senha, A.id_usuario_login, A.foto, B.nome from usuario A join login B on(A.id_usuario_login = B.id_tipo_usuario) where nome_usuario='$usuario' and id_usuario_login='$tipo_usuario' and senha='$senha' limit 1";
	$result = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_assoc($result);
	if (empty($resultado)) {
		$_SESSION['nao_registrado'] = true;
		header('Location: login.php');
	} elseif (isset($resultado)) {
		$_SESSION['usuario'] = true;
		$_SESSION['ID'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome_usuario'];
		$_SESSION['usuarioSenha'] = $resultado['senha'];
		$_SESSION['usuarioFoto'] = $resultado['foto'];
		header('Location:perfil.php');
	}
} elseif ($_POST['tipo_usuario'] == 2) {
	$usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senha = md5($_POST['senha']);
	$tipo_usuario = $_POST["tipo_usuario"];
	$sql = "select A.id, A.nome_usuario, A.senha, A.id_usuario_login, A.foto B.nome from usuario A join login B on(A.id_usuario_login = B.id_tipo_usuario) where nome_usuario='$usuario' and id_usuario_login='$tipo_usuario' and senha='$senha' limit 1";
	$result = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_assoc($result);
	if (empty($resultado)) {
		$_SESSION['nao_registrado'] = true;
		header('Location: login.php');
	} elseif (isset($resultado)) {
		$_SESSION['usuario'] = true;
		$_SESSION['ID'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome_usuario'];
		$_SESSION['usuarioSenha'] = $resultado['senha'];
		$_SESSION['usuarioFoto'] = $resultado['foto'];
		header('Location:perfil.php');
	}
} elseif ($_POST['tipo_usuario'] == 3) {
	$usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$tipo_usuario = $_POST["tipo_usuario"];
	$sql = "select A.nome_usuario, A.senha, A.id_usuario_login, B.nome from usuario A join login B on(A.id_usuario_login = B.id_tipo_usuario) where nome_usuario='$usuario' and id_usuario_login='$tipo_usuario' and senha='$senha' limit 1";
	$result = mysqli_query($conexao, $sql);
	$resultado = mysqli_fetch_assoc($result);
	if (empty($resultado)) {
		header('Location: login.php');
	} elseif (isset($resultado)) {
		$_SESSION['usuario'] = true;
		$_SESSION['ID'] = $resultado['id'];
		$_SESSION['usuarioNome'] = $resultado['nome_usuario'];
		$_SESSION['usuarioSenha'] = $resultado['senha'];
		header('Location:selecione_usuario.php');
	}
}
