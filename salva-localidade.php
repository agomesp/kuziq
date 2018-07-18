<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');

	salvaLocalidade($conexao, $_POST['id_localidade'], $_POST['nome_localidade']);
	header("Location: painel-adm.php");
	die();
?>