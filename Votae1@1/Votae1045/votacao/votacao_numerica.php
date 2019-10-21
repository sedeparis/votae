<?php
session_start();
if (!isset ($_SESSION ["nome"]) || !isset($_SESSION ["senha"])|| !isset($_SESSION ["ide"])){
header("Location: authentication_votar.php");
exit;
} else {
echo "Você está logado como votante.";
}
$logado = $_SESSION['nome'];
$ideh = $_SESSION['ide'];
echo "<br>";
echo '<span class="colorred">'.MD5($logado).'</span>';
include ("../conecta_banco.php");
?>
<!DOCTYPE HTML>
<html lang="pt_BR">
<head>
<title>Votae</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Bootstrap CSS -->
<script type="text/javascript">
function validacao() {
if(document.form.voto.value=="")
{
alert("Tem certeza que votorá em branco.");
document.form.votob.focus();
return false;
}
}
</script>
</head>
<body>
<div class="container">
<br>
<br>
<br>
<h2>Votar</h2>
<br>
<br>
<?php
// cria a instrução SQL que vai selecionar os dados eleicao
$query = sprintf("SELECT * FROM eleicoes WHERE ideleicao ='$ideh'");
// executa a query
$dadosii = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linhaii = mysqli_fetch_assoc($dadosii);
// calcula quantos dados retornaram
$totalii = mysqli_num_rows($dadosii);
?>
<?php
// se o número de resultados for maior que zero, mostra os dados//
if($totalii > 0) {
// inicia o loop que vai mostrar todos os dados
do {
$eleicao = $linhaii['eleicao'];
$ideleicao = $linhaii['ideleicao'];
$proposta = $linhaii['proposta'];
?>
<?php
// finaliza o loop que vai mostrar os dados
}while($linhaii = mysqli_fetch_assoc($dadosii));
// fim do if
}
?>
<p>
<span class="color">Votação para:  </span>
<span class="colorblue"><?php echo "$eleicao"?></span></p>

<p>
<span class="color">Proposta: </span>
<span class="colorblue">
<?php echo "$proposta"?></span>
</p>

<?php

// cria a instrução SQL que vai selecionar os dados eleicao
$querya = sprintf("SELECT * FROM ivotacao WHERE ideleicao ='$ideh'");
// executa a query
$dadosa = mysqli_query($mysqli, $querya) or die(mysqli_error($mysqli));
// transforma os dados em um array
$linhaa = mysqli_fetch_assoc($dadosa);
// calcula quantos dados retornaram
$totala = mysqli_num_rows($dadosa);
?>
<?php
// se o número de resultados for maior que zero, mostra os dados//
if($totala > 0) {
// inicia o loop que vai mostrar todos os dados
do {
$ivotacao = $linhaa['ivotacao'];
$ideleicao = $linhaa['ideleicao'];
$complemento = $linhaa['complemento'];
?>
<?php
// finaliza o loop que vai mostrar os dados
}while($linhaa = mysqli_fetch_assoc($dadosa));
// fim do if
}
?>
<form name="form" method="POST" action="salva/salva_voto_numerico.php" onSubmit="return validacao();">
<p><span class="color">Instrução de votação:</p> </span>
<span class="colorblue"><?php echo $ivotacao ?> </span>
<br>
<p><span class="color">Instrução complementares:</p> </span>
<span class="colorblue"><?php echo $complemento ?> </span>
<br>
<fieldset class="grupo">
<div class="form-group">
<label>Digite o número da chapa ou seu voto:</label>
<input class="form-control" type="number" id="voto" size="4" name="voto"  maxlength="2" />
</fieldset>
<fieldset class="grupo">
<div class="submit">
<br>
<input type="hidden" name="ide" Value="<?php echo $ideleicao ?>" />
<input type="hidden" name="logado" Value="<?php echo $logado ?>" />
<input type="submit" id="submit" value="Votar" name="Localizar"/>
<input type="reset" id="reset" value="Limpar" name="reset"/>
<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../painel.php'"/>
</div>
</fieldset>
</form>
</div>

</body>
</html>