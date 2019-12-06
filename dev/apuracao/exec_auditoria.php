<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
	<title>auditoria</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	<link rel="stylesheet" href="../css/print.css" type="text/css"/>
	<link rel="stylesheet" href="css/estilo_pdo.css" type="text/css"/>
</head>
<body>
	<div class="imprimir">
		<div class="cabecalho">
			<h1>Auditoria do voto</h1>
			<br />
			<p>Boletim emitido em:
			<?php
			//$eleicao=$_POST['eleicao'];
				//$senha=$_POST['senha'];
				//$senhac=md5($_POST['senha']);
				date_default_timezone_set("America/Cuiaba");
				$data= date("d.m.Y H:i:s");
				echo $data;
				echo " ";
			?>
			</p>
		</div>
		<?php
		//insere dados no logeventos
		$sql = mysqli_query($mysqli,"INSERT INTO logs_eventos (evento, valor, ideleicao,  data)
		VALUES('Relatório para auditoria', '$senhac', '$eleicao', '$data')");
		$resultado = mysqli_query ($mysqli, $sql)  or die(mysqli_error($mysqli));
		{echo "";}
		?>
		<?php
			//cria a instrução SQL que pegar dados da eleicao
			$query =("SELECT * FROM eleicoes WHERE ideleicao='$eleicao'");
			// executa a query
			$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
			// transforma os dados em um array
			$linha = mysqli_fetch_assoc($dados);
			// calcula quantos dados retornaram
			$total = mysqli_num_rows($dados);
		?>
		<?php
		// se o número de resultados for maior que zero, mostra os dados//
		if($total == 0) {echo "Votação zerada";}
		if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
				$ide=$linha['ideleicao'];
				$neleicao=$linha['eleicao'];
				?>
				</div>
				<?php
				// finaliza o loop que vai mostrar os dados
			}while($linha = mysqli_fetch_assoc($dados));
		// fim do if
		}
		?>
		<div class="corpo">
			<?php
			Echo 'Eleição: '.$neleicao;
			echo '<br>Relação de Votantes x voto:';
			?>
			<?php
				//cria a instrução SQL que vai selecionar a votacao
				$query =("SELECT * FROM votacao WHERE ide='$eleicao'");
				// executa a query
				$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
				// transforma os dados em um array
				$linha = mysqli_fetch_assoc($dados);
				// calcula quantos dados retornaram
				$total = mysqli_num_rows($dados);
			?>
			<?php
			// se o número de resultados for maior que zero, mostra os dados//
			if($total == 0) {echo "Votação zerada";}
			if($total > 0) {
			echo "
			<table>
			<thead>
			<tr>
			<td>Votante</td>
			<td>Voto</td>
			</tr>
			</thead>";
			// inicia o loop que vai mostrar todos os dados
			do {
			$idv=$linha['idv'];
			$voto=$linha['voto'];
			$mostraidv= substr("$idv",'8',16);
			echo "
			<table>
			<tbody>
			<tr>
			<td> $mostraidv </td>
			<td> $voto </td>
			</tr>
			<tbody>
			</table>";
			?>
			<?php
			// finaliza o loop que vai mostrar os dados
			}while($linha = mysqli_fetch_assoc($dados));
			// fim do if
			}
			?>
			<br />
			<hr>
			<p>Para auditar seu voto visite o site do link a seguir e digite seu nome de usuário. Confira se o trecho mostrado na tabela
			corresponde com parte do resultado.
			<a href="http://www.miraclesalad.com/webtools/md5.php" target="_blank">Visitar site</a></p>
			<br />
			<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../ce/admince.php'" class="btn btn-warning" />
		</div>
	</div>
</body>
</html>