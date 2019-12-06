<<?php
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
	<title>altera órgao</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/style.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<?php
			$idorgao=$_POST['idorgao'];
			$endereco=$_POST['endereco'];
			$num=$_POST['num'];
			$bairro=$_POST['bairro'];
			$email=$_POST['email'];
			$fone=$_POST['fone'];
			$gestor=$_POST['gestor'];
			$diretor=$_POST['diretor'];
			// Cria uma variável que terá os dados do erro
			$erro = false;
			//trata
			// Verifica se o POST tem algum valor
			if ( !isset( $_POST['idorgao'] ) || empty( $_POST['idorgao'] ) ) {
			$erro = 'O Campo id orgão não recuperado. Se o  problema persistir solicite suporte';
			}
				//********************************************************
			//trata
			// Verifica se o POST tem algum valor
			if ( !isset( $_POST['endereco'] ) || empty( $_POST['endereco'] ) ) {
			$erro = 'O Campo endereço não foi informado';
			}
			// ver tamanho dos campos
			if(strlen($endereco) <= 3)
			{
			$erro = 'Erro: Endereco deve ter descrição com mais de 3 caracteres.<br>';
			}
			// limpa tags e espaços nome
			$endereco = trim( strip_tags( $endereco ) );
			//********************************************************
			//trata
			// Verifica se o POST tem algum valor
			if ( !isset( $_POST['num'] ) || empty( $_POST['num'] ) ) {
			$erro = 'O Campo número do endereço não foi informado.';
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
		{}
		$sql = ("UPDATE cdorgao SET nome ='$nome',  endereco ='$endereco', num ='$num', bairro ='$bairro',
		email ='$email', fone ='$fone', gestor ='$gestor', diretor ='$diretor' WHERE idorgao ='$idorgao'");
		$resultado = mysqli_query($sql, $mysqli) or die(mysqli_error($mysqli));
		{echo " Orgão alterado com sucesso!";
		}
		?>
		<?php
		echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admin.php'>";
		?>
	</div>
</body>
</html>