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
	<title>Votação inicial</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	<link rel="stylesheet" href="../css/print.css" type="text/css"/>
	<link rel="stylesheet" href="../css/estilo_pdo.css" type="text/css"/>
</head>
<body>
	<div id="imprimir">
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
							include_once "exec_zeresima.php"; 
						}
						 
					}
					?>
	</div>
</body>
</html>