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
						$tpuser=$_POST['tpuser'];
						$nome=$_POST['nome'];
						$email=$_POST['email'];
						$senha=$_POST['senha'];
						$veri=$_POST['verificador'];
						// Cria uma variável que terá os dados do erro
						$erro = false;

						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['verificador'] ) || empty( $_POST['verificador'] ) ) {
						$erro = 'O Campo verificador não foi informado-vazio.';
						}
						// ver tamanho dos campos
						if(strlen($veri) <= 3)
						{
						$erro = 'Erro: Campo verificador deve ter descrição com mais de 3 caracteres.<br>';
						}
						// limpa tags e espaços 
						$veri = trim( strip_tags( $veri ) );

						//********************************************************
						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['nome'] ) || empty( $_POST['nome'] ) ) {
						$erro = 'O Campo nome nome real não foi informado.';
						}
						// ver tamanho dos campos
						if(strlen($nome) <= 3)
						{
						$erro = 'Erro: nome real do usuario deve ter descrição com mais de 5 caracteres.<br>';
						}
						// limpa tags e espaços nome
						$nome = trim( strip_tags( $nome ) );

						//********************************************************
						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['email'] ) || empty( $_POST['email'] ) ) {
						$erro = 'O Campo login não foi informado.';
						}

						// limpa tags e espaços
						$email = trim( strip_tags( $email ) );

						// ver tamanho dos campos
						if(strlen($nome) <= 3)
						{
						
						$erro = "Você esqueceu de informar o nome de login";}

						//********************************************************
						//trata
						// Verifica se o POST tem algum valor
						if ( !isset( $_POST['tpuser'] ) || empty( $_POST['tpuser'] ) ) {
						$erro = 'O Campo tipo de usuário não foi informado.';
						}

						// limpa tags e espaços
						$tpuser = trim( strip_tags( $tpuser ) );

						if (!is_numeric($tpuser)) {
						$erro = "Você esqueceu de selecionar o tipo de usuário";}
							
						// *******************  Se existir algum erro, mostra o erro
						if ( $erro ) {
						echo $erro;
						echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_comissao.php>Voltar</a>';
						} else
						{
							$sql = ("INSERT INTO users (nome, tpuser, admin, email, senha, situacao, ideleicao, verificador)
							VALUES('$nome', '$tpuser', 'Não', '$email', '$senha', 1, 0, '$veri')");
							$res=   mysqli_query($mysqli, $sql)  or die(mysqli_error($mysqli));	
							echo "Cadastro efetuado com sucesso!";
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