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
		$eleicao=$_POST['eleicao'];
		$proposta=$_POST['proposta'];
		$branco=$_POST['branco'];
		$nulo=$_POST['nulo'];
		$data=$_POST['data'];
		$hora=$_POST['hora'];
		$horaf=$_POST['horaf'];
		$tipo=$_POST['tipo'];

			//*********************************************************************
				// cria variavel para identificar erros
				$erro=false;
				
				//trata eleicao
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
				$erro = 'Campo eleicao não informado.<br>';
				}
				//verifica o comprimento minimo do campo
				if(strlen($eleicao) <= 5)
				{
				$erro = 'Erro: Nome da eleicao deve ter mais de 5 caracteres.<br>';
				} 
				//limpa tags e espaços 
				$eleicao = trim( strip_tags( $eleicao ) );

				//*********************************************************************
				
				//trata proposta
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['proposta'] ) || empty( $_POST['proposta'] ) ) {
				$erro = 'Campo proposta não informado.<br>';
				}
				//verifica o comprimento minimo do campo
				if(strlen($proposta) <= 5)
				{
				$erro = 'Erro: Nome da proposta deve ter mais de 5 caracteres.<br>';
				} 
				//limpa tags e espaços 
				$proposta = trim( strip_tags( $proposta ) );

				//*********************************************************************
				
				//trata branco
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['branco'] ) || empty( $_POST['branco'] ) ) {
				$erro = 'Campo voto branco não selecionado.<br>';
				}
				if (!is_numeric($branco)) {
				$erro = 'Campo voto branco não selecionado.<br>';}
				//limpa tags e espaços 
				$branco = trim( strip_tags( $branco ) );
				
				
				//*********************************************************************
				
				//trata nulo
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['nulo'] ) || empty( $_POST['nulo'] ) ) {
				$erro = 'Campo voto nulo não selecionado.<br>';
				}
				if (!is_numeric($nulo)) {
				$erro = 'Campo voto nulo não selecionado.<br>';}
				//limpa tags e espaços 
				$nulo = trim( strip_tags( $nulo ) );
				
				//*********************************************************************
				
				//trata tipo
				// Verifica se o POST  tem algum valor 
				if ( !isset( $_POST['tipo'] ) || empty( $_POST['tipo'] ) ) {
				$erro = 'Campo tipo de eleicao não selecionado.<br>';
				}
				if (!is_numeric($tipo)) {
				$erro = 'Campo tipo de eleicao não selecionado.<br>';}
				//limpa tags e espaços 
				$tipo = trim( strip_tags( $tipo ) );
				
				
				
				// *******************  Se existir algum erro, mostra o erro
				if ( $erro ) 
				{
				echo $erro;
				echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../cd_eleicao.php>Voltar</a>';
				} else 
				{
					//salvar eleicao na tabela eleicoes
					$sql =("INSERT INTO eleicoes (eleicao, proposta, concluida, branco, nulo, data, hora, horaf, tipo)
					VALUES('$eleicao', '$proposta', 'N', '$branco','$nulo', '$data', '$hora', '$horaf', '$tipo')");
					$resultado = mysqli_query ($mysqli,  $sql);
					{echo "Cadastro efetuado com sucesso!";}

					// verificar id da eleicao para incluir 
					//cria a instrução SQL que vai selecionar os dados dos itens
					$query =sprintf( "SELECT * FROM eleicoes ORDER BY ideleicao DESC LIMIT 1");
					// executa a query
					$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
					// transforma os dados em um array
					$linha = mysqli_fetch_assoc($dados);
					// calcula quantos dados retornaram
					$total = mysqli_num_rows($dados);
					?>
					<?php
						// se o número de resultados for maior que zero, mostra os dados//
						if($total == 0) {echo "ops, nao encontramos eleicao";}
						if($total > 0) 
						{ 
							// inicia o loop que vai mostrar todos os dados
							do {
								$ide=$linha['ideleicao'];
					?>

					<?php
							// finaliza o loop que vai mostrar os dados
								} while($linha = mysqli_fetch_assoc($dados));
						// fim do if 
						 }
					?>
					<?php
					if ($branco == 2){ echo 'Chapa branco nao salva';}
					else 
					{
							$sql =("INSERT INTO chapas (situacao, chapa, representante, ideleicao)
							VALUES('Ativo', '100 - Branco', 'Voto em Branco', '$ide')");
							$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
							{
								echo "<br>Chapa Branco criada com sucesso!";
							}	
					}
					if ($branco == 2)
					{
						echo "Chapa nulo não salva";
					}
					else 
						{
							$sql =("INSERT INTO chapas (situacao, chapa, representante, ideleicao)
							VALUES('Ativo', '99 - Nulo', 'Voto nulo', '$ide')");
							$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
							{
								echo "<br>Chapa nulo criada com sucesso!";
							}	
						
						}
						echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
				}
	?>

</body>
</html>