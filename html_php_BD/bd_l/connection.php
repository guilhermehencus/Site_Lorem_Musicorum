<?php
$host=""; 
$username="";
$password="";
$DB_name="Cadastro_Musicoterapia";
$conexao= mysqli_connect($host,$username,$password,$DB_name);
if (!$conexao) {
	Echo "Falha na conexao com o Banco de Dados!";
exit;
}
