<!DOCTYPE HTML><html lang="pt-BR"><head>	<title>Votae</title>	<meta charset="utf-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge">	<meta name="viewport" content="width=device-width, initial-scale=1">	<!-- Bootstrap CSS -->	<link href="css/bootstrap.css" rel="stylesheet">	<link href="css/style.css" rel="stylesheet">	<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->	<script src="bootstrap/dist/js/jquery.js"></script>	<script src="bootstrap/dist/js/bootstrap.min.js"></script>	<!-- Bootstrap CSS -->	<script type="text/javascript">	function validacao() { if(document.loginform.email.value=="")	{	alert("Por favor informe o nome ou email.");	document.loginform.email.focus();	return false;	}	if(document.loginform.senha.value=="")	{	alert("Por favor informe a senha.");	document.loginform.senha.focus();	return false;	}	}	</script></head><body>	<div class="container">		<br>		<a href="index.html"><img src="img/logop.jpg"/></a>				<div class="container">			<br><br>			<h2>Votante</h2>			<div class="form-bottom">				<form name="loginform" method="post" action="userauthentication.php" onsubmit="return validacao();">					<fieldset class="grupo">					<div class="form-group">					<label>Informe seu nome de usuário:</label>
					<input name="email" size="30" type="text" placeholder="usuario" class="form-control">					</div>					</fieldset>					<fieldset class="grupo">					<div class="form-group">					<label>Informe sua senha:</label>					<input name="senha" size="8" type="password" placeholder="Senha..." class="form-control"> </div>					</fieldset>					<div class="form-group">					<input name="entrar" value="Acessar" type="submit">					<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='index.php'"/>					<input type="button" name="esqsenha" value="Esqueci minha senha" onclick="window.location.href='esqueci_senha.php'"/>					<br>					</div>				</form>			</div>			<div class="container">			<?php			include 'conecta_banco.php';			$sql = mysqli_query($mysqli, "SELECT * FROM parametros WHERE id=2");			while($proc = mysqli_fetch_array($sql)) {			echo  'Votae Versão '. $proc['valor']; }			?>						</div>		</div>	</div></body></html>