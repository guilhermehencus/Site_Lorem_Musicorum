<?php
session_start();
include('connection.php');
$pesquisar = $_POST["pesquisar"];
$pesquisar_result = "SELECT * FROM pagina_curso where nome like '%$pesquisar%'";
$pesquisar_resultado = mysqli_query($conexao, $pesquisar_result);
if (mysqli_num_rows($pesquisar_resultado) <= 0) {
	echo "<a href=''> Nenhum link encontrado <a>";
} else {
	while ($rows = mysqli_fetch_assoc($pesquisar_resultado)) {
		echo "<a href='bd_l/busca.php?id=" . $rows['id_curso'] . "'> " . $rows['nome'] . " </a>";
	}
}
