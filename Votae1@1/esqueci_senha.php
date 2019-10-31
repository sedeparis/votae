<?php
include ("conecta_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>esqueci senha</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	function validacao() {
	if(document.form.cod.value=="")
	{
	alert("Por favor informe o seu código de usuario.");
	document.form.cod.focus();
	return false;
	}
	if(document.form.email.value=="")
	{
	alert("Por favor informe o email.");
	document.form.email.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<img src="img/logop.jpg">
		<h2>Esqueci minha senha</h2>
		<br />
		<form name="form" action="new_senha.php" method="post" onSubmit="return validacao();">
			<fieldset class="grupo">
			<div class="form-group">
			<label>Informe seu e-mail:</label>
			<input class="form-control" type="text" size="5" name="email" />
			</div>
			</fieldset>
			<div class="form-group">
			<input type="submit" name="buscad" value="Recuperar senha"/>
			<input type="reset" name="reset" value="Limpar"/>
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='indexu.php'"/>
			</div>
		</form>
	</div>
</body>
</html>