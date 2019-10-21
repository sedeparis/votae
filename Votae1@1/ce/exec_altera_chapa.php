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
	<title>Alterar chapa/proposta
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
	<!-- script de validação ---->
	<script type="text/javascript">
	function validacao() {
	<!---- chapa  ---- >
	if(document.form.chapa.value=="")
	{
	alert("chapa não pode ficar em branco.");
	document.form.chapa.focus();
	return false;
	}
	<!---- chapas  ---- >
	if(document.form.nchapa.value=="")
	{
	alert("Por favor informe numero da chapa.");
	document.form.nchapa.focus();
	return false;
	}
	<!----eleicao  ---- >
	if(document.form.eleicao.value=="Selecione...")
	{
	alert("Por favor Confirme a eleição.");
	document.form.eleicao.focus();
	return false;
	}
	if(document.form.sit.value=="Selecione...")
	{
	alert("Por favor Confirme a situação da chapa.");
	document.form.sit.focus();
	return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<h2>Alterar Chapa ou propostas</h2>
		<?php
		//recolhe dados da pagina anterior
		$chapa=$_POST['chapa'];
		$erro= 0;
		//verificar se foi digitado dados no campo chapa//
		if (empty ($chapa))
		{echo "Favor digitar o nome da chapa<br>"; $erro=1;}
		//verifica se não houve erros//
		if ($erro==0)
		{echo ""; }
		// cria a instrução SQL que vai selecionar os dados
		$query = sprintf("SELECT * FROM chapas WHERE idchapa ='$chapa'");
		// executa a query
		$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
		// transforma os dados em um array
		$linha = mysqli_fetch_assoc($dados);
		// calcula quantos dados retornaram
		$total = mysqli_num_rows($dados);
		?>
		<?php
		// se o número de resultados for maior que zero, mostra os dados//
		if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
		$id=$linha['idchapa'];
		$nome=$linha['chapa'];
		$ide=$linha['ideleicao'];
		$representa=$linha['representante'];
		$situacao=$linha['situacao'];
		?>
		<form name="form" method="post" action="salva/salva_altera_chapa.php" onSubmit="return validacao();">
			<fieldset class="grupo">
			<div class="form-group">
			<input type="hidden" name="id" value="<?php print "$id"?>"/>
			<label><b>Número - Nome do chapa:</b></label>
			<input type="text"  class="form-control" name="chapa" size="30" value=" <?php print "$nome" ?>"/>
			</div>
			</fieldset>
			<div class="form-group">
			<label classe="form-control">Candidato-representante:</label>
			<input type="text" class="form-control" name="representa" size="30" value=" <?php print "$representa" ?>"/>
			</div>
			<fieldset class="grupo">
			<div class="form-group">
			<?php
			$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' AND (aberta=0)");
			?>
			<label for="">Eleição</label>
			<select class="form-control" name="eleicao">
			<option class="form-control" name="">Selecione...</option>
			<?php while($var = mysqli_fetch_array($query)) { ?>
			<option value="<?php echo $var['ideleicao'] ?>"
			<?php echo($var['ideleicao'] == $ide ? 'selected' : false); ?>>
			<?php echo $var['eleicao'] ?></option>
			<?php } ?>
			</select>
			</div>
			</fieldset>
			<fieldset class="grupo">
			<div class="form-group">
			<?php
			$query = mysqli_query($mysqli, "SELECT * FROM cdsituacao");
			?>
			<label for="">Situação</label>
			<select class="form-control" name="sit">
			<option class="form-control" name="">Selecione...</option>
			<?php while($set = mysqli_fetch_array($query)) { ?>
			<option value="<?php echo $set['situacao'] ?>"
			<?php echo($set['situacao'] == $situacao ? 'selected' : false); ?>>
			<?php echo $set['situacao'] ?></option>
			<?php } ?>
			</select>
			</div>
			</fieldset>
			<fieldset class="grupo">
			<div class="form-group">
			<input type="submit" value="Alterar chapa" name="alterachapa"/>
			<input type="reset" name="Limpar" value="Limpar" />
			<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
			</div>
			</fieldset>
			</div>
		</form>
		<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
		// fim do if
		}
		?>
		<?php
		// tira o resultado da busca da memória
		mysqli_free_result($dados);
		?>
	</div>
</body>
</html>