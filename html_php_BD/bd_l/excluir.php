<?php
session_start();
include("connection.php");
$id = $_GET["id"];
if (mysqli_query($conexao , "delete from usuario where id='$id'"))
{
$_SESSION['excluir'] = true;
header('Location: irlistar.php');
exit;

}
else
{
echo mysqli_error();
exit;
}
