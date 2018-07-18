<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');

	if($_POST['categoriaEditada'] == 'categoria'){
		editaCategoria($conexao, $_SESSION['id-logado'], $_POST['categoria']);

	}

	if ($_POST['categoriaEditada'] == 'genero') {
		if (isset($_POST['generos'])) {
			editaGenero($conexao, $_SESSION['id-logado'], $_POST['generos']);

		}
		
	}

	if ($_POST['categoriaEditada'] == 'localidade') {
		editaLocalidade($conexao, $_SESSION['id-logado'], $_POST['localidade']);
	}

	if ($_POST['categoriaEditada'] == 'organizacao' && isset($_POST['organizacao'])) {
		editaOrganizacao($conexao, $_SESSION['id-logado'], $_POST['organizacao']);
	}

	if ($_POST['categoriaEditada'] == 'biografia') {
		editaBiografia($conexao, $_SESSION['id-logado'], $_POST['biografia']);
	}

	if ($_POST['categoriaEditada'] == 'imagem') {

		if ($_FILES['imagemPerfil']['error'] != 4 && verificaImagem($_FILES['imagemPerfil']['size'], $_FILES['imagemPerfil']['type'])) {
			atualizaImagem($conexao, 'url', $_SESSION['id-logado'], $_FILES["imagemPerfil"]["tmp_name"]);
		}
		if ($_FILES['imagemPerfil1']['error'] != 4 && verificaImagem($_FILES['imagemPerfil1']['size'], $_FILES['imagemPerfil1']['type'])) {
			atualizaImagem($conexao, 'imagem_perfil1', $_SESSION['id-logado'], $_FILES["imagemPerfil1"]["tmp_name"]);	
		}
		if (
			($_FILES['imagemPerfil2']['error'] != 4) &&
			(verificaImagem($_FILES['imagemPerfil2']['size'], $_FILES['imagemPerfil2']['type'])))
		{
			atualizaImagem($conexao, 'imagem_perfil2', $_SESSION['id-logado'], $_FILES["imagemPerfil2"]["tmp_name"]);

		}
		if ($_FILES['imagemPerfil3']['error'] != 4 && verificaImagem($_FILES['imagemPerfil3']['size'], $_FILES['imagemPerfil3']['type'])) {
			atualizaImagem($conexao, 'imagem_perfil3', $_SESSION['id-logado'], $_FILES["imagemPerfil3"]["tmp_name"]);		
		}
		if ($_FILES['imagemPerfil4']['error'] != 4 && verificaImagem($_FILES['imagemPerfil4']['size'], $_FILES['imagemPerfil4']['type'])) {
			atualizaImagem($conexao, 'imagem_perfil4', $_SESSION['id-logado'], $_FILES["imagemPerfil4"]["tmp_name"]);		
		}
		if ($_FILES['imagemPerfil5']['error'] != 4 && verificaImagem($_FILES['imagemPerfil5']['size'], $_FILES['imagemPerfil5']['type'])) {
			atualizaImagem($conexao, 'imagem_perfil5', $_SESSION['id-logado'], $_FILES["imagemPerfil5"]["tmp_name"]);		
		}
	}

	header("Location: iframe-atualizar-perfil.php");
			die();