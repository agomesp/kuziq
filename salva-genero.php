<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');

	salvaGenero($conexao, $_POST['id_genero'], $_POST['nome_genero']);
	header("Location: painel-adm.php");
	die();
?>