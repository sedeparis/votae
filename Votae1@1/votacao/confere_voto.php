<?php session_start();
if (!isset ($_SESSION ["email"]) || !isset($_SESSION ["senha"])){
header("Location: index.php");
exit;
} else {
}
$logado=($_SESSION ["email"]);
?>
<?php
include "../conecta_banco.php";
?>
<html>
<head>
<title>Conferir votação</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../css/estilo_pdo.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<br /><br /><br /><br />
<h1>Minhas votações</h1>
<br /><br /><br /><br />
<?php
echo "Usuário: " .$logado. "<br>";

// cria a instrução SQL que vai selecionar os dados dos itens
$query = sprintf("SELECT userusers.iduser, eleicoes.eleicao
FROM userusers INNER JOIN eleicoes ON
eleicoes.ideleicao=userusers.ide
WHERE iduser ='$logado' ORDER BY ide DESC LIMIT 2 ");
// executa a query
$dados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<br />
<p>Você foi autorizado a votar nas seguintes eleições(consultas, pesquisas...)
<?php
// se o número de resultados for maior que zero, mostra os dados//
if($total == 0) {echo "Não encontramos votação com seu usuário";}
if($total > 0) { 
echo "<table class="table">
<thead>
<tr>
<td>Eleição</td>
<td>Votante</td>
</tr>
</thead>
</table>";
// inicia o loop que vai mostrar todos os dados
do {
$ide=$linha['eleicao'];
$votante=$linha['iduser'];
echo "<table class="table">
<tbody>
<tr>
<td>$ide</td>
<td> $votante</td>
</tr>
</tbody>
</table>";
?>

<?php
// finaliza o loop que vai mostrar os dados
}while($linha = mysqli_fetch_assoc($dados));
// fim do if
}

?>


<hr>

<p>Últimas 05 eleições deste órgão
<?php
// cria a instrução SQL que vai selecionar os dados dos itens
$queryb =sprintf("SELECT * FROM eleicoes ORDER BY ideleicao DESC LIMIT 2 ");
// executa a query
$dadosb = mysqli_query($mysqli, $queryb) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linhab = mysqli_fetch_assoc($dadosb);
// calcula quantos dados retornaram
$totalb = mysqli_num_rows($dadosb);
?>
<br />
<?php
// se o número de resultados for maior que zero, mostra os dados//
if($totalb == 0) {}
if($totalb > 0) { echo "<table>
<thead>
<tr>
<td>Id da eleição</td>
<td>Eleição</td>
</tr>
</thead>
</table>";
// inicia o loop que vai mostrar todos os dados
do {
$ideleicao=$linhab['ideleicao'];
$eleicao=$linhab['eleicao'];
echo "
<table>
<tbody>
<tr>
<td> $ideleicao </td>
<td> $eleicao </td>
</tr>
</tbody>
</table>";
?>

<?php
// finaliza o loop que vai mostrar os dados
}while($linhab = mysqli_fetch_assoc($dadosb));
// fim do if
}

?>

<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
mysqli_free_result($dadosb);
?>

<hr>
<br />

<input type="button" name="cancela" value="Voltar" onclick="window.location.href='../painel.php'"/>
</div>
</body>
</html>