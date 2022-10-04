<?php
$conexao = Null;
function obterConexao(){
	global $conexao;
	if (!isset($conexao)) {
		$conexao = mysqli_connect("localhost", "root", "", "prova");
	}
	return $conexao;
}