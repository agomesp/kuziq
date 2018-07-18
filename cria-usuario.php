<?php 
require_once("conecta.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = md5($_POST["senha"]);
$query = "insert into musicos (nome, email, senha) values ('{$nome}', '{$email}', '{$senha}')";
mysqli_query($conexao, $query);
header("login.php");