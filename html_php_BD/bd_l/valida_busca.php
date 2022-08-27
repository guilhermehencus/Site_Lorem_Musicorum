<?php
session_start();
include('connection.php');
if (empty($_POST['pesquisar'])) {
	header('Location:../inicio.php');
	exit;
}
$pesquisar = $_POST["pesquisar"];
if ($pesquisar == "Inicio Curso") {
	header('Location:../curso/curso.php');
	exit;
}
if ($pesquisar == "Introdução") {
	header('Location:../curso/introducao.php');
	exit;
}
if ($pesquisar == "Leitura 1") {
	header('Location:../curso/introducao.php');
	exit;
} else {
	header('Location:../inicio.php');
}
