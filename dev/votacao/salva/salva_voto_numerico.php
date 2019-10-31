<?php
include "../../conecta_banco.php";
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
<title>Votae</title>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
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
$log=md5($_POST['logado']);
$voto=$_POST['voto'];
$ide=$_POST['ide'];

$dupesql = "SELECT * FROM votacao WHERE (idv = '$log')";

$duperaw = mysqli_query($mysqli, $dupesql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($duperaw) > 0) {
   echo "<span class='color'>Apuramos um voto com seu usuário. Se não foi você que votou entre em contato com a comissão eleitoral</span>";
} else { echo "Seu voto será computado";
} 
 if ($voto==''){
	$voto==0;
$sql = ("INSERT INTO votacao (ide, idv, voto)
VALUES('$ide', '$log', '$voto')");
$resultado= mysqli_query(mysqli, $sql) or die(mysqli_error($mysqli));
echo "Voto efetuado com sucesso!";
}
else {
	$sql2 = ( "INSERT INTO votacao (ide, idv, voto)
VALUES('$ide', '$log', '$voto')");
$resultado2= mysqli_query($mysqli, $sql2) or die(mysqli_error($mysqli));
echo "Voto efetuado com sucesso!";
}
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=../../painel.php'>";
?>
</div>
</body>
</html>