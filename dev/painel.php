<?php
	session_start();
	if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
	header("Location: index.php");
	exit;
	} else 
	{
		echo '<div class="container">Voce já está logado como: ';
	}
	$logado=$_SESSION['email'];
	echo $logado;
	include 'conecta_banco.php';
	echo '</div>';
	if ($logado== ''){
	exit;
	}
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
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/stylish-portfolio.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
</head>
<body>
	<section id="about" class="about">
		<div class="container">
				<div class="row">
				<div class="col-lg-12 text-center">
				<h2>Votação eletrônica.</h2>
				<p class="lead">Eleições, assembléias, pesquisas e consultas públicas.</p>
				<img src="img/logo.jpg">
				</div>
				</div>
				<!-- /.row -->
		</div>
			<!-- /.container -->
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
				<br><br>
				<p>
					<a href="logout.php" class="btn btn-light">
						<span class="fa-stack fa-1x">
							<i class="fa fa-power-off fa-stack-2x"></i><br>
						</span>sair
					</a>
				</p>
					<h2>Painel Votante</h2>
					<hr class="small">	
					<div class="row">
						<!-- 1 new -->
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<a href="blank.php" class="btn btn-light">
							<span class="fa-stack fa-2x">
							<i class="fa fa-user fa-stack-2x"></i>
							</span>
							<h4>
							<strong>Votação </strong>
							</h4>
							<p>Aberta</p>
							</a>
							</div>
						</div>
						<!-- 2 new-->
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<a href="votacao/votar_sigilo.php" class="btn btn-light">
							<span class="fa-stack fa-2x">
							<i class="fa fa-check-square fa-stack-2x"></i>
							</span>
							<h4>
							<strong>Votação</strong>
							</h4>
							<p>Sigilosa</p>
							</a>
							</div>
						</div>
						<!-- 3 new -->
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<a href="votacao/confere_voto.php" class="btn btn-light">
							<span class="fa-stack fa-2x">
							<i class="fa fa-search fa-stack-2x"></i>
							</span>
							<h4>
							<strong>Conferir</strong>
							</h4>
							<p>votações</p>
						</a>
							</div>
						</div>
						<!--4 new -->
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<a href="senha/index.php?pagina=recuperar" class="btn btn-light">
							<span class="fa-stack fa-2x">
							<i class="fa fa-unlock fa-stack-2x"></i>
							</span>
							<h4>
							<strong>Alterar</strong>
							</h4>
							<p>Sua senha</p>
							</a>
							</div>
						</div>
						<!--5 new --
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<span class="fa-stack fa-1x">
							<i class="fa fa-power-off fa-stack-2x"></i>
							</span>
							<h4>
							<strong>Sair</strong>
							</h4>
							<p>Desconectar</p>
							<a href="logout.php" class="btn btn-light">Sair</a>
							</div>
						</div-->
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
			<br>
		</div>
	</section>
	<!-- /.section ligth -->
	<!-- Footer -->
	<footer>
		<div class="container">
			<br>
			<p align="center"><a href="sobre.php"><img src="img/sobre.png"></a></p>
			<?php
			include 'conecta_banco.php';
			$sql = mysqli_query($mysqli, "SELECT * FROM parametros WHERE id=2");
			while($proc = mysqli_fetch_array($sql)) {
			echo  '<p align="center">Votae Versão '. $proc['valor']. '</p>'; }
			echo '<p align="center">'.'Banco de Dados: MariaDB '. $banco.'</p>';
			?>
		</div>
		<div class="container">
			<div class="row">
			<div class="col-lg-10 col-lg-offset-1 text-center">
			<h4><strong>Votae</strong>
			</h4>
			<p>R. Pedro Rigotti, 03 - Dourados - MS - 79.810-120 - Brasil
			<br></p>
			<ul class="list-unstyled">
			<li><i class="fa fa-phone fa-fw"></i> fone: 67 99647 0404 </li>
			<li><i class="fa fa-envelope-o fa-fw"></i> <a href="infolemmis@gmail.com">infolemmis@gmail.com</a>
			</li>
			</ul>
			<hr class="small">
			<p class="text-muted">Copyright Lemmis 2020
			<img src="img/lemmisp.png"></p>
			</div>
			</div>
		</div>
	</footer>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
</body>
</html>