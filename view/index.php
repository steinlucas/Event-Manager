<?php
session_start();

$baseURL = $_SERVER['DOCUMENT_ROOT'];
include_once($baseURL."/prova/bd/Evento.php");

$listaEventos = pesquisarEventos();

$msg = "";
if (isset($_SESSION['msgErro'])) {
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
 	<h1 style="text-align: center">Listagem de Eventos</h1>
 	<br>
		<div class="panel panel-default">
		  <div class="panel-body">

			<table class="table" id="tableListaUsuarios">
			    <thead>
			      <tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Sigla</th>
				<th>Data Início</th>
				<th>Data Fim</th>

				<th>Carga Horária</th>
				<th>Local Realização</th>
				<th>E-mail Organizador</th>
				<th>Responsável Evento</th>
				<th>Código Situação</th>
				
				<th>Excluir</th>
				<th>Alterar</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php
			foreach($listaEventos as $umRegistro){

			?>
			<!-- -->

				<tr>
				<td><?php echo $umRegistro['codigo'];?></td>
				<td><?php echo utf8_encode($umRegistro['nome']);?></td>
				<td><?php echo $umRegistro['sigla'];?></td>
				<td><?php
					$date = new DateTime($umRegistro['data_inicio']);
					echo $date->format('d/m/Y'); 
				?>
				</td>
				<td><?php 
					$date = new DateTime($umRegistro['data_fim']);
					echo $date->format('d/m/Y'); 

					?>
				</td>
				<td><?php echo $umRegistro['carga_horaria'];?></td>
				<td><?php echo $umRegistro['local_realizacao'];?></td>
				<td><?php echo $umRegistro['email_organizacao'];?></td>
				<td><?php echo $umRegistro['responsavel_evento'];?></td>
				<td><?php echo utf8_encode($umRegistro['descricao_situacao']);?></td>
				<td><a href="../remover.php?codigo=<?php echo $umRegistro['codigo'];?>"> <img style="width: 20px" src="/prova/images/delete.png"><a/></td>
				<td><a href="alterar.php?codigo=<?php echo $umRegistro['codigo'];?>&nome=<?php echo $umRegistro['nome'];?>&sigla=<?php echo $umRegistro['sigla'];?>&data_inicio=<?php echo $umRegistro['data_inicio'];?>&data_fim=<?php echo $umRegistro['data_fim'];?>&carga_horaria=<?php echo $umRegistro['carga_horaria'];?>&local_realizacao=<?php echo $umRegistro['local_realizacao'];?>&email_organizacao=<?php echo $umRegistro['email_organizacao'];?>&responsavel_evento=<?php echo $umRegistro['responsavel_evento'];?>&descricao_situacao=<?php echo $umRegistro['descricao_situacao'];?>"> <img style="width: 20px" src="/prova/images/alterar.png"><a/></td>
			      </tr>
			<?php } ?>
			    </tbody>
			  </table>
			 	<br>
			<div><?php echo $msg; ?></div>
		<div>
			  <a style="float: left" href="/prova/view/inserir.php" class="btn btn-primary">Inserir Evento</a>

			</div>
		</div>
	</div>
</body>
</html>