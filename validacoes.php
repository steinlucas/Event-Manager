<?php

function validarNome($texto){
	if (!preg_match ("/^[a-zA-z -]*$/", $texto) or strlen($texto)<3){
		return false;
	}
	return true;
}

function validarData($dt){
	$date = DateTime::createFromFormat('Y-m-d', $dt);
	return ($date!== false);
}	

function validarNumero($texto){
	if (!preg_match ("/^[0-9]*$/", $texto) ){  
		return false;
	}
	return true;
}

function validarEmail($email){
	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
	if (!preg_match ($pattern, $email) ){
		return false;
	}
	return true;
}

function validarTamanho($texto, $tam){
	$length = strlen ($texto);  
	if ( $length < $tam) {
		return false;
	}
	return true;  
}

function validarVazio($texto){
	return strlen($texto) >0;
}