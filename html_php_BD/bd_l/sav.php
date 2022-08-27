<<?php
	if (isset($_POST['usuario_tipo'])) {
		$tipodeusuario = $_POST['usuario_tipo'];
		foreach ($_POST['usuario_tipo'] as $value) {
			echo $value . '<br/>';
		}
	}
