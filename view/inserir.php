<?php
session_start();

$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once($baseURL."/prova/bd/Evento.php");

$listaSituacao = pesquisarSituacaoEvento();

$msg = "";
if(isset($_SESSION['msgErro'])){
	$msg = $_SESSION['msgErro'];
	unset($_SESSION['msgErro']); 
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avaliação I - Programação para Internet II | </title>

    <!-- Bootstrap -->
    <!-- CSS only -->
<link href="/prova/css/bootstrap.min.css" rel="stylesheet">

    <script src="/prova/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
    <script src="/prova/js/jquery-3.6.1.min.js" rel="stylesheet"></script>
    
  </head>

 <body>
  <?php include_once($baseURL."/prova/view/navbar.php");?>
	<div class="container">
		<h2>Insira os dados do evento:</h2>
		<div><?php echo $msg;?></div>
		<form action="/prova/salvar.php" method="post" name="formCadEvento" id="formCadEvento">
			    <div class="form-group">
			    	<label for="nome">Nome</label>
			        <input type="text" maxlength="3" id="nome" name="nome" class="form-control" required/>
			    </div>
				<br>
			    <div class="form-group">
			    	<label for="nome">Sigla</label>
		                <input type="text" id="sigla" name="sigla" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome">Data de Inicio</label>
		                <input type="date" id="data_inicio" name="data_inicio" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome">Data fim</label>
		                <input type="date" id="data_fim" name="data_fim" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome">Carga Horária</label>
		                <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome">Local de Realização</label>
		                <input type="text" id="local_realizacao" name="local_realizacao" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome">E-mail da organização</label>
		                <input type="email" id="email_organizacao" name="email_organizacao" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="nome_responsavel">Responsável pelo Evento</label>
		                <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control" required/>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="situacao_evento">Situacao_Evento</label>
			    	<select class="form-select" aria-label="Default select example" id="situacao_evento" name="situacao_evento">
			    	<?php $selected = "selected";
			    		foreach($listaSituacao as $registro){?>
			    		 <option value="<?php echo $registro['codigo'];?>" <?php echo $selected;?>> <?php echo $registro['descricao'];?></option>
		                <?php 
		                	$selected = "";
		                	}?>
		                </select>
		            </div>
					<br>
		            <div class="form-group">
			    	<label for="numero_participantes">Número de Participantes</label>
		                <input type="number" id="numero_participantes" name="numero_participantes" class="form-control" required/>
		            </div>
		<div style="clear: both">
		<br>
			<button type="button" class="btn btn-primary" onClick="history.back()" class="btn btn-default" >Voltar</button>
			<button type="submit" class="btn btn-outline-success btn-block pull-right" >Salvar</button>
		</div>
		</form>
	</div>

	</body>
</html>
