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
		<title>Kuziq - Login</title>
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
				<?php if(isset($_SESSION["danger"])) { ?>

						<p class="danger-message"><?= $_SESSION["danger"]; ?></p>

				<?php unset($_SESSION["danger"]); }?>

				<form action="loginAdm.php" method="post">
					<label>E-mail:<br></label><input required name="email" type="text" placeholder="Digite seu e-mail"></input><br>
					<label>Senha:<br></label><input required name="senha" type="password" placeholder="Digite sua senha"></input><br>
					<div class="container-button">
						<input type="submit" value="ENTRAR"></input>
					</div>
				</form>
			</div>

			<?php 
				include('footer.php');
			?>
		</main>
	</body>
</html>