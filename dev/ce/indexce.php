<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Comissão</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function validacao() {
	if(document.loginform.email.value=="")
	{
	alert("Por favor informe o nome ou email.");
	document.loginform.email.focus();
	return false;
	}
	if(document.loginform.senha.value=="")
	{
	alert("Por favor informe a senha.");
	document.loginform.senha.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
			<br>
			<a href="../index.html"><img src="../img/logop.jpg"/></a>
		<div class="container">
			<h2>Comissão</h2>
			<div class="form-bottom">
				<form name="loginform" method="post" action="ce_authentication.php" onsubmit="return validacao();">
					<fieldset class="grupo">
					<div class="form-group">
					<label>Informe seu nome de usuário:</label>
					<input name="email" size="30" type="text" placeholder="usuario" class="form-control">
					</div>
					</fieldset>
					<fieldset class="grupo">
					<div class="form-group">
					<label>Informe sua senha:</label>
					<input name="senha" size="8" type="password" placeholder="Senha..." class="form-control"> </div>
					</fieldset>
					<div class="form-group">
					<input name="entrar" value="Acessar" type="submit" class="btn btn-primary">
					<input type="button" name="cancela" value="Cancelar" class="btn btn-warning" onclick="window.location.href='../index.php'"/>
					<input type="button" name="esqsenha" value="Esqueci minha senha" class="btn btn-info" 
					onclick="window.location.href='senha/index.php?pagina=recuperar'"/>
					<br>
					</div>
				</form>
			</div>
			<div class="container">
				<?php
				include '../conecta_banco.php';
				$sql = mysqli_query($mysqli, "SELECT * FROM parametros WHERE id=2");
				while($proc = mysqli_fetch_array($sql)) {
				echo  'Votae Versão '. $proc['valor']; }
				?>
			</div>
		</div>
	</div>
</body>
</html>