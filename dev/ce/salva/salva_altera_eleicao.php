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
							$id=$_POST['id'];
							$eleicao=$_POST['eleicao'];
							$proposta=$_POST['proposta'];
							$branco=$_POST['branco'];
							$nulo=$_POST['nulo'];
							$data=$_POST['data'];
							$horai=$_POST['horai'];
							$horaf=$_POST['horaf'];
							echo $tipo=$_POST['tipo'];
							//echo $data;
		
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
								echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=../altera_eleicao.php>Voltar</a>';
							} 
							else 
							{
								//alterar eleicao na tabela eleicoes
								$sql = ("UPDATE eleicoes SET eleicao='$eleicao', proposta='$proposta', 
								branco='$branco', nulo='$nulo', data='$data', hora='$horai, horaf='$horaf', tipo='$tipo' ");
								
								$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));	
								{
									echo "Cadastro alterado com sucesso!";
								}

								if ($branco == 2){ echo 'Chapa branco nao salva';}
								else 
								{
											$sql =("UPDATE chapas SET chapa='100 - Branco', representante='Voto em Branco' WHERE ideleicao='$id'");
											
											$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
											{
												echo "<br>Chapa Branco alterada com sucesso!";
											}	
									}
									if ($nulo == 2)
									{
										echo "Chapa nulo não salva";
									}
									else 
										{
											$sql2 =("UPDATE chapas SET chapa='100 - Branco', representante='Voto em Branco' WHERE ideleicao='$id'");
											
											$resultado2 = mysqli_query ($mysqli, $sql2);
											{echo "Alteração efetuada com sucesso!";}
											
											
											echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admince.php'>";
						
										}	
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