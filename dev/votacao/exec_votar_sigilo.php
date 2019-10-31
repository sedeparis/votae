<?php
require_once ("../session.php");
include ("../conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Votae</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/font.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<section id="about" class="about">
		<?php include_once "../about.php"?>
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary-b">
			<div class="row ">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<div class="container">
							<h2>Votar</h2>
							<?php
								 $nomec= MD5($_POST['nomec']);
								//descobrir id e-mail sessao
								 $email=$_SESSION['email'];
								 $ide= $_POST['eleicao'];
							 // cria a instrução SQL que vai selecionar os dados votante
									$querya = sprintf("SELECT * FROM user WHERE email = '$email' AND (situacao = 1) ");
									// executa a query
									$dadosa = mysqli_query($mysqli, $querya) or die(mysqli_error($mysqli));
									// transforma os dados em um array
									$linhaa = mysqli_fetch_assoc($dadosa);
									// calcula quantos dados retornaram
									$totala = mysqli_num_rows($dadosa);
									?>
									<?php
									// se o número de resultados for maior que zero, mostra os dados//
									if($totala > 0) {
									// inicia o loop que vai mostrar todos os dados
									do {
									$emailg = $linhaa['email'];
									$iduser = $linhaa['id'];
									$nome = $linhaa['nome'];
							?>
								<?php
									// finaliza o loop que vai mostrar os dados
									}while($linhaa = mysqli_fetch_assoc($dadosa));
									// fim do if
									}
								?>
									<?php
								//verifica se o mesmo ja não votou
								$dupesql = "SELECT * FROM votantes WHERE ide= '$ide' AND (iduser ='$iduser') AND (votou = 1)";
								$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
								if (mysqli_num_rows($duperaw) > 0) {
								echo "<span class='colorred'>Atenção!! Você já votou (não há como votar duas vezes na mesma eleição)!.</span>";
								echo "<meta HTTP-EQUIV='refresh' CONTENT='10;URL=../painel.php'>";
								} else 
								{
										//verifica se o mesmo está autorizado a votar
									$dupesql = "SELECT * FROM votantes WHERE ide= '$ide' AND (iduser ='$iduser')";
									$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
									if (mysqli_num_rows($duperaw) == 0) {
									echo "<span class='colorred'>Atenção!! Você não está autorizado a votar nesta eleição. Consulte a comissão eleitoral!</span>";
									echo "<meta HTTP-EQUIV='refresh' CONTENT='10;URL=../painel.php'>";
									} else 
									{
										// cria a instrução SQL que vai selecionar os dados eleicao
										$query = sprintf("SELECT * FROM eleicoes WHERE ideleicao ='$ide'");
										// executa a query
										$dadosii = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
										// transforma os dados em um array
										$linhaii = mysqli_fetch_assoc($dadosii);
										// calcula quantos dados retornaram
										$totalii = mysqli_num_rows($dadosii);
									?>
										<?php
												// se o número de resultados for maior que zero, mostra os dados//
												if($totalii > 0) {
												// inicia o loop que vai mostrar todos os dados
												do {
												$eleicao = $linhaii['eleicao'];
												$ideleicao = $linhaii['ideleicao'];
												$proposta = $linhaii['proposta'];
										?>
										<?php
												// finaliza o loop que vai mostrar os dados
												}while($linhaii = mysqli_fetch_assoc($dadosii));
												// fim do if
												}
										?>
									<p>
									<span class="colorred">Votação para:  </span>
									<span class="colorblue"><?php echo "$eleicao"?></span></p>
									<p>
									<span class="colorred">Proposta: </span>
									<span class="colorblue">
									<?php echo "$proposta"?></span>
									</p>
									<?php

											// cria a instrução SQL que vai selecionar os dados eleicao
											$querya = sprintf("SELECT * FROM ivotacao WHERE ideleicao ='$ide'");
											// executa a query
											$dadosa = mysqli_query($mysqli, $querya) or die(mysqli_error($mysqli));
											// transforma os dados em um array
											$linhaa = mysqli_fetch_assoc($dadosa);
											// calcula quantos dados retornaram
											$totala = mysqli_num_rows($dadosa);
											?>
											<?php
											// se o número de resultados for maior que zero, mostra os dados//
											if($totala > 0) {
											// inicia o loop que vai mostrar todos os dados
											do {
											$ivotacao = $linhaa['ivotacao'];
											$ideleicao = $linhaa['ideleicao'];
											$complemento = $linhaa['complemento'];
											?>
											<?php
											// finaliza o loop que vai mostrar os dados
											}while($linhaa = mysqli_fetch_assoc($dadosa));
											// fim do if
											}
									?>
										<div class="form-group">
												<form name="form" method="POST" action="salva/salva_votar_sigilo.php" onSubmit="return validacao();">
													<p><span class="colorred">Instrução de votação:</p> </span>
													<span class="colorblue"><?php echo $ivotacao ?> </span>
													<br>
													<p><span class="colorred">Instrução complementares:</p> </span>
													<span class="colorblue"><?php echo $complemento ?> </span>
													<br>
													<fieldset class="grupo">
													<label>Digite o número da chapa ou seu voto:</label>
													<input class="form-control" type="number" id="voto" size="4" name="voto"  maxlength="2" />
													</fieldset>
													<fieldset class="grupo">
													<div class="submit">
													<br>
													<input type="hidden" name="ide" Value="<?php echo $ide ?>" />
													<input type="hidden" name="iduser" Value="<?php echo $iduser ?>" />
													<input type="hidden" name="nome" Value="<?php echo $nomec ?>" />
													
													<input type="submit" id="submit" value="Votar" name="Localizar" class="btn btn-primary"/>
													<input type="reset" id="reset" value="Limpar" name="reset" class="btn btn-warning"/>
													<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../painel.php'" class="btn btn-danger"/>
													</div>
													</fieldset>
												</form>
												<!-- /.form-group-->
										</div>
										<!-- /.row (nested) -->
							<?php   
							//end else;
									}
								//end else;
								}?>
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
		function validacao() {
		if(document.form.voto.value=="")
		{
		alert("Tem certeza que votorá em branco.");
		document.form.votob.focus();
		return false;
		}
		}
	</script>
</body>
</html>