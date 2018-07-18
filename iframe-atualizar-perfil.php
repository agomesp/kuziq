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
	<link rel="stylesheet" type="text/css" href="estilo.css">

</head>
<body>
	<div id="atualizar-perfil">
		<form action="editar-perfil.php" method="post" enctype="multipart/form-data">
	
			<div style="text-align: center;">
				<label>Imagens do Perfil:</label>
			    <p><img style="cursor: pointer; width: 153px;" id="seleciona-imagem" src="<?= $usuario['url']?>"/></p>
	            <img style="cursor: pointer; width: 153px;" id="seleciona-imagem1" src="<?= $usuario['imagem_perfil1']?>"/>
		        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem2" src="<?= $usuario['imagem_perfil2']?>"/>
		        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem3" src="<?= $usuario['imagem_perfil3']?>"/>
		        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem4" src="<?= $usuario['imagem_perfil4']?>"/>
		        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem5" src="<?= $usuario['imagem_perfil5']?>"/>
    		</div>
    		<br>
    		<p class="editar-text"><a class="editar-text" href="iframe-edita-imagens.php">Editar</a></p><br>
			
			
			<label>Categoria: </label>
			<!-- <select name="categoria">
				<option name="categoria" value="0"></option>
				<?php
					while ($categoria = mysqli_fetch_assoc($categorias)) {
						echo "<option name='categoria' value='" . $categoria["id_categoria"] . "'>" . utf8_encode($categoria["nome_categoria"]) . "</option>";	
					}
				?>
			</select> -->
			<?= $categoriaUsuario['nome_categoria']?>
			<p class="editar-text"><a class="editar-text" href="iframe-editar-categoria.php">Editar</a></p><br>
			<label>Gêneros musicais: </label>
			<!-- <div id="container-generosMusicais">
				<input type="checkbox" name="generos[]" value="1">Jazz</input>
				<input type="checkbox" name="generos[]" value="2">Eletrônica</input>
				<input type="checkbox" name="generos[]" value="3">Samba</input>
				<input type="checkbox" name="generos[]" value="4">Blues</input>
				<input type="checkbox" name="generos[]" value="5">Outros</input>
			</div> -->
			<?= $generoUsuario ?>
			<p class="editar-text"><a class="editar-text" href="iframe-editar-genero.php">Editar</a></p><br>
			<label>Estado: </label>
			<!-- <select name="endereco">
				<option name="endereco" value=""></option>
				<?php
					while ($localidade = mysqli_fetch_assoc($localidades)) {
						echo "<option name='localidade' value='" . $localidade["id"] . "'>" . utf8_encode($localidade["localidade"]) . "</option>";
					}
				?>
			</select> -->
			<?= utf8_encode($endereco['localidade'])?>
			<p class="editar-text"><a class="editar-text" href="iframe-edita-localidade.php">Editar</a></p>
			<!--<input required name="endereco" type="text" placeholder="Sua cidade e seu estado"></input>-->
			<br>
			<!-- <input type="radio" name="organizacao" value="2">Solo</input> <input type="radio" name="organizacao" value="3">Grupo/Banda</input> -->
			<label>Organização:</label>
			<?= $soloOuBanda['organizacao']?>
			<p class="editar-text"><a class="editar-text" href="iframe-edita-organizacao.php">Editar</a></p><br>
			<label>Biografia</label>
			<!-- <textarea name="biografia" style="width: 800px; height: 200px;" placeholder="Digite aqui sua biografia"></textarea> -->
			<p class="editar-text"><a class="editar-text" href="iframe-edita-biografia.php">Editar</a></p><br>
			<!-- <div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div> -->
		</form>
	</div>
</body>
</html>