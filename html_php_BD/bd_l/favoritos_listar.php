<?php
session_start();
include('connection.php');
$pagina = $_POST["pagina"];
$quantidade_pg = $_POST["quantidade_pg"];
$id = $_POST["id"];
/* calculo da inicialização */
$inicial = ($pagina * $quantidade_pg) - $quantidade_pg;
$result_c = "select  B.nome,  B.data_favoritos, B.id_favoritos from favoritos B join usuario A  on(A.id = B.id_favoritos_usuario)  where id='$id' order by nome LIMIT $inicial, $quantidade_pg";
$resultado_c = mysqli_query($conexao, $result_c);
if (($resultado_c) and ($resultado_c->num_rows != 0)) {
?>

	<head>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
				<th>Seus Links</th>
				<th>Data De Adição</th>
				<th id="excluir"> Excluir Links </th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row_cliente = mysqli_fetch_assoc($resultado_c)) {
			?>
				<tr>
					<td><?php echo $row_cliente['nome']; ?></td>
					<td><?php echo $row_cliente['data_favoritos']; ?></td>
					<td>
						<form action='excluir_favoritos.php' method='POST' autocomplete='off'>
							<input type='hidden' name='id_favoritos' value="<?php echo $row_cliente['id_favoritos']; ?>" required />
							<input type='submit' value='Excluir'>
						</form>
					</td>
				</tr>

			<?php
			} ?>
		</tbody>
	</table>
	</div>
<?php
	$result_pg = "SELECT count(nome) as 'total'FROM favoritos where id_favoritos_usuario='$id'";
	$resultado_pg = mysqli_query($conexao, $result_pg);
	$resultado = mysqli_fetch_assoc($resultado_pg);
	$count = $resultado['total'];
	$row_g = $count / $quantidade_pg;
	$row_result_pg = ceil($row_g); /* pegar quantidade de página  ceil= arredondamento*/
	/* limitar página antes */
	$max_links = 2;
	echo '<nav aria-label="Pag">';
	echo ' <ul class="pagination"> ';
	echo ' <li class="page-item"> ';
	echo "<span class='page-link'> <a href='#' onclick='pagina_favorito(1, $quantidade_pg)' >  Primeiro</a> </span>";
	echo '</li>';
	for ($pagina_ant = $pagina - 1; $pagina_ant <= $pagina - $max_links; $pagina_ant++) {
		if ($pagina_ant >= 1) {
			echo " <li class='page-item'> <a class='page-link' href='#' onclick='pagina_favorito($pagina_ant, $quantidade_pg)' > $pagina_ant </a> </li>";
		}
	}
	echo '<li class="page-item active">';
	echo ' <span class="page-link"> ';
	echo "$pagina";
	echo '</span>';
	echo '</li>';
	for ($pagina_dep = $pagina + 1; $pagina_dep <= $pagina + $max_links; $pagina_dep++) {
		if ($pagina_dep <= $row_result_pg) {
			echo "<li class='page-item'> <a class='page-link' href='#' onclick='pagina_favorito($pagina_dep, $quantidade_pg)' > $pagina_dep </a> </li>";
		}
	}
	echo '<li class="page-item">';
	echo "<span class='page-link'><a href='#' onclick='pagina_favorito($row_result_pg, $quantidade_pg)'>Última</a></span>"; /* <span class='page-link'><a href='#' onclick='pagina_aluno($row_result_pg, $quantidade_pg)'>Última</a></span> */
	echo '</li>';
	echo '</ul>';
	echo '</nav>';
	/* cpmparando */
}
