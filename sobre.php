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
						<li><a class="aSelecionado" href="#">SOBRE</a> |</li>
						<li><a href="musicos.php">MÚSICOS</a> |</li>
						<li><a href="contato.php">CONTATO</a> |</li>
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a href='juntar-se.php'>JUNTAR-SE |</a></li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho sobre">
				<h1 class="h1Cabecalho">SOBRE</h1>
			</header>

				<section id="clientes">
					<div class="container clientesComoFunciona">
						<h2>Como Funciona?</h2>
						<h3>Contratar músico</h3>
						<div id="container-explicacao">
							<img src="_img/contratemusico.png">
							<div id="explicacao-left">
								<h2>Busque</h2>
								<p>Use nossos filtros e encontre bandas e músicos de acordo com sua necessidade.</p>
							</div>

							<div id="explicacao-right">
								<h2>Contrate</h2>
								<p>Preencha o formulário e entre em contato para verificar a disponibilidade e negociar com o artista/banda. Tudo certo? Contrate!</p>
							</div>
							<div id="explicacao-middle">
								<h2>Analise</h2>
								<p>Veja o perfil do candidato, as avaliações dos usuários e tenha certeza de que encontrou a melhor opção.</p>
							</div> 
							 
						</div>
						<a href="musicos.php"><button id="procurarMusico">PROCURAR MÚSICO</button></a>
					</div>
				</section>

				<section id="musicos">
					<div class="container musicosComoFunciona">
						<h2>Como Funciona?</h2>
						<h3>Juntar-se</h3>
						<div id="container-explicacao">
							<img src="_img/anunciaretapas.png">
							
							  

							<div id="explicacao-left">
								<h2>Cadastre-se</h2>
								<p>Preencha seu perfil com sua história, seus estilos, suas referências, fotos e etc.</p>
							</div>

							<div id="explicacao-right">
								<h2>Seja visto</h2><br>
							 <p style="margin-top: -7px;">Nossos usuários estão buscando artistas como você, seja contratado por eles!</p>
							</div>

							<div id="explicacao-middle">
								<h2>Confirme</h2>
								<p>Sua página estará online após a confirmação do pagamento do serviço.</p> 
							</div>
							
						</div>
						<a href="juntar-se.html"><button id="juntar-se">JUNTAR-SE</button></a>
					</div>
				</section>

			<?php
				include("footer.php");
			?>
		</main>
	</body>
</html>