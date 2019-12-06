<?php

include ("../conecta_banco.php");
?>
<!DOCTYPE html>
 <html lang="pt-BR">
<head>
<title>Alterar senha ACF
</title>
	<meta charset="utf-8"> 
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
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
<!---- senha atual ---- >
if(document.form.senha.value=="")
{
alert("Por favor informe a senha atual.");
document.form.senha.focus();
return false;
}
<!----  nova senha ---- >
if(document.form.senhac.value=="")
{
alert("Por favor informe a nova senha.");
document.form.senhac.focus();
return false;
}

}
</script>
</head>
<body>
<div class="container">

<?php
$user=$_POST['user'];
$veri=$_POST['verificador'];
 // cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT * FROM users WHERE email ='$user' AND verificador= '$veri'");
// executa a query
$dados =  mysqli_query($mysqli, $query) or die(mysqli_error($mysqli, $query));
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<br />
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "Usuário não encontrado ou verificador não confere. <a href='indexa.php'>Voltar</a>";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
$user=$linha['email'];
$senha=$linha['senha'];
$id=$linha['id'];
$verificador=$linha['verificador'];
?>
<form name="form" method="post" action="salva/salva_esqueci_senhaacf.php" onSubmit="return validacao();">
<fieldset class="grupo">
		<div class="form-group">
<input type="hidden" name="id" value="<?php print $linha['id']?>"/>

<label class="form-control">Nova senha:</label>
<input class="form-control" type="password" size="7" name="senhac"   maxlength="6" />
	</div>
	</fieldset>
	<fieldset class="grupo">
	<div class="form-group">
	<input type="submit" value="Alterar senha" name="alterasenha"/>
  <input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='indexa.php'"/>
 </div>
 </fieldset>
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
<br />
<br />
</div>
</body>
</html>