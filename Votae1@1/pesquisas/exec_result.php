<?php
include "../conecta_banco.php";
?>
<html>
 <head>
	 <title>Resultado Final</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	 <link rel="stylesheet" href="../css/estilo.css" type="text/css"/>
	 <link rel="stylesheet" href="../css/print.css" type="text/css"/>
	
 </head>
	 <body>
	 <div id="imprimir">
	 <div id="cabecalho">
	  <?php 
	  $ide=$_POST['item'];
	   ?>
<h3>Resultado da eleição </h3>
<div id="corpo">
<?php
// cria a instrução SQL que vai selecionar os dados da soma total preço estimado 1
$result = mysql_query("SELECT SUM(voto) AS resulta FROM votacao WHERE ide ='$ide'");
 //executa a query
$row = mysql_fetch_assoc($result);
$sum = $row['resulta'];
?>
<?php
// cria a instrução SQL que vai selecionar os dados da soma total preço estimado 1
$result = mysql_query("SELECT SUM(voto) AS resultb FROM votacao WHERE ide ='$ide'");
 //executa a query
$row = mysql_fetch_assoc($result);
$sum2 = $row['resultb'];
?>
<?php
// cria a instrução SQL que vai selecionar os dados da soma total preço estimado 1
$result = mysql_query("SELECT SUM(voto) AS resultc FROM votacao WHERE ide ='$ide'");
 //executa a query
$row = mysql_fetch_assoc($result);
$sum3 = $row['resultc'];
?>
<?php
$x= $sum;
$y= $sum2;
$z= $sum3;
//condiciona a desprezar valor zerados
$cont = 0;
if ($x != 0.00){ // ou NULL
$cont = $cont + 1;
}
if ($y != 0.00){ // ou NULL
$cont = $cont + 1;
}
if ($z != 0.00){ // ou NULL
$cont = $cont + 1;
}
$media = ($x+$y+$z)/$cont; 
?>
<p>
<b>Valor da compra estimado:</b><span class="rel">
<?php echo number_format($media,2, ",",".");?></span></p>

<hr>
<br />

<br />
<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../painel.php'"/>
</div>
</body>
</html>