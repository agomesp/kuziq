<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - Sobre</title>
	</head>
	<body>
		<main>
			<nav class="navGeral">
				<div class="containerNav">
					<a href="index.php"><img src="_img/logo2.png"></a>
					<ul class="geral">
						<li><a href="sobre.php">SOBRE</a> |</li>
						<li><a href="musicos.php">MÚSICOS</a> |</li>
						<li><a class="aSelecionado" href="contato.php"> CONTATO</a> |</li>
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a href="juntar-se.php">JUNTAR-SE |</a></li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho contato">
				<h1 class="h1Cabecalho">CONTATO</h1>
			</header>
			<?php include('header-logado.php'); ?>
			<div id="container-contato">
				<form action="mail_send.php" method="post">
					<label>Nome:<br></label><input required name="nome" type="text" placeholder="Digite seu nome"></input><br>
					<label>E-mail:<br></label><input required name="email" type="e-mail" placeholder="Digite seu e-mail"></input><br>
					<label>Assunto:<br></label><input required name="assunto" type="text" placeholder="Digite o assunto da mensagem"></input><br>
					<label>Mensagem:<br></label><textarea required name="mensagem" placeholder="Sua mensagem"></textarea><br>
					<div class="container-button">
						<input type="submit" value="ENVIAR"></input>
					</div>

				</form>
			</div>

			<?php
				include("footer.php");
			?>
		</main>
	</body>
</html>