<?php
	require_once ("../../session.php");
include ("../../conecta_banco.php");
?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>VOTAe</title>
	<!-- Bootstrap Core CSS -->
	<link href="../../css/bootstrap.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="../css/stylish-portfolio.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
</head>
<body>
	<section id="about" class="about">
		<?php 
			include_once "../../about.php" ; 
		?>
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary-b">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<div class="container">
						<?php 
							$nomec= MD5($_POST['nome']);
							$ide= $_POST['ide'];
							$iduser= $_POST['iduser'];
							$voto=$_POST['voto'];
										// Salva na tabela de usuarios que criaram user cript
									$sql2 = ("INSERT INTO user_votou (iduser, ide) VALUES('$iduser','$ide')"); 
									$resultado2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
									echo "Dados do usuário votante salvo com Sucesso<br>";
									
										// salva na tabela de usuario critp
									$sql = ( "INSERT INTO votantes (iduser, ide, votou) VALUES('$iduser', '$ide', 1)");
									$resultado = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
									echo "Dados do usuário criptografado salvo com Sucesso<br>";
									
										//grava voto	
										$sql3 = ("INSERT INTO votacao (ide, idv, voto)
										VALUES('$ide', '$nomec', '$voto')");
										$resultado3 = mysqli_query($mysqli, $sql3) or die(mysqli_error($mysqli));
										echo "Voto efetuado com sucesso!";
								?>
								<?php
								echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../../painel.php'>";
								?>
						</div>
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.col-lg-10 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</section>
	<!-- Footer -->
	<footer>
		<?php include_once "../../footer.php" ;?>
	</footer>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
</body>
</html>