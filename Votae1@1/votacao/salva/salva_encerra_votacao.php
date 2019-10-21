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
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<title>Encerramento da votação</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
		<?php
		$ide=$_POST['eleicao'];
		$iduser=$_POST['user'];
		$senha=$_POST['senha'];
		//$senhac=md5($_POST['senha']);
		date_default_timezone_set("America/Cuiaba");
		$data=date("d.m.Y H:i:s");
		// Cria uma variável que terá os dados do erro
				$erro = false;

				//trata eleicao
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
				$erro = 'O Campo eleicao não foi selecionado-vazio.';
				}
				
				if (!is_numeric($ide)) {
				$erro = "Campo eleicao não foi selecionado";}
				
				// limpa tags e espaços 
				$ide  = trim( strip_tags( $ide ) );
				
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
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../encerra_votacao.php>Voltar</a>';
				} else 
					{
						$senhac=md5($senha);
						// verficar se a senha confere
						$dupesql = "SELECT * FROM users WHERE id='$iduser' AND(senha ='$senhac')";
						$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));

						if (mysqli_num_rows($duperaw) == 0) {
						echo "<span>Senha não confere. </span>";
						echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../encerra_votacao.php>Voltar</a>';

						} else {
							$sql = ("INSERT INTO logs_eventos (evento, valor, ideleicao, data)
							VALUES('Encerramento', '$senhac', '$ide', '$data' )");
							$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
							{echo "Logs criados com sucesso!<br>";}
							//encerra eleição
							$sql2 = ( "UPDATE eleicoes SET aberta=0 WHERE ideleicao='$ide'");
							$resultado2 = mysqli_query ($mysqli, $sql2) or die(mysqli_error($mysqli));
							{echo "Eleição com votação encerrada!";}
						}
						?>
						<?php
						echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../../ce/admince.php'>";
					}
						?>
</body>
</html>