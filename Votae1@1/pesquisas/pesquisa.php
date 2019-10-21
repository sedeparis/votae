<?php ?>

<?php 
include ("conecta_banco.php");
header('Content-Type: text/html; charset=utf-8');

?>
 <html lang="pt_BR">
 <head>
	 <title>Consultar item</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	 <link rel="stylesheet" href="css/reset.css" type="text/css"/>
	 <link rel="stylesheet" href="css/estilo.css" type="text/css"/>
	 <link rel="stylesheet" href="css/estiloform.css" type="text/css"/>
	  <script type="text/javascript">
 function validacao() {
if(document.form.altera.value=="Selecione...")
{
alert("Por favor selecione o item.");
document.form.altera.focus();
return false;
}
}
</script>
 </head>
	  <body>
	 <img class="logo" src="img/banner.jpg">
   
	 <?php
	 $separa = " - ";
	 ?>
	 <div id="tudo">
	<h2>Consultar produtos</h2>
	
<form name="form" method="POST" action="consulta_item.php" onSubmit="return validacao();">
<fieldset class="grupo">
		 <div class="campo">
	<?php 
	$query = mysql_query("SELECT * FROM cd_alimentos ORDER BY ida ASC");
?>
 <label for="">Selecione o item</label>
 <select name="consulta">
 <option name="">Selecione...</option>
 <?php 
 while($busca = mysql_fetch_array($query)) { 
 ?>
 <option value="<?php 
 echo $busca['ida'] 
 ?>">
 <?php 
 echo $busca['nome'];?>
 </option>
 <?php } ?>
 </select>
</div>
<div class="campo">
	<?php 
	$query = mysql_query("SELECT * FROM cd_alimentos ORDER BY ida ASC");
?>
 <label for="">Selecione o item</label>
 <select name="consulta2">
 <option name="">Selecione...</option>
 <?php 
 while($busca = mysql_fetch_array($query)) { 
 ?>
 <option value="<?php 
 echo $busca['id'] 
 ?>">
 <?php 
 echo $busca['nome'];?>
 </option>
 <?php } ?>
 </select>
</div>
	</fieldset>
	<fieldset class="grupo">
		 <div class="campo">
<input type="submit" id="submit" value="Buscar Alimento" name="Localizar"/>
<input type="reset" id="reset" value="Limpar" name="reset"/>
<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='painel.php'"/>
</div>
	</fieldset>
</form>
</div>

	 </body>
 </html>