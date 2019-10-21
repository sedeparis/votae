<!DOCTYPE html>
<html lang="pt-BR">
<head>
<title>
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
<!--link rel="stylesheet" href="../css/print.css" type="text/css"/-->
<link rel="stylesheet" href="../css/estilo_pdo.css" type="text/css"/>
</head>
<body>
	<div id="imprimir">
		<?php
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
			echo '<p class="center">'.$endereco.' - '.$num.' - '.$bairro.' - '.$cidade.' - '.$uf.'</p><br>';
			echo '<p class="center"> Fone: '.$fone.' - CNPJ: '.$cnpj.'</p><br>';
			?>
		</div>
		<div id="textos">
			<?php
				$ideleicao=$_POST['eleicao'];
				// seleciona a eleição
				$queryb =("SELECT * FROM eleicoes WHERE ideleicao='$ideleicao'");
				// executa a query
				$dadosb = mysqli_query($mysqli, $queryb) or die(mysqli_error($mysqli));
				// transforma os dados em um array
				$linhab = mysqli_fetch_assoc($dadosb);
				// calcula quantos dados retornaram
				$totalb = mysqli_num_rows($dadosb);
			?>
			<?php
				// se o número de resultados for maior que zero, mostra os dados//
				if($totalb == 0) {echo "Não encontramos candidatos inscritos para essa eleição";}
				if($totalb > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
				$nome=$linhab['eleicao'];
				$proposta=$linhab['proposta'];
				$data=$linhab['data'];
				$databr= date('d/m/Y', strtotime($data));
				$hora=$linhab['hora'];
				$horaf=$linhab['horaf'];
			?>
			<?php
				// finaliza o loop que vai mostrar os dados
				}while($linhab = mysqli_fetch_assoc($dadosb));
				// fim do if
				}
			?>
			<?php
				// votantes aptos
				$result =mysqli_query($mysqli, "SELECT COUNT(iduser) AS Total FROM user_eleicao WHERE ideleicao='$ideleicao'");
				//executa a query
				$row = mysqli_fetch_assoc( $result);
				$sum_eleitor = $row['Total'];
				
			?>
			<?php
				// criaram senha criptografados
				$result2 =mysqli_query($mysqli, "SELECT COUNT(idv) AS totalv FROM votantes WHERE ide='$ideleicao'");
				//executa a query
				$row = mysqli_fetch_assoc($result2);
				$sum_votantes = $row['totalv'];
				
			?>
			<?php
				// quantos votarama
				$result3 =mysqli_query($mysqli, "SELECT COUNT(id) AS totalvt FROM votacao WHERE ide='$ideleicao'");
				//executa a query
				$row = mysqli_fetch_assoc($result3);
				$sum_votaram = $row['totalvt'];
		
				?>
			<?php
				echo "<h1>Ata de votação</h1>";
				echo "<p>Na data de ". $databr. " os eleitores aptos a votarem para a
				Eleição/consulta pública: ".$nome. " . Através de sistema eletrônico de votação, acessado com usuário e senha particular,
				tendo seus dados criptografados para garantia de sigilo de voto, optaram pela escolha de representantes ou propostas conforme elencada
				pelo código eleitoral assim sendo respondendo a seguinte escolha:  ".$proposta. ".
				 A Eleição/consulta pública iniciou as ".$hora." horas terminando as ".$horaf." horas. 
				 Para a presente eleição estavam aptos à votar: <span> $sum_eleitor </span> eleitores. 
				 Para efeitos os eleitores que criaram usuário e senha criptografada para votar foram:<span> $sum_votantes </span> eleitores.
				Foram computados: <span> $sum_votaram </span> votos de eleitores que finalizaram o processo de votação. 
				Os seguintes eventos estiveram relacionados à eleição: </p>";
				// seleciona a eleição
				$queryc =("SELECT * FROM logs_eventos
				INNER JOIN users
				ON logs_eventos.iduser = users.id
				WHERE logs_eventos.ideleicao='$ideleicao'");
				// executa a query
				$dadosc = mysqli_query($mysqli, $queryc) or die(mysqli_error($mysqli));
				// transforma os dados em um array
				$linhac = mysqli_fetch_assoc($dadosc);
				// calcula quantos dados retornaram
				$totalc = mysqli_num_rows($dadosc);
				echo "
				<table border='1px'>
				<colgroup>
				<col width='40%'>
				<col width='25%'>
				<col width='35%'>
				</colgroup>
				<thead>
				<tr>
				<th>Evento</th>
				<th>Data - Hora</th>
				<th>Usuário</th>
				</tr>
				</thead>
				</table>";
			?>
			<?php
				// se o número de resultados for maior que zero, mostra os dados//
				if($totalc == 0) {echo "Não encontramos candidatos inscritos para essa eleição";}
				if($totalc > 0) {
				// inicia o loop que vai mostrar todos os dados
				do {
				$evento=$linhac['evento'];
				$valor=$linhac['valor'];
				$data=$linhac['data'];
				$user=$linhac['nome'];
				echo "
				<table border='1px'>
				<colgroup>
				<col width='40%'>
				<col width='25%'>
				<col width='35%'>
				</colgroup>
				<tbody>
				<tr>
				<th>$evento</th>
				<th>$data</th>
				<th>$user</th>
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
			?>
			<?php
				echo 'Concorreram ao pleito a(s) chapa(s):';
				//com pdo
				// cria a instrução SQL que vai selecionar os dados dos itens
				$sql = $mysqli ->prepare("SELECT * FROM chapas WHERE ideleicao='$eleicao'");
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
				</table>";
			?>
			<?php
				// cria a instrução SQL que vai selecionar votos proposta 01
				$resulta =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 1");
				//executa a query
				$rowa = mysqli_fetch_assoc($resulta);
				$sum1 = $rowa['Total'];
				?>
				<?php
				// cria a instrução SQL que vai selecionar votos proposta 02
				$resultb =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto = 2 ");
				//executa a query
				$rowb = mysqli_fetch_assoc($resultb);
				$sum2 = $rowb['Total'];
			?>
			<?php
				// cria a instrução SQL que vai selecionar votos proposta 03
				$resultc =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto = 3");
				//executa a query
				$rowc = mysqli_fetch_assoc($resultc);
				$sum3 = $rowc['Total'];
			?>
			<?php
				// cria a instrução SQL que vai selecionar votos proposta 04
				$resultd =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 4");
				//executa a query
				$rowd = mysqli_fetch_assoc($resultd);
				$sum4 = $rowd['Total'];
			?>
			<?php
				// cria a instrução SQL que vai selecionar votos proposta 05
				$resulte =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 5");
				//executa a query
				$rowe = mysqli_fetch_assoc($resulte);
				$sum5 = $rowe['Total'];
			?>
			<?php
				// cria a instrução SQL que vai selecionar votos proposta 06
				$resultf =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 6");
				//executa a query
				$rowf = mysqli_fetch_assoc($resultf);
				$sum6 = $rowf['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 07
			$resultg =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 7");
			//executa a query
			$rowg = mysqli_fetch_assoc($resultg);
			$sum7 = $rowg['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 08
			$resulth =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 8");
			//executa a query
			$rowh = mysqli_fetch_assoc($resulth);
			$sum8 = $rowh['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 09
			$resulti =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 9");
			//executa a query
			$rowi = mysqli_fetch_assoc($resulti);
			$sum9 = $rowi['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$resultj =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 10");
			//executa a query
			$rowj = mysqli_fetch_assoc($resultj);
			$sum10 = $rowj['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$resultk =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 100");
			//executa a query
			$rowk = mysqli_fetch_assoc($resultk);
			$sum11 = $rowk['Total'];
			?>
			<?php
			// cria a instrução SQL que vai selecionar votos proposta 010
			$resultm =mysqli_query($mysqli, "SELECT COUNT(voto) AS Total FROM votacao WHERE ide='$eleicao' AND voto= 99");
			//executa a query
			$rowm = mysqli_fetch_assoc($resultm);
			$sum12 = $rowm['Total'];
			?>
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
			<td><?php echo $sum1 ?></td>
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
			<?php 
				echo "<p>Os processo eleitoral aqui relatados passará pelo período de Recursos Sobre o Resultado e homologados pela comissão
				 // eleitoral em ato próprio de Declaração dos vencedores. Sem mais a presente Ata segue para assinatura dos integrantes da comissão eleitoral.</p>";
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
