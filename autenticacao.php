<?php
session_start();
$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once ($baseURL."/prova/bd/Autenticador.php");

if (isset($_POST["usuario"]) && isset($_POST["senha"])) {

	$usuario = $_POST["usuario"];
	$senha = $_POST["senha"];
	
	if (autenticar($usuario, $senha)) {
		@session_start();
		$_SESSION['login'] = $usuario;

		header('Location: /prova/view/index.php');
	} else {
		$_SESSION['msgErro'] = "Usuário ou senha inválido!";
		header('Location: /prova/view/login.php');
	}
} else {
	$_SESSION['msgErro'] = "Usuário ou senha inválido!";
	header('location: /prova/');
}