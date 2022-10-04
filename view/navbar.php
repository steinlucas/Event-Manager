
<?php
@session_start();
?>
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
<a href="" style="width: 80%"></a>
<div class="navbar-nav ml-auto action-buttons">
	<span class="navbar-text">
	    Seja bem vindo: <?php echo $_SESSION['login'];?>
	  </span>
	  	
	  	<a href="/prova/logout.php">Sair</a>
  </div>
</nav>
