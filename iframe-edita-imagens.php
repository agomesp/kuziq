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
			<label>Imagens:</label><br>
			<p>Clique na imagem desejada para editar.</p>
			<p>Tamanho máximo da imagem permitido: 200kB.</p>

			<div style="text-align: center;">
				<script>
				  var loadFile = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem" src="<?= $usuario['url']?>"/>
			    </label>
	    		<input name="imagemPerfil" id="file-input" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile(event)" style="display: none;" /><br>

	    		<script>
				  var loadFile1 = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem1');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input1">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem1" src="<?= $usuario['imagem_perfil1']?>"/>
			    </label>
	    		<input name="imagemPerfil1" id="file-input1" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile1(event)" style="display: none;" />

	    		<script>
				  var loadFile2 = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem2');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input2">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem2" src="<?= $usuario['imagem_perfil2']?>"/>
			    </label>
	    		<input name="imagemPerfil2" id="file-input2" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile2(event)" style="display: none;" />

	    		<script>
				  var loadFile3 = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem3');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input3">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem3" src="<?= $usuario['imagem_perfil3']?>"/>
			    </label>
	    		<input name="imagemPerfil3" id="file-input3" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile3(event)" style="display: none;" />

	    		<script>
				  var loadFile4 = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem4');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input4">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem4" src="<?= $usuario['imagem_perfil4']?>"/>
			    </label>
	    		<input name="imagemPerfil4" id="file-input4" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile4(event)" style="display: none;" />

	    		<script>
				  var loadFile5 = function(event) {
				    var reader = new FileReader();
				    reader.onload = function(){
				      var output = document.getElementById('seleciona-imagem5');
				      output.src = reader.result;
				    };
				    reader.readAsDataURL(event.target.files[0]);
				  };
				</script>
			    <label for="file-input5">
			        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem5" src="<?= $usuario['imagem_perfil5']?>"/>
			    </label>
	    		<input name="imagemPerfil5" id="file-input5" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile5(event)" style="display: none;" />
    		</div>

    		<input type="text" name="categoriaEditada" value="imagem" style="display: none;"></input>
		
			<div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div>
		</form>
	</div>
</body>
</html>