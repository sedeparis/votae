<?php
session_start();
$_SESSION['email'];
$_SESSION['senha'];
include ("conecta_banco.php");
?>

<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
<title>Alterar sennha de usuários
</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-----  bootstrap ------>
</head>
<body>
	<div class="container">
		<img src="img/baile.gif"/>
		<br>
		<br>
		<?php
		$id=$_POST['id'];
		$senhac=md5($_POST['senhac']);
		$sql = mysqli_query($mysqli, "UPDATE user SET senha='$senhac' WHERE id='$id'");
		$resultado = mysqli_query ($mysqli, $sql);
		{echo "Senha alterada com sucesso!";}
		?>
		<br>
		<br>
		<input type="button" name="cancela" value="Acessar painel de votação" onclick="window.location.href='painel.php'"/>
		<br />
	</div>
</body>
</html>