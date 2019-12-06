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
	<title>Alterar eleicao</title>
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
			$eleicao=$_POST['eleicao'];
			$erro= 0;
			//verificar se foi digitado dados no campo eleicao//
			if (empty ($eleicao))
			{echo "Favor digitar o nome da eleicao<br>"; $erro=1;}
			//verifica se não houve erros//
			if ($erro==0)
			{echo ""; }
			// cria a instrução SQL que vai selecionar os dados
			$query = sprintf("SELECT * FROM eleicoes WHERE ideleicao ='$eleicao'");
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
			$id=$linha['ideleicao'];
			$nome=$linha['eleicao'];
			$branco=$linha['branco'];
			$nulo=$linha['nulo'];
			$data=$linha['data'];
			$horai=$linha['hora'];
			$horaf=$linha['horaf'];
			$proposta=$linha['proposta'];
			$tipo=$linha['tipo'];
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
						<h2>Alterar eleição</h2>
						<form name="form" method="post" action="salva/salva_altera_eleicao.php" onSubmit="return validacao();">
							<fieldset class="grupo">
								<div class="form-group">
									<input type="hidden" name="id" value="<?php print "$id"?>"/> 
									<label>Nome da eleição:</label>
									<input class="form-control" name="eleicao" value=" <?php print "$nome" ?>"/> 
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<label>Proposição:</label>
									<textarea  class="form-control" name="proposta" cols="40" rows="3"> <?php print "$proposta" ?></textarea> 
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<label>Data da eleição:</label>
									<input type="date" class="form-control" name="data" maxlength="12" value="<?php print "$data" ?>" onkeypress="mascara(this, '##-##-####')" />
									<label>Hora início:</label>
									<input type="time" class="form-control" id="horario" name="horai" maxlength="5" value="<?php print "$horai" ?>" onkeypress="mascara(this, '##:##')"/> 
									<label>Hora final:</label>
									<input type="time"  class="form-control" id="horari" name="horaf" maxlength="5" value="<?php print "$horaf" ?>" onkeypress="mascara(this, '##:##')"/>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<?php	   
										$query = mysqli_query($mysqli, "SELECT * FROM condicao");
									?>
									<label for="">Permitido voto branco</label>		     
									<select class="form-control" name="branco">
									<option class="form-control" name="">Selecione...</option>
									<?php while($var = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $var['id'] ?>"
									<?php echo($var['id'] == $branco ? 'selected' : false); ?>>
									<?php echo $var['sn'] ?></option>
									<?php } ?>
									</select>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<?php	   
									$query = mysqli_query($mysqli, "SELECT * FROM condicao");
									?>
									<label for="">Permitido voto em nulo</label>		     
									<select class="form-control" name="nulo">
									<option class="form-control" name="">Selecione...</option>
									<?php while($var = mysqli_fetch_array($query)) { ?>
									<option value="<?php echo $var['id'] ?>"
									<?php echo($var['id'] == $nulo ? 'selected' : false); ?>>
									<?php echo $var['sn'] ?></option>
									<?php } ?>
									</select>
								</div>
							</fieldset>
							<fieldset class="grupo">
								<div class="form-group">
									<?php	   
									$query = mysqli_query($mysqli, "SELECT * FROM tipo_eleicao");
									?>
									<label for="">Tipo de eleição</label>		     
									<select class="form-control" name="tipo">
									<option class="form-control" name="">Selecione...</option>
									<?php while($var = mysqli_fetch_array($query)) { ?>
									<option class="form-control" value="<?php echo $var['idtipo'] ?>"
									<?php echo($var['idtipo'] == $tipo ? 'selected' : false); ?>>
									<?php echo $var['tipo'] ?>
									</option>
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
		<?php include_once "../footer.php"?>
	</footer>	
	<script type="text/javascript">
	function mascara(t, mask)
	{
		var i = t.value.length;
		var saida = mask.substring(1,0);
		var texto = mask.substring(i)
		if (texto.substring(0,1) != saida){
		t.value += texto.substring(0,1);
		}
	}
	function validacao() 
	{
		<!----  nome da eleicao ---- >
		if(document.form.eleicao.value=="")
		{
		alert("Por favor informe o nome da eleicao.");
		document.form.eleicao.focus();
		return false;
		}
		<!----  finalidade da eleicao ---- >
		if(document.form.proposta.value=="")
		{
		alert("Por favor informe a que se determina.");
		document.form.proposta.focus();
		return false;
		}
		<!----  tipo da eleicao ---- >
		if(document.form.tipo.value=="Selecione...")
		{
		alert("Por favor informe o tipo da eleicao.");
		document.form.tipo.focus();
		return false;
		}
		<!---- permite voto branco  ---- >
		if(document.form.branco.value=="Selecione...")
		{
		alert("Por favor informe se será permitida voto em branco.");
		document.form.branco.focus();
		return false;
		}
		<!---- permite voto nulo  ---- >
		if(document.form.nulo.value=="Selecione...")
		{
		alert("Por favor informe se será permitido voto nulo.");
		document.form.nulo.focus();
		return false;
		}
	}
	</script>
</body>
</html>
