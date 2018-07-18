<?php
date_default_timezone_set('America/Sao_Paulo');
require_once("conecta.php");
session_start();

error_reporting(E_ALL ^ E_NOTICE);

function buscaUsuario($conexao, $email, $senha){
	$senhaMd5 = md5($senha);

	$query = "select * from musicos where email='{$email}' and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function buscaAdm($conexao, $email, $senha){
	$senhaMd5 = md5($senha);

	$query = "select * from funcionario where email='{$email}' and senha='{$senha}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario = mysqli_fetch_assoc($resultado);
	return $usuario;
}

function usuarioEstaLogado(){
	return isset($_SESSION["email-logado"]);
}

function emailOuSenhaIncorreto(){
	return isset($_SESSION["danger"]);
}

function verificaUsuario($email, $id){
	/*buscaUsuario($conexao, $_SESSION['email-logado'], $_SESSION['senha-logado'])*/

	if ($_SESSION['configurado'] == true) {
		header("Location: pagArtista.php?u=" . $id);
		die();
	} else {
		header("Location: painel-musico.php");
		die();
	}
	
}

function salvarUsuario($conexao, $categoria, $generos, $endereco, $soloOuBanda, $biografia){

	$email = $_SESSION['email-logado'];
	$id = $_SESSION['id-logado'];

	$imagename=$_FILES["imagemPerfil"]["name"];
	move_uploaded_file($_FILES["imagemPerfil"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil.jpg";

	$query = "update musicos set url = '{$imagemURL}', configurado = true, biografia = '{$biografia}' where email = '{$email}'";
	mysqli_query($conexao, $query);

	$query = "update musico_localidade set id_musico = {$id}, id_localidade = {$endereco}";
	mysqli_query($conexao, $query);

	$x = count($categoria) - 1;
	$query = "delete from musico_genero where id_musico = {$id}";
	mysqli_query($conexao, $query);
	$query = "delete from musico_categoria where id_musico = {$id}";
	mysqli_query($conexao, $query);
	while ($x >= 0) {
	 	$categorias = $categoria[$x];
		$query = "insert into musico_genero (id_musico, id_genero) values ({$id}, {$categorias})";
		$result = mysqli_query($conexao, $query);
		$x = $x - 1;
	 }

	 $query = "insert into musico_categoria (id_musico, categoria_id) values ({$id}, {$generos})";
	 mysqli_query($conexao, $query);

	 $query = "insert into musico_organizacao (id_musico, id_organizacao) values ({$id}, {$soloOuBanda})";
	 mysqli_query($conexao, $query);

	 header("Location: pagArtista.php?u=" . $id);
	 die();
}

function genero_musicoExiste($conexao, $categorias, $id){
	$query = "select id_musico from musico_genero where id_musico = {$id} and id_genero = {$categorias}";
	$resultado = mysqli_query($conexao, $query);
	echo '<pre>' . var_dump($resultado) . '</pre>';
	return $resultado;
}

function verificaImagem($size, $file_type){
	$menor = true;

	if (($size > 207500)){      
        $_SESSION["danger"] = 'Imagem muito grande. O tamanho deve ser menor que 200 kB'; 
    	$menor = false;
    }if (  
        ($file_type == "image/jpeg") or
        ($file_type == "image/jpg") or
        ($file_type == "image/gif") or
        ($file_type == "image/png")    
    ){
      	$menor = true;  
    }else{
    	$_SESSION["danger"] = "Imagem inválida." . $file_type;
    }
 
    return $menor;
}

function insereGenero($conexao, $genero, $id){
	$query = "insert into genero (nome_genero) values ('{$genero}')";
	mysqli_query($conexao, $query);

	$query = "select id_genero from genero where nome_genero = '{$genero}'";
	$resultado = mysqli_query($conexao, $query);
	$id_genero = (int)mysqli_fetch_assoc($resultado);

	$query = "insert into musico_genero (id_musico, id_genero) values ({$id}, {$id_genero})";
	mysqli_query($conexao, $query);
	return $id_genero;
}

function getUsuario($conexao, $id){
	$query = "select qntAvaliacoes, url, imagem_perfil1, imagem_perfil2, imagem_perfil3, imagem_perfil4, imagem_perfil5, nome, biografia from musicos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);

}
function getCategoria($conexao, $id){
	$query = "select categoria_id from musico_categoria where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	$resultado = mysqli_fetch_assoc($resultado);
	
	$query = "select nome_categoria from categoria where id_categoria = {$resultado['categoria_id']}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function getGenero($conexao, $id){
	$query = "select id_genero from musico_genero where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	$generos = [];
	while ($genero = mysqli_fetch_assoc($resultado)) {
		$query = "select nome_genero from genero where id_genero = {$genero['id_genero']}";
		$result = mysqli_query($conexao, $query);
		$generoAssoc = mysqli_fetch_assoc($result);
		array_push($generos, $generoAssoc['nome_genero']);
	}

	return $generos;
}

function adicionaComentario($conexao, $nome, $comentario, $id_musico, $qntEstrela){
	$today = date("d-m-Y H:i");
	$nome = mysqli_real_escape_string($conexao, $nome);
	$comentario = mysqli_real_escape_string($conexao, $comentario);
	$query = "insert into comentario (nome_enviado, mensagem, data_envio, id_musico, avaliacao) values ('{$nome}', '{$comentario}', '{$today}', {$id_musico}, {$qntEstrela})";
	mysqli_query($conexao, $query);

	$query = "select avaliacao, qntAvaliacoes from musicos where id = {$id_musico}";
	$avaliacao = mysqli_query($conexao, $query);
	$avaliacao = mysqli_fetch_assoc($avaliacao);
	if (($qntEstrela <> 0) && ($avaliacao['qntAvaliacoes'] <> 0)) {
		$query = "select avaliacao from comentario where id_musico = {$id_musico}";
		$result = mysqli_query($conexao, $query);
		$qntAvaliacao = 0;
		$avaliacaoSoma = 0;
		while ($comentario = mysqli_fetch_assoc($result)){
			$avaliacaoSoma = $avaliacaoSoma + $comentario["avaliacao"];
			$qntAvaliacao = $qntAvaliacao + 1;
		}
		$avaliacaoNovo = $avaliacaoSoma / $qntAvaliacao;

	}else{
		$avaliacaoNovo = $avaliacao['avaliacao'] + $qntEstrela;
	}
	
	$qntAvaliacoesNovo = $avaliacao['qntAvaliacoes'] + 1;
	$query = "update musicos set avaliacao = {$avaliacaoNovo}, qntAvaliacoes = {$qntAvaliacoesNovo} where id = {$id_musico}";
	mysqli_query($conexao, $query);

}

function getComentarios ($conexao, $id){
	$query = "select id, nome_enviado, mensagem, data_envio, avaliacao from comentario where id_musico = {$id} ORDER BY id DESC" ;
	return mysqli_query($conexao, $query);
}

function getqntComentarios($comentarios){
	$qntComentarios = 0;
	while ($comentario = mysqli_fetch_assoc($comentarios)) {
		$qntComentarios = $qntComentarios +1;
	}

	return $qntComentarios;
}

function getAvaliacao($conexao, $id_musico){
	$query = "select avaliacao from musicos where id = {$id_musico}";
	$result = mysqli_query($conexao, $query);
	
	return mysqli_fetch_assoc($result);
}

function avalia($conexao, $qnt, $id_musico){
	$query = "select avaliacao, qntAvaliacoes from musicos where id = {$id_musico}";
	$avaliacao = mysqli_query($conexao, $query);
	$avaliacao = mysqli_fetch_assoc($avaliacao);
	$avaliacaoNovo = $avaliacao['avaliacao'] + $qnt;
	$qntAvaliacoesNovo = $avaliacao['qntAvaliacoes'] + 1;
	$query = "update musicos set avaliacao = {$avaliacaoNovo}, qntAvaliacoes = {$qntAvaliacoesNovo} where id = {$id_musico}";
	mysqli_query($conexao, $query);
}

function enviaMensagem($conexao, $nome, $email, $assunto, $mensagem, $id){
	$today = date("d-m-Y H:i");
	$nome = mysqli_real_escape_string($conexao, $nome);
	$email = mysqli_real_escape_string($conexao, $email);
	$assunto = mysqli_real_escape_string($conexao, $assunto);
	$mensagem = mysqli_real_escape_string($conexao, $mensagem);
	$query = "insert into mensagem (nome, assunto, email, mensagem, id_musico, data_envio) values ('{$nome}', '{$assunto}', '{$email}', '{$mensagem}', {$id}, '{$today}')";
	mysqli_query($conexao, $query);
}

function getMusicos($conexao, $filtros){
	if ($filtros[0] == "> 0" and $filtros[1] == "> 0" and $filtros[2] == "> 0" and $filtros[3] == "> 0") {
		$query = "select * from musicos";		
	}else{
		$query = "select * FROM musico_categoria, musico_genero, musico_localidade, musico_organizacao, musicos where musico_categoria.id_musico = musicos.id and musico_genero.id_musico = musicos.id and musico_localidade.id_musico = musicos.id and musico_organizacao.id_musico = musicos.id and categoria_id ". $filtros[2] ." and musico_organizacao.id_organizacao" . $filtros[3] . " and id_genero " . $filtros[0] . " and id_localidade " . $filtros[1] . " group by musicos.id";
	}

	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function getEndereco($conexao, $id){
	$query = "select id_localidade from musico_localidade where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	$resultado = mysqli_fetch_assoc($resultado);
	$id_localidade = $resultado['id_localidade'];
	$query = "select localidade from localidade where id = {$id_localidade}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function getMensagens($conexao, $id){
	$query = "select id, nome, assunto, mensagem, data_envio from mensagem where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function getNumMensagens($conexao, $id){
	$mensagens = getMensagens($conexao, $id);
	$num = 0;
	while ($mensagem = mysqli_fetch_assoc($mensagens)) {
		$num = $num + 1;
	}
	return $num;
}

function getCategorias($conexao){
	$query = "select * from categoria";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function admEstaLogado(){
	return isset($_SESSION["email-logado-adm"]);
}

function salvaCategoria($conexao, $id, $nome){
	$query = "update categoria set nome_categoria = '{$nome}' where id_categoria = {$id}";
	$resultado = mysqli_query($conexao, $query);
}

function getGeneros($conexao){
	$query = "select * from genero";
	return mysqli_query($conexao, $query);
}

function salvaGenero($conexao, $id, $nome){
	$query = "update genero set nome_genero = '{$nome}' where id_genero = {$id}";
	$resultado = mysqli_query($conexao, $query);
}

function getLocalidades($conexao){
	$query = "select * from localidade";
	return mysqli_query($conexao, $query);
}

function salvaLocalidade($conexao, $id, $nome){
	$query = "update localidade set localidade = '{$nome}' where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
}

function getAssinatura($conexao, $id){
	$query = "select * from assinatura where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function getTodosGeneros($conexao){
	$query = "select * from genero";
	return mysqli_query($conexao, $query);
}

function getTodasLocalidades($conexao){
	$query = "select * from localidade";
	return mysqli_query($conexao, $query);
}

function getTodasCategorias($conexao){
	$query = "select * from categoria";
	return mysqli_query($conexao, $query);
}

function getOrganizacao($conexao, $id){
	$query = "select id_organizacao from musico_organizacao where id_musico = {$id}";
	$resultado = mysqli_query($conexao, $query);
	$resultado = mysqli_fetch_assoc($resultado);
	
	$query = "select organizacao from organizacao where id = {$resultado['id_organizacao']}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function editaImagemPerfil($conexao){
	$imagename=$_FILES["imagemPerfil"]["name"];
	move_uploaded_file($_FILES["imagemPerfil"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil.jpg";

	$query = "update musicos set url = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}

function editaImagemPerfil1($conexao){
	$imagename=$_FILES["imagemPerfil1"]["name"];
	move_uploaded_file($_FILES["imagemPerfil1"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil1.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil1.jpg";

	$query = "update musicos set imagem_perfil1 = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}

function editaImagemPerfil2($conexao){
	$imagename=$_FILES["imagemPerfil2"]["name"];
	move_uploaded_file($_FILES["imagemPerfil2"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil2.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil2.jpg";

	$query = "update musicos set imagem_perfil2 = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}
function editaImagemPerfil3($conexao){
	$imagename=$_FILES["imagemPerfil3"]["name"];
	move_uploaded_file($_FILES["imagemPerfil3"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil3.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil3.jpg";

	$query = "update musicos set imagem_perfil3 = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}

function editaImagemPerfil4($conexao){
	$imagename=$_FILES["imagemPerfil4"]["name"];
	move_uploaded_file($_FILES["imagemPerfil4"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil4.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil4.jpg";

	$query = "update musicos set imagem_perfil4 = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}

function editaImagemPerfil5($conexao){
	$imagename=$_FILES["imagemPerfil5"]["name"];
	move_uploaded_file($_FILES["imagemPerfil5"]['tmp_name'], '_uploads/' . $_SESSION["email-logado"] . "-perfil5.jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-perfil5.jpg";

	$query = "update musicos set imagem_perfil5 = '{$imagemURL}'";
	mysqli_query($conexao, $query);
}


function editaCategoria($conexao, $id, $idCategoria){
	$query = "delete from musico_categoria where id_musico = {$id}";
	mysqli_query($conexao, $query);

	$query = "insert into musico_categoria (id_musico, categoria_id) values ({$id}, {$idCategoria})";
	mysqli_query($conexao, $query);
}

function editaGenero($conexao, $id, $generos){
	$query = "delete from musico_genero where id_musico = {$id}";
	mysqli_query($conexao, $query);

	for ($i=0; $i < count($generos); $i++) { 
		$query = "insert into musico_genero (id_musico, id_genero) values ({$id}, {$generos[$i]})";
		mysqli_query($conexao, $query);
	}
	
}

function editaLocalidade($conexao, $id, $idLocalidade){
	$query = "delete from musico_localidade where id_musico = {$id}";
	mysqli_query($conexao, $query);

	$query = "insert into musico_localidade (id_musico, id_localidade) values ({$id}, {$idLocalidade})";
	mysqli_query($conexao, $query);
	
}

function editaOrganizacao($conexao, $id, $idOrganizacao){
	$query = "delete from musico_organizacao where id_musico = {$id}";
	mysqli_query($conexao, $query);

	$query = "insert into musico_organizacao (id_musico, id_organizacao) values ({$id}, {$idOrganizacao})";
	mysqli_query($conexao, $query);
	
}

function editaBiografia($conexao, $id, $biografia){
	$biografia = mysqli_real_escape_string($conexao, $biografia);
	$query = "update musicos set biografia = '{$biografia}' where id = {$id}";
	mysqli_query($conexao, $query);
}

function atualizaImagem($conexao, $sessaoImagem, $id, $nome_temporario){
	move_uploaded_file($nome_temporario, '_uploads/' . $_SESSION["email-logado"] . "-" . $sessaoImagem . ".jpg");
	$imagemURL = '_uploads/' . $_SESSION["email-logado"] . "-" . $sessaoImagem . ".jpg";

	$query = "update musicos set ". $sessaoImagem ." = '{$imagemURL}' where id = {$id}";
	mysqli_query($conexao, $query);
}