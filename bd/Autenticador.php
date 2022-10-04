<?php

$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once ($baseURL."/prova//bd/Conexao.php");

function autenticar($usuario, $senha){
	$comandoSQL = "select * from usuarios where usuario = ? and senha = ?";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha);
	mysqli_stmt_execute($stmt);
	$resultado = mysqli_stmt_get_result($stmt);
	$resultado_array = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
	if(empty($resultado_array) == false){
		return true;
	} else{
		return false;
	}
}

