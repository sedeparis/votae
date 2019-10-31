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
	<link href="../css/print.css" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
	<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<?php
			$user=$_SESSION['email'];
			$nomec=md5($nome);
			$senhac=md5($senha);
			$ide=$_POST['eleicao'];
				// consulta se ja existe o usuario user e este não fez a criptografia anteriormente
				$duplopesq = "SELECT * FROM userusers WHERE iduser = '$user' AND (ide='$ide')";
				$duplocad = mysqli_query($mysqli, $duplopesq) or die(mysqli_error($mysqli));
				if (mysqli_num_rows($duplocad) > 0) {
				echo "<span class='colorred'>ATENÇÃO: Já foi criado um usuario criptografado para essa eleição, para este usuario!<br> Por segurança não criamos mecanismos de resgatá-lo.
				<br>Se perdestes o usuario, terás que entrar em contato com a comissão eleitoral para orientá-lo! </span><a href='../painel.php'><br>Voltar</a>";
				} else 
				{
					$sql2 = ("INSERT INTO userusers (iduser, ide)
					VALUES('$user','$ide')");
					$resultado2 = mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
			
					// consulta se ja existe usuario criptografado com o nome desejado
					$dupesql = "SELECT * FROM votantes WHERE ide ='ide' AND (nomev = '$nome')";
					$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));
					if (mysqli_num_rows($duperaw) > 0) {
					echo "<span>Já existe um usuario com esse nome criptografado. Crie outro usuario.</span>";
				
					} else 
					{
						$sql = ( "INSERT INTO votantes (nomev, senhav, ide)
						VALUES('$nomec','$senhac','$ide')");
						$resultado = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
						
						echo "<p>Cadastro efetuado com sucesso! De agora em diante seu usuário será mostrado critpgrafado como: "  .$nomec;
						echo '<br> <p><a href="votar.php">CLIQUE AQUI PARA VOTAR </a>e informe seu usuário e senha de votação</p>';
						echo "<br>Ou volte em painel e clique na opção Votar";
					}
				?>
				<input type="button" name="cancela" value="Painel" onclick="window.location.href='../painel.php'"/>
				</p>
				<br />
		<?php } ?>
	</div>
</body>
</html>