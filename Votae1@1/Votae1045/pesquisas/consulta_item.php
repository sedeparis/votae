<?php 
include "conecta_banco.php";
?>
<html>
<head>
 <img class="logo" src="img/banner.jpg">
<title>Consultar item
</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="css/reset.css"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
</head>
<body>
<div id="tudo">
<h2>Composição item</h2>


<br />
<br />

<div id="p1">
<?php
$consulta=$_POST['consulta'];
$consulta2=$_POST['consulta2'];
?>
<?php
$h= " - ";
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM cd_alimentos WHERE ida ='$consulta'");
// executa a query
$dadosa = @mysql_query($query, $conexao) or die(mysql_error());
// transforma os dados em um array
$linhaa = @mysql_fetch_assoc($dadosa);
// calcula quantos dados retornaram
$totala = mysql_num_rows($dadosa);
?>
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($totala > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
echo $nome = $linhaa['nome'];
		?>
		<p>
Produto:
<?php echo "$nome"?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linhaa = @mysql_fetch_assoc($dadosa));
	// fim do if 
	}
?>


<?php
// tira o resultado da busca da memória
@mysql_free_result($dadosa);
?>

<br />
<br />

<?php
// cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT * FROM cd_valor_nutr WHERE ida ='$consulta'");
// executa a query
$dados = @mysql_query($query) or die(mysql_error());
// transforma os dados em um array
$linha = @mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
?>
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
$umid =$linha['umidade'];
$ener = $linha['energia'];
$prot= $linha['proteina'];
$lipid= $linha['lipideos'];
$coles= $linha['colesterol'];
$carbo= $linha['carboidrato'];
$fibra= $linha['fibra'];
$cinzas= $linha['cinzas'];
$calcio= $linha['calcio'];
$magne= $linha['magnesio'];
$manga= $linha['manganes'];
$fosfo= $linha['fosforo'];
$ferro= $linha['ferro'];
$sodio= $linha['sodio'];
$potassio= $linha['potassio'];
$cobre= $linha['cobre'];
$zinco= $linha['zinco'];
?>
<table>
<colgroup>
<col width="13%">
<col width="13%">
<col width="13%">
<col width="13%">
<col width="12%">
<col width="12%">
<col width="12%">
<col width="12%">
</colgroup>
<thead>
<tr>
<th>Umidade</th>
<th>Energia</th>
<th>Proteina</th>
<th>Lipideos</th>
<th>Colesterol</th>
<th>Carboidrato</th>
<th>Fibra</th>
<th>Cinzas</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo "$umid"?></td>
<td><?php echo "$ener"?></td>
<td><?php echo "$prot"?></td>
<td><?php echo "$lipid"?></td>
<td><?php echo "$coles"?></td>
<td><?php echo "$carbo"?></td>
<td><?php echo "$fibra"?></td>
<td><?php echo "$cinzas"?></td>
</tr>
</tbody>
</table>
<br>
<table>
<colgroup>
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
</colgroup>
<thead>
<tr>
<th>Cálcio</th>
<th>Magnésio</th>
<th>Manganês</th>
<th>Fósforo</th>
<th>Ferro</th>
<th>Sódio</th>
<th>Potássio</th>
<th>Cobre</th>
<th>Zinco</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo "$calcio"?></td>
<td><?php echo "$magne"?></td>
<td><?php echo "$manga"?></td>
<td><?php echo "$fosfo"?></td>
<td><?php echo "$ferro"?></td>
<td><?php echo "$sodio"?></td>
<td><?php echo "$potassio"?></td>
<td><?php echo "$cobre"?></td>
<td><?php echo "$zinco"?></td>
</tr>
</tbody>
</table>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = @mysql_fetch_assoc($dados));
	// fim do if 
	}
?>
<?php
// tira o resultado da busca da memória
@mysql_free_result($dados);
?>
<br />
<br />
<br />
<br />
<br />
</div>
<div id="p2">
<?php

// cria a instrução SQL que vai selecionar os dados do segundo produto
$query = sprintf("SELECT * FROM cd_alimentos WHERE id ='$consulta2'");
// executa a query
$dadosb = @mysql_query($query, $conexao) or die(mysql_error());
// transforma os dados em um array
$linhab = @mysql_fetch_assoc($dadosb);
// calcula quantos dados retornaram
$totalb = mysql_num_rows($dadosb);
?>
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($totalb > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
echo $nome2 = $linhab['nome'];
		?>
		<p>
Produto:
<?php echo "$nome2"?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linhab = @mysql_fetch_assoc($dadosb));
	// fim do if 
	}
?>


<?php
// tira o resultado da busca da memória
@mysql_free_result($dadosb);
?>

<br />
<br />

<?php
// cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT * FROM cd_valor_nutr WHERE ida ='$consulta'");
// executa a query
$dados = @mysql_query($query) or die(mysql_error());
// transforma os dados em um array
$linha = @mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
?>
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
$umid =$linha['umidade'];
$ener = $linha['energia'];
$prot= $linha['proteina'];
$lipid= $linha['lipideos'];
$coles= $linha['colesterol'];
$carbo= $linha['carboidrato'];
$fibra= $linha['fibra'];
$cinzas= $linha['cinzas'];
$calcio= $linha['calcio'];
$magne= $linha['magnesio'];
$manga= $linha['manganes'];
$fosfo= $linha['fosforo'];
$ferro= $linha['ferro'];
$sodio= $linha['sodio'];
$potassio= $linha['potassio'];
$cobre= $linha['cobre'];
$zinco= $linha['zinco'];
?>
<table>
<colgroup>
<col width="13%">
<col width="13%">
<col width="13%">
<col width="13%">
<col width="12%">
<col width="12%">
<col width="12%">
<col width="12%">
</colgroup>
<thead>
<tr>
<th>Umidade</th>
<th>Energia</th>
<th>Proteina</th>
<th>Lipideos</th>
<th>Colesterol</th>
<th>Carboidrato</th>
<th>Fibra</th>
<th>Cinzas</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo "$umid"?></td>
<td><?php echo "$ener"?></td>
<td><?php echo "$prot"?></td>
<td><?php echo "$lipid"?></td>
<td><?php echo "$coles"?></td>
<td><?php echo "$carbo"?></td>
<td><?php echo "$fibra"?></td>
<td><?php echo "$cinzas"?></td>
</tr>
</tbody>
</table>
<br>
<table>
<colgroup>
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
<col width="11%">
</colgroup>
<thead>
<tr>
<th>Cálcio</th>
<th>Magnésio</th>
<th>Manganês</th>
<th>Fósforo</th>
<th>Ferro</th>
<th>Sódio</th>
<th>Potássio</th>
<th>Cobre</th>
<th>Zinco</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo "$calcio"?></td>
<td><?php echo "$magne"?></td>
<td><?php echo "$manga"?></td>
<td><?php echo "$fosfo"?></td>
<td><?php echo "$ferro"?></td>
<td><?php echo "$sodio"?></td>
<td><?php echo "$potassio"?></td>
<td><?php echo "$cobre"?></td>
<td><?php echo "$zinco"?></td>
</tr>
</tbody>
</table>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = @mysql_fetch_assoc($dados));
	// fim do if 
	}
?>
<?php
// tira o resultado da busca da memória
@mysql_free_result($dados);
?>
<br />
<br />
<br />
<br />
<br />
</div>
</div>
</body>
</html>
