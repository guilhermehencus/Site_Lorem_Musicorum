<?php
session_start();
include("../Conexao_Banco/connection.php");
$idfav= $_POST["idfav"];
$link= $_POST["linkfav"];
echo $idfav;
echo $link;
