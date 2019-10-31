<!DOCTYPE html>
<html lang="pt_br">
<head>
	<title>VOTAe</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="css/stylish-portfolio.css" rel="stylesheet">
	<!---fontes--->
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
</head>
<body>
	<!-- About -->
	<section id="about" class="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1>Votação eletrônica.</h1>
					<p class="lead">Eleições, assembleias e consultas públicas.</p>
					<img src="img/logop.jpg">
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
					<h2>Painel</h2>
					<hr class="small">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
							<a href="indexu.php" class="btn btn-light">
							<span class="fa-stack fa-4x">
							<i class="fa fa-circle fa-stack-2x"></i>
							<i class="fa fa-thumbs-up fa-stack-1x text-primary"></i>
							</span>
							<h4>
							<strong>Área <br>Eleitor</strong>
							</h4>
							</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<a href="ce/indexc.php" class="btn btn-light">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-building fa-stack-1x text-primary"></i>
								</span>
								<h4>
								<strong>Comissão<br> Eleitoral</strong>
								</h4>
								</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<a href="fiscal/indexf.php" class="btn btn-light">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-binoculars fa-stack-1x text-primary"></i>
								</span>
								<h4>
								<strong>Fiscais<br>Eleitorais</strong>
								</h4>
								</a>
							</div>
						</div>
						<div class="col-md-3 col-sm-6">
							<div class="service-item">
								<a href="admin/indexa.php" class="btn btn-light">
								<span class="fa-stack fa-4x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-shield fa-stack-1x text-primary"></i>
								</span>
								<h4>
								<strong>Administrar<br>
								Sistema</strong>
								</h4>
								</a>
							</div>
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
	<div class="container">
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

	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
