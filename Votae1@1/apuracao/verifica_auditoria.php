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
	<title>Votação</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	<link rel="stylesheet" href="../css/print.css" type="text/css"/>
	<link rel="stylesheet" href="../css/estilo_pdo.css" type="text/css"/>
</head>
<body>
	<div id="imprimir">
		<br />
		<?php
			$eleicao=$_POST['eleicao'];
			$senha=$_POST['senha'];
			$iduser=$_POST['user'];
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
						// verificar se a eleição esta aberta
						//cria a instrução SQL que vai selecionar os dados dos itens
						$query =("SELECT * FROM eleicoes WHERE ideleicao='$eleicao' AND aberta=0");
						// executa a query
						$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli, $query));
						// transforma os dados em um array
						$linha = mysqli_fetch_assoc($dados);
						// calcula quantos dados retornaram
						$total = mysqli_num_rows($dados);
						?>
						<?php
						// se o número de resultados for maior que zero, mostra os dados//
						if($total == 0) {echo "Não é possivel gerar o resultado final. A eleição ainda está aberta para votação";}
						else { include "exec_auditoria.php"; }
					}
		?>
	</div>
</body>
</html>