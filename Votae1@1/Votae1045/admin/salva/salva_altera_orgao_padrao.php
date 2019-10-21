<<?php
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
	 <title>altera órgao</title>
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
$idorgao=$_POST['idorgao'];	
		$endereco=$_POST['endereco'];
		$num=$_POST['num'];
		$bairro=$_POST['bairro'];
		$email=$_POST['email'];
		$fone=$_POST['fone'];
		$gestor=$_POST['gestor'];
		$diretor=$_POST['diretor'];
		

$sql = ("UPDATE cdorgao SET nome ='$nome',  endereco ='$endereco', num ='$num', bairro ='$bairro', 
 email ='$email', fone ='$fone', gestor ='$gestor', diretor ='$diretor' WHERE idorgao ='$idorgao'");
$resultado = mysqli_query($sql, $mysqli) or die(mysqli_error($mysqli));
{echo " Orgão alterado com sucesso!";
}
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=../admin.php'>";
?>
</div>
</body>
</html>