<?php
session_start();
include("connection.php");
$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$email = $_POST["email"];
$date = $_POST["data_nascimento"];
$senha = md5($_POST["senha"]);
$tipo_usuario = $_POST["tipo_usuario"];

$sql = "select count(*) as total from usuario where nome_usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$date_hoje = strtotime(date("Y-m-d"));
$date_verifica = strtotime(date($date));
if ($date_verifica == $date_hoje) {
	$_SESSION['data_hoje'] = true;
	header('Location: cadastro.php');
	exit;
}
if ($date_verifica > $date_hoje) {
	$_SESSION['data_futuro'] = true;
	header('Location: cadastro.php');
	exit;
}
if ($tipo_usuario == 1) {

	$date_verifica_2 = strtotime(date("1980-09-13")); /* condição de idade mínima */
	$date_2 = $date_hoje - $date_verifica_2;
} else {
	$date_verifica_2 = strtotime(date("1999-09-22"));
	$date_2 = $date_hoje - $date_verifica_2;
}
if ($date_2 < $date_verifica) {
	$_SESSION['idade_nao_suficiente'] = true;
	header('Location: cadastro.php');
	exit;
} else {
	$date_hoje_2 = strtotime(date("Y-m-d"));
	$date_verifica_3 = strtotime(date("2030-09-13"));
	$date_2 = $date_hoje_2 - $date_verifica_3; /* pessoas cadastrar no ano de 1921 para cima */
	if ($date_2 > $date_verifica) {
		$_SESSION['data_passado'] = true;
		header('Location: cadastro.php');
		exit;
	}
}


$sql = "INSERT INTO usuario (nome, nome_usuario, email, senha, data_cadastro, data_nascimento,  id_usuario_login, foto) VALUES ('$nome','$usuario', '$email','$senha', NOW(), '$date' , '$tipo_usuario', 'User_Profile_Default.png')";
if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}
$conexao->close();
header('Location: cadastro.php');
exit;
?>
/* Sobre o funcionamento de data
$date_hoje = strtotime(date("2019-10-17"));
$date_verifica = strtotime(date("2007-09-13"));
$date_verifica_2 = strtotime(date("1980-09-13"));
$date_2=$date_hoje-$date_verifica_2;
echo date('Y/m/d',$date_2); /* 2009/02/03 */
if ($date_2<$date_verifica) { echo "insucesso" ; } else { echo "sucesso" ; } ?> */