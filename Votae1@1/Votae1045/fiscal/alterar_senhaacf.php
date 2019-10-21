<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
	echo $_SESSION['email'];
	echo "</div>";
include ("../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
   <head>
      <title>password</title>
      <meta charset="utf-8"> 
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
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
		<div class="form-group">
      <label class="form-control">Usuário:</label>
      <input  class="form-control" type="text" name="user" size="30" value="<?php echo $_SESSION['email'] ?>"/>
	  </div>
	  </fieldset>
	  <div class="form-group">
      <input type="submit" name="buscad" value="Buscar"/>
	  <input type="reset" name="reset" value="Limpar"/>
	  <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='painelf.php'"/>
      </div>
	  </form>
      </div>
   </body>
</html>