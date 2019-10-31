<?php
require_once ("../conecta_banco.php");
require_once ("../session.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<title>Votae</title>
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
</head>
<body>
	<section id="about" class="about">
		<?php include_once "about.php"?>
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary-b">
			<div class="row ">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
					<div class="container">
						<h1>Votação Sigilosa</h1>
						<br>
						<p>Para votar de forma sigilosa precisamos que você crie um nome de usuario especificamente para esta eleição. Este nome de usuário de votação será criptografado,
						gravado em banco de dados, para ser utilizado em casos de auditoria da votação.</p>
						<form name="loginform" method="post" action="exec_votar_sigilo.php" onsubmit="return validacao();">
							<fieldset class="grupo">
								<div class="form-group">
								<?php
								//busca eleições abertas
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
								<label>Informe um nome de usuario de votação:</label>
								<input  class="form-control" name="nomec" size="40" type="text" placeholder="Informe um nome de usuário de votação que será criptografado (vide informação acima" >
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
								<input name="entrar" value="Acessar Votação" type="submit" class="btn btn-primary"/>
								<input type="reset" name="reset" value="Limpar" class="btn btn-warning"/>
								<input type="button" name="cancela" value="Cancelar" class="btn btn-danger"  onclick="window.location.href='../painel.php'"/>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-->
	</section>
	<footer>
		<?php include_once "footer.php"?>
	</footer>
	<script type="text/javascript">
	function validacao() {
	if(document.loginform.nomec.value=="")
	{
	alert("Por favor informe um nome de usuario.");
	document.loginform.nomec.focus();
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
</body>
</html>