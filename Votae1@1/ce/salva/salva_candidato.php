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

<head><title>Votae</title>
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
$chapa=$_POST['chapa'];
$ideleicao=$_POST['eleicao'];
$nome=$_POST['nome'];
//verifica se existe candidato com esse nome ou algum candidato inscrito para a chapa
$dupesql = "SELECT * FROM candidatos where (candidato = '$nome') OR idchapa= '$chapa' ";

$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($duperaw) > 0) {
   echo "Candidato ja cadastrado ou chapa já tem candidato ou candidatos com mesmo nome não são permitidos.";

} else {
{echo "Todos dados corretos. A gravar dados no banco"; }
$sql =("INSERT INTO candidatos (idchapa, candidato, ideleicao)
VALUES('$chapa','$nome', '$ideleicao')");
$resultado = mysqli_query ($mysqli, $sql) or die(mysqli_error($mysqli));	
{echo "Cadastro efetuado com sucesso!";}
}
?>
<br>
<br>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=../admince.php'>";
?>
</body>
</html>