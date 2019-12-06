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
		$nchapa=(int)$_POST['nchapa'];
		$nome=$_POST['nome'];
		$ide=$_POST['eleicao'];
		$representa= $_POST['representa'];
		//unifica numero e nome da chapa
		$dchapa= $nchapa.'- '.$nome;
		$dupesql = "SELECT * FROM chapas WHERE chapa= '$dchapa' AND ideleicao='$ide'";
		$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
		if (mysqli_num_rows($duperaw) > 0) {
		echo 'Chapa '. $nchapa. ' já cadastrado. ';
		echo '<br>Volte para a tela anterior e informe outras chapas!<br> <a href=../cd_chapas.php>Voltar</a>';
		}
		else 
		{
			// Cria uma variável que terá os dados do erro
				$erro = false;

				//trata
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['nome'] ) || empty( $_POST['nome'] ) ) {
				$erro = 'O Campo nome não foi informado.';
				}
				// ver tamanho dos campos
				if(strlen($nome) <= 3)
				{
				   $erro = 'Erro: Nome da chapa deve ter descrição com mais de 3 caracteres.<br>';
				} 
				// limpa tags e espaços nome
				$nome = trim( strip_tags( $nome ) );
				
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
				$ide = trim( strip_tags( $ide ) );
				
				if (!is_numeric($ide)) {
				$erro = "Você esqueceu de Selecionar a eleicao";}
				
				//********************************************************
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) {
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_chapas.php>Voltar</a>';
				} else 
					{
				
						$sql =("INSERT INTO chapas (situacao, chapa, ideleicao, representante)
						VALUES('Ativo', '$dchapa', '$ide', '$representa' )");
						$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
						{echo "Cadastro efetuado com sucesso!";}
					}
			?>
			<?php
			echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
		}
		?>
	</div>
</body>
</html>