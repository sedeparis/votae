<?php
session_start();
$_SESSION ["email"];
$_SESSION ["senha"];
echo "<br><br>";
echo "<div class='container'>";
echo "Voce está logado como: ";
	echo $_SESSION['email'];
	echo "</div>";
include ("../conecta_banco.php");
?><!DOCTYPE html>
 <html lang="pt-BR">
<head>
<title>Alterar candidato</title>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">     
<link rel="icon" type="image/jpg" href="../img/icone_barra.jpg">
<!-- jQuery (necessario para os plugins Javascript do Bootstrap) -->
  <script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

  <!-- Bootstrap CSS -->
<!-- script de validação ---->
  <script type="text/javascript">

 function validacao() {

<!---- candidato  ---- >
if(document.form.candidato.value=="")
{
alert("Candidato não pode ficar em branco.");
document.form.branco.focus();
return false;
}

<!---- chapas  ---- >
if(document.form.chapa.value=="Selecione...")
{
alert("Por favor informe a chapa.");
document.form.chapa.focus();
return false;
}

}
</script>
  
  </head>
<body>
  
	 
	 <div class="container">
<h2>Alterar Candidato</h2>

<?php
//recolhe dados da pagina anterior
$candidato=$_POST['candidato'];

// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM candidatos WHERE id ='$candidato'");
// executa a query
$dados = mysqli_query($mysqli, $query) or die(mysql_error($mysqli));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
		$id=$linha['id'];
		$nome=$linha['candidato'];
		
		
?>
<form name="form" method="post" action="salva/salva_altera_candidato.php" onSubmit="return validacao();">
<fieldset class="grupo">
		  <div class="form-group">
<input type="hidden" name="id" value="<?php print "$id"?>"/> 
<label><b>Nome do candidato:</b></label>
<textarea name="candidato" cols="40" rows="1"> <?php print "$nome" ?></textarea> 
	</div>
	</fieldset>
<fieldset class="grupo">
		  <div class="form-group">
		<?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM chapas");
?>
 <label for="">Selecione a chapa</label>		     
 <select class="form-control" name="chapa">
  <option name="">Selecione...</option>
 <?php while($var = mysqli_fetch_array($query)) { ?>
 <option value="<?php echo $var['idchapa'] ?>"><?php echo $var['chapa'] ?></option>
 <?php } ?>
 </select>
		 </div>
		 </fieldset>
		 
		 <fieldset class="grupo">
		  <div class="form-group">
 <input type="submit" value="Alterar candidato" name="alteracandidato"/>
  <input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
 </div>
		 </fieldset>
 </div>
 
</form>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if 
	}
?>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>

</div>
</body>
</html>
