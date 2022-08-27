<?php
session_start();
include('connection.php');
$_SESSION['ID'];
$_SESSION["usuarioNome"];
$_SESSION["usuarioSenha"];
if (!isset($_SESSION["usuarioNome"]) || !isset($_SESSION["usuarioSenha"])) {
	header("Location: login.php");
	exit;
} else {
}
include("connection.php");
$pagina = filter_input(INPUT_POST, "pagina", FILTER_SANITIZE_NUMBER_INT);
$quantidade_pg = filter_input(INPUT_POST, "quantidade_pg", FILTER_SANITIZE_NUMBER_INT);
/* calculo da inicialização */
$inicial = ($pagina * $quantidade_pg) - $quantidade_pg;
$result_c = "select*from usuario where id_usuario_login=2 order by nome LIMIT $inicial, $quantidade_pg ";
$resultado_c = mysqli_query($conexao, $result_c);
if (($resultado_c) and ($resultado_c->num_rows != 0)) {
?>

	<head>
		<link rel="stylesheet" href="../../css/administrador_c.css" />
	</head>
	<?php

	if (isset($_SESSION['excluir'])) :
	?>
		<div id="excluido">
			<p> Excluido com Sucesso</p>
		</div>
	<?php
	endif;
	unset($_SESSION['excluir']);
	?>
	<table class="table table-bordered table-striped table-hover">
		<thead class="thead-dark">
			<tr>
				<th>Nome</th>
				<th>Usuário</th>
				<th>Email</th>
				<th>Data_Cadastro</th>
				<th>Data_Nascimento</th>
				<th>Tipo de Usuario</th>
				<th> Excluir</th>

			</tr>
		</thead>
		<tbody>
			<a href="selecione_usuario.php" class="volta"> Voltar</a>
			<?php
			while ($row_cliente = mysqli_fetch_assoc($resultado_c)) {
			?>
				<tr>
					<td><?php echo $row_cliente['nome']; ?></td>
					<td><?php echo $row_cliente['nome_usuario']; ?></td>
					<td><?php echo $row_cliente['email']; ?></td>
					<td><?php echo date('d-m-Y', strtotime($row_cliente['data_cadastro'])); ?></td>
					<td><?php echo date('d-m-Y', strtotime($row_cliente['data_nascimento'])); ?></td>
					<td><?php if ($row_cliente['id_usuario_login'] == 1) {
							echo "Aluno";
						} elseif ($row_cliente['id_usuario_login'] == 2) {
							echo "Professor";
						}
						if ($row_cliente['id_usuario_login'] == 3) {
							echo "Administrador";
						} ?></td>
					<td> <?php if ($row_cliente['id_usuario_login'] == 1 or $row_cliente['id_usuario_login'] == 2) {
								echo " <br> <a href='excluir.php?id=" . $row_cliente['id'] . "'> Excluir </a>";
							}  ?> </td>

				</tr>

			<?php
			} ?>
		</tbody>
	</table>
<?php
	$result_pg = "SELECT count(id) as 'total'FROM usuario where id_usuario_login=2";
	$resultado_pg = mysqli_query($conexao, $result_pg);
	$resultado = mysqli_fetch_assoc($resultado_pg);
	/* pegar quantidade de página  ceil= arredondamento*/
	$count = $resultado['total'];
	$row_g = $count / $quantidade_pg;
	$row_result_pg = ceil($row_g);
	/* limitar página antes */
	$max_links = 2;
	echo '<nav aria-label="Pag">';
	echo ' <ul class="pagination"> ';
	echo ' <li class="page-item"> ';
	echo "<span class='page-link'> <a href='#' onclick='pagina_professor(1, $quantidade_pg)' >  Primeiro</a> </span>";
	echo '</li>';
	for ($pagina_ant = $pagina - 1; $pagina_ant <= $pagina - $max_links; $pagina_ant++) {
		if ($pagina_ant >= 1) {
			echo " <li class='page-item'> <a class='page-link' href='#' onclick='pagina_aluno($pagina_ant, $quantidade_pg)' > $pagina_ant </a> </li>";
		}
	}
	echo '<li class="page-item active">';
	echo ' <span class="page-link"> ';
	echo "$pagina";
	echo '</span>';
	echo '</li>';
	for ($pagina_dep = $pagina + 1; $pagina_dep <= $pagina + $max_links; $pagina_dep++) {
		if ($pagina_dep <= $row_result_pg) {
			echo "<li class='page-item'> <a class='page-link' href='#' onclick='pagina_professor($pagina_dep, $quantidade_pg)' > $pagina_dep </a> </li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='pagina_professor(3, $quantidade_pg)'>Última</a></span>";
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
} else {
	echo "Nenhum cliente encontrado";
}
