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
	include '../conecta_banco.php';
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
	<link href="../css/bootstrap.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="../css/stylish-portfolio.css" rel="stylesheet">
	<!-- Custom Fonts -->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
</head>
<body>
	<section id="about" class="about">
		<?php include_once "about.php"?>
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary-b">
		<div class="container">
			<div class="row text-center">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<p>Em desenvolvimento...
						<input type="button" name="cancela" value="<< Voltar" class="btn btn-dark" onclick="window.location.href='admince.php'"/>
						</p>
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
		<?php include_once "footer.php"?>
	</footer>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
</body>
</html>