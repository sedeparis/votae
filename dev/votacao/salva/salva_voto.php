<!DOCTYPE HTML>
 <html lang="pt_BR">
<head>
<title>Votae</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link rel="stylesheet" type="text/css" href="../../css/reset.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="../../css/estiloform.css" media="screen"/>
</head>
 <body>
<div id="tudo">
<?php
include "../../conecta_banco.php";
$log=$_POST['logado'];
$voto=$_POST['voto'];
$ide=$_POST['ide'];
echo $ide;

$dupesql = "SELECT * FROM votacao where (idv = '$log')";

$duperaw = mysqli_query(mysqli, $dupesql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($duperaw) > 0) {
   echo "<span class='color'>Apuramos um voto com seu usuário. Se não foi você que votou entre em contato com a comissão eleitoral</span>";

} else {
$sql = ( "INSERT INTO votacao (ide, idv, voto)
VALUES('$ide', '$log', '$voto')");
$resultado = mysqli_query(mysqli, $sql) or die(mysqli_error($mysqli));
echo "Voto efetuado com sucesso!";
}
?>
<?php
echo "<meta HTTP-EQUIV='refresh' CONTENT='100;URL=../../painel.php'>";
?>
</div>
</body>
</html>