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
?><!DOCTYPE html>
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
						<h1>Gerar Ata</h1>
						<br><br>
						<form name="form" method="post" action="verifica_exec_ata.php" onsubmit="return validacao();">
							<fieldset class="grupo">
								<div class="form-group">
									<?php
									$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' ORDER BY ideleicao DESC");
									?>
									<label for="">Selecione a eleição</label>
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
									<?php
									$query = mysqli_query($mysqli, "SELECT * FROM users WHERE tpuser=1 AND situacao=1");
									?>
									<label for="">Selecione o representante da comissão</label>
									<select  class="form-control" name="user">
									<option name="">Selecione...</option>
									<?php while($var = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $var['id'] ?>"><?php echo $var['email'] ?></option>
									<?php } ?>
									</select>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<label>Senha:</label>
									<input class="form-control" type="password" size="10" name="senha"/>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<input type="submit" id="submit" value="Executar" class="btn btn-primary"/>
									<input type="reset" id="reset" value="Limpar" class="btn btn-warning"/>
									<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'" class="btn btn-danger"/>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col-lg-10 -->
		</div>
	</section>
	<footer>
		<?php include_once "../footer.php"?>
	</footer>
	<script type="text/javascript">
	function validacao() 
	{
		if(document.form.eleicao.value=="Selecione...")
		{
		alert("Por favor selecione a eleicao.");
		document.form.eleicao.focus();
		return false;
		}
		<!----  nome da liberador ---- >
		if(document.form.user.value=="Selecione...")
		{
		alert("Por favor informe o nome do usuário.");
		document.form.user.focus();
		return false;
		}
		if(document.form.senha.value=="")
		{
		alert("Por favor insira a senha.");
		document.form.senha.focus();
		return false;
		}
	}
</script>
</body>
</html>