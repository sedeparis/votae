<?php ?>

<?php 
include ("../conecta_banco.php");
header('Content-Type: text/html; charset=utf-8');

?>
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
if(document.form.voto.value=="Selecione...")
{
alert("Por favor selecione o voto.");
document.form.voto.focus();
return false;
}
}
</script>
 </head>
	  <body>
	   <div class="container">
	 <?php session_start();
if (!isset ($_SESSION ["nome"]) || !isset($_SESSION ["senha"])|| !isset($_SESSION ["ide"])){
	header("Location: authentication_votar.php");
	exit;
} else {
	echo "Você está logado como votante.";
}
$logado = $_SESSION['nome'];
$ideh = $_SESSION['ide'];
echo "<br>";
echo '<span class="color">'.$logado.'</span>';

?>
<br><br><br>
	<h2>Votar</h2>
	<br><br>
	<?php

// cria a instrução SQL que vai selecionar os dados eleicao
$query = sprintf("SELECT * FROM eleicoes WHERE ideleicao ='$ideh'");
// executa a query
$dadosii = mysqli_query($query, $mysqli) or die(mysqli_error($mysqli));
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
		?>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
?>
	<p>
<span class="color">Votação para: <br> </span>
<?php echo "$eleicao"?></p>
<form name="form" method="POST" action="salva/salva_voto.php" onSubmit="return validacao();">
<fieldset class="grupo">
		 <div class="form-group">
	<?php 
	$query = mysqli_query($mysqli, "SELECT * FROM chapas 	WHERE ideleicao= '$ideh' ORDER BY idchapa ASC");
?>
<label  for="">Selecione seu voto</label>
 <select class="form-control" name="voto">
 <option name="">Selecione...</option>
 <?php 
 while($busca = mysqli_fetch_array($query)) { 
 ?>
 <option value="<?php 
 echo $busca['idchapa'] 
 ?>">
 <?php 
 echo $busca['chapa'];?>
 </option>
 <?php } ?>
 </select>
</div>
	</fieldset>
	<fieldset class="grupo">
		 <div class="form-group">
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