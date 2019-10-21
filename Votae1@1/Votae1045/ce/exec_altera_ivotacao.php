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
	<title>Alterar instrucao votação
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
	<!----  ivotacao ---- >
	if(document.form.ivotacao.value=="")
	{
		alert("Por favor informe a isntrução de votaçao  da eleicao.");
		document.form.ivotacao.focus();
		return false;
	}
	}
	</script>
</head>
<body>
	<div class="container">
		<h2>Alterar instrução votação</h2>
		<?php
			$eleicao=$_POST['eleicao'];
			
			//verifica se existe candidato com esse nome ou algum candidato inscrito para a chapa
			$dupesql = "SELECT * FROM ivotacao where ideleicao= '$eleicao' ";
			$duperaw = mysqli_query($mysqli, $dupesql);
			if (mysqli_num_rows($duperaw) == 0) {
			echo "<br><br>Atenção! Nenhuma instrução foi cadastrada para essa eleição.
			<a href='admince.php'>Voltar</a> ";
			} else 
			{
					// cria a instrução SQL que vai selecionar os dados
					$query = sprintf("SELECT * FROM ivotacao WHERE ideleicao ='$eleicao'");
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
				$idiv=$linha['idiv'];
				$ivotacao=$linha['ivotacao'];
				$complemento=$linha['complemento'];
		?>
		<?php
				// finaliza o loop que vai mostrar os dados
					}while($linha = mysqli_fetch_assoc($dados));
				// fim do if
								}
		?>
					<form name="form" method="post" action="salva/salva_altera_ivotacao.php" onSubmit="return validacao();">
						<fieldset class="grupo">
							<div class="form-group">
								<input type="hidden" name="idiv" value="<?php print "$idiv"?>"/>
								<label>Instrução da votação:</label>
								<textarea class="form-control" name="ivotacao" cols="50" rows="6"><?php print "$ivotacao" ?></textarea>
							</div>
						</fieldset>
						<fieldset class="grupo">
							<div class="form-group">
								<label>Complemento:</label>
								<textarea class="form-control" name="complemento" cols="50" rows="6"><?php print "$complemento"?></textarea>
							</div>
						</fieldset>
						<fieldset class="grupo">
							<div class="submit">
								<input type="submit" value="Alterar instrução voto" name="alteraieleicao"/>
								<input type="reset" name="Limpar" value="Limpar" />
								<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
							</div>
						</fieldset>
					</form>
					<?php
						// tira o resultado da busca da memória
						mysqli_free_result($dados);
					?>
				<?php
			}	?>
	</div>
</body>
</html>