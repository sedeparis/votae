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
	<div class="container">
		<?php
		$idusers=$_POST['idusers'];
		$senha=md5($_POST['senha']);
		$senhan=$_POST['senhac'];
		// $senhac=md5($_POST['senhac']);
		
		//verificar se a senha antiga confere
		$dupesql = "SELECT * FROM users WHERE (senha = '$senha')";

		$duperaw = mysqli_query($mysqli, $dupesql);

		if (mysqli_num_rows($duperaw) == 0) {
		echo '<span class="colorblue">Senha antiga não confere. Verifique...<a href=../alterar_senhaacf.php>Voltar</a></span>';
		} else 
		{
				//*********************************************************************
				// cria variavel para identificar erros
				$erro=false;
				
				//trata eleicao
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['senhac'] ) || empty( $_POST['senhac'] ) ) {
				$erro = 'Campo nova senha não informado.<br>';
				}
				//verifica o comprimento minimo do campo
				if(strlen($senhan) <= 5)
				{
				$erro = 'Erro: Nova senha de ter 6 caracteres ou mais.<br>';
				} 
				//limpa tags e espaços 
				$senhan = trim( strip_tags( $senhan ) );				
				
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) 
				{
					echo $erro;
					echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../alterar_senhaacf.php>Voltar</a>';
				} 
				else 
				{
					 $senhac=md5($senhan);
					// salva nova senha
					$sql =("UPDATE users SET senha='$senhac' WHERE id='$idusers'");
					$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));	
					{echo "Senha alterada com sucesso!";}
				}
				echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
		}
		?>
	</div>
</body>
</html>