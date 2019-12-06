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
	<title>Cadastro de chapas</title>
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
						<h2>Cadastro de Chapas</h2>
						<form name="form" method="post" action="salva/salva_chapas.php" onSubmit="return validacao();">
							<fieldset class="grupo">
								<div class="form-group">
									<?php
									$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' AND aberta=0");
									?>
									<label for="">Selecione a eleicao</label>
									<select class="form-control" name="eleicao">
									<option name="">Selecione...</option>
									<?php while($var = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $var['ideleicao'] ?>"><?php echo $var['eleicao'] ?></option>
									<?php } ?>
									</select>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
								<label>Numero da chapa: (exceto códigos 99 e 100 reservados pelo sistema):</label>
								<input class="form-control" type="number" name="nchapa"  size="4" min="1" max="19" />
								</div>
								<div class="form-group">
								<label>Nome da chapa:</label>
								<input class="form-control" type="text"  class="form-control" name="nome" size="40"/>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
								<label>Nome de candidato ou representante:</label>
								<input type="text"  class="form-control"  name="representa" size="40"/>
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
	<!-- Bootstrap CSS -->
	<script type="text/javascript">
	function validacao() {
		if(document.form.eleicao.value=="Selecione...")
		{
		alert("Por favor informe a eleicao.");
		document.form.eleicao.focus();
		return false;
		}
		if(document.form.nchapa.value=="")
		{
		alert("Por favor informe o numero da chapa.");
		document.form.nchapa.focus();
		return false;
		}
		if(document.form.nome.value=="")
		{
		alert("Por favor informe o nome da chapa.");
		document.form.nome.focus();
		return false;
		}
		if(document.form.representa.value=="")
		{
		alert("Por favor informe o nome do representante ou candidato da chapa.");
		document.form.representa.focus();
		return false;
		}
	}
	</script>
</body>
</html>