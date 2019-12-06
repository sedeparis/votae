<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include ("../../conecta_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Votae</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../../css/bootstrap.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
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
						<p class="center"><img src="../../img/baile.gif"/></p>
						<p class="center"><img src="../../img/baile.gif"/></p>
						<?php
							if ( isset($_POST["submit"]))	
							{
								echo '<pre>';
								print_r($_POST);
								echo '</pre>';
								foreach($_POST["id"] AS $id)
								{
									echo 'id is '. $id . '<br />';
									echo 'eleicao is ' . $_POST["eleicao"][$id]."<br />";
									echo 'radio is ' . $_POST["radio"][$id]."<br />";

									$ideleicao = mysqli_real_escape_string($mysqli, $_POST["eleicao"][$id]);
									$radio = mysqli_real_escape_string($mysqli, $_POST["radio"][$id]);
									// ver se já não está inserido
									$dupesql = "SELECT * FROM user_eleicao WHERE ideleicao= '$ideleicao' AND (iduser ='$id')";
									$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
									if (mysqli_num_rows($duperaw) > 0) {
									echo "<span class='color'>Usuário já apto a votar nesta eleição</span>";
									} 
									else 
									{
										if ($radio <> 1) 
										{
										echo 'Usuário nao selecionado<br />';
										} 
									 else {

												$sql =("INSERT INTO user_eleicao (iduser, ideleicao)
												VALUES('$id','$ideleicao')");
												$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
												echo "<p>Usuário incluido com sucesso na eleição!</p>";
											}
									}
								}
							}
						?>
						<?php
						echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../admince.php'>";
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
</body>
</html>