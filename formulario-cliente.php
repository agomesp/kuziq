<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - Criar conta</title>
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
					</ul>
				</div>
			</nav>

			<div id="container-formulario-cliente">


				<form action="cria-usuario.php" method="post">
					<label>Nome:<br></label><input required name="nome" type="text" placeholder="Digite seu nome"></input><br>
					<label>E-mail:<br></label><input required name="email" type="e-mail" placeholder="Digite seu e-mail"></input><br>
					<label>Senha:<br></label><input required name="senha" type="password" placeholder="Digite sua senha"></input><br>
					<div class="container-button">
						<input type="submit" value="PRÓXIMO"></input>
					</div>
				</form>
			</div>

			<!-- <footer>

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
			</footer> -->
		</main>
	</body>
</html>