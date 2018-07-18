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
			<label>Localidade:</label>
			
			<select name="localidade">
				<option name="localidade" value="1"></option>
				<?php
					while ($localidade = mysqli_fetch_assoc($localidades)) {
						echo "<option name='localidade' value='" . $localidade["id"] . "'>" . utf8_encode($localidade["localidade"]) . "</option>";
					}
				?>
			</select>
			
			<input type="text" name="categoriaEditada" value="localidade" style="display: none;"></input>
		
			<div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div>
		</form>
	</div>
</body>
</html>