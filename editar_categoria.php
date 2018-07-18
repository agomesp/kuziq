<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");
	$adm = buscaAdm($conexao, $email, $senha);

	if (!admEstaLogado()) {
		$_SESSION["danger"] = "Você não têm acesso a essa funcionalidade";
		header("Location: login-musico.php");
		die();
	}

	$categorias = getCategorias($conexao);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo-iframe-painel-musico.css">
		<title>Kuziq - Painel do ADM</title>
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
				<div id="container-editar-musico" style="height: none;">
					<aside class="opcoes-painel">
						<ul id="ul-opcoes-painel">
							<li><a class="aSelecionado" href="painel-adm.php">Categorias</a></li>
							<li class="liSelecionado"><a href="generos.php">Generos</a></li>
							<li><a href="localidades.php">Localidades</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</aside>

					<div id="caixa-de-entrada">
						<form action="salva-categoria.php" method="POST">
							<?php
							while($categoria = mysqli_fetch_assoc($categorias)){
								if($categoria['id_categoria'] == $_GET['i']){
								?>
								<input name="id_categoria" type="text" style="display: none" value="<?= $categoria['id_categoria']?>"></input><br>
								<label>Categoria: </label><input name="nome_categoria" type="text" value="<?= $categoria['nome_categoria']?>"></input>
								<input type="submit" value="Salvar"></input>

								<?php
							}

							}
						?>
						</form>
					</div>
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