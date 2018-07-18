<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');

	enviaMensagem($conexao, $_POST['nome-contato'], $_POST['email-contato'], $_POST['assunto-contato'], $_POST['mensagem-contato'], $_POST['id_usuario']);

	$_SESSION["success"] = "Mensagem enviada com sucesso!";
	header("Location: pagArtista.php?u=" . $_POST['id_usuario']);
	die();