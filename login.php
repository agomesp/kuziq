<?php require_once("conecta.php");
require_once("banco-cliente.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if ($usuario==NULL) {
	$_SESSION["danger"] = "Usuário ou senha incorreto.";
	header("Location: login-musico.php");
	die();
}else{
	$_SESSION["email-logado"] = $usuario["email"];
	$_SESSION["nome-logado"] = $usuario["nome"];
	$_SESSION['id-logado'] = $usuario['id'];

	if ($usuario["configurado"] == "1") {
		$_SESSION["configurado"] = true;
	}else{
		$_SESSION["configurado"] = false;
	}

	verificaUsuario($_SESSION["email-logado"], $_SESSION['id-logado']);
}
