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
?>
<!DOCTYPE html>
 <html lang="pt-BR">
 <head>
	 <title>cadastro de candidatos</title>
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
	 <script type="text/javascript">
	  function mascara(t, mask){
 var i = t.value.length;
 var saida = mask.substring(1,0);
 var texto = mask.substring(i)
 if (texto.substring(0,1) != saida){
 t.value += texto.substring(0,1);
 }
 }
 function validacao() {

if(document.form.nome.value=="")
{
alert("Por favor informe o nome do candidato.");
document.form.nome.focus();
return false;
}

if(document.form.eleicao.value=="Selecione...")
{
alert("Por favor informe qual a eleição que o candidato concorrerá.");
document.form.eleicao.focus();
return false;
}

if(document.form.chapa.value=="Selecione...")
{
alert("Por favor informe a chapa do candidato.");
document.form.chapa.focus();
return false;
}
}

</script>
 </head>
	 <body>
	
	 <div class="container">
	<h2>Cadastro de candidatos</h2>
	<form name="form" method="post" action="salva/salva_candidato.php" onSubmit="return validacao();"> 
	<!---------- selecionar a eleição     --->
	<fieldset class="grupo">
		  <div class="form-group">
 <?php	   
  $query = mysqli_query($mysqli, "SELECT * FROM eleicoes WHERE concluida = 'N' AND aberta=0");
?>
 <label for="">Selecione a eleicao</label>		     
 <select class="form-control" name="eleicao">
 <option class="form-control" name="">Selecione...</option>
 <?php while($var = mysqli_fetch_array($query)) { ?>
 <option value="<?php echo $var['ideleicao'] ?>"><?php echo $var['eleicao'] ?></option>
 <?php } ?>
 </select>
 </div>
  </fieldset>
  
  <!---------- selecionar a chapa     --->
	<fieldset class="grupo">
 <div class="form-group">
	<?php 
	$query = mysqli_query($mysqli, "SELECT eleicoes.eleicao, chapas.idchapa, chapas.chapa 
	FROM eleicoes INNER JOIN chapas ON chapas.ideleicao=eleicoes.ideleicao  ");
?>
<br />
<br />
 <label for="">Selecione a chapa</label>
 <select class="form-control" name="chapa">
 <option class="form-control" name="">Selecione...</option>
 <?php 
 while($busca = mysqli_fetch_array($query)) { 
 ?>
 <option value="<?php 
 echo $busca['idchapa'] 
 ?>">
 <?php 
 echo '(Chapa) ' .$busca['chapa']. ' - (Eleição) '. $busca['eleicao']
 ?></option>
 <?php } ?>
 </select>
</div>

</fieldset>

	<fieldset class="grupo">
		  <div class="form-group">
			<label>Nome do Candidato:</label>
   <input type="text"  class="form-control" class="form-control" class="form-control"name="nome" size="40"/>
	</div>
	</fieldset>
	<fieldset class="grupo">
		  <div class="form-group">
	<input type="submit" name="enviar" value="Cadastrar Candidato"/>
	<input type="submit" name="limpar" value="Limpar"/>
	<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='admince.php'"/>
	</div>
	</fieldset>
</form>
</div>
 </body>
 </html>