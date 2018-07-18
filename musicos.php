<?php
	require_once('conecta.php');
	require_once('banco-cliente.php');
	$filtros = [0,0,0,0];
	
	$generos = getTodosGeneros($conexao);
	$localidades = getTodasLocalidades($conexao);
	$categorias = getTodasCategorias($conexao);
	
	$filtros[0] = $_POST["genero"];
	$filtros[1] = $_POST["localidade"];
	$filtros[2] = $_POST["categoria"];
	$filtros[3] = $_POST["organizacao"];

	if (!isset($_POST["organizacao"])) {
		$filtros[3] = "> 0";
	}

	$musicos = getMusicos($conexao, $filtros);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - Musicos</title>
	</head>
	<body>
		<main>
			<nav class="navGeral">
				<div class="containerNav">
					<a href="index.php"><img src="_img/logo2.png"></a>
					<ul class="geral">
						<li><a href="sobre.php">SOBRE</a> |</li>
						<li class="liSelecionado"><a class="aSelecionado" href="#">MÚSICOS</a> |</li>
						<li><a href="contato.php"> CONTATO</a> |</li>
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a href="juntar-se.php">JUNTAR-SE |</a></li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho musicos">
				<h1 class="h1Cabecalho">MUSICOS</h1>
			</header>

			<div id="container-listar-musicos">
			<?php 
					if(isset($_SESSION['success'])){
				?>
					<p class="success"><?= $_SESSION['success']?></p>
				<?php
					unset($_SESSION['success']);
					}
					include('header-logado.php');
					if(isset($_SESSION['email-logado'])){
				?>
						<div class="container-filtros">
				<?php 
					}else{
				?>

						<div class="container-filtros">
				<?php 
					}
				?>

					<div id="filtros">
						<form action="musicos.php" method="POST">
							<div id="icones-filtrar">
								<p id="textGenero"><input type="image" src="
								_img/generoico.png">Gênero</p>
								<p id="textCategoria"><input type="image" src="
								_img/generoico.png" >Categoria</p>
								<p id="textLocalidade"><input type="image" src="
								_img/localico.png">Localidade</p>
							</div>
							<br>
							<div id="dropdown-filtrar">
								<select name="genero">
									<option name="genero" value="> 0"></option>
									<?php
										while ($genero = mysqli_fetch_assoc($generos)) {
											echo "<option name='genero' value='= " . $genero["id_genero"] . "'>" . $genero["nome_genero"] . "</option>";
										}
									?>
								</select>
								<select name="localidade">
									<option name="localidade" value="> 0"></option>
									<?php
										while ($localidade = mysqli_fetch_assoc($localidades)) {
											echo "<option name='localidade' value='=" . $localidade["id"] . "'>" . utf8_encode($localidade["localidade"]) . "</option>";
										}
									?>
								</select>
								<select name="categoria">
									<option name="categoria" value="> 0"></option>
									<?php
										while ($categoria = mysqli_fetch_assoc($categorias)) {
											echo "<option name='categoria' value='=" . $categoria["id_categoria"] . "'>" . utf8_encode($categoria["nome_categoria"]) . "</option>";
										}
									?>
								</select><br>
								<input type="radio" name="organizacao" value="=1">Solo</input> <input type="radio" name="organizacao" value="=2">Grupo/Banda</input><br>
								<button value="submit">Filtrar</button>
							</div>
						</form>
					</div>
				</div>

				<div id="container-musicos">
					<div id="container-ordenar">
						
					</div>

					<ul id="ul-musicos">
						<?php
							while($musico = mysqli_fetch_assoc($musicos)){
								$rodou = true;
								$categoria = getCategoria($conexao, $musico['id']);
								$generos = getGenero($conexao, $musico['id']);
								$organizacao = getOrganizacao($conexao, $musico['id']);
								$generos = implode(", ", $generos);
								$endereco = getEndereco($conexao, $musico['id']);
								$id =  $musico['id'];

								echo '<li class="li-musico">';
								echo '<div class= "container-img-filtrar"><img src="' . $musico['url'] .'"></div>';
								echo '<h4 class="h4-name">' . $musico['nome'] . '</h4>';
								echo '<hr>';
								echo '<p class="p-categorias"><span class="categoria">Categoria:</span> ' . $categoria['nome_categoria'] . '</p>';
								echo '<p class="p-categorias"><span class="categoria">Estilos: </span>' . $generos . '</p>';
								echo '<p class="p-categorias"><span class="categoria">Localidade: </span>' . utf8_encode($endereco['localidade']) . '</p>';
								echo '<p class="p-categorias"><span class="categoria">Organização: </span>' . $organizacao['organizacao'] . '</p>';
								echo "<div class='estrela-filtrar estrela-media qntEstrela-selecionada-" . $musico['avaliacao'] . "'>&nbsp;</div>";

								echo '<div class="container-button">';
									echo '<a href="pagArtista.php?u=' . $id . '"><button class="button-contato">CONTATO</button></a>';
								echo '</div>';
							echo '</li>';
							}
							if (!isset($musico["id"]) and $rodou <> true) {
							?>

							<p class="danger-message">Nenhum músico encontrado com os critérios de busca utilizados. <a href="musicos.php" style="color: black; margin: 0 auto;">Clique aqui para ver todos.</a></p>


						<?php
							}
						?>
						<!--<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>

						<li class="li-musico">
							<img src="_img/avatar.jpg">
							<h4 class="h4-name">João</h4>
							<hr>
							<p class="p-categorias"><span class="categoria">Categoria:</span> DJ</p>
							<p class="p-categorias"><span class="categoria">Estilos:</span> Blues, Jazz, Eletrônica</p>
							<p class="p-categorias"><span class="categoria">Localidade:</span> Rio de Janeiro - RJ</p>

							<div class="container-musicos-estrela">
								<div class="star-5">
									&nbsp;
								</div>
								<div class="star-4">
									&nbsp;
								</div>
								<div class="star-3">
									&nbsp;
								</div>
								<div class="star-2">
									&nbsp;
								</div>
								<div class="star-1">
									&nbsp;
								</div>
							</div>

							<div class="container-button">
								<a href="pagArtista.html"><button class="button-contato">CONTATO</button></a>
							</div>
						</li>-->
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>

			<?php
				include("footer.php");
			?>
		</main>
	</body>
</html>