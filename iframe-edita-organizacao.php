<?php
	require_once('banco-cliente.php');
	require_once('conecta.php');

	$usuario = getUsuario($conexao, $_SESSION['id-logado']);
	$categorias = getTodasCategorias($conexao);
	$localidades = getTodasLocalidades($conexao);
	$categoriaUsuario = getCategoria($conexao, $_SESSION['id-logado']);
	$generoUsuario = getGenero($conexao, $_SESSION['id-logado']);
	$generoUsuario = implode(', ', $generoUsuario);
	$endereco = getEndereco($conexao, $_SESSION['id-logado']);
	$soloOuBanda = getOrganizacao($conexao, $_SESSION['id-logado']);
	$generos = getGeneros($conexao);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo-iframe-painel-musico.css">

</head>
<body>
	<div id="atualizar-perfil">
		<form action="atualizar-perfil.php" method="post" enctype="multipart/form-data">
			<label>Organização:</label>
			
			<input type="radio" name="organizacao" value="1">Solo</input> <input type="radio" name="organizacao" value="2">Grupo/Banda</input>
			
			<input type="text" name="categoriaEditada" value="organizacao" style="display: none;"></input>
		
			<div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div>
		</form>
	</div>
</body>
</html>