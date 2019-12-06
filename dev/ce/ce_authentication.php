<?php 
include ("../conecta_banco.php");
?>
 <html lang="pt_BR">
<head>
<title>Acesso de usuario
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
									<span class="sr-only">85% Complete (success)</span>
								</div>
							</div>
							<?php
							$email= $_POST['email'];
							$senha= md5($_POST['senha']);
							$sql = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$email' AND senha= '$senha' AND situacao = 1 AND tpuser=1") or die (mysqli_error());
							$row = mysqli_num_rows($sql);
							if($row > 0){
								session_start();
								$_SESSION['email']=$_POST['email'];
								$_SESSION['senha']=md5($_POST['senha']);
								$_SESSION['situacao']=[1];
								echo 'Autenticando!';
								echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=admince.php'>";
								
							} else {
								echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=indexce.php'>";
								echo "Acesso não autorizado. Erro de usuário ou senha!</p>";
							}
							?>
						</div>
					</div>	
				</div>
					<!-- /.row (nested) -->
			</div>
				<!-- /.col-lg-10 -->
		</div>
			<!-- /.row -->
	</section>
	<!-- Footer -->
	<footer>
		<?php include_once "footer.php"?>
	</footer>
</body>
</html>