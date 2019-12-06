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
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Selecao para votação</title>
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
<body>
<section id="about" class="about">
		<?php include_once "about.php"?>
	</section>
		<!-- Services -->
		<!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
	<section id="services" class="services bg-primary-b">
		<div class="row ">
			<div class="col-lg-10 col-lg-offset-1">
				<div class="row">
					<div class="container">
						<h2>Selecao para votação</h2>
						<br />
						<?php
						$eleicao=$_POST['eleicao'];
						$sql = ("SELECT * from user
						WHERE situacao = 1");
						$res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
						if (mysqli_num_rows($res) == 0 ) {
						echo "Todos os usuarios já foram selecionadados para essa eleição-Consulta. <a href='admince.php'>Voltar</a>";}
						else {
						if (mysqli_num_rows($res) > 0 ) {
						echo '<form method="post" action="salva/salva_select_votantes.php">';
						while ( $row = mysqli_fetch_assoc($res) )
						{
						echo ' ' . $row["id"]. '-';
						echo ' ' . $row["nome"]. '-';
						echo ' ' . $row["email"]. '<br>';
						echo  'Selecionar usuário para essa votação?<br> <span class="colorblue">Sim </span> <input type="radio" checked="checked" name="radio['.$row["id"].']" value="'.'1'.'"> '."\n";
						echo '<br> <span class="colorred"> Não </span><input type="radio" name="radio['.$row["id"].']" value="'.'0'.'"> '."\n";
						echo '<input type="hidden" name="eleicao['.$row["id"].']" value="'.$eleicao.'"> '."\n";
						echo '<input type="hidden" name="id[]" value="'.$row["id"].'"> '."\n";
						echo "<hr>\n";
						}
						echo '<input type="submit" name="submit" value="Selecionar os usuarios" class="btn btn-primary"> ';
						echo '';
						echo '</form>';
						}
						}
						?>
						<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'" class="btn btn-danger" />
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.col-lg-10 -->
		</div>
	</section>
	<footer>
		<?php include_once "footer.php"?>
	</footer>
</body>
</html>
