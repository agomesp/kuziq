<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");

	if(verificaImagem($_FILES['imagemPerfil']['size'], $_FILES['imagemPerfil']['type'])){
	
		
		$categoria = [];

		if (isset($_POST['jazz'])) {
			$categoria[count($categoria)] = 1;
		}
		if (isset($_POST['eletronica'])) {
			$categoria[count($categoria)] = 2;
		}
		if (isset($_POST['samba'])) {
			$categoria[count($categoria)] = 3;
		}
		if (isset($_POST['blues'])) {
			$categoria[count($categoria)] = 4;
		}
		if (isset($_POST['outro'])) {
			$categoria[count($categoria)] = 5;
		}

		salvarUsuario($conexao, $categoria, $_POST['categoria'], $_POST['endereco'], $_POST['organizacao'], $_POST['biografia']);

		die();
	}else{
		/*header("Location: painel-musico.php");*/
		echo $_FILES['imagemPerfil']['type'];
		var_dump($_FILES['imagemPerfil']['type']);
		var_dump($_FILES['imagemPerfil']['size']);
		die();
	}
?>