<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Votação final</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
<link rel="stylesheet" href="../css/print.css" type="text/css"/>

</head>
<body>
	<div id="imprimir">
		<h1>Resultado Final</h1>
		<div id="corpo">
			<?php
			$eleicao=$_POST['eleicao'];
			$senha=$_POST['senha'];
			$senhac=md5($_POST['senha']);
			date_default_timezone_set("America/Cuiaba");
			$data= date("d.m.Y H:i:s");
			echo '<p>Boletim emitido em: '.$data. '</p>';
			?>
			<?php
			$sql = ( "INSERT INTO logs_eventos (evento, valor, ideleicao,  data, iduser)
			VALUES('Resultado final', '$senhac', '$eleicao', '$data', '$iduser')");
			$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));
			{echo "Log do resultado criado com sucesso!<br><br>";}
			?>
			<?php
			// verificar se a eleição esta aberta
			//cria a instrução SQL que vai selecionar os dados dos itens
			$query =("SELECT * FROM eleicoes WHERE ideleicao='$eleicao' AND aberta=0");
			// executa a query
			$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($dados);
			// calcula quantos dados retornaram
			$total = mysqli_num_rows($dados);
			?>
			<?php
			// se o número de resultados for maior que zero, mostra os dados//
			if($total == 0) {echo "Não é possivel gerar o relatório de resultado. A eleição está aberta para votação";}
			if($total > 0) {
			// inicia o loop que vai mostrar todos os dados
			do {
			$ide=$linha['ideleicao'];
			$neleicao=$linha['eleicao'];
			$aberta=$linha['aberta'];
			echo "Eleição para:  $neleicao";
			?>
			<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysqli_fetch_assoc($dados));
			// fim do if
			}
			?>
			<br />
			<?php
			echo 'Nome(s) da(s) chapa(s):';
			//com pdo
			// cria a instrução SQL que vai selecionar os dados dos itens
			$sql = $mysqli ->prepare("SELECT * FROM chapas WHERE ideleicao='$ide'");
			$sql->execute();
			$sql->bind_result($idchapa, $situacao, $chapa, $representante, $ideleicao);
			echo "<table>
			<thead>
			<tr>
			<td>Nome da chapa</td>
			<td>Candidato</td>
			</tr>
			</thead>
			<tbody>
			";
			while ($sql->fetch())
			{
			echo " <tr>
			<td>$chapa</td>
			<td>$representante</td>
			</tr>";
			}
			echo "<tbody>
			</table>
			";
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 01
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 1");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 02
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto = 2 ");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum2 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 03
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto = 3");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum3 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 04
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 4");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum4 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 05
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 5");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum5 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 06
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 6");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum6 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 07
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 7");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum7 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 08
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 8");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum8 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 09
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 9");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum9 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 10");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum10 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 100");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum11 = $row['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$result =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 99");
			//executa a query
			$row = mysqli_fetch_assoc($result);
			$sum12 = $row['Total'];
			?>
				<br />
				<br />
			<?php
			echo "Resultado da votação: ";
			?>
			<!---- votacao 1 ----->
			<table>
				<thead>
					<tr>
					<td>Id da chapa</td>
					<td>Votação</td>
					</tr>
				</thead>
				<tbody>
					<tr>
					<td>01</td>
					<td><?php echo $sum ?></td>
					</tr>
					<tr>
					<td>02</td>
					<td><?php echo $sum2 ?></td>
					</tr>
					<tr>
					<td>03</td>
					<td><?php echo $sum3 ?></td>
					</tr>
					<tr>
					<td>04</td>
					<td><?php echo $sum4 ?></td>
					</tr>
					<tr>
					<td>05</td>
					<td><?php echo $sum5 ?></td>
					</tr>
					<tr>
					<td>06</td>
					<td><?php echo $sum6 ?></td>
					</tr>
					<tr>
					<td>07</td>
					<td><?php echo $sum7 ?></td>
					</tr>
					<tr>
					<td>08</td>
					<td><?php echo $sum8 ?></td>
					</tr>
					<tr>
					<td>09</td>
					<td><?php echo $sum9 ?></td>
					</tr>
					<tr>
					<td>10</td>
					<td><?php echo $sum10 ?></td>
					</tr>
					<tr>
					<td>100 - Branco</td>
					<td><?php echo $sum11 ?></td>
					</tr>
					<tr>
					<td>99 - Nulo</td>
					<td><?php echo $sum12 ?></td>
					</tr>
				</tbody>
			</table>
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