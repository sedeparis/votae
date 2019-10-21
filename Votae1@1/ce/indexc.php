<!DOCTYPE html>
 <html lang="pt-BR">
<head>
<title>Comissão
</title>
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
function validacao() { 
if(document.loginform.email.value=="")
{
alert("Por favor informe o nome ou email.");
document.loginform.email.focus();
return false;
}
if(document.loginform.senha.value=="")
{
alert("Por favor informe a senha.");
document.loginform.senha.focus();
return false;
}
}
</script>
</head>
<body>
<div class="container">
<br><br>
<img src="../img/logop.jpg"/>
</div>
<div class="container">
<h2>Comissão</h2>
<form name="loginform" method="Post" action="ce_authentication.php" onSubmit="return validacao();">
 <fieldset class="grupo">
		  <div class="form-group">
<label>Login:</label>
   <input class="form-control" type="text"   class="form-control" class="form-control"size="25" name="email"/>
</div>
</fieldset>
<fieldset class="grupo">
  <div class="form-group">
<label>Senha:</label> 
<input class="form-control" type="password" size="10" name="senha"/> 
</div>
</fieldset>
<fieldset class="grupo">
  <div class="form-group">
<input type="submit" value="Administrar"/>
<input type="reset" value="Limpar"/>
<input type="button" name="cancela" value="Cancelar" onclick="window.location.href='../index.php'"/>
<input type="button" name="esqsenha" value="Esqueci minha senha" onclick="window.location.href='esqueci_senha.php'"/>
</div>
</fieldset>
</form>
<div class="container">
<?php	   
include '../conecta_banco.php';
  $sql = mysqli_query($mysqli, "SELECT * FROM parametros WHERE id=2");
while($proc = mysqli_fetch_array($sql)) {
	echo  'Votae Versão '. $proc['valor']; }
?>

</div>
</body>
</html>