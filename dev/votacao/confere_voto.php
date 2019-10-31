<?php session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
header("Location: index.php");
exit;
} 
$logado=($_SESSION ["email"]);
?>
<?php
include "../conecta_banco.php";
?>
<html>
<head>
<title>Conferir votação</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/stylish-portfolio.css" rel="stylesheet">
<link href="../css/estilo_pdo.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">

</head>
<body>
 	<section id="about" class="about">
		<?php include_once "about.php"?>
	</section>
		<!-- Services -->
	<section id="services" class="services bg-primary-b">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<h1>Minhas votações</h1>
						<br/><br/>
						<?php
						echo "Usuário: " .$logado. "<br>";
						 // cria a instrução SQL que vai selecionar os dados votante
									$querya = sprintf("SELECT * FROM user WHERE email = '$logado' AND (situacao = 1) ");
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
								<h3>Você foi autorizado a votar nas seguintes eleições(consultas, pesquisas...):</h3>
						<table class="table" border="1">
						<thead>
						<tr>
						<td width="25%">Data</td>
						<td width="70%">Eleição</td>
						<td width="05%">Votou</td>
						</tr>
						</thead>
								
						<?php	
										
						// cria a instrução SQL que vai selecionar os dados dos itens
						$query = sprintf("SELECT *
						FROM votantes INNER JOIN eleicoes ON
						eleicoes.ideleicao=votantes.ide
						WHERE votantes.iduser ='$iduser' ORDER BY ide DESC LIMIT 5 ");
						// executa a query
						$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
						// transforma os dados em um array
						$linha = mysqli_fetch_assoc($dados);
						// calcula quantos dados retornaram
						$total = mysqli_num_rows($dados);
						?>

						
						<?php
						// se o número de resultados for maior que zero, mostra os dados//
						if($total == 0) {echo "Não encontramos votação com seu usuário";}
						if($total > 0) { 
						
						// inicia o loop que vai mostrar todos os dados
						do {
						$eleicao=$linha['eleicao'];
						$votante=$linha['iduser'];
						$data=$linha['data'];
						$votou=$linha['votou'];
						$datae=date("d/m/Y", strtotime($data));
						 if ($votou == 0) { 
						 $vvoto='Não';} 
						else {  $vvoto='Sim';}
						?>
						<table class="table" border="1">
						<tbody>
						<tr>
						<td width="25%"><?php  echo $datae ?> </td>
						<td width="70%"> <?php echo $eleicao ?></td>
						<td width="05%"> <?php echo $vvoto?> </td>
						</tr>
						</tbody>
						</table>
						
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
						

<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../painel.php'"/>
				</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>
	<!-- section ligth -->
	<section id="life" class="services bg-primary">
		<div class="life">
		</div>
	</section>
	<!-- /.section ligth -->
	<!-- Footer -->
	<footer>
		<?php include_once "footer.php"?>
	</footer>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
</body>
</html>