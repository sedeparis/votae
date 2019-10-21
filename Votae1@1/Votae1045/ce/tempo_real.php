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
		<?php
		include_once "../conecta_banco.php";
		$ideleicao=2;
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
		</body>
</html>