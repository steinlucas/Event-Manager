<?php

session_start();

$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once ($baseURL."/prova/bd/Evento.php");
include_once ($baseURL.'/prova/validacoes.php');

$msgErro = "";

if (validarNome($_POST['nome']) == false) {
	$msgErro = $msgErro."Nome inválido (deve conter pelo menos 3 caracteres) <br>";
}

if(validarData($_POST['data_inicio']) == false) {
	$msgErro = $msgErro."Data de Início Inválida <br>";
}

if(validarData($_POST['data_fim']) == false) {
	$msgErro = $msgErro."Data Encerramento inválida <br>";
}

if(validarNumero($_POST['carga_horaria']) == false) {
	$msgErro = $msgErro."Carga Horária Inválida <br>";
}

if(validarVazio($_POST['local_realizacao']) == false) {
	$msgErro = $msgErro."Local de Realização Inválido <br>";
}

if(validarEmail($_POST['email_organizacao']) == false) {
	$msgErro = $msgErro."E-mail inválido Inválida <br>";
}

if(validarNome($_POST['nome_responsavel']) == false) {
	$msgErro = $msgErro."Nome do responsável inválido (deve conter pelo menos 3 caracteres)<br>";
}

if(validarNumero($_POST['numero_participantes']) == false) {
	$msgErro = $msgErro."Número de participantes Inválido <br>";
}

if(validarNumero($_POST['situacao_evento']) == false) {
	$msgErro = $msgErro."Situação do evento Inválida <br>";
}

if(strlen($msgErro) !=0) {
	$_SESSION['msgErro'] = $msgErro;
	header("Location: /prova/view/inserir.php");
	die();
}

$nome      = $_POST['nome'];
$sigla     = $_POST['sigla'];
$dt_ini    = $_POST['data_inicio'];
$dt_fim    = $_POST['data_fim'];
$carga_hor = $_POST['carga_horaria'];
$local 	   = $_POST['local_realizacao'];
$email     = $_POST['email_organizacao'];
$nome_resp = $_POST['nome_responsavel'];
$num_part  = $_POST['numero_participantes'];
$situacao  = $_POST['situacao_evento'];

if (inserirEvento($nome, $sigla, $dt_ini, $dt_fim, $carga_hor, $local, $email, $nome_resp, $num_part, $situacao)) {
	header('Location: /prova/view/index.php');
} else{
	$_SESSION['msgErro'] = 'Erro ao excluir evento';
	header('Location: /prova/view/inserir.php');
}