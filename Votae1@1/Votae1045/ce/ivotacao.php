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
<html lang="pt-br">
<head>
<title>Instrução da votação</title>
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
<!----  nome da eleicao ---- >
if(document.form.eleicao.value=="Selecione...")
{
alert("Por favor selecione a eleicao.");
document.form.eleicao.focus();
return false;
}
<!----  finalidade da eleicao ---- >
if(document.form.ivotacao.value=="")
{
alert("Por favor informe as instruções que deseja que o eleitor venha a saber.");
document.form.ivotacao.focus();
return false;
}
}
</script>
</head>
<body>
	<div class="container">
	
		<h2>Instrução da votação</h2>
		<form name="form" method="post" action="salva/salva_ivotacao.php" onSubmit="return validacao();">
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
				<label>Instruções para votação:</label>
				<textarea class="form-control" name="ivotacao" id="ivotacao" rows="6" cols="40" placeholder="Digite aqui as instruções de votação.
				Para votar Sim = insira 1 ou 01 e clique em votar.
				Não = 2, ou 02 e clique em votar
				Abstenção = qualquer outra combinação de numero e e clique em votar." /></textarea>
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<label>Informação complementar:</label>
				<textarea class="form-control" name="complemento" id="complemento" rows="6" cols="40" placeholder="Se necessário..." /> </textarea>
				</div>
			</fieldset>
			<fieldset class="grupo">
				<div class="form-group">
				<input type="submit" name="enviar" value="Cadastrar instrução"/>
				<input type="submit" name="limpar" value="Limpar"/>
				<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>