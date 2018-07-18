<?php
	require_once("banco-cliente.php");
	session_destroy();
	header("Location: login-musico.php");
	die();
?>