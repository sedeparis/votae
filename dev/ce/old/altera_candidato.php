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
<title>Alterar candidato
</title>
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

<!-- Bootstrap CSS -->

<script type="text/javascript">

function validacao() {
<!----  nome da candidato ---- >
if(document.form.candidato.value=="Selecione...")
{
alert("Por favor informe o nome da candidato.");
document.form.candidato.focus();
return false;
}

}
</script>
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
						<h2>Alterar candidato</h2>
						<form name="form" method="post" action="exec_altera_candidato.php" onSubmit="return validacao();">
						<fieldset class="grupo">
						<div class="form-group">
						<?php
						$query = mysqli_query($mysqli, "SELECT * FROM candidatos");
						?>
						<label for="">Selecione o candidato</label>
						<select class="form-control" name="candidato">
						<option name="">Selecione...</option>
						<?php while($var = mysqli_fetch_array($query)) { ?>
						<option value="<?php echo $var['id'] ?>"><?php echo $var['candidato'] ?></option>
						<?php } ?>
						</select>
						</div>
						</fieldset>
						<fieldset class="grupo">
						<div class="form-group">
						<input type="submit" id="submit" value="Executar" class="btn btn-primary"/>
						<input type="reset" id="reset" value="Limpar" class="btn btn-warning"/>
						<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
						</div>
						</fieldset>
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
</body>
</html>