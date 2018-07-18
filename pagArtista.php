<?php 
	date_default_timezone_set('UTC');
	require_once('conecta.php');
	require_once('banco-cliente.php');
	$usuario = getUsuario($conexao, $_GET['u']);
	$categoria = getCategoria($conexao, $_GET['u']);
	$getGenero = getGenero($conexao, $_GET['u']);
	$genero = implode(', ', $getGenero);
	$id_musico = $_GET['u'];
	$comentarios = getComentarios($conexao, $_GET['u']);
	$qntComentarios = getqntComentarios($comentarios);
	$comentarios = getComentarios($conexao, $_GET['u']);
	$avaliacao2 = getAvaliacao($conexao, $id_musico);
	$endereco = getEndereco($conexao, $id_musico);
	$organizacao = getOrganizacao($conexao, $_GET['u']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="estilo.css"> 
		<script src="js.js"></script>
		<title>Kuziq - João</title>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$("a[rel=group1]").fancybox();
			});
		</script>
	</head>
	<body>
		<main>
			<nav class="navGeral">
				<div class="containerNav">
					<img src="_img/logo2.png">
					<ul class="geral">
						<li><a href="sobre.php">SOBRE</a> |</li>
						<li><a href="musicos.php">MÚSICOS</a> |</li>
						<li><a href="contato.php"> CONTATO</a> |</li>
						<li><a href="faq.php">FAQ</a> |</li>
						<li><a href="juntar-se.php">JUNTAR-SE</a> |</li>
						<li><a href="login-musico.php">Login</a>
					</ul>
				</div>
			</nav>
			
			<header class="cabecalho pagMusico">
				<h1 class="h1Cabecalho"><?= $usuario['nome']?></h1>
			</header>

			<div id="container-pagMusico">
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
						<div class="container">
				<?php 
					}else{
				?>

						<div class="container" style="margin-top: 20px;">
				<?php 
					}
				?>
					
					<aside id="perfil-musico">
						<a rel="group1" href="<?= $usuario['url']?>"><div id="imagem-perfil-container" style="background: url('<?= $usuario['url']?>') center center no-repeat; height: 200px; width: 100%; ">&nbsp;</div></a>
						<h3><?= $usuario['nome']?></h3>
						<hr>
						<h4 style="margin: 0;"><?= $categoria['nome_categoria']?></h4>
						<h4 style="margin: 0;"><?= $organizacao['organizacao']?></h4>
						<input type="image" src="_img/generoico.png"></input><p><span>Gêneros:</span><?= $genero;?>.</p><br>
						<input type="image" src="_img/localico.png"></input><p><span>Localidade:</span> <?= utf8_encode($endereco['localidade'])?></p>

						<div class="container-imagem">
							<img src="_img/facebookIco.png">

							<?php 
								echo "<div class='estrela-media qntEstrela-selecionada-" . $avaliacao2['avaliacao'] . "'>&nbsp;</div>";
							?>
							<p>(<?=  $usuario['qntAvaliacoes'];?> avaliações)</p>
						</div>
					</aside>

					<div id="container-bio">
						<div id="container-img-perfil">
							
							<a rel="group1" href="<?php echo $usuario['imagem_perfil1']; ?>"><img alt="" src="<?php echo $usuario['imagem_perfil1']; ?>"></a>
							<a rel="group1" href="<?php echo $usuario['imagem_perfil2']; ?>"><img alt="" src="<?php echo $usuario['imagem_perfil2']; ?>"></a>
							<a rel="group1" href="<?php echo $usuario['imagem_perfil3']; ?>"><img alt="" src="<?php echo $usuario['imagem_perfil3']; ?>"></a>
							<a rel="group1" href="<?php echo $usuario['imagem_perfil4']; ?>"><img alt="" src="<?php echo $usuario['imagem_perfil4']; ?>"></a>
							<a rel="group1" href="<?php echo $usuario['imagem_perfil5']; ?>"><img alt="" src="<?php echo $usuario['imagem_perfil5']; ?>"></a>
						</div>

						<h1 class="h1-bio">Bio</h1>
						<p><?php echo nl2br($usuario['biografia'])?></p>

						<h1 class="h1-bio">Contratar Músico</h1>
						<h3>Entre em contato com o músico para contrata-lo.</h3>
						<form action="enviar-mensagem.php" method="post">
							<label>Nome:<br></label><input required type="text" name="nome-contato" placeholder="Digite seu nome"></input><br>
							<label>E-mail:<br></label><input required name="email-contato" type="email" placeholder="Digite seu e-mail"></input><br>
							<label>Assunto:<br></label><input required name="assunto-contato" type="text" placeholder="Digite o assunto da mensagem"></input><br>
							<label>Mensagem:<br></label><textarea required name="mensagem-contato" placeholder="Sua mensagem"></textarea><br>
							<input type="hidden" name="id_usuario" value="<?= $id_musico?>"></input>
							<div class="container-button">
								<input type="submit" value="ENVIAR"></input>
							</div>
						</form>
					</div>

					<div id="comentarios-pagMusico">
						<h2>Comentários</h2>
						<p id="numcomentarios"><?= $qntComentarios ?> comentários</p>
						<button id="comentar" onclick="gerarFormComentar()">Comentar</button>
						<form id="comentar-form" action="comentar.php" method="POST">
							<input type="text" name="id_musico" value='<?= $id_musico?>' style="display: none;"></input>
							<!-- <label>Nome:</label><br><input type="text" placeholder="Digite seu nome"></input><br>
							<label>Mensagem: </label><br><textarea placeholder="Digite sua mensagem"></textarea><br>
							<input type="submit" value="Enviar"></input> -->
							<label id="avaliacao" style="display: none;">Avaliação: </label>
							<div class="container-estrelas" style="margin: 0; display: none;">
								<a onclick="selecionaEstrela(1)" class="estrela-1">									&nbsp;
								</a>
								<a onclick="selecionaEstrela(2)" class="estrela-2">
									&nbsp;
								</a>
								<a onclick="selecionaEstrela(3)" class="estrela-3">
									&nbsp;
								</a>
								<a onclick="selecionaEstrela(4)" class="estrela-4">
									&nbsp;
								</a>
								<a onclick="selecionaEstrela(5)" class="estrela-5">
									&nbsp;
								</a>
								<input id="quantidadeEstrela" type="hidden" name="qnt" value="0"></input>
							</div><br>
						</form>
						<?php
							while ($comentario = mysqli_fetch_assoc($comentarios)) {
								echo "<hr>";
								echo "<p class='p-nome' style='font-size: 10px;''>" . $comentario['data_envio'] ."</p>";
								echo "<p class='p-nome'><strong>" . $comentario['nome_enviado'] . "</strong> comentou:</p>";
								echo "<p class='comentario'>" . nl2br($comentario['mensagem']) . "</p>";
								echo "<div class='qntEstrela-selecionada-" . $comentario['avaliacao'] . "'>&nbsp;</div>";													
							}
						?>
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