<?php
$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once ($baseURL.'/prova/bd/Conexao.php');

	
function pesquisarEventos(){
	$comandoSQL = "select e.*, se.descricao as descricao_situacao from eventos e  join situacao_evento se on se.codigo = e.codigo_situacao";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_execute($stmt);
	$resultado = mysqli_stmt_get_result($stmt);
	$listaEventos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
	return $listaEventos;
}

function pesquisarSituacaoEvento(){
	$comandoSQL = "select * from situacao_evento";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_execute($stmt);
	$resultado = mysqli_stmt_get_result($stmt);
	$lista = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
	return $lista;

}


function inserirEvento($nome, $sigla, $dt_ini, $dt_fim, $ch, $local, $email, $nome_respo, $num_part, $situacao){
	$comandoSQL = 'insert into prova.eventos (nome,sigla, data_inicio, data_fim, carga_horaria, local_realizacao, email_organizacao, responsavel_evento, numero_participantes, codigo_situacao) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_bind_param($stmt, 'ssssisssii', $nome, $sigla, $dt_ini, $dt_fim, $ch, $local, $email, $nome_respo, $num_part, $situacao);
	mysqli_stmt_execute($stmt);
	$resultado = mysqli_stmt_affected_rows($stmt);
	return $resultado;
}


function pesquisarEventoPorCodigo($codigo){
	$comandoSQL = "select e.*, se.descricao as descricao_situacao from eventos e  join situacao_evento se on se.codigo = e.codigo_situacao where e.codigo = ?";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_bind_param($stmt, 'i', $codigo);
	mysqli_stmt_execute($stmt);
	$resultado = mysqli_stmt_get_result($stmt);
	$evento = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
	return $evento;
}

//@todo
function removerEvento($codigo){
	$comandoSQL = "DELETE FROM EVENTOS WHERE CODIGO = ?";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_bind_param($stmt, 'i', $codigo);
	mysqli_stmt_execute($stmt);
}

//@todo
function alterarEvento($codigo, $nome, $sigla, $dt_ini, $dt_fim, $ch, $local, $email, $nome_respo, $num_part, $situacao){
	$comandoSQL = "UPDATE EVENTOS
					  SET NOME = ?,
					      SIGLA = ?,
						  
						  CARGA_HORARIA = ?,
						  LOCAL_REALIZACAO = ?,
						  EMAIL_ORGANIZACAO = ?,
						  RESPONSAVEL_EVENTO = ?,
						  CODIGO_SITUACAO = ?,
						  NUMERO_PARTICIPANTES = ?
					WHERE CODIGO = ?";
	$conexao = obterConexao();
	$stmt = mysqli_prepare($conexao, $comandoSQL);
	mysqli_stmt_bind_param($stmt, 'ssisssiii', $nome, $sigla, $ch, $local, $email, $nome_respo, $situacao, $num_part, $codigo);
	mysqli_stmt_execute($stmt);
}
