<?php 
include ("../conecta_banco.php");
header('Content-Type: text/html; charset=utf-8');

?>
 <html lang="pt_BR">
 <head>
	 <title>Resultado</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 <link rel="stylesheet" href="../css/reset.css" type="text/css"/>
	 <link rel="stylesheet" href="../css/estilo.css" type="text/css"/>
	 <link rel="stylesheet" href="../css/estiloform.css" type="text/css"/>
	  <script type="text/javascript">

function validacao() {

if(document.form.item.value=="Selecione...")
{
alert("Por favor selecione a eleicao.");
document.form.item.focus();
return false;
}

}
</script>
 </head>
	  <body>
	 <?php
	 $separa = " - ";
	 ?>
	 <div id="tudo">
	<h2>Resultado</h2>
	
<form  name="form" method="POST" action="exec_result.php" onSubmit="return validacao();">

	<fieldset class="grupo">
		 <div class="campo">
		 <!---selecionar itens sem pesquisas --->
	<?php 
	$query = mysql_query("SELECT * FROM eleicoes WHERE concluida='N'");
?>
 <label for="">Selecione a eleição</label>
 <select name="item">
 <option name="">Selecione...</option>
 <?php 
 while($busca = mysql_fetch_array($query)) { 
 ?>
 <option value="<?php 
 echo $busca['ideleicao'] 
 ?>">
 <?php 
 echo $busca['eleicao'];?>
 </option>
 <?php } ?>
 </select>
</div>
</fieldset>

 <div class="campo">
<input type="submit" id="submit" value="Imprimir" />
<input type="reset" id="reset" value="Limpar dados" />
<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='painel.php'"/>
</div>
</form>
</div>

	 </body>
 </html>