<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include_once "../conecta_banco.php";
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
	<title>Votação final</title>
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
						<br />
						<div id="corpo">
							<?php
							$eleicao=$_POST['eleicao'];
							$senha=$_POST['senha'];
							$iduser=$_POST['user'];
							//$senhac=md5($_POST['senha']);
							
							// Cria uma variável que terá os dados do erro
								$erro = false;
								//trata eleicao
								// Verifica se o POST tem algum valor 
								if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
								$erro = 'O Campo eleicao não foi selecionado-vazio.';
								}
								
								if (!is_numeric($eleicao)) {
								$erro = "Campo eleicao não foi selecionado";}
								
								// limpa tags e espaços 
								$eleicao  = trim( strip_tags( $eleicao ) );
								
								//********************************************************
								
								//trata comissao
								// Verifica se o POST tem algum valor 
								if ( !isset( $_POST['user'] ) || empty( $_POST['user'] ) ) {
								$erro = 'O Campo usuário da comissao não foi selecionado-vazio.';
								}
								
								if (!is_numeric($iduser)) {
								$erro = "Usuário da comissao não foi selecionado";}
								
								// limpa tags e espaços 
								$iduser = trim( strip_tags( $iduser ) );
								
								//********************************************************
								//trata senha
								// Verifica se o POST tem algum valor 
								if ( !isset( $_POST['senha'] ) || empty( $_POST['senha'] ) ) {
								$erro = 'O Campo senha não foi informado-vazio.';
								}
								
								// ver tamanho dos campos
										
										if(strlen($senha) <= 5)
								{
								   $erro = 'Erro: A senha deve ter mais de 5 caracteres.<br>';
								} 
								// limpa tags e espaços 
								$senha  = trim( strip_tags( $senha ) );
								
								//********************************************************
								
								if ( $erro ) {
								echo $erro;
								echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=voto_zero.php>Voltar</a>';
								} else 
									{			
										$senhac=md5($senha);
										// verficar se a senha confere
										$dupesql = "SELECT * FROM users WHERE id='$iduser' AND(senha ='$senhac')";
										$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));

										if (mysqli_num_rows($duperaw) == 0) {
										echo "<span>Senha não confere. </span>";
										echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=voto_zero.php>Voltar</a>';
										} else 
										{
											include_once "exec_resultado.php"; 
										}
										 
									}
									?>
						</div>
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