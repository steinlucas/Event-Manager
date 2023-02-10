<?php
    include_once("bd/Evento.php");

    if (isset($_GET['codigo']) == false ) {
        header('Location: view/doesntexists.php');
    }

    $codigo        = $_GET['codigo'];
    $nome          = $_GET['nome'];
    $sigla         = $_GET['sigla'];
    $data_inicio   = $_GET['data_inicio'];
    $data_fim      = $_GET['data_fim'];
    $carga_horaria = $_GET['carga_horaria'];
    $local_realizacao   = $_GET['local_realizacao'];
    $email_organizacao  = $_GET['email_organizacao'];
    $responsavel_evento = $_GET['nome_responsavel'];
    $num_part = $_GET['numero_participantes'];
    $situacao = $_GET['situacao_evento'];
    
    alterarEvento($codigo, $nome, $sigla, $data_inicio, $data_fim, $carga_horaria, $local_realizacao, $email_organizacao, $responsavel_evento, $num_part, $situacao);
    header('Location: view/index.php');
?>