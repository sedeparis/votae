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
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<title>Criptografar votante
	</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/stylish-portfolio.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- Bootstrap CSS -->
	<script type="text/javascript">
	
	function validacao() {
	if(document.form.eleicao.value=="Selecione...")
	{
	alert("Por favor selecione uma eleição para votar.");
	document.form.eleicao.focus();
	return false;
	}
	<!--verfica se algo foi digitado em nome--->
	if(document.form.nomec.value=="")
	{
	alert("Por favor informe um nome de usuario.");
	document.form.nomec.focus();
	return false;
	}
	var senha = form.senha.value;
	var senhac = form.senhac.value;
	if(senha == "" || senha.length <= 5){
	alert('Preencha o campo senha com minimo 6 caracteres');
	form.senha.focus();
	return false;
	}
	if(senhac == "" || senhac.length <= 5){
	alert('Preencha o campo confirmar senha com minimo 6 caracteres');
	form.senhac.focus();
	return false;
	}
	if (senha != senhac) {
	alert('A confirmação da senhas identificou que são diferentes');
	form.senhac.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<h1>Criptografar votante</h1>
		<form name="form" method="POST" action="exec_user_cript.php" onSubmit="return validacao();">
			<input type="hidden" name="user" value="<?php echo $logado ?>">
			<fieldset class="grupo">
			<div class="form-group">
				<?php
				$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE aberta = 1  AND concluida = 'N' ORDER BY ideleicao DESC");
				?>
				<label for="">Selecione a eleição</label>
				<select class="form-control" name="eleicao">
				<option  class="form-control" name="">Selecione...</option>
				<?php
				while($busca = mysqli_fetch_array($query)) {
				?>
				<option value="<?php
				echo $busca['ideleicao'] ?>">
				<?php echo $busca['eleicao'];?>
				</option>
				<?php } ?>
				</select>
			</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label>Crie um usuario que será criptografado para votar:</label>
				<input class="form-control" type="text" size="25" name="nomec" />
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label>Crie uma senha para votar com 6 caracteres ou mais:</label>
				<input class="form-control" type="password" size="7" name="senha" minlength="6" />
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label> Confirme a senha:</label>
				<input class="form-control" type="password" size="7" name="senhac"   minlength="6" />
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<input type="submit" value="Cadastrar e criptografar"  name="submit"/>
				<input type="reset" name="reset" value="Limpar" />
				<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../painel.php'"/>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>