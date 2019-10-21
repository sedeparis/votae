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
<title>Alterar senha ACF
</title>
	<meta charset="utf-8"> 
	  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet"> 
<link rel="icon" type="image/jpg" href="../../img/icone_barra.jpg">
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
 // cria a instrução SQL que vai selecionar os dados dos itens
$query = ("SELECT * FROM users WHERE email ='$user'");
// executa a query
$dados = @mysql_query($query) or die(mysql_error());
// transforma os dados em um array
$linha = @mysql_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysql_num_rows($dados);
?>
<br />
<?php
	// se o número de resultados for maior que zero, mostra os dados//
	if($total == 0) {echo "Usuário não encontrado <a href='admin.php'>Voltar</a>";}
	if($total > 0) { 
		// inicia o loop que vai mostrar todos os dados
		do {
$user=$linha['email'];
$senha=$linha['senha'];
$id=$linha['id'];
?>
<form name="form" method="post" action="salva/salva_alterar_senhaacf.php" onSubmit="return validacao();">
<fieldset class="grupo">
		<div class="form-group">
<input type="hidden" name="id" value="<?php print $linha['id']?>"/>
<label class="form-control">Senha Atual:</label> 
<input class="form-control" type="password" size="7" name="senha" maxlength="6" /> 
</div>
<div class="form-group">
<label class="form-control">Nova senha:</label>
<input class="form-control" type="password" size="7" name="senhac"   maxlength="6" />
	</div>
	</fieldset>
	<fieldset class="grupo">
	<div class="form-group">
	<input type="submit" value="Alterar senha" name="alterasenha"/>
  <input type="reset" name="Limpar" value="Limpar" />
		 <input type="button" name="cancela" value="Cancelar" onclick="window.location.href='painelf.php'"/>
 </div>
 </fieldset>
</form>
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
</div>
</body>
</html>