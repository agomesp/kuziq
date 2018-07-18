<?php require_once("conecta.php");
require_once("banco-cliente.php");

$adm = buscaAdm($conexao, $_POST["email"], $_POST["senha"]);

if ($adm==NULL) {
	$_SESSION["danger"] = "Usuário ou senha incorreto.";
	header("Location: login-adm.php");
	die();
}else{
	$_SESSION["email-logado-adm"] = $adm["email"];
	$_SESSION["nome-logado"] = $adm["nome"];
	$_SESSION['id-logado'] = $adm['id'];
	header("Location: painel-adm.php");
	die();
}
