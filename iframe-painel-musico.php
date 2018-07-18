<?php require_once("conecta.php");
	require_once("banco-cliente.php");
	$usuario = buscaUsuario($conexao, $email, $senha);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="estilo-iframe-painel-musico.css">

</head>
<body>
	<div id="atualizar-perfil">
		<form action="salvar-perfil.php" method="post" enctype="multipart/form-data">
			<?php 
				if ($_SESSION["danger"]) {
			?>
					<p class="danger-message"><?= var_dump($_SESSION["danger"]); ?></p>
			<?php
					unset($_SESSION["danger"]);
				}
			?>
			<p style="font-size: 10px;">Tamanho máximo da imagem permitido: 200kB.</p><label>Foto de Perfil: </label></br>

			<div class="image-upload">
			    <label for="file-input">
			        <img id="seleciona-imagem" src="_img/logo2.png"/>
			    </label>
			    	<input id="file-input" type="file"/>
			</div>
			
			<!--<input class="adicionar-foto" required type="file" name="imagemPerfil" accept="image/x-png, image/gif, image/jpeg" max-size='27500'><input class="input-adicionar-foto"><img class="img-adicionar-foto" src="_img/logo2.png"></input></input>--><br>
			
			<label>Categoria: </label><br>
			<select name="categoria">
				<option name="categoria" value=""></option>
				<option name="categoria" value="1">DJ</option>
				<option name="categoria" value="2">Cantor</option>
			</select><br>
			<label>Gêneros musicais: </label><br> 
			<div id="container-generosMusicais">
				<input type="checkbox" name="jazz" value="1">Jazz</input>
				<input type="checkbox" name="eletronica" value="2">Eletrônica</input>
				<input type="checkbox" name="samba" value="3">Samba</input>
				<input type="checkbox" name="blues" value="4">Blues</input>
				<input type="checkbox" name="outro" value="5">Outros</input>
			</div><br>
			<label>Estado:<br> </label>
			<select name="endereco">
				<option name="endereco" value=""></option>
				<option name='endereco' value="1">Rio de Janeiro</option>
				<option name='endereco' value="2">São Paulo</option>
				<option name='endereco' value="3">Paraná</option>
			</select>
			<!--<input required name="endereco" type="text" placeholder="Sua cidade e seu estado"></input>-->
			<br>
			<input type="radio" name="organizacao" value="2">Solo</input> <input type="radio" name="organizacao" value="3">Grupo/Banda</input><br>
			<textarea required name="biografia" style="width: 800px; height: 200px;" placeholder="Digite aqui sua biografia"></textarea><br>
			<div class="container-button">
				<input type="submit" value="ATUALIZAR"></input>
			</div>
		</form>
	</div>
	<div id="assinatura">
		<p><strong>Plano: </strong>Premium</p>
		<p><strong>Dias restantes para a próxima cobrança: </strong>20</p>
		<p><strong>Status da conta: </strong>Ativado</p>
	</div>
	<div id="caixa-de-entrada">
		<tr>
			<td>Assunto |</td>
			<td>Nome |</td>
			<td>Data |</td>
			<td><button id="button-visualizar">Visualizar</button></td>
		</tr><br>
		<tr>
			<td>Assunto |</td>
			<td>Nome |</td>
			<td>Data |</td>
			<td><button id="button-visualizar">Visualizar</button></td>
		</tr><br><tr>
			<td>Assunto |</td>
			<td>Nome |</td>
			<td>Data |</td>
			<td><button id="button-visualizar">Visualizar</button></td>
		</tr><br><tr>
			<td>Assunto |</td>
			<td>Nome |</td>
			<td>Data |</td>
			<td><button id="button-visualizar">Visualizar</button></td>
		</tr><br><tr>
			<td>Assunto |</td>
			<td>Nome |</td>
			<td>Data |</td>
			<td><button id="button-visualizar">Visualizar</button></td>
		</tr><br>
	</div>
	<div id="contato">
		<form action="mail_send.php" method="post">
			<label>Assunto:<br></label><input required name="assunto" type="text" placeholder="Digite o assunto da mensagem"></input><br>
			<label>Mensagem:<br></label><textarea required name="mensagem" placeholder="Sua mensagem"></textarea><br>
			<div class="container-button">
				<input type="submit" value="ENVIAR"></input>
			</div>

		</form>
	</div>
</body>
</html>