<?php
	require_once("conecta.php");
	require_once("banco-cliente.php");
	$usuario = buscaUsuario($conexao, $email, $senha);

	if (!usuarioEstaLogado()) {
		$_SESSION["danger"] = "Você não têm acesso a essa funcionalidade";
		header("Location: login-musico.php");
		die();
	}

	$mensagens = getMensagens($conexao, $_SESSION['id-logado']);
	$numMensagens = getNumMensagens($conexao, $_SESSION['id-logado']);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<link rel="stylesheet" type="text/css" href="estilo-iframe-painel-musico.css">
		<title>Kuziq - Painel de Configuração</title>
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
						<li><a href="juntar-se.php">JUNTAR-SE</a></li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
			</nav>

			<div id="container-painel-musico">
				<div id="container-editar-musico" style="height: none;">
					<aside class="opcoes-painel">
						<ul id="ul-opcoes-painel">
							<li><a href="painel-editar-musico.php">Atualizar Perfil</a></li>
							<li class="liSelecionado"><a href="iframe-assinatura.php">Assinatura</a></li>
							<li><a href="iframe-caixa-entrada.php" class="aSelecionado">Caixa de entrada (<?= $numMensagens?>)</a></li>
							<li><a href="pagArtista.php?u=<?php echo $_SESSION['id-logado']?>">Perfil</a></li>
							<li><a href="iframe-contato.php">Contato</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</aside>

					<div id="caixa-de-entrada">
					<?php
						while($mensagem = mysqli_fetch_assoc($mensagens)){
							if($_GET['i'] == $mensagem['id']){
								echo "<strong>Assunto:</strong> " . $mensagem['assunto'] . " <br>";
								echo "<strong>Nome:</strong> " . $mensagem['nome'] . " <br>";
								echo "<strong>Data do envio:</strong> " . $mensagem['data_envio'] . " <br>";
								echo "<strong>Mensagem: </strong>" . nl2br($mensagem['mensagem']);
							}
						}
					?>
						
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