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
						<?php
						$id=$_POST['id'];
						$eleicao=$_POST['eleicao'];
						$chapa=$_POST['chapa'];
						$sit=$_POST['sit'];
						$representa=$_POST['representa'];

						// Cria uma variável que terá os dados do erro
						$erro = false;

						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['chapa'] ) || empty( $_POST['chapa'] ) ) {
						$erro = 'O Campo número - nome da chapa não foi informado.';
						}
						// ver tamanho dos campos
						if(strlen($chapa) <= 3)
						{
						$erro = 'Erro: Nome da chapa deve ter descrição com mais de 3 caracteres.<br>';
						}
						// limpa tags e espaços nome
						$chapa = trim( strip_tags( $chapa ) );

						//********************************************************

						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['representa'] ) || empty( $_POST['representa'] ) ) {
						$erro = 'O Campo nome do representante não foi informado.';
						}
						// ver tamanho dos campos
						if(strlen($representa) <= 3)
						{
						$erro = 'Erro: Nome do representante deve ter descrição com mais de 5 caracteres.<br>';
						}
						// limpa tags e espaços nome
						$representa = trim( strip_tags( $representa ) );

						//********************************************************
						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
						$erro = 'O Campo eleicao não foi selecionada.';
						}

						// limpa tags e espaços
						$eleicao = trim( strip_tags( $eleicao ) );

						if (!is_numeric($eleicao)) {
						$erro = "Você esqueceu de Selecionar a eleicao";}

						//********************************************************
						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['sit'] ) || empty( $_POST['sit'] ) ) {
						$erro = 'O Campo situação da chapa está vazio.';
						}

						// limpa tags e espaços
						$sit = trim( strip_tags( $sit ) );
						
						// ver tamanho dos campos
						if($sit =='Selecione...')
						{
						$erro = 'O Campo situação da chapa não foi selecionado.<br>';
						}
						
						// *******************  Se existir algum erro, mostra o erro
						if ( $erro ) {
						echo $erro;
						echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../altera_chapa.php>Voltar</a>';
						} else
						{
							$sql =("UPDATE chapas SET  chapa='$chapa', ideleicao='$eleicao', situacao='$sit', representante='$representa' WHERE idchapa='$id'");
							$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
							{echo "Alteração efetuada com sucesso!";}
							?>
							<?php
							echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
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