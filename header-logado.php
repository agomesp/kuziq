<?php
	
	if(isset($_SESSION['id-logado']) && !admEstaLogado()){
		$numMensagens = getNumMensagens($conexao, $_SESSION['id-logado']);
?>
		<div class="header-conectado">
		<p>Bem vindo, <span><?= $_SESSION['nome-logado']?></span></p>
		<p><a href="iframe-caixa-entrada.php">Mensagens: <?= $numMensagens?></a> | <a href="painel-editar-musico.php">Configurar perfil</a> | <a href="logout.php">Logout</a></p>
		</div>
<?php
	}

	if(admEstaLogado()){
?>
	<div class="header-conectado">
		<p>Bem vindo, <span><?= $_SESSION['nome-logado']?></span></p>
		<p><a href="painel-adm.php">Painel</a> | <a href="logout.php">Logout</a></p>
	</div>
<?php
	}
?>