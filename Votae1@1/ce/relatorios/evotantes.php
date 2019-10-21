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
<title>
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/reset.css" type="text/css"/>
<!--link rel="stylesheet" href="../css/print.css" type="text/css"/-->
<link rel="stylesheet" href="../../css/estilo_pdo.css" type="text/css"/>
</head>
<body>
	<div id="imprimir">
		<?php
			$ideleicao=$_POST['eleicao'];
			$erro = false;

			//trata variavel
			// Verifica se o POST  tem algum valor
			if ( !isset( $_POST['eleicao'] ) || empty( $_POST['eleicao'] ) ) {
			$erro = 'Campo  eleicao não selecionado.<br>';
			}
			if (!is_numeric($ideleicao)) {
			$erro = 'Campo eleicao não selecionado.<br>';}
			//limpa tags e espaços
			$ideleicao = trim( strip_tags( $ideleicao ) );

			// *******************  Se existir algum erro, mostra o erro
			if ( $erro )
			{
			echo $erro;
			echo '<br>Volte para a tela anterior e informe os dados corretamente!<br> <a href=rvotantes.php>Voltar</a>';
			}
			else
			{
				// seleciona a eleição
				$querya =("SELECT * FROM cdorgao WHERE padrao= 1");
				// executa a query
				$dadosa = mysqli_query($mysqli, $querya) or die(mysqli_error());
				// transforma os dados em um array
				$linhaa = mysqli_fetch_assoc($dadosa);
				// calcula quantos dados retornaram
				$totala = mysqli_num_rows($dadosa);
		?>
		<?php
				// se o número de resultados for maior que zero, mostra os dados//
				if($totala == 0) {echo "Não encontramos órgão cadastrado ";}
				if($totala > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
				$nome=$linhaa['nome'];
				$cnpj=$linhaa['cnpj'];
				$endereco=$linhaa['endereco'];
				$num=$linhaa['num'];
				$bairro=$linhaa['bairro'];
				$cidade=$linhaa['cidade'];
				$uf=$linhaa['uf'];
				$fone=$linhaa['fone'];
				$num=$linhaa['num'];
		?>
		<div id="cabecalho">
		<?php
				// finaliza o loop que vai mostrar os dados
				}while($linhaa = mysqli_fetch_assoc($dadosa));
				// fim do if
				}
				echo '<h3 class="center">'.$nome.'</h3><br>';
				echo '<p class="center">Endereço: '.$endereco.' - '.$num.' - '.$bairro.' - '.$cidade.' - '.$uf.'</p><br>';
				echo '<p class="center"> Fone: '.$fone.' - CNPJ: '.$cnpj.'</p><br>';
		?>
		</div>
		<div id="textos">
		<?php
				$ideleicao=$_POST['eleicao'];
				// seleciona a eleição
				$queryb =("SELECT * FROM eleicoes WHERE ideleicao=1");
				// executa a query
				$dadosb = mysqli_query($mysqli, $queryb) or die(mysqli_error($mysqli));
				// transforma os dados em um array
				$linhab = mysqli_fetch_assoc($dadosb);
				// calcula quantos dados retornaram
				$totalb = mysqli_num_rows($dadosb);
		?>
		<?php
				// se o número de resultados for maior que zero, mostra os dados//
				if($totalb == 0) {echo "Não encontramos essa eleição";}
				if($totalb > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
				$nome=$linhab['eleicao'];
				$proposta=$linhab['proposta'];
				echo "<h1>Comparecimento de votação</h1>";
				echo '<br><br>Eleição: '.$nome. '<br>';
				echo 'Proposta: '.$proposta. '<br>';
		?>
		<?php
				// finaliza o loop que vai mostrar os dados
				}while($linhab = mysqli_fetch_assoc($dadosb));
				// fim do if
				}
		?>
				<?php
				// seleciona a eleição
				$queryc =("SELECT * FROM user
				INNER JOIN userusers
				ON userusers.iduser = user.codigo

				WHERE userusers.ide=1");
				// executa a query
				$dadosc = mysqli_query($mysqli, $queryc) or die(mysqli_error($mysqli));
				// transforma os dados em um array
				$linhac = mysqli_fetch_assoc($dadosc);
				// calcula quantos dados retornaram
				$totalc = mysqli_num_rows($dadosc);
				echo "
				<table border='1px'>
					<colgroup>
						<col width='75%'>
						<col width='25%'>
					</colgroup>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Siape</th>
						</tr>
					</thead>
				</table>";
		?>
		<?php
				// se o número de resultados for maior que zero, mostra os dados//
				if($totalc == 0) {echo "Não encontramos eleitores  para essa eleição";}
				if($totalc > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
				$codigo=$linhac['codigo'];
				$user=$linhac['nome'];
				echo "
				<table border='1px'>
					<colgroup>
						<col width='75%'>
						<col width='25%'>
					</colgroup>
					<tbody>
					<tr>
						<td>$user</td>
						<td>$codigo</td>
					</tr>
					</tbody>
				</table>";
		?>
		<?php
				// finaliza o loop que vai mostrar os dados
				}while($linhac = mysqli_fetch_assoc($dadosc));
				// fim do if
				}
		?>
		<?php
				// tira o resultado da busca da memória
				mysqli_free_result($dadosa);
				mysqli_free_result($dadosb);
				mysqli_free_result($dadosc);
			}
		?>
					<br />
					<br />
					<table>
					<tr>
					<td><br><br>_________________________<br>Assinatura da comissão</td>
					<td><br><br>_________________________<br>Assinatura da comissão</td>
					</tr>
					<tr>
					<td><br><br>_________________________<br>Assinatura da comissão</td>
					<td><br><br>_________________________<br>Assinatura da comissão</td>
					</tr>
					</table>
					<br />
					<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../ce/admince.php'"/>
		</div>
	</div>
</body>
</html>