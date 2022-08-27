<?php
session_start();
include('connection.php');
if (!isset($_POST["favorito"])) {
  header('Location:perfil.php');
}
$id = $_POST["id"];
$sql = "select count(B.nome) as 'total' from favoritos B join usuario A on(A.id = B.id_favoritos_usuario) where B.id_favoritos_usuario= '$id'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] != 0) {
  $resultado_B = "select id_favoritos_usuario from favoritos where id_favoritos_usuario= '$id'";
  $result_b = mysqli_query($conexao, $resultado_B);
  $r = mysqli_fetch_assoc($result_b);
  $_SESSION['id_favorito'] = $r['id_favoritos_usuario'];
  header('Location:irlistar_favoritos.php');
} else {
  header('Location:perfil.php');
}
