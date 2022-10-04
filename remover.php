<?php
    include_once("bd/Evento.php");

    if (isset($_GET['codigo']) == false ){
        header('Location: view/index.php');
    }

    $codigo = $_GET['codigo'];
    
    removerEvento($codigo);
    header('Location: view/index.php');
?>