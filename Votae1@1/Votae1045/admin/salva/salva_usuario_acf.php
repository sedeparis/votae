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
 <head>
	 <title>Cadastro de Comissão e Fiscais</title>
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
$tpuser=$_POST['tpuser'];
$nome=$_POST['nome'];
$email=$_POST['email'];
$senha=$_POST['senha'];
$veri=$_POST['verificador'];

$sql =("INSERT INTO users(nome, tpuser, email, senha, situacao, verificador)
VALUES('$nome', '$tpuser', '$email', '$senha', 1, '$veri')");
$duperaw = mysqli_query($sql, $mysqli) or die(mysqli_error($mysqli));
echo "Cadastro efetuado com sucesso!";
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admin.php'>";
?>
</div>
</body>
</html>