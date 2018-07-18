<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");
	$usuario = buscaUsuario($conexao, $email, $senha);

	if (!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não têm acesso a essa funcionalidade";
		header("Location: login-musico.php");
		die();
	}

	$numMensagens = getNumMensagens($conexao, $_SESSION['id-logado']);


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
				<div id="container-editar-musico" style="height: 1100px;">
					<aside class="opcoes-painel" style="height: 1100px;">
						<ul id="ul-opcoes-painel">
							<li class="liSelecionado"><a class="aSelecionado">Atualizar Perfil</a></li>
							<li ><a href="iframe-assinatura.php">Assinatura</a></li>
							<li><a href="iframe-caixa-entrada.php">Caixa de entrada (<?= $numMensagens?>)</a></li>
							<li><a href="pagArtista.php?u=<?php echo $_SESSION['id-logado']?>">Perfil</a></li>
							<li><a href="iframe-contato.php">Contato</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</aside>

					<iframe src="iframe-atualizar-perfil.php" name="iframe-painel" id="iframe-painel-musico" scrolling="no" style="height: 1100px;"></iframe>
				</div>
			</div>

			 <?php include("footer.php");?>
		</main>
	</body>
</html>