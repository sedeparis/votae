<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
echo $_SESSION['email'];
echo "</div>";
include ("../conecta_banco.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<title>Criptografar votante
	</title>
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
	<!-- Bootstrap CSS -->
</head>
<body>
	<div class="container">
		<?php
			$ide=$_POST['eleicao'];
			$nome=$_POST['nomec'];
			$senha=$_POST['senhac'];
			$user=$_SESSION['email'];
			
			// Cria uma variável que terá os dados do erro
				$erro = false;

				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
				$erro = 'O Campo eleicao não foi informado.';
				}
				// ver se é número ou selecione...
				if (!is_numeric($ide)) {
				$erro = "Campo número deve ser só numero";}
				
				// limpa tags e espaços 
				$ide = trim( strip_tags($ide) );
				
				//********************************************************
				
				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['nomec'] ) || empty( $_POST['nomec'] ) ) {
				$erro = 'O Campo nome não foi informado.';
				}
				// ver tamanho dos campos
						
				if(strlen($nome) <= 5)
				{
				   $erro = 'Erro: Nome deve ter descrição com mais de 5 caracteres.<br>';
				} 
				
				// limpa tags e espaços 
				$nome = trim( strip_tags($nome) );
				
				//********************************************************
				
				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $_POST['senhac'] ) || empty( $_POST['senhac'] ) ) {
				$erro = 'O Campo senha não foi informado.';
				}
				// ver tamanho dos campos
						
				if(strlen($senha) <= 5)
				{
				   $erro = 'Erro: senha deve ter descrição com mais de 5 caracteres.<br>';
				} 
				
				// limpa tags e espaços 
				$senha = trim( strip_tags( $senha ) );
				
				//********************************************************
				//trata 
				// Verifica se o POST tem algum valor 
				if ( !isset( $user) || empty( $user ) ) {
				$erro = 'O tempo da cessão esgotou.';
				}
				
				//********************************************************
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) {
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=user_cript.php>Voltar</a>';
				} else 
					{
						echo $user;
						// cria a instrução SQL que vai conferir o usuário
						$query = sprintf( "SELECT * FROM user WHERE email ='$user' AND (situacao=1)");
						// executa a query
						$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
						// transforma os dados em um array
						$linha = mysqli_fetch_assoc($dados);
						// calcula quantos dados retornaram
						$total = mysqli_num_rows($dados);
						?>
						<?php
						// se o número de resultados for maior que zero, mostra os dados//
						if($total == 0) {echo "Usuário não encontrado em nosso cadastro de usuário do sistema.<br> <a href=user_cript.php>Voltar</a>";}
						if($total > 0) {
						// inicia o loop que vai mostrar todos os dados
						do {
						$iduser=$linha['id'];
						?>
						
						<?php
						// consulta se o usuario esta autorizado votar
						$dupesql = "SELECT * FROM user_eleicao WHERE ideleicao ='$ide' AND (iduser='$iduser')";
						$duperaw = mysqli_query($mysqli, $dupesql);
						if (mysqli_num_rows($duperaw) == 0) {
						echo "<span>Usuario não foi incluido na lista de votantes para essa eleição. Consulte a comissão eleitoral.</span><a href='../painel.php'>Voltar</a>";
						} else 
						{
							include 'salva/salva_usuarioc.php';
						}
						?>
						<?php
						// finaliza o loop que vai mostrar os dados
						}while($linha = mysqli_fetch_assoc($dados));
						// fim do if
						}
					}
					?>
	</div>
</body>
</html>