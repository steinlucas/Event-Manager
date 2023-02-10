<?php
session_start();

$msg = "";
if (isset($_SESSION['msgErro'])) {
	$msg = $_SESSION['msgErro'];
	unset($_SESSION['msgErro']); 
}

?>
<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
  	<title>Login</title>
	<link rel="stylesheet" href="/prova/css/style.css">
</head>

<body>
	<div class = "container">
		<div class="wrapper">
			<form id="formAutentica" action="/prova/autenticacao.php" method="post" class="form-signin">       
				<h3 class="form-signin-heading">Seja Bem vindo! Avaliação 1.</h3>
				<hr class="colorgraph"><br>
				
				<input type="text" class="form-control" name="usuario" placeholder="Username" required="" autofocus="" />
				<input type="password" class="form-control" name="senha" placeholder="Password" required=""/>
				<br>

				<?php echo $msg; ?>
				<br>

				<button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="submit">Login</button>  			
			</form>			
		</div>
	</div>
	<script src='/prova/js/jquery-3.6.1.min.js'></script>
</body>
</html>