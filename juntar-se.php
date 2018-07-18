<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - Juntar-se</title>
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
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a class="aSelecionado" href="juntar-se.php">JUNTAR-SE |</a></li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho juntar">
				<h1 class="h1Cabecalho">JUNTAR-SE</h1>
			</header>

			<div id="container-juntarse">
				<div id="container-juntar">
					<img class="icoJuntar" src="_img/icoJuntar-se.png">

					<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non nisl volutpat, imperdiet quam nec, placerat elit. Fusce odio libero, rhoncus nec varius ut, dignissim non sem. Quisque dui felis, suscipit a porttitor sollicitudin, dapibus sit amet mauris. Phasellus ac ante sollicitudin, rhoncus mauris non, condimentum lorem. In ante lorem, interdum nec condimentum quis, luctus vel sapien. Maecenas ac urna id tortor egestas porttitor sit amet in enim. Integer ac arcu dapibus, condimentum turpis quis, sollicitudin magna. Duis in lorem id mi consectetur imperdiet. Maecenas placerat leo sit amet ligula tincidunt molestie.</p>

					<div class="container-planos">
						<ul>
							<li class="planos-li">
								<h2 class="plano">PLANOS</h2>
								<hr>

								<h1 class="plano-h1">R$00,00<span>/mês</span></h1>

								<span class="span-vantagem">- Vantagem</span><br>
								<span class="span-vantagem">- Vantagem 2</span>
								<br>
								<div class="container-button">
									<button class="button-juntar">JUNTAR-SE</button>
								</div>
							</li>

							<li class="planos-li">
								<h2 class="plano">PLANOS</h2>
								<hr>

								<h1 class="plano-h1">R$00,00<span>/mês</span></h1>

								<span class="span-vantagem">- Vantagem</span><br>
								<span class="span-vantagem">- Vantagem 2</span>
								<br>
								<div class="container-button">
									<button class="button-juntar button-juntar-destaque">JUNTAR-SE</button>
								</div>
							</li>

							<li class="planos-li">
								<h2 class="plano">PLANOS</h2>
								<hr>

								<h1 class="plano-h1">R$00,00<span>/mês</span></h1>

								<span class="span-vantagem">- Vantagem</span><br>
								<span class="span-vantagem">- Vantagem 2</span>
								<br>
								<div class="container-button">
									<button class="button-juntar">JUNTAR-SE</button>
								</div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>

					<div class="clearfix"></div>
				</div>
			</div>

			<?php
				include("footer.php");
			?>
		</main>
	</body>
</html>