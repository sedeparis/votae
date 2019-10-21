<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include ("../../conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
<title>Votae: relatorio votantes</title>
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

if(document.form.eleicao.value=="Selecione...")
{
alert("Por favor selecione uma eleição para votar.");
document.form.eleicao.focus();
return false;
}
}
</script>
</head>
<body>
	<div class="container">
	<h1>Relatório de votantes</h1>
		<form name="form" method="post" action="evotantes.php" onsubmit="return validacao();">
			<fieldset class="grupo">
				<div class="form-group">
					<?php 
						$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' ORDER BY ideleicao DESC");
					?>
					<label for="">Selecione a eleição</label>
						<select class="form-control" name="eleicao">
						<option class="form-control" name="">Selecione...</option>
						<?php 
							while($busca = mysqli_fetch_array($query)) { 
						?>
						<option class="form-control" value="<?php 
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
					<input type="submit" name="buscad" value="Selecionar"/>
					<input type="reset" name="reset" value="Limpar"/>
					<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>