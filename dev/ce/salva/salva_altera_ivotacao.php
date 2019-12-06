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
?><!DOCTYPE html>
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
						<?php
						$ivotacao=$_POST['ivotacao'];
						$complemento=$_POST['complemento'];
						$idiv=$_POST['idiv'];
						// Cria uma variável que terá os dados do erro
						$erro = false;
						//trata ideleicao
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['idiv'] ) || empty( $_POST['idiv'] ) ) {
						$erro = 'O Campo eleicao não foi informado.';
						}
						// limpa tags e espaços
						$idiv = trim( strip_tags( $idiv ) );
						if (!is_numeric($idiv)) {
						$erro = "Campo ideleicao deve ser só numero";}
						//********************************************************
						//trata ivotacao
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['ivotacao'] ) || empty( $_POST['ivotacao'] ) ) {
						$erro = 'O Campo idvotacao não foi informado.';
						}
						// limpa tags e espaços nome
						$ivotacao = trim( strip_tags( $ivotacao ) );
						if(strlen($ivotacao) <= 10)
						{
						$erro = 'Erro: Instrução de votacação deve ter mais de 10 caracteres.<br>';
						}
						//********************************************************
						// limpa tags e espaços nome
						$complemento = trim( strip_tags( $complemento ) );
						// *******************  Se existir algum erro, mostra o erro
						if ( $erro ) {
						echo $erro;
						echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../altera_ivotacao.php>Voltar</a>';
						} else
						{
							//update tabela votacao
							$sql =("UPDATE ivotacao SET ivotacao= '$ivotacao', complemento='$complemento' WHERE idiv = '$idiv' ");
							$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
							{echo "Update com sucesso!";}
							?>
							<br>
							<br>
							<?php
							echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../admince.php'>";
						}
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