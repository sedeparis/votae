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

<head><title>Votae</title>
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

<!-- Bootstrap CSS -->
</head>
<body>
	<div class="container">
		<?php
			$codigo=$_POST['codigo'];
			echo $nome=$_POST['nome'];
			$email=$_POST['email'];
			$senha=$_POST['senha'];
			$indice='vt';
			$complemento=substr($nome, -1,1); 
			 $veri=$complemento.$indice; // f
			//echo '<br>';
			$situacao=1;
			//verifica se o usuario é unico
		$dupesql = "SELECT * FROM user WHERE (email = '$email')";
		$duperaw = mysqli_query($mysqli, $dupesql);
		if (mysqli_num_rows($duperaw) > 0) {
			echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_usuario.php>Voltar</a>';
		} else 
		{
			
				// Cria uma variável que terá os dados do erro
				$erro = false;

				//trata nome
				// Verifica se o POST tem algum valor nome
				if ( !isset( $_POST['nome'] ) || empty( $_POST['nome'] ) ) {
				$erro = 'O Campo nome não foi informado.';
				}
				// ver tamanho dos campos
						
						if(strlen($nome) <= 5)
				{
				   $erro = 'Erro: Nome deve ter descrição com mais de 5 caracteres.<br>';
				} 
				// limpa tags e espaços nome
				$nome = trim( strip_tags( $nome ) );
				
				//********************************************************
				//trata email
				// Verifica se o POST tem algum valor email
				if ( !isset( $_POST['email'] ) || empty( $_POST['email'] ) ) {
				$erro = 'O Campo email não foi informado.';
				}
				// ver tamanho dos campos
						
						if(strlen($email) <= 5)
				{
				   $erro = 'Erro: email deve ter  mais de 5 caracteres.<br>';
				} 
				// limpa tags e espaços email
				$email = trim( strip_tags( $email ) );
				
				//********************************************************
				//trata codigo
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['codigo'] ) || empty( $_POST['codigo'] ) ) {
				$erro = 'O codigo não foi informado.';
				}
				// ver tamanho dos campos
						
						if(strlen($codigo) <= 1)
				{
				   $erro = 'Erro: código deve ter  mais de 1 caracteres.<br>';
				} 
				// limpa tags e espaços codigo
				$codigo = trim( strip_tags( $codigo ) );
				//********************************************************
				//trata verificador
				// Verifica se o POST tem algum valor 
				if ( !isset( $veri ) || empty( $veri ) ) {
				$erro = 'O Campo verificador não foi informado.';
				}
				// ver tamanho dos campos
						
						if(strlen($veri) <= 2)
				{
				   $erro = 'Erro: verificador deve ter  mais de 2 caracteres.<br>';
				} 
				// limpa tags e espaços 
				$veri = trim( strip_tags( $veri ) );
				
				//********************************************************
				
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) {
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_usuario.php>Voltar</a>';
				} else 
				{
					$sql =  ("INSERT INTO user (codigo, nome, email, senha, situacao, verificador)
					VALUES('$codigo', '$nome', '$email', '$senha', '$situacao', '$veri')");
					$resultado = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));	
					echo "Cadastro efetuado com sucesso!";
					//voltar para painel
					echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
			
				}
		}
			?>
	</div>
</body>
</html>