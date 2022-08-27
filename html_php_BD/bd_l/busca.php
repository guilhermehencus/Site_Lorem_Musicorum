<?php
session_start();
include('connection.php');
$id = $_GET["id"];
if ($id==1) {
	header('Location:../curso/curso.php');
	exit;
}
if ($id==2) {
	header('Location:../curso/introducao.php');
	exit;
}
if ($id==3) {
	header('Location:../curso/introducao.php');
	exit;
}
else {
	header('Location:../inicio.php');
}
