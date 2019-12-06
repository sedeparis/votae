<?php
include ("../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
   <head>
      <title>esqueci senha</title>
      <meta charset="utf-8"> 
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet"> 
  <link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	function validacao() {
	if(document.form.user.value=="")
	{
	alert("Por favor informe o nome de usuario.");
	document.form.user.focus();
	return false;
	}
	if(document.form.verificador.value=="")
	{
	alert("Por favor informe o código verificador.");
	document.form.verificador.focus();
	return false;
	}
	}
	</script>
</head>
   </head>
   <body>
	 <div class="container">
	 <img src="../img/logop.jpg">
	<h2>Refazer senha</h2>
      <br />
      <form name="form" action="exec_esqueci_senhaacf.php" method="post" onSubmit="return validacao();">
      
<fieldset class="grupo">		
		<div class="form-group">
      <label>Nome de Usuário- login:</label>
      <input  class="form-control" type="text" name="user" size="30" />
	  </div>
	  <div class="form-group">
<label>Digite o código Verificador:</label> 
<input class="form-control" type="text" size="25" name="verificador" /> 
</div>
	  </fieldset>
	  <div class="form-group">
      <input type="submit" name="buscad" value="Buscar"/>
	  <input type="reset" name="reset" value="Limpar"/>
	  <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='indexc.php'"/>
      </div>
	  </form>
      </div>
   </body>
</html>