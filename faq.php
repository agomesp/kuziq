<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - FAQ</title>
	</head>
	<body>
		<main>
			<nav class="navGeral">
				<div class="containerNav">
					<a href="index.php"><img src="_img/logo2.png"></a>
					<ul class="geral">
						<li><a href="sobre.php">SOBRE</a> |</li>
						<li><a href="musicos.php">MÚSICOS</a> |</li>
						<li><a href="contato.php"> CONTATO</a> |</li>
						<li><a class="aSelecionado" href="faq.php">FAQ</a> |</li>
						<li><a href="juntar-se.php">JUNTAR-SE |</a></li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho faq">
				<h1 class="h1Cabecalho">FAQ</h1>
			</header>

			<div id="container-faq">
				<div id="container">
					<aside id="index-faq">
						<ul>
							<li><a href="#faq1">1. lorem ipsum?</a></li><br>
								<li class="sub-faq"><a href="#faq1-2">1.2 lorem ipsum?</a></li><br>
							<li><a href="#faq2">2. lorem ipsum?</a></li><br>
							<li><a href="#faq3">3. lorem ipsum?</a></li><br>
						</ul>
					</aside>

					<article id="texto-faq">
						<a name="faq1"><h3 class="faq1">1. Lorem Ipsum?</h3></a>
						<p>Lorem ipsum idolor amet osdj edi opam.</p>

						<a name="faq1-2"><div class="sub-faq-container">
							<h3>1-2. Lorem Ipsum?</h3>
							<p>Lorem ipsum idolor amet osdj edi opam.</p>
						</div></a>

						<a name="faq2"><h3>2. Lorem Ipsum?</h3></a>
						<p>Lorem ipsum idolor amet osdj edi opam.</p>

						<a name="faq3"><h3 name="faq3">3. Lorem Ipsum?</h3></a>
						<p>Lorem ipsum idolor amet osdj edi opam.</p>
					</article>

					<div class="clearfix"></div>
				</div>
			</div>

			<?php
				include("footer.php");
			?>
		</main>
	</body>
</html>