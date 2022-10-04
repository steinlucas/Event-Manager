<?php
  include_once("../bd/Evento.php");
  $baseURL = $_SERVER['DOCUMENT_ROOT'];
  $listaEventos = pesquisarEventoPorCodigo($_GET['codigo']);
  $listaSituacao = pesquisarSituacaoEvento();
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
<?php 

?>
 <body>
  <?php include_once($baseURL."/prova/view/navbar.php");?>
	
	<div class="container">
		<h2>Insira os dados do evento:</h2>
    <?php
		  foreach($listaEventos as $umRegistro){
		?>
		<form action="/prova/alterar.php" method="get" name="formCadEvento" id="formCadEvento">
      <input type="hidden" class="form-control" id="codigo" name="codigo" value="<?php echo $umRegistro['codigo'];?>">
			    <div class="form-group">
			    	<label for="nome">Nome</label>
			        <input type="text" maxlength="45" id="nome" name="nome" class="form-control" required value="<?php echo $umRegistro['nome'];?>"/>
			    </div>
			    <div class="form-group">
			    	<label for="nome">Sigla</label>
		                <input type="text" maxlength="3" maxlength="45" id="sigla" name="sigla" class="form-control" required value="<?php echo $umRegistro['sigla'];?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome">Data de Inicio</label>
		                <input type="text" maxlength="10" id="data_inicio" name="data_inicio" class="form-control" required value="<?php $date = new DateTime($umRegistro['data_inicio']); echo $date->format('d/m/Y'); ?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome">Data fim</label>
		                <input type="text" maxlength="10" id="data_fim" name="data_fim" class="form-control" required value="<?php $date = new DateTime($umRegistro['data_fim']); echo $date->format('d/m/Y'); ?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome">Carga Horária</label>
		                <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" required value="<?php echo $umRegistro['carga_horaria'];?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome">Local de Realização</label>
		                <input type="text" maxlength="45" id="local_realizacao" name="local_realizacao" class="form-control" required value="<?php echo $umRegistro['local_realizacao'];?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome">E-mail da organização</label>
		                <input type="email" maxlength="45" id="email_organizacao" name="email_organizacao" class="form-control" required value="<?php echo $umRegistro['email_organizacao'];?>"/>
		            </div>
		            <div class="form-group">
			    	<label for="nome_responsavel">Responsável pelo Evento</label>
		                <input type="text" maxlength="45" id="nome_responsavel" name="nome_responsavel" class="form-control"/>
		            </div>
		            <div class="form-group">
			    	<label for="situacao_evento">Situacao_Evento</label>
			    	<select class="form-select" aria-label="Default select example" id="situacao_evento" name="situacao_evento" value="<?php echo $umRegistro['situacao_evento'];?>">
			    	<?php $selected = "selected";
			    		foreach($listaSituacao as $registro){?>
			    		 <option value="<?php echo $registro['codigo'];?>" <?php echo $selected;?>> <?php echo $registro['descricao'];?></option>
		                <?php 
		                	$selected = "";
		                	}?>
		                </select>
		            </div>
		            <div class="form-group">
			    	<label for="numero_participantes">Número de Participantes</label>
		                <input type="number" id="numero_participantes" name="numero_participantes" class="form-control" required value="<?php echo $umRegistro['numero_participantes'];?>"/>
		            </div>
      <?php } ?>
		<div style="clear: both">			
			<button type="button" class="btn btn-primary" onClick="history.back()" class="btn btn-default" >Voltar</button>
			<button type="submit" class="btn btn-outline-success btn-block pull-right" >Salvar</button>
		</div>
		</form>
	</div>

	</body>
</html>
