<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include "../conecta_banco.php";
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Voto zero</title>
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
alert("Por favor selecione a eleicao.");
document.form.eleicao.focus();
return false;
}
if(document.form.senha.value=="Selecione...")
{
alert("Por favor a senha.");
document.form.senha.focus();
return false;
}
}
</script>
</head>
<body>
	<div class="container">
	<h2>Resultado</h2>
		<form  name="form" method="POST" action="verifica_resultado.php" onSubmit="return validacao();">
			<fieldset class="grupo">
				<div class="form-group">
					<!---selecionar itens sem pesquisas --->
					<?php
					$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida='N' AND aberta=0");
					?>
					<label for="">Selecione a eleição</label>
					<select class="form-control"  name="eleicao">
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
			<div class="form-group">
			<input type="submit" id="submit" value="Imprimir" />
			<input type="reset" id="reset" value="Limpar dados" />
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../ce/admince.php'"/>
			</div>
		</form>
	</div>
</body>
</html>