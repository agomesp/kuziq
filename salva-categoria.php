<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');

	salvaCategoria($conexao, $_POST['id_categoria'], $_POST['nome_categoria']);
	header("Location: painel-adm.php");
	die();
?>