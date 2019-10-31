<?php
include ("conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Votae: Acesso
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/barra.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<!-------- inicia pagina-------------->
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
						<div class="container">
							<div class="progress progress-striped">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
									<span class="sr-only">75% Complete (success)</span>
								</div>
							</div>
							<?php
							$email= $_POST['email'];
							$senha= ($_POST['senha']);
							// limpa tags e espaços codigo
							$senha = trim( strip_tags( $senha ) );
							// limpa tags e espaços codigo
							$email = trim( strip_tags( $email ) );
							$senha= md5($senha);
							$sql = mysqli_query($mysqli, "SELECT * FROM user WHERE email = '$email'
								AND senha= '$senha'
								AND situacao = 1  ") or die (mysqli_error($mysqli));
							$row = mysqli_num_rows($sql);
							if($row > 0)
							{
									session_start();
									$_SESSION ['email']=$_POST['email'];
									$_SESSION ['senha']=md5($_POST['senha']);
									echo 'Autenticando!';
									echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=painel.php'>";
							} else
							{
								echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=indexu.php'>";
								echo 'Senha ou usuario não confere ou sem autorização de acesso!';
							}
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
		<?php include_once "footer.php"?>
	</footer>
	<!-- jQuery -->
	<script src="js/jquery.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Custom Theme JavaScript -->
</div>
</body>
</html>