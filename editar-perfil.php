<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");

	if(isset($_FILES['imagemPerfil']) && verificaImagem($_FILES['imagemPerfil']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "1ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil($conexao);
	}
	if(isset($_FILES['imagemPerfil1']) && verificaImagem($_FILES['imagemPerfil1']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "2ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil1($conexao);
	}
	if(isset($_FILES['imagemPerfil2']) && verificaImagem($_FILES['imagemPerfil2']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "3ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil2($conexao);
	}
	if(isset($_FILES['imagemPerfil3']) && verificaImagem($_FILES['imagemPerfil3']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "4ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil3($conexao);
	}
	if(isset($_FILES['imagemPerfil4']) && verificaImagem($_FILES['imagemPerfil4']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "5ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil4($conexao);
	}
	if(isset($_FILES['imagemPerfil5']) && verificaImagem($_FILES['imagemPerfil5']['size'], $_FILES['imagemPerfil']['type']) == false){
		$_SESSION['danger'] = "6ª Imagem inválida";
		header('painel-editar-musico.php');
		die();
	}else{
		editaImagemPerfil5($conexao);
	}

	/*editarGeneros($conexao, $_POST['generos']);*/

echo "<pre>";
print_R($_POST);
echo "</pre>";




?>