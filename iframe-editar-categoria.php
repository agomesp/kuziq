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

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo-iframe-painel-musico.css">

</head>
<body>
	<div id="atualizar-perfil">
		<form action="atualizar-perfil.php" method="post" enctype="multipart/form-data" target="_top">
			<label>Categoria:</label>
			<select name="categoria">
				<option name="categoria" value="1"></option>
				<?php
					while ($categoria = mysqli_fetch_assoc($categorias)) {
						echo "<option name='categoria' value='" . $categoria["id_categoria"] . "'>" . utf8_encode($categoria["nome_categoria"]) . "</option>";	
					}
				?>
			</select>
			<input type="text" name="categoriaEditada" value="categoria" style="display: none;"></input>
		
			<div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div>
		</form>
	</div>
</body>
</html>