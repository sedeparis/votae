<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo MD5($_SESSION['email']);
echo "</div>";
include ("../conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<title>Votae</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function validacao() {
	if(document.loginform.nomec.value=="")
	{
	alert("Por favor informe o seu usuario criptografado.");
	document.loginform.nomec.focus();
	return false;
	}
	if(document.loginform.senhac.value=="")
	{
	alert("Por favor informe a senha.");
	document.loginform.senhac.focus();
	return false;
	}
	if(document.loginform.eleicao.value=="Selecione...")
	{
	alert("Por favor selecione uma eleição para votar.");
	document.loginform.eleicao.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<br>
		<br><p>Identifique-se como usuário votante.</p>
	</div>
	<div class="container">
		<br><br>
		<h1>Votar</h1>
		<br><br>

		<form name="loginform" method="post" action="authentication_votar.php" onsubmit="return validacao();">
			<fieldset class="grupo">
				<div class="form-group">
				<?php
				$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' AND (aberta = 1) ORDER BY ideleicao DESC");
				?>
				<label  for="">Selecione a eleição</label>
				<select class="form-control" name="eleicao">
				<option name="">Selecione...</option>
				<?php
				while($busca = mysqli_fetch_array($query)) {
				?>
				<option value="<?php
				echo $busca['ideleicao']
				?>">
				<?php
				echo $busca['eleicao'];?>
				</option>
				<?php } ?>
				</select>
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label>Nome de usuario de votação:</label>
				<input  class="form-control" name="nomec" size="40" type="text">
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label>Senha de votação:</label>
				<input class="form-control" name="senhac" size="8" type="password"> </div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<input name="entrar" value="Acessar Votação" type="submit">
				<input type="reset" name="reset" value="Limpar"/>
				<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../painel.php'"/>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>