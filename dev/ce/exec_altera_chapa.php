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
	<title>Alterar chapa/proposta</title>
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
	$chapa=$linha['chapa'];
	$nchapa=$linha['nchapa'];
	$ide=$linha['ideleicao'];
	$representa=$linha['representante'];
	$situacao=$linha['situacao'];
	?>
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
						<h2>Alterar chapa ou propostas</h2>
						<form name="form" method="post" action="salva/salva_altera_chapa.php" onSubmit="return validacao();">
							<fieldset class="grupo">
							<div class="form-group">
							<input type="hidden" name="id" value="<?php print "$id"?>"/>
							<label><b>Número:</b></label>
							<input type="text"  class="form-control" name="nchapa" size="30" value=" <?php print "$nchapa" ?>"/>
							<label><b>Nome do chapa:</b></label>
							<input type="text"  class="form-control" name="chapa" size="30" value=" <?php print "$chapa" ?>"/>
							</div>
							</fieldset>
							<div class="form-group">
							<label classe="form-control">Candidato-representante:</label>
							<input type="text" class="form-control" name="representa" size="30" value=" <?php print "$representa" ?>"/>
							</div>
							<fieldset class="grupo">
							<div class="form-group">
							<?php
							$query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida ='N' AND (aberta=0)");
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
							<input type="submit" id="submit" value="Executar" class="btn btn-primary"/>
							<input type="reset" id="reset" value="Limpar" class="btn btn-warning"/>
							<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'" class="btn btn-danger"/>
							</div>
							</fieldset>
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
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col-lg-10 -->
		</div>
	</section>
	<footer>
		<?php include_once "footer.php"?>
	</footer>
	<!-- script de validação ---->
	<script type="text/javascript">
		function validacao() {
		<!---- chapa  ---- >
		if(document.form.chapa.value=="")
		{
		alert("Nome e número da chapa não pode ficar em branco.");
		document.form.chapa.focus();
		return false;
		}
		<!---- representante  ---- >
		if(document.form.representa.value=="")
		{
		alert("Nome do candidato ou representante não pode ficar em branco.");
		document.form.representa.focus();
		return false;
		}
		<!----eleicao  ---- >
		if(document.form.eleicao.value=="Selecione...")
		{
		alert("Por favor confirme a eleição.");
		document.form.eleicao.focus();
		return false;
		}
		if(document.form.sit.value=="Selecione...")
		{
		alert("Por favor confirme a situação da chapa.");
		document.form.sit.focus();
		return false;
		}
		}
	</script>
</body>
</html>