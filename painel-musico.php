<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");
	$usuario = buscaUsuario($conexao, $email, $senha);

	if (!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não têm acesso a essa funcionalidade";
		header("Location: login-musico.php");
		die();
	}

	$categorias = getTodasCategorias($conexao);
	$localidades = getTodasLocalidades($conexao);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - Painel de Configuração</title>
	</head>
	<body>
		<main>
			<nav class="navGeral">
				<div class="containerNav">
					<a href="index.html"><img src="_img/logo2.png"></a>
					<ul class="geral">
						<li><a href="sobre.php">SOBRE</a> |</li>
						<li><a href="musicos.php">MÚSICOS</a> |</li>
						<li><a href="contato.php"> CONTATO</a> |</li>
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a href="juntar-se.php">JUNTAR-SE</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>

			<div id="container-painel-musico">
				<h1>Bem-Vindo, <?=$_SESSION["nome-logado"]; ?></h1>
				<h2>Atualize seu perfil para utilizar nossos serviços.</h2>
				<div id="container-formulario-painel">
					<form action="salvar-perfil.php" method="post" enctype="multipart/form-data">
						<?php 
							if ($_SESSION["danger"]) {
						?>
								<p class="danger-message"><?= $_SESSION["danger"] ?></p>
						<?php
								unset($_SESSION["danger"]);
							}
						?>
						<p style="font-size: 10px;">Tamanho máximo da imagem permitido: 200kB.</p><label>Foto de Perfil: </label></br>

						<div class="image-upload">
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
						        <img style="cursor: pointer; width: 153px;" id="seleciona-imagem" src="_img/adicionar_imagem_ico.png"/>
						    </label>
						    	<input name="imagemPerfil" required id="file-input" type="file" accept="image/x-png, image/gif, image/jpeg, image/jpg" max-size='27500' onchange="loadFile(event)"/>
						</div>
						
						<!-- <input class="adicionar-foto" required type="file" name="imagemPerfil" accept="image/x-png, image/gif, image/jpeg" max-size='27500'><input  class="input-adicionar-foto"><label for="adicionar-foto"><img style="cursor: pointer; width: 153px;" class="img-adicionar-foto" src="_img/adicionar_imagem_ico.png"></label></input></input> --><br>
						
						<label>Categoria: </label><br>
						<select name="categoria">
							<option name="categoria" value="1"></option>
							<?php
								while ($categoria = mysqli_fetch_assoc($categorias)) {
									echo "<option name='categoria' value='" . $categoria["id_categoria"] . "'>" . utf8_encode($categoria["nome_categoria"]) . "</option>";	
								}
							?>
						</select><br>
						<label>Gêneros musicais: </label><br> 
						<div id="container-generosMusicais">
							<input type="checkbox" name="jazz" value="1">Jazz</input>
							<input type="checkbox" name="eletronica" value="2">Eletrônica</input>
							<input type="checkbox" name="samba" value="3">Samba</input>
							<input type="checkbox" name="blues" value="4">Blues</input>
							<input type="checkbox" name="outro" value="5">Outros</input>
						</div><br>
						<label>Estado:<br> </label>
						<select name="endereco">
							<option name="endereco" value="1"></option>
							<?php
								while ($localidade = mysqli_fetch_assoc($localidades)) {
									echo "<option name='localidade' value='" . $localidade["id"] . "'>" . utf8_encode($localidade["localidade"]) . "</option>";
								}
							?>
						</select>
						<!--<input required name="endereco" type="text" placeholder="Sua cidade e seu estado"></input>-->
						<br>
						<input type="radio" name="organizacao" value="1">Solo</input> <input type="radio" name="organizacao" value="2">Grupo/Banda</input><br>
						<textarea required name="biografia" style="width: 800px; height: 200px;" placeholder="Digite aqui sua biografia"></textarea><br>
						<div class="container-button">
							<input type="submit" value="ATUALIZAR"></input>
						</div>
					</form>
				</div>
			</div>

			 <footer>

				<div class="containerFooter">
					<h1 class="h1CabecalhoFooter">SIGA-NOS</h1>
					<a href="#"><img class="facebookIco" src="_img/facebookIco.png"></a>
				</div>
					<div class="footerBottom">
						<ul>
							<div class="footerGeralLeft">
								<li><p>Kuziq, Ltda.<br></p></li>
								<li><p>COPYRIGHT © 2016</p></li>
								<li><ul class="footerGeralUl">
									<a href="#"><li>SOBRE |</li></a>
									<a href="musicos.html"><li>MÚSICOS |</li></a>
									<li>CONTATO |</li>
									<li>FAQ |</li>
									<li>JUNTAR-SE</li>
								</ul></li>
							</div>

							<div class="footerGeralRight">
								<li><p id="email">kuziq@kuziq.com</p></li> <li><img id="icoAllan" src="_img/icoAllan.png"></li> <li><p>Criado por:<br>Allan Gomes</p></li>
							</div>
						</ul>
					</div>
			</footer> 
		</main>
	</body>
</html>