<?php
include "../conecta_banco.php";
?>

<html>
   <head>
      <title>password</title>
      < <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
   </head>
   <body>
    
	 <div class="container">
	<h2>Alterar senha ACF</h2>
      <br />
      <form name="form" action="exec_alterar_senhaacf.php" method="post">
      
<fieldset class="grupo">		
		<div class="campo">
      <label class="form-control">Usuário:</label>
      <input class="form-control" type="text" name="user" size="30"/>
	  </div>
	  </fieldset>
	  <div class="campo">
      <input type="submit" name="buscad" value="Buscar"/>
	  <input type="reset" name="reset" value="Limpar"/>
	  <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admin.php'"/>
      </div>
	  </form>
      </div>
   </body>
</html>