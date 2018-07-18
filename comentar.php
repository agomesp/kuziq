<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');
	adicionaComentario($conexao, $_POST['nome'], $_POST['mensagem'], $_POST['id_musico'], $_POST['qnt']);
	header("Location: pagArtista.php?u=" . $_POST['id_musico']);
	die();